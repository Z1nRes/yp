<?php

namespace Controller;

use Model\Post;
use src\View;
use src\Request;
use Model\User;
use src\Auth\Auth;
use Model\Room;
use Model\Division;

class Site
{
    public function index(Request $request): string
    {
        // $user = User::where('id', '=' , $_SESSION['id'])->get();

        $posts = Post::where('id', $request->id)->get();
        return (new View())->render('site.post', ['posts' => $posts]);
    }
    

   public function hello(): string
   {
       return new View('site.hello', ['message' => 'hello working']);
   }

   public function signup(Request $request): string
    {
    if ($request->method === 'POST' && User::create($request->all())) {
        app()->route->redirect('/hello');
    }
    return new View('site.signup');
    }

    public function login(Request $request): string
    {
        //Если просто обращение к странице, то отобразить форму
        if ($request->method === 'GET') {
            return new View('site.login');
        }
        //Если удалось аутентифицировать пользователя, то редирект
        if (Auth::attempt($request->all())) {
            app()->route->redirect('/hello');
        }
        //Если аутентификация не удалась, то сообщение об ошибке
        return new View('site.login', ['message' => 'Неправильные логин или пароль']);
    }

    public function logout(): void
    {
        Auth::logout();
        app()->route->redirect('/hello');
    }

    public function room(Request $request): string
    {
        $rooms = Room::all();
        if ($request->method === 'POST' && Room::create($request->all())) {
            
        }
        return (new View())->render('site.room', ['rooms' => $rooms]); 
    }

    public function division(Request $request): string
    {
        $divisions = Division::all();
        if ($request->method === 'POST' && Division::create($request->all())) {
            
        }
        return (new View())->render('site.division', ['divisions' => $divisions]); 
    }
}
