<?php

namespace Nemundo\Com\FormBuilder\Item;


use Nemundo\Com\ComConfig;
use Nemundo\Com\Utility\UniqueComName;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Http\Request\Get\GetRequest;
use Nemundo\Core\Http\Request\Post\PostRequest;
use Nemundo\Core\Http\Request\RequestMethod;
use Nemundo\Core\Language\Translation;
use Nemundo\Core\Log\LogMessage;
use Nemundo\Core\Validation\EmailValidation;
use Nemundo\Core\Validation\NumberValidation;
use Nemundo\Core\Validation\UrlValidation;
use Nemundo\Core\Validation\Validation;
use Nemundo\Core\Validation\ValidationType;
use Nemundo\Html\Form\FormMethod;
use Nemundo\Web\Parameter\UrlParameter;

abstract class AbstractFormBuilderItem extends AbstractFormItemBase
{

    /**
     * @var string
     */
    public $id;

    /**
     * @var string
     */
    public $inputId;
    // braucht es nicht mehr ???

    /**
     * @var string
     */
    public $name;

    /**
     * @var bool
     */
    public $autofocus = false;

    /**
     * @var string|string[]
     */
    public $label;

    /**
     * @var bool
     */
    public $showErrorMessage = false;

    /**
     * @var string
     */
    public $errorMessage;

    /**
     * @var string|string[]
     */
    public $value;

    /**
     * @var bool
     */
    public $required = false;

    /**
     * @var bool
     */
    public $validation = false;

    /**
     * @var ValidationType
     */
    public $validationType = ValidationType::IS_VALUE;

    /**
     * @var bool
     */
    public $searchMode = false;

    abstract function getValue();


    public function __construct($parentContainer = null)
    {

        parent::__construct($parentContainer);

        if ($this->name == null) {
            $this->name = (new UniqueComName())->getUniqueName();
        }

    }


    protected function getInternalValue()
    {

        $value = '';

        switch ((new RequestMethod())->getRequestMethod()) {
            case FormMethod::GET:
                $parameter = new GetRequest($this->name);
                $value = $parameter->getValue();
                break;

            case FormMethod::POST:
                $parameter = new PostRequest($this->name);
                $value = $parameter->getValue();
                break;

            default:
                (new LogMessage())->writeError('No FormMethod');
                break;

        }

        return $value;

    }


    public function hasValue()
    {

        $value = null;
        switch ((new RequestMethod())->getRequestMethod()) {

            case FormMethod::GET:
                $parameter = new GetRequest($this->name);
                $value = $parameter->hasValue();
                break;

            case FormMethod::POST:
                $parameter = new PostRequest($this->name);
                $value = $parameter->hasValue();
                break;

            default:
                (new LogMessage())->writeError('No FormMethod');
                break;

        }

        return $value;

    }


    public function checkValue()
    {

        $returnValue = true;

        if ($this->validation) {

            switch ($this->validationType) {

                case ValidationType::IS_URL:
                    $returnValue = (new UrlValidation())->isUrl($this->getValue());
                    if ($this->errorMessage === null) {
                        $this->errorMessage = ComConfig::$errorMessageUrl;
                    }
                    break;

                case ValidationType::IS_EMAIL:
                    $returnValue = (new EmailValidation())->isEmail($this->getValue());
                    if ($this->errorMessage === null) {
                        $this->errorMessage = ComConfig::$errorMessageEmail;
                    }
                    break;

                case ValidationType::IS_NUMBER:
                    $returnValue = (new NumberValidation())->isNumber($this->getValue());
                    if ($this->errorMessage === null) {
                        $this->errorMessage = ComConfig::$errorMessageNumber;
                    }
                    break;

                default:
                    $returnValue = (new Validation())->isValue($this->getValue());
                    if ($this->errorMessage === null) {
                        $this->errorMessage = ComConfig::$errorMessageIsValue;
                    }
            }

            if (!$returnValue) {
                $this->showErrorMessage = true;
            }

        }

        // für war das??? (evtl. bei erro validation)
        $this->value = $this->getValue();

        return $returnValue;

    }


    protected function getLabelText()
    {

        $labelText = (new Translation())->getText($this->label);
        if ($this->validation) {
            $labelText .= ' *';
        }

        return $labelText;

    }

}