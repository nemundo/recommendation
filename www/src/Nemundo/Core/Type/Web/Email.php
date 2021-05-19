<?php

namespace Nemundo\Core\Type;


use Nemundo\Core\Validation\EmailValidation;

class Email extends AbstractType
{

    public function __construct($value)
    {

        if (!(new EmailValidation())->isEmail($value)) {
            throw new \Error('No valid eMail Adress');
        }
        parent::__construct($value);

    }


}