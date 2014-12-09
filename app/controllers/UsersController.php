<?php

class UsersController extends BaseController {

    public function getIndex() {
        $users = User::all();
        return View::make('users.index')->with('users', $users);
    }

    public function getCreate() {
        $groups = Group::all();
        return View::make('users.create')->with('groups', $groups);
    }

    public function postCreate() {
        //Validate imputs
        $reglas = array(
            'nombre' => 'required|min:4|max:50',
            'apellido' => 'required|min:4|max:50',
            'email' => 'required|email|min:5|max:100|unique:users,email',
            'password' => 'required|min:5|max:50',
            'password_re' => 'same:password'
        );

        $mensajes = array(
            'required' => 'Campos obligatorios',
            'email' => 'Ingrese un email valido',
        );
        $validaciones = Validator::make(Input::all(), $reglas, $mensajes);

        if ($validaciones->fails()) {
            return Redirect::back()->withErrors($validaciones);
        } else {
            try {
                // Create the user
                $users = Sentry::createUser(array(
                            'first_name' => Input::get('nombre'),
                            'last_name' => Input::get('apellido'),
                            'email' => Input::get('email'),
                            'password' => Input::get('password'),
                            'activated' => true,
                            'permissions' => array(
                                'user.create' => -1, 'user.delete' => -1,
                                'user.view' => 1, 'user.update' => 1,
                            ),
                ));
                // Find the group using the group id
                $adminGroup = Sentry::findGroupById(Input::get('rol'));
                // Assign the group to the user
                $users->addGroup($adminGroup);
            } catch (Cartalyst\Sentry\Users\LoginRequiredException $e) {
                echo 'Login field is required.';
            } catch (Cartalyst\Sentry\Users\PasswordRequiredException $e) {
                echo 'Password field is required.';
            } catch (Cartalyst\Sentry\Users\UserExistsException $e) {
                echo 'User with this login already exists.';
            } catch (Cartalyst\Sentry\Groups\GroupNotFoundException $e) {
                echo 'Group was not found.';
            }
            
            return Redirect::to('admin/admin');
        }
    }

    public function getUpdate($id) {
        $users = User::find($id);
        $groups = Group::all();
        if (is_null($users)) {
            return Redirect::to('admin/admin');
        }

        return View::make('users.update')->with('users', $users)->with('groups', $groups);
    }

    public function postUpdate($id) {
        $users = User::find($id);
        if (is_null($users)) {
            return Redirect::to('admin/admin');
        }
        //Validate imputs
        $reglas = array(
            'nombre' => 'required|min:4|max:50',
            'apellido' => 'required|min:4|max:50',
            'email' => 'required|email|min:5|max:100',
            'password' => 'required|min:5|max:50',
            'password_re' => 'same:password'
        );

        $validaciones = Validator::make(Input::all(), $reglas);

        if ($validaciones->fails()) {
            return Redirect::back()->withErrors($validaciones);
        }

        try {    // Find the group using the group id
            $group = Sentry::findUserById($id);
            // Update the group details
            $group->first_name = Input::get('nombre');
            $group->last_name = Input::get('apellido');
            $group->email = Input::get('email');
            $group->password = Input::get('password');
            echo $group->first_name . $group->last_name . $group->email . $group->password;
            // Update the group
            if ($group->save()) {
                echo 'User information was updated';
            } else {
                echo 'User information was not updated';
            }
        } catch (Cartalyst\Sentry\Users\UserExistsException $e) {
            echo 'User with this login already exists.';
        } catch (Cartalyst\Sentry\Users\UserNotFoundException $e) {
            echo 'User was not found.';
        }

        return Redirect::to('admin/admin');
    }

    public function getDelete($id) {

        try {
            // Find the group using the group id
            $group = Sentry::findUserById($id);
            // Delete the group
            $group->delete();
        } catch (Cartalyst\Sentry\Users\UserExistsException $e) {
            echo 'User was not found.';
        }

        return Redirect::to('admin/admin');
    }

}
