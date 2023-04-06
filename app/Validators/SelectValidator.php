<?php

namespace Validators;

use src\Validator\AbstractValidator;

class SelectValidator extends AbstractValidator
{

   protected string $message = 'Field :field must be admin or superuser';

   public function rule(): bool
   {
        return $this->value == 1 or $this->value == 2;
    //    return !empty($this->value);
   }
}