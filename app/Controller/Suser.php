<?php

namespace Controller;

use src\View;
use src\Request;
use Model\Role;
use Model\User;
use src\Auth\Auth;

use src\Validator\Validator;

class Suser
{ 
    public function signup(Request $request): string
    {
        $roles = Role::all();
        if ($request->method === 'POST') {
            
            $validator = new Validator($request->all(), [
                'id_role' => ['select'],
                'login' => ['required', 'unique:users,login'],
                'password' => ['required', 'passwordLength']
            ], [
                'required' => 'Поле :field пусто',
                'unique' => 'Поле :field должно быть уникально',
                'select' => 'Поле :field должно быть Админ или Суперпользователь',
                'passwordLength' => 'Поле :field должно быть длинной в 6 символов или более'
            ]);

            if ($validator->fails()) {
                return new View('site.signup', ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE), 'roles' => $roles]);
            }

            if (User::create($request->all())) {
                app()->route->redirect('/hello');
            }
        }
        return new View('site.signup', ['roles' => $roles]);
    }
}
