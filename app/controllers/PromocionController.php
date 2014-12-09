<?php

class PromocionController extends BaseController {

    public function getIndex() {
        $promociones = Promocion::orderBy('updated_at','desc')->get();
        $arrFind = array('home-principal','home-inferior-grande','home-inferior-peque1','home-inferior-peque2',
                         'dctos-superior-grande1','dctos-superior-grande2','dctos-superior-pequenos1','dctos-superior-pequenos2','dctos-superior-pequenos3','dctos-superior-pequenos4',
                         'dctos-inferior-grande1','dctos-inferior-grande2');
        $arrReplace = array('Home Principal','Home inferior grande','Home inferior pequeño arriba','Home inferior pequeño abajo',
                            'Descuentos superior grande izquierdo', 'Descuentos superior grande derecho', 
                            'Descuentos superior pequeño derecho arriba','Descuentos superior pequeño derecho abajo',
                            'Descuentos superior pequeño izquieda arriba','Descuentos superior pequeño izquierdo abajo',
                            'Descuentos inferior grande izquierdo', 'Descuentos inferior grande derecho');
        foreach ($promociones as $promocion) {
            $promocion->tipo = str_replace($arrFind, $arrReplace, $promocion->tipo);
        }
        return View::make('promociones.index')->with('promociones', $promociones);
    }

    public function getCreate() {        
        return View::make('promociones.create');
    }

    public function postCreate() {
        Input::flash();
        $promocion = new Promocion;
        $promocion->nombre = Input::get('nombre');
        $promocion->descripcion = Input::get('descripcion');
        if (Input::hasFile('imagen')) {
            $file = Input::file('imagen');
            if (!in_array(strtolower($file->getClientOriginalExtension()), ImagenesController::$extensionesPermitidas)) {
                return Redirect::back()->withInput()->withErrors("El archivo no es una imagen válida");
            }
        } else {
            return Redirect::back()->withInput()->withErrors("Debes seleccionar un archivo para subir");
        }
        $promocion->tipo = Input::get('tipoPromocion');
        ImagenesController::moveFile($file, $promocion);
        $promocion->vencimiento = Input::get('fechaVencimiento');
        if ($promocion->save()) {
            Input::flush();
            return Redirect::to('admin/promociones');
        }
        return Redirect::back()->withInput()->withErrors($promocion->getErrors());
    }

    public function getDelete($id) {
        $promocion = Promocion::find($id);
        if (is_null($promocion)) {
            return Redirect::to('admin/promociones');
        }
        File::delete(public_path() . '/upload-images/' . $promocion->ruta);
        $promocion->delete();
        return Redirect::to('admin/promociones');
    }

    public function getUpdate($id) {
        $promocion = Promocion::find($id);
        if (is_null($promocion)) {
            return Redirect::to('admin/promociones');
        }
        return View::make('promociones.update')->with('promocion', $promocion);
    }

    public function postUpdate($id) {
        $promocion = Promocion::find($id);
        $promocion->nombre = Input::get('nombre');
        $promocion->descripcion = Input::get('descripcion');
        if (Input::hasFile('imagen')) {
            $imagenAnterior = $promocion->ruta;
            $file = Input::file('imagen');
            if (!in_array(strtolower($file->getClientOriginalExtension()), ImagenesController::$extensionesPermitidas)) {
                return Redirect::back()->withInput()->withErrors("El archivo no es una imagen válida");
            }
            ImagenesController::moveFile($file, $promocion);
        }
        $promocion->tipo = Input::get('tipoPromocion');
        ImagenesController::redimensionarImagen($promocion);
        $promocion->vencimiento = Input::get('fechaVencimiento');
        if ($promocion->save()) {
            if (isset($imagenAnterior)) {
                File::delete(public_path() . '/upload-images/' . $imagenAnterior);
            }
            return Redirect::to('admin/promociones');
        }
        File::delete(public_path() . '/upload-images/' . $promocion->ruta);
        return Redirect::back()->withInput()->withErrors($promocion->getErrors());
    }

    public function getDescuento(){
        return View::make('promociones.descuento');
    }

    public function postDescuento(){
        $extensionesPermitidas = array("pdf");
        if (Input::hasfile('document')){           
            $file = Input::file('document');
            if (!in_array(strtolower($file->getClientOriginalExtension()), $extensionesPermitidas)) {                
                return Redirect::back()->withErrors("El archivo no es válido");
            }
        }

        $destinationPath = public_path()."/uploads/";
        $fileName = 'Descuentos.pdf';        
        $upload_success = Input::file('document')->move($destinationPath, $fileName);
        if( $upload_success ) {            
           return Redirect::to('admin/promociones');
        } else {
           return Redirect::back()->withErrors("El archivo no se pudo subir");
        }        
    }

}
