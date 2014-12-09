<?php

use PHPImageWorkshop\ImageWorkshop;

class ImagenesController extends BaseController {

    static $extensionesPermitidas = array("jpg", "png", "jpeg", "gif");

    public function getIndex() {
        return Redirect::to('admin/farmacias');
    }

    public function getCreate($id = null) {
        if (!is_numeric($id)) {
            return Redirect::to('admin/farmacias');
        } else {
            return View::make('imagenes.create')->with('idFarmacia', $id);
        }
    }

    public function postCreate() {
        $imagen = new Imagen;
        $id = Input::get('id_farmacia');
        $imagen->farmacia_id = Input::get('id_farmacia');
        $imagen->alt = Input::get('nombreImagen');
        $imagen->tipo = Input::get('tipoImagen');
        try {
            if (Input::hasFile('imagen')) {
                $file = Input::file('imagen');
                if (in_array(strtolower($file->getClientOriginalExtension()), ImagenesController::$extensionesPermitidas)) {
                    $imagen->imagen600 = static::determinarPrefijo($file);
                    static::redimensionarImagen2($imagen);
                    if ($imagen->save()) {
                        return Redirect::to('admin/farmacias/images/' . $imagen->farmacia_id);
                    }
                    File::delete(public_path() . '/upload-images/' . $imagen->ruta);
                    return Redirect::back()->withInput()->withErrors($imagen->getErrors());
                }
                return View::make('imagenes.create')->with('idFarmacia', $id)->with('errorArchivo', "Este archivo no es una foto permitida.");
            }
        } catch (\Symfony\Component\HttpFoundation\File\Exception\FileException $e) {
            return Redirect::back()->withInput()->withErrors('La imagen es demasiado grande, el tamaño maximo permitido es: ' . strtoupper(ini_get('upload_max_filesize')));
        }
        return View::make('imagenes.create')->with('idFarmacia', $id)->with('errorArchivo', "Debes seleccionar una foto para la farmacia.");
    }

    public static function determinarPrefijo($file) {
        $prefijo = "";
        while (file_exists('upload-images/' . $prefijo . $file->getClientOriginalName())) {
            $prefijo .= rand(0, 10);
        }
        try {
            $file->move('upload-images', $prefijo . $file->getClientOriginalName());
        } catch (FileException $exception) {
            return Redirect::back()->withInput()->with('errorArchivo', "No se pudo subir el archivo");
        }
        return $prefijo . $file->getClientOriginalName();
    }

    public static function moveFile($file, $imagenSubida) {
        $imagenSubida->ruta = static::determinarPrefijo($file);
        ImagenesController::redimensionarImagen($imagenSubida);
    }

    public function getDelete($id) {
        $imagen = Imagen::find($id);
        $idFarmacia = $imagen->farmacia_id;
        if (is_null($imagen)) {
            return Redirect::to('admin/farmacias');
        }
        File::delete(public_path() . '/upload-images/' . $imagen->imagen600);
        File::delete(public_path() . '/upload-images/' . $imagen->imagen250);
        File::delete(public_path() . '/upload-images/' . $imagen->imagen60);
        $imagen->delete();
        return Redirect::to('admin/farmacias/images/' . $idFarmacia);
    }

    public function getUpdate($id) {
        $imagen = Imagen::find($id);
        if (is_null($imagen)) {
            return Redirect::to('admin/farmacias');
        }
        return View::make('imagenes.update')->with('imagen', $imagen);
    }

