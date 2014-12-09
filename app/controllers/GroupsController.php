<?php

class GroupsController extends BaseController {

    public function getIndex() {
        $groups = Group::all();
        return View::make('groups.index')->with('groups', $groups);
    }

    public function getCreate() {
        $groups = Group::all();
        return View::make('groups.create')->with('groups', $groups);
    }

    public function postCreate() {
        //Validate imputs
        $reglas = array(
            'nombre' => 'required|max:50'
        );

        $validaciones = Validator::make(Input::all(), $reglas);

        if ($validaciones->fails()) {
            return Redirect::to('admin/rol/create');
        }
        try {
            // Create the group
            $group = Sentry::createGroup(array(
                        'name' => Input::get('nombre'),
                        'permissions' => array(
                            'admin' => 1,
                        ),
            ));
        } catch (Cartalyst\Sentry\Groups\NameRequiredException $e) {
            echo 'Name field is required';
        } catch (Cartalyst\Sentry\Groups\GroupExistsException $e) {
            echo 'Group already exists';
        }
        return Redirect::to('admin/rol');
    }

    public function getUpdate($id) {
        $groups = Group::find($id);
        if (is_null($groups)) {
            return Redirect::to('admin/rol');
        }

        return View::make('groups.update')->with('groups', $groups);
    }

    public function postUpdate($id) {
        $groups = Group::find($id);
        if (is_null($groups)) {
            return Redirect::to('admin/rol');
        }

        //Validate imputs
        $reglas = array(
            'nombre' => 'required|min:3|max:50'
        );

        $validaciones = Validator::make(Input::all(), $reglas);

        if ($validaciones->fails()) {
            return View::make('rol.update')->with('rol', $groups);
        }
        try {    // Find the group using the group id
            $group = Sentry::findGroupById($id);
            // Update the group details
            $group->name = Input::get('nombre');
            $group->permissions = array(
                'admin' => 1,
            );
            // Update the group
            if ($group->save()) {
                echo 'Group information was updated';
            } else {
                echo 'Group information was not updated';
            }
        } catch (Cartalyst\Sentry\Groups\GroupExistsException $e) {
            echo 'Group already exists.';
        } catch (Cartalyst\Sentry\Groups\GroupNotFoundException $e) {
            echo 'Group was not found.';
        }

        return Redirect::to('admin/rol');
    }

    public function getDelete($id) {

        try {
            // Find the group using the group id
            $group = Sentry::findGroupById($id);
            // Delete the group
            $group->delete();
        } catch (Cartalyst\Sentry\Groups\GroupNotFoundException $e) {
            echo 'Group was not found.';
        }

        return Redirect::to('admin/rol');
    }

}
