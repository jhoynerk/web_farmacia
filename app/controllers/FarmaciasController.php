<?php

class FarmaciasController extends BaseController {

    public function getIndex() {
        return View::make('farmacias.index')->with('farmacias', Farmacia::orderBy('nombre','asc')->paginate(25));
    }

    public function getCreate() {
        $servicios = Servicio::orderBy('nombre','asc')->get();
        return View::make('farmacias.create')->with('servicios', $servicios);
    }

    public function postCreate() {
        Input::flash();
        $farmacia = new Farmacia;
        $farmacia->nombre = Input::get('nombre');
        $farmacia->slogan = Input::get('slogan');
        $farmacia->direccion = Input::get('direccion');
        $farmacia->latitud = Input::get('latitud');
        $farmacia->longitud = Input::get('longitud');
        $farmacia->horario = Input::get('horario');
        $farmacia->telefono = Input::get('telefono');
        $farmacia->slug = $this->getSlug(Input::get('nombre'));
        $farmacia->destacada = Input::get('destacada',0);
        //si no salvo es porque hay errores
        if ($farmacia->save()) {
            if (!is_null(Input::get('servicios'))) {
                $farmacia->servicios()->sync(Input::get('servicios'));
            }
            Input::flush();
            return Redirect::to('admin/farmacias');
        }
        return Redirect::back()->withInput()->withErrors($farmacia->getErrors());
    }

    public function getDelete($id) {

        $farmacia = Farmacia::find($id);
        if (is_null($farmacia)) {
            return Redirect::to('admin/farmacias');
        }
        foreach ($farmacia->imagenes as $imagen) {
            File::delete(public_path() . '/upload-images/' . $imagen->imagen600);
            File::delete(public_path() . '/upload-images/' . $imagen->imagen250);
            File::delete(public_path() . '/upload-images/' . $imagen->imagen60);
        }
        $farmacia->delete();
        return Redirect::to('admin/farmacias');
    }

    public function getUpdate($id) {
        $farmacia = Farmacia::find($id);
        $servicios = Servicio::orderBy('nombre','asc')->get();
        if (is_null($farmacia)) {
            return Redirect::to('admin/farmacias');
        }
        return View::make('farmacias.update')->with('farmacia', $farmacia)->with('servicios', $servicios);
    }

    public function postUpdate($id) {
        Input::flash();
        $farmacia = Farmacia::find($id);
        if (is_null($farmacia)) {
            return Redirect::to('admin/farmacias');
        }
        if ($farmacia->nombre == Input::get('nombre')) {//si no cambie el nombre no hace falta verificar el slug
            $farmacia->slug = Str::slug(Input::get('nombre'));
        } else {
            $farmacia->slug = $this->getSlug(Input::get('nombre'));
        }
        $farmacia->nombre = Input::get('nombre');
        $farmacia->slogan = Input::get('slogan');
        $farmacia->direccion = Input::get('direccion');
        $farmacia->latitud = Input::get('latitud');
        $farmacia->longitud = Input::get('longitud');
        $farmacia->horario = Input::get('horario');
        $farmacia->telefono = Input::get('telefono');
        $farmacia->destacada = Input::get('destacada',0);
        if (is_null(Input::get('servicios'))) {
            $farmacia->servicios()->detach();
        } else {
            $farmacia->servicios()->sync(Input::get('servicios'));
        }
        if ($farmacia->save()) {
            return Redirect::to('admin/farmacias');
        }
        return Redirect::back()->withInput()->withErrors($farmacia->getErrors());
    }

    public function getService($id) {
        $farmacia = Farmacia::find($id);
        if (is_null($farmacia)) {
            return Redirect::to('admin/farmacias');
        }

        $servicios = Servicio::all();
        return View::make('farmacias.service')->with('farmacia', $farmacia)->with('servicios', $servicios);
    }

    public function getImages($id = null) {
        if ($id == null) {
            return Redirect::to('admin/farmacias');
        } else {
            $farmacia = Farmacia::find($id);
            if (is_object($farmacia)) {
                return View::make('farmacias.imagenes')->with('farmacia', $farmacia);
            }
            return Redirect::to('admin/farmacias');
        }
    }

    private function getSlug($nombre) {
        $slug = Str::slug($nombre);
        while (count(Farmacia::where('slug', '=', $slug)->get()) > 0) {
            $slug .= rand(0, 9);
        }
        return $slug;
    }

}
