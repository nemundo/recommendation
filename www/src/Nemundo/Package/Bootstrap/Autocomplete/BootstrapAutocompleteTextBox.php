<?php

namespace Nemundo\Package\Bootstrap\Autocomplete;

use Nemundo\Com\Container\LibraryTrait;
use Nemundo\Com\FormBuilder\Item\AbstractFormBuilderItem;
use Nemundo\Core\Http\Request\Get\GetRequest;
use Nemundo\Core\Http\Request\Post\PostRequest;
use Nemundo\Core\Http\Request\RequestMethod;
use Nemundo\Core\Log\LogMessage;
use Nemundo\Html\Form\Formatting\Label;
use Nemundo\Html\Form\FormMethod;
use Nemundo\Package\Bootstrap\FormElement\BootstrapFormStyle;
use Nemundo\Package\JqueryUi\Autocomplete\AutocompleteTextInput;
use Nemundo\Package\JqueryUi\Autocomplete\AutocompleteTrait;


class BootstrapAutocompleteTextBox extends AbstractFormBuilderItem
{

    use LibraryTrait;
    use AutocompleteTrait;
    use BootstrapFormStyle;

    /**
     * @var Label
     */
    private $labelLabel;

    /**
     * @var AutocompleteTextInput
     */
    private $input;


    protected function loadContainer()
    {
        parent::loadContainer();
        $this->labelLabel = new Label($this);
        $this->input = new AutocompleteTextInput($this);

    }


    public function getContent()
    {

        $this->loadStyle();

        $this->input->name = $this->name;
        $this->input->id = $this->name;

        if ($this->searchMode) {
            $this->value = $this->getValue();
        }
        $this->input->value = $this->value;

        $this->input->addCssClass('form-control');
        $this->input->sourceSite = $this->sourceSite;

        $this->input->addCssClass('form-control');

        $this->labelLabel->addCssClass('form-label');
        $this->labelLabel->content = $this->getLabelText();

        return parent::getContent();

    }


    public function getValue()
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

}