<?php

namespace Controller;

use src\View;
use src\Request;
use Model\User;
use src\Auth\Auth;


use src\Validator\Validator;

class Authorization
{ 
    public function login(Request $request): string
    {
        if ($request->method === 'POST') {
            $validator = new Validator($request->all(), [
                'login' => ['required'],
                'password' => ['required']
            ], [
                'required' => 'Поле :field пусто',
            ]);

            if ($validator->fails()) {
                return new View('site.login', ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE)]);
            }

            //Если удалось аутентифицировать пользователя, то редирект
            if (Auth::attempt($request->all())) {
                app()->route->redirect('/hello');
            }
            //Если аутентификация не удалась, то сообщение об ошибке
            return new View('site.login', ['message' => 'Неправильные логин или пароль']);
        }
        //Если просто обращение к странице, то отобразить форму
        if ($request->method === 'GET') {
            return new View('site.login');
        }
        
    }

    public function logout(): void
    {
        Auth::logout();
        app()->route->redirect('/hello');
    }
}