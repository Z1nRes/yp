<?php
return [
   //Класс аутентификации
   'auth' => \src\Auth\Auth::class,
   //Клас пользователя
   'identity' => \Model\User::class,
   //Классы для middleware
   'routeMiddleware' => [
       'auth' => \Middlewares\AuthMiddleware::class,
   ],
   'validators' => [
        'required' => \Validators\RequireValidator::class,
        'unique' => \Validators\UniqueValidator::class,
        'select' => \Validators\SelectValidator::class,
        'passwordLength' => \Validators\PasswordLengthValidator::class,
        'image' => \Validators\ImageValidator::class,
   ],
   'routeAppMiddleware' => [
        'csrf' => \Middlewares\CSRFMiddleware::class,
        'trim' => \Middlewares\TrimMiddleware::class,
        'specialChars' => \Middlewares\SpecialCharsMiddleware::class,
    ],
 
];
