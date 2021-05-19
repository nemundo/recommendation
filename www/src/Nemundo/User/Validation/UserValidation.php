<?php

namespace Nemundo\User\Validation;


use Nemundo\User\Data\User\UserCount;

class UserValidation
{

    // checkLogin
    public function checkValue($value)
    {

        $returnValue = true;

        $count = new UserCount();
        $count->filter->andEqual($count->model->login, $value);

        if ($count->getCount() > 0) {
            $returnValue = false;
        }

        return $returnValue;

    }


}