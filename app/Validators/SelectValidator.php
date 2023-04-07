<?php

namespace Validators;

use src\Validator\AbstractValidator;

class SelectValidator extends AbstractValidator
{

   protected string $message = 'Field :field must be selected from the list';

   public function rule(): bool
   {
      return $this->value != 0;
   }
}