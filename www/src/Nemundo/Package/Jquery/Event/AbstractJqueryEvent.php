<?php

namespace Nemundo\Package\Jquery\Event;


use Nemundo\Com\Container\LibraryTrait;
use Nemundo\Com\JavaScript\Code\AbstractJavaScriptCode;
use Nemundo\Html\Container\AbstractHtmlContainer;

class AbstractJqueryEvent extends AbstractJavaScriptCode
{

    /**
     * @var string
     */
    public $eventId;


    public $returnFalse=true;

    /**
     * @var string
     */
    protected $eventName;


    /**
     * AbstractJqueryEvent constructor.
     * @param AbstractHtmlContainer|LibraryTrait|null $parentContainer
     */
    /*public function __construct(AbstractHtmlContainer $parentContainer = null)
    {
        //parent::__construct($parentContainer);

        $parentContainer->addJqueryCode($this);


    }*/


    // private $codeLineList=[];

    /*
    public function addCodeLine($code) {
        $this->codeLineList[]=$code;
        return $this;
    }*/


    public function addCodeLine($line)
    {
        return parent::addCodeLine($line);
    }

    public function getContent()
    {

      $this->addPreLine( '$("#'.$this->eventId.'").'.$this->eventName.'(function() {');

        //$code = array_merge($code,$this->codeList);



        /*$code = array_merge($code,parent::getCode());
        foreach ($this->codeList as $codeItem) {
            $code = array_merge($code, $codeItem->getCode());

            //$codeItem->getCode();
            //$code = array_merge($code, $codeItem->getCode());
        }*/

        //$code = array_merge($code,$this->codeLineList);

        if ($this->returnFalse) {
        $this->addAfterLine( 'return false;');
        }

        $this->addAfterLine('});');

        return parent::getContent();


    }

}