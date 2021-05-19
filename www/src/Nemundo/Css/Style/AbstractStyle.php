<?php


namespace Nemundo\Css\Style;


use Nemundo\Core\Base\AbstractBase;

class AbstractStyle extends AbstractBase
{


    protected $selector;

    public $padding;

    public $margin;

    public $backgroundColor;


    public function getStyle() {


        $line=[];
        $line[]= $this->selector.' {';

        if ($this->padding!==null) {
            $line[]='padding:'.$this->padding.'px;';
        }

        if ($this->margin!==null) {
            $line[]='margin:'.$this->margin.'px;';
        }

        if ($this->backgroundColor!==null) {
            $line[]='background-color:'.$this->backgroundColor.';';
        }


        $line[]='}';

        return $line;


    }


}