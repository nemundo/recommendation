<?php

namespace Nemundo\Core\Type\Number;


use Nemundo\Core\Type\AbstractType;

class YesNo extends AbstractType
{

    public function __construct($value = false)
    {
        parent::__construct($value);
    }

    public function getText()
    {

        $text = 'false';
        if ($this->value) {
            $text = 'true';
        }

        return $text;

    }


    public function invertValue()
    {
        $this->value = !$this->value;
        return $this;
    }


    public function fromText($text)
    {

        $text = strtolower($text);

        if (($text === 'false') || ($text === '0') || ($text === 'no')) {
            $this->value = false;
        }

        if (($text === 'true') || ($text === '1') || ($text === 'yes')) {
            $this->value = true;
        }

        return $this;

    }

}