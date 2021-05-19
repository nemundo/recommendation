<?php

namespace Nemundo\Web\Parameter;


use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Core\Http\Request\Get\GetRequest;

// AbstractParameter
// AbstractNumberParameter
abstract class AbstractUrlParameter extends AbstractBaseClass
{

    /**
     * @var string
     */
    public $parameterName;

    /**
     * @var string
     */
    public $defaultValue = '';

    /**
     * @var string
     */
    public $value;

    /**
     * @var bool
     */
    public $nullIfEmpty = false;


    abstract protected function loadParameter();


    public function __construct($value = null)
    {

        $this->value = $value;
        $this->loadParameter();

    }


    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }


    public function getValue()
    {

        $value = $this->value;
        if ($value === null) {
            $value = $this->defaultValue;
        }

        if ($this->value === null) {

            if ($this->exists()) {

                if ($this->nullIfEmpty) {

                    if ($this->hasValue()) {
                        $value = $this->getPlainValue();
                    }

                } else {
                    $value = $this->getPlainValue();
                }

            }

        }

        return $value;

    }


    protected function getPlainValue()
    {
        return (new GetRequest($this->parameterName))->getValue();
    }


    public function hasValue()
    {

        $returnValue = true;

        $value = $this->getPlainValue();
        if (($value == '') || ($value == '0')) {
            $returnValue = false;

            if ($this->defaultValue !== '' && $this->defaultValue !== null) {
                $returnValue = true;
            }

        }

        return $returnValue;

    }


    // existsParameter()
    public function exists()
    {

        $value = (new GetRequest($this->parameterName))->existsRequest();
        return $value;

    }


    // notExistsParameter()
    // parameterNotExists
    public function notExists()
    {

        $returnValue = !$this->exists();
        return $returnValue;

    }


    public function getUrl()
    {

        $url = $this->parameterName . '=' . urlencode($this->getValue());
        return $url;

    }


    public function getParameterName()
    {
        return $this->parameterName;
    }

}