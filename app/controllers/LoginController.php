<?php

class LoginController extends BaseController {

    public function getIndex() {
        if (Sentry::check()) {
            return Redirect::to('admin');
        } else {
            return View::make('users.login');
        }
    }

    public function postIndex() {
        try {
            $credentials = array(
                'email' => Input::get('email'),
                'password' => Input::get('passwd')
            );

            Sentry::authenticate($credentials, false);
        } catch (Cartalyst\Sentry\Users\LoginRequiredException $e) {
            return View::make('users.login')->with('error_login', "Usuario o contraseña incorrectos");
        } catch (Cartalyst\Sentry\Users\PasswordRequiredException $e) {
            return View::make('users.login')->with('error_login', "Usuario o contraseña incorrectos");
        } catch (Cartalyst\Sentry\Users\WrongPasswordException $e) {
            return View::make('users.login')->with('error_login', "Usuario o contraseña incorrectos");
        } catch (Cartalyst\Sentry\Users\UserNotFoundException $e) {
            return View::make('users.login')->with('error_login', "Usuario o contraseña incorrectos");
        } catch (Cartalyst\Sentry\Users\UserNotActivatedException $e) {
            return View::make('users.login')->with('error_login', "Este usuario no esta activado");
        } catch (Cartalyst\Sentry\Throttling\UserSuspendedException $e) {
            return View::make('users.login')->with('error_login', "Este usuario esta suspendido");
        }
        return Redirect::intended('/admin');
    }
    public function getLogout() {
        Sentry::logout();
        return Redirect::to('login');
    }
}
