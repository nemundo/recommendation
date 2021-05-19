<?php

namespace Nemundo\Dev\Code;


use Nemundo\Core\Base\AbstractBase;

class PhpFunction extends AbstractBase
{

    /**
     * @var string
     */
    public $functionName;

    /**
     * @var string
     */
    public $functionComment;

    /**
     * @var string
     */
    public $returnDataType;

    /**
     * @var PhpVisibility
     */
    public $visibility = PhpVisibility::PublicVariable;

    /**
     * @var bool
     */
    public $staticFunction = false;


    private $php = array();


    public function __construct(PhpClass $phpClass = null)
    {
        if ($phpClass !== null) {
            $phpClass->addFunction($this);
        }
    }

    // addLine
    public function add($code)
    {
        if (is_array($code)) {
            $this->php = array_merge($this->php, $code);
        } else {
            $this->php[] = $code;
        }

        return $this;
    }


    public function addEmptyLine()
    {
        $this->add('');
        return $this;
    }


    public function getCode()
    {

        $code = array();


        if (($this->functionComment !== null) || ($this->returnDataType !== null)) {

            $code[] = '/**';

            if ($this->functionComment !== null) {
                $code[] = '* ' . $this->functionComment;
            }

            // Return Data Type
            if ($this->returnDataType !== null) {
                $code[] = '* @return ' . $this->returnDataType;
            }

            $code[] = '*/';
        }


        $functionLine = '';

        // static function
        if ($this->staticFunction) {
            $functionLine = 'static ';
        }


        $functionLine = $functionLine . $this->visibility . ' function ' . $this->functionName . ' {';

        $code[] = $functionLine;
        $code = array_merge($code, $this->php);
        $code[] = '}';

        return $code;

    }

}
