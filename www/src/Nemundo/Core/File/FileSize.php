<?php


namespace Nemundo\Core\File;

use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Type\Number\Number;

class FileSize extends AbstractBase
{

    /**
     * @var int
     */
    private $byte;

    public function __construct($byte)
    {
        $this->byte = $byte;
    }


    public function getByte()
    {
        return $this->byte;
    }


    public function getKB()
    {
        $value = (new Number($this->getByte() / 1024))->roundNumber(0);
        return $value;
    }


    public function getMB()
    {
        $value = (new Number($this->getKB() / 1024))->roundNumber(0);
        return $value;
    }


    public function getGB()
    {
        $value = (new Number($this->getMB() / 1024))->roundNumber(0);
        return $value;
    }

    public function getText()
    {


        $value = $this->getByte();
        $text = $value . ' Byte';

        if ($value > 1024) {
            $value = $this->getKB();
            $text = $value . ' KB';
        }

        if ($value > 1024) {
            $value = $this->getMB();
            $text = $value . ' MB';
        }

        if ($value > 1024) {
            $value = $this->getGB();
            $text = $value . ' GB';
        }

        return $text;


    }

}