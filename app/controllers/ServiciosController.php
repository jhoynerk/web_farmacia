<?php

class ServiciosController extends BaseController {

    public function getIndex() {
        $servicios = Servicio::orderBy('nombre','asc')->get();
        return View::make('servicios.index')->with('servicios', $servicios);
    }

    public function getCreate() {
        return View::make('servicios.create');
    }

    public function postCreate() {
        Input::flash();
        $servicio = new Servicio;
        $servicio->nombre = Input::get('nombre');
        if ($servicio->save()) {
            Input::flush();
            return Redirect::to('admin/servicios');
        }
        return Redirect::back()->withInput()->withErrors($servicio->getErrors());
    }

    public function getDelete($id) {

        $servicio = Servicio::find($id);
        if (is_null($servicio)) {
            return Redirect::to('admin/servicios');
        }

        $servicio->delete();
        return Redirect::to('admin/servicios');
    }

    public function getUpdate($id) {
        $servicio = Servicio::find($id);
        if (is_null($servicio)) {
            return Redirect::to('admin/servicios');
        }

        return View::make('servicios.update')->with('servicio', $servicio);
    }

    public function postUpdate($id) {
        $servicio = Servicio::find($id);
        if (is_null($servicio)) {
            return Redirect::to('admin/servicios');
        }
        $servicio->nombre = Input::get('nombre');
        if ($servicio->save()) {
            return Redirect::to('admin/servicios');
        }
        return Redirect::back()->withInput()->withErrors($servicio->getErrors());
    }

}
