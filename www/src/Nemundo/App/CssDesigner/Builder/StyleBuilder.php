<?php


namespace Nemundo\App\CssDesigner\Builder;


use Nemundo\Css\Document\CssDocument;
use Nemundo\Web\WebConfig;

class StyleBuilder
{

    public function createStylesheet() {


        $filename = WebConfig::$webUrl.'css/style.css';

        $document=new CssDocument($filename);





        $document->saveFile();





    }

}