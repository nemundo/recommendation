<?php


namespace Nemundo\Css\Document;


use Nemundo\Css\Style\AbstractStyle;
use Nemundo\Html\Document\AbstractDocument;

abstract class AbstractCssDocument extends \Nemundo\Core\Base\AbstractDocument
{

    /**
     * @var AbstractStyle[]
     */
    private $styleList=[];

    public function addStyle(AbstractStyle $style) {

        $this->styleList[]=$style;
        return $this;

    }



    public function saveFile()
    {




        foreach ($this->styleList as $style) {


             $style->getStyle();


        }


        // TODO: Implement saveFile() method.
    }


}