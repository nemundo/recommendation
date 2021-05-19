<?php

namespace Nemundo\Dev\Code;


use Nemundo\Core\Base\AbstractBase;

class PhpVariable extends AbstractBase
{

    /**
     * @var string
     */
    public $variableName;

    /**
     * @var PhpVisibility
     */
    public $visibility = PhpVisibility::PublicVariable;

    /**
     * @var string
     */
    public $defaultValue;

    /**
     * @var string
     */
    public $dataType;

    /**
     * @var string
     */
    public $comment;

    /**
     * @var bool
     */
    public $staticVariable = false;


    function __construct(PhpClass $phpClass = null)
    {
        if ($phpClass !== null) {
            $phpClass->addVariable($this);
        }
    }


    public function getCode()
    {

        $this->checkProperty('variableName');

        $php = [];
        $php[] = '/**';

        if ($this->comment !== null) {
            $php[] = '* ' . $this->comment;
        }

        if ($this->dataType !== null) {
            $php[] = '* @var ' . $this->dataType;
        }

        $php[] = '*/';


        $varDeclation = $this->visibility;

        if ($this->staticVariable) {
            $varDeclation = $varDeclation . ' static';
        }

        $defaultValue = '';
        if ($this->defaultValue !== null) {
            $defaultValue = ' = ' . $this->defaultValue;
        }

        $varDeclation = $varDeclation . ' $' . $this->variableName . $defaultValue . ';';

        $php[] = $varDeclation;
        $php[] = '';

        return $php;

    }

}