    public function postUpdate() {
        $imagen = Imagen::find(Input::get('id_imagen'));
        if (is_null($imagen)) {
            return Redirect::to('admin/farmacias');
        }
        $imagen->alt = Input::get('nombreImagen');
        $imagen->tipo = Input::get('tipoImagen');
        try {

            if (Input::hasFile('imagen')) {
                $file = Input::file('imagen');
                if (in_array(strtolower($file->getClientOriginalExtension()), ImagenesController::$extensionesPermitidas)) {
                    $imagenAnterior1 = $imagen->imagen600;
                    $imagenAnterior2 = $imagen->imagen250;
                    $imagenAnterior3 = $imagen->imagen60;
                    $imagen->imagen600 = static::determinarPrefijo($file);
                    static::redimensionarImagen2($imagen);
                    if ($imagen->save()) {
                        File::delete(public_path() . '/upload-images/' . $imagenAnterior1);
                        File::delete(public_path() . '/upload-images/' . $imagenAnterior2);
                        File::delete(public_path() . '/upload-images/' . $imagenAnterior3);
                        return Redirect::to('admin/farmacias/images/' . $imagen->farmacia_id);
                    }
                    File::delete(public_path() . '/upload-images/' . $imagen->ruta);
                    return Redirect::back()->withInput()->withErrors($imagen->getErrors());
                } else {
                    return View::make('imagenes.update')->with('idFarmacia', $id)->with('errorArchivo', "Este archivo no es una foto permitida.")->with('imagen', $imagen);
                }
            } else {
                if ($imagen->save()) {
                    return Redirect::to('admin/farmacias/images/' . $imagen->farmacia_id);
                }
                return Redirect::back()->withInput()->withErrors($imagen->getErrors());
            }
        } catch (\Symfony\Component\HttpFoundation\File\Exception\FileException $e) {
            return Redirect::back()->withInput()->withErrors('La imagen es demasiado grande, el tamaño maximo permitido es: ' . strtoupper(ini_get('upload_max_filesize')));
        }
        return Redirect::to('admin/farmacias/images/' . $imagen->farmacia_id);
    }

    public static function redimensionarImagen($file) {
        $layer = ImageWorkshop::initFromPath(public_path() . '/upload-images/' . $file->ruta);
        switch ($file->tipo) {
            case "Fachada":
                $width = $height = 600;
                break;
            case "Interior":
                $width = $height = 250;
                break;
            case "home-principal":
                $width = 960;
                $height = 400;
                break;
            case "home-inferior-grande":
            case "dctos-superior-grande1":
            case "dctos-superior-grande2":
            case "dctos-inferior-grande1":
            case "dctos-inferior-grande2":
                $width = 400;
                $height = 270;
                break;
            case "home-inferior-peque1":
            case "home-inferior-peque2":
            case "dctos-superior-pequenos1":
            case "dctos-superior-pequenos2":
            case "dctos-superior-pequenos3":
            case "dctos-superior-pequenos4":
                $width = 400;
                $height = 130;
                break;
            default:
                $width = 0;
                $height = 0;
                break;
        }
        if (abs($layer->getHeight() - $height) > 200 || abs($layer->getWidth() - $width) > 200) {
            $layer->cropMaximumInPixel(0, 0, "MM");
            $layer->resizeInPixel($width, $height);
            $layer->save(public_path() . '/upload-images/', $file->ruta, true, null, 100);
        } else {
            $layer->resizeInPixel($width, $height);
            $layer->save(public_path() . '/upload-images/', $file->ruta, true, null, 100);
        }
    }

    public static function redimensionarImagen2($imagen) {
        $layer = ImageWorkshop::initFromPath(public_path() . '/upload-images/' . $imagen->imagen600);
        $layer1 = ImageWorkshop::initFromPath(public_path() . '/upload-images/' . $imagen->imagen600);
        $layer2 = ImageWorkshop::initFromPath(public_path() . '/upload-images/' . $imagen->imagen600);
        $layer->cropMaximumInPixel(0, 0, "MM");
        $layer->resizeInPixel(600, 600);

        $layer1->cropMaximumInPixel(0, 0, "MM");
        $layer1->resizeInPixel(250, 250);

        $layer2->cropMaximumInPixel(0, 0, "MM");
        $layer2->resizeInPixel(60, 60);

        $layer->save(public_path() . '/upload-images/', $imagen->imagen600, true, null, 100);
        $layer1->save(public_path() . '/upload-images/', '1' . $imagen->imagen600, true, null, 100);
        $layer2->save(public_path() . '/upload-images/', '2' . $imagen->imagen600, true, null, 100);
        $imagen->imagen250 = '1' . $imagen->imagen600;
        $imagen->imagen60 = '2' . $imagen->imagen600;
    }

}
