<?php


namespace Nemundo\Geo\Kml\Text;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Type\Text\Text;
use Nemundo\Html\Character\HtmlCharacter;

class KmlTextConverter extends AbstractBase
{

    public function getText($text) {

        return (new Text($text))
            ->replace('&',HtmlCharacter::AMPERSAND)  //HtmlCharacter::AMPERSAND)
            ->getValue();

    }

}