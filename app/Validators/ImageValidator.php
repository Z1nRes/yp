<?php

namespace Validators;

use src\Validator\AbstractValidator;

class ImageValidator extends AbstractValidator
{
    protected string $message = 'В поле :field должны быть картинки png и jpeg';

    public function rule(): bool
    {
        return in_array($this->value['type'], ['image/png','image/jpeg', 'image/webp']);
    }
}