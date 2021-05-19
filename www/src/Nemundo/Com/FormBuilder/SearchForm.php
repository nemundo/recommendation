<?php

namespace Nemundo\Com\FormBuilder;

use Nemundo\Html\Container\AbstractContainer;
use Nemundo\Html\Form\AbstractForm;
use Nemundo\Html\Form\FormMethod;
use Nemundo\Html\Form\Input\HiddenInput;
use Nemundo\Web\Site\AbstractSite;

class SearchForm extends AbstractForm
{

    /**
     * @var AbstractSite
     */
    public $site;

    /**
     * @var bool
     */
    public $addUrlAsHiddenInput = false;

    private $inputName = [];

    public function addInputName($name)
    {
        $this->inputName[] = $name;
        return $this;
    }


    public function __construct(AbstractContainer $parentContainer = null)
    {
        parent::__construct($parentContainer);
        $this->formMethod = FormMethod::GET;
    }


    public function getContent()
    {

        if ($this->site !== null) {
            $this->action = $this->site->getUrl();
        }


        // nur definierte, da sonst search parameter auch drin sind !!!
        if ($this->addUrlAsHiddenInput) {
            foreach ($_GET as $key => $value) {

                if (!in_array($key, $this->inputName)) {

                    //$hidden =new TextInput($this);  // new HiddenInput($this);
                    $hidden = new HiddenInput($this);
                    $hidden->name = $key;
                    $hidden->value = $value;
                }


            }

        }

        return parent::getContent();

    }

}