<?php


namespace Nemundo\Geo\Kml\Color;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Type\Text\Text;

class KmlColorConverter extends AbstractBase
{

    public function fromHex($hex) {

        $color= 'ff'.(new Text($hex))->remove('#')->getValue();
        return $color;

    }


    public function fromRGB($r,$g,$b) {

    }


}