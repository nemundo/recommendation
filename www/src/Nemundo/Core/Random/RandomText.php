<?php

namespace Nemundo\Core\Random;


use Nemundo\Core\Base\AbstractBaseClass;

// TextRandom
class RandomText extends AbstractBaseClass
{

    /**
     * @var int
     */
    public $length = 10;

    /**
     * @var bool
     */
    public $lowercase = true;


    public function getText()
    {


        $characters = 'abcdefghijklmnopqrstuvwxyz';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $this->length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;

    }


    public function getEmail()
    {

        $email = $this->getText() . '@' . $this->getText() . '.com';
        return $email;

    }


}