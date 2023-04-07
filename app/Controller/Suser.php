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
                'photo' => ['image'],
                'id_role' => ['select'],
                'login' => ['required', 'unique:users,login'],
                'password' => ['required', 'passwordLength']
            ], [
                'image' => 'В поле :field выберите изображение формата jpg, png или webp',
                'required' => 'Поле :field пусто',
                'unique' => 'Поле :field должно быть уникально',
                'select' => 'Поле :field должно быть Админ или Суперпользователь',
                'passwordLength' => 'Поле :field должно быть длинной в 6 символов или более'
            ]);

            if ($validator->fails()) {
                return new View('site.signup', ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE), 'roles' => $roles]);
            } else {
                $user = User::create($request->all());
                $user->photo($_FILES['photo']);
                $user->save();
                app()->route->redirect('/profile');
                return false;
            }
        }
        return new View('site.signup', ['roles' => $roles]);
    }
}
