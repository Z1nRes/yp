<?php

namespace Validators;

use src\Validator\AbstractValidator;

class PasswordLengthValidator extends AbstractValidator
{

   protected string $message = 'Field length :field less than 6 characters';

   public function rule(): bool
   {
        echo 'Длина пароля' . strlen($this->value);
       return strlen($this->value) >= 6;
   }
}