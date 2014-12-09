<?php

use Carbon\Carbon;

class PublicController extends BaseController {

    public function getIndex() {
        $hoy = Carbon::now()->format('Y-m-d');
        $data["farmacias"] = Farmacia::orderBy(DB::raw('RAND()'))->take(5)->get();
        $imagen = DB::table('farmacias')
            ->join('farmacia_imagenes', 'farmacias.id', '=', 'farmacia_imagenes.farmacia_id')
            ->where('farmacias.destacada','=',1)->where('farmacia_imagenes.tipo','like','fachada')->orderBy(DB::raw('RAND()'))->first();
        $carrusel['home-principal'] = Promocion::where('tipo', 'like', 'home-principal')->where('vencimiento', '>=', $hoy)->get();
        $carrusel['home-inferior-grande'] = Promocion::where('tipo', 'like', 'home-inferior-grande')->where('vencimiento', '>=', $hoy)->get();
        $carrusel['home-inferior-peque1'] = Promocion::where('tipo', 'like', 'home-inferior-peque1')->where('vencimiento', '>=', $hoy)->get();
        $carrusel['home-inferior-peque2'] = Promocion::where('tipo', 'like', 'home-inferior-peque2')->where('vencimiento', '>=', $hoy)->get();
        $file = $this->fileExist();
        $data["header_home"] = View::make('headerHome')->with('filePdf', $file)->render();
        $data["footer_home"] = View::make('footerHome')->with('filePdf', $file)->render();
        $data["imagen_farmacia"] = $imagen;
        return View::make('home', $data)->with('carruseles', $carrusel);
    }

    public function getAjax() {
        if (!Request::ajax() && false) {
            return Redirect::to('farmacias');
        }
        $farmacias = Farmacia::with('imagenes')->get();
        return Response::json($farmacias);
    }

    public function getFarmacias($slug = "") {
        $file = $this->fileExist();
        if ($slug != "") {
            $farmacia = Farmacia::where('slug', '=', $slug)->first();
            if (is_null($farmacia)) {
                return Redirect::to('farmacias');
            }
            $imagen = Imagen::where('farmacia_id', '=', $farmacia->id)->orderBy('tipo','asc')->get();
            $servicios = $farmacia->servicios()->orderBy('nombre','asc')->get();            
            $data["header_home"] = View::make('headerHome')->with('filePdf', $file)->render();
            $data["footer_home"] = View::make('footerHome')->with('filePdf', $file)->render();
            if (count($farmacia) > 0) {
                return View::make('farmacias.detalle', $data)->with('farmacia', $farmacia)->with('imagen', $imagen)->with('servicios',$servicios);
            } else {
                return App::abort(404);
            }
        } else {
            $data["farmacias"] = $farmacias = Farmacia::with('imagenes')->orderBy('nombre','asc')->paginate();
            $data["farmacias_pages"] = $farmacias->links();
            $data["current_page"] = $farmacias->getCurrentPage();
            $data["header_home"] = View::make('headerHome')->with('filePdf', $file)->render();
            $data["footer_home"] = View::make('footerHome')->with('filePdf', $file)->render();
            $data["listado_farmacias"] = View::make('farmacias.listadoFarmacias', $data)->render();
            if (Request::ajax() && true) {
                return Response::json(array('html' => $data["listado_farmacias"], 'farmacias' => $farmacias, 'page' => $data["current_page"]));
            }

            return View::make('farmacias.verTodas', $data);
        }
    }

    public function getContactanos() {
        $file = $this->fileExist();
        $data["header_home"] = View::make('headerHome')->with('filePdf', $file)->render();
        $data["footer_home"] = View::make('footerHome')->with('filePdf', $file)->render();
        return View::make('contactos', $data);
    }

    public function getDescuentos() {
        $hoy = Carbon::now()->format('Y-m-d');
        $file = $this->fileExist();
        $data["header_home"] = View::make('headerHome')->with('filePdf', $file)->render();
        $data["footer_home"] = View::make('footerHome')->with('filePdf', $file)->render();
        $carrusel['dctos-superior-grande1'] = Promocion::where('tipo', 'like', 'dctos-superior-grande1')->where('vencimiento', '>=', $hoy)->get();
        $carrusel['dctos-superior-grande2'] = Promocion::where('tipo', 'like', 'dctos-superior-grande2')->where('vencimiento', '>=', $hoy)->get();
        $carrusel['dctos-superior-pequenos1'] = Promocion::where('tipo', 'like', 'dctos-superior-pequenos1')->where('vencimiento', '>=', $hoy)->get();
        $carrusel['dctos-superior-pequenos2'] = Promocion::where('tipo', 'like', 'dctos-superior-pequenos2')->where('vencimiento', '>=', $hoy)->get();
        $carrusel['dctos-superior-pequenos3'] = Promocion::where('tipo', 'like', 'dctos-superior-pequenos3')->where('vencimiento', '>=', $hoy)->get();
        $carrusel['dctos-superior-pequenos4'] = Promocion::where('tipo', 'like', 'dctos-superior-pequenos4')->where('vencimiento', '>=', $hoy)->get();
        $carrusel['dctos-inferior-grande1'] = Promocion::where('tipo', 'like', 'dctos-inferior-grande1')->where('vencimiento', '>=', $hoy)->get();
        $carrusel['dctos-inferior-grande2'] = Promocion::where('tipo', 'like', 'dctos-inferior-grande2')->where('vencimiento', '>=', $hoy)->get();        
        return View::make('descuentos', $data)->with('carruseles', $carrusel)->with('filePdf', $file);
    }

    public function getSuscribir() {
        if (!Request::ajax() && false) {
            return Redirect::to('/');
        }
        $first_name = Input::get('nombre');
        $email_address = Input::get('email');
        $list_id = "eb27690d5f";
        $members = MailchimpWrapper::lists()->members($list_id, array('email' => $email_address))['data'];
        $suscrito = false;
        foreach ($members as $key => $member) {
            if ($member['email'] == $email_address) {
                $suscrito = true;
            }
        }

        if ($suscrito) {
            return Response::json(array('message' => 'Usted ya esta inscripto en nuestros Boletines.', 'response' => 'false'));
        } else {
            MailchimpWrapper::lists()->subscribe($list_id, array('email' => $email_address, 'name' => $first_name));
            return Response::json(array('message' => 'Gracias por suscribirse en nuestros boletines. En breve le llegara un correo de confirmación.', 'response' => 'true'));
        }
    }

    public function getBys() {
        $file = $this->fileExist();
        $data["header_home"] = View::make('headerHome')->with('filePdf', $file)->render();
        $data["footer_home"] = View::make('footerHome')->with('filePdf', $file)->render();
        return View::make('bys', $data);
    }

    private function fileExist(){
        $file = "uploads/Descuentos.pdf";
        if (File::exists($file)) {
            return $file;
        }
        return '';
    }

}
