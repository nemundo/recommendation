<?php

namespace Nemundo\Core\Validation;


use Nemundo\Core\Base\AbstractBase;

class EmailValidation extends AbstractBase
{


    public function isEmail($email)
    {

        $returnValue = true;


        // ohne domain länder code

        if (!preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $email)) {
            $returnValue = false;
        }

        return $returnValue;

    }

}