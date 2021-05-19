<?php

namespace Nemundo\Orm\Utility;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Type\Text\Text;


// to Type/Text ???
class UppercaseFirstLetter extends AbstractBase
{


    public function uppercaseFirstLetter($text)
    {

        if ((new Text($text))->getLength() > 0) {
            $text[0] = (new Text($text[0]))->changeToUppercase()->getValue();
        }
        return $text;

    }


}