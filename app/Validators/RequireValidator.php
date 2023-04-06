<?php

namespace Validators;

use src\Validator\AbstractValidator;

class RequireValidator extends AbstractValidator
{

   protected string $message = 'Field :field is required';

   public function rule(): bool
   {
       return !empty($this->value);
   }
}
