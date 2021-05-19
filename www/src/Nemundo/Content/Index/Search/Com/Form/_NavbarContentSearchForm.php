<?php

namespace Nemundo\Content\Index\Search\Com\Form;


use Nemundo\Com\FormBuilder\SearchForm;
use Nemundo\Content\Index\Search\Parameter\SearchQueryParameter;
use Nemundo\Content\Index\Search\Site\Json\SearchJsonSite;
use Nemundo\Core\Language\LanguageCode;
use Nemundo\Html\Form\Button\SubmitButton;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;
use Nemundo\Package\JqueryUi\Autocomplete\AutocompleteMultipleValueTextInput;


class NavbarContentSearchForm extends SearchForm
{

    /**
     * @var BootstrapTextBox
     */
    private $query;

    public function getContent()
    {

        $this->addCssClass('d-flex');

        $this->query = new AutocompleteMultipleValueTextInput($this);
        $this->query->name = (new SearchQueryParameter())->parameterName;
        //$this->query->id = (new SearchQueryParameter())->parameterName;

        $this->query->value = (new SearchQueryParameter())->getValue();
        $this->query->seperator = ' ';
        $this->query->placeholder[LanguageCode::EN] = 'Search';
        $this->query->placeholder[LanguageCode::DE] = 'Suche';
        $this->query->sourceSite = SearchJsonSite::$site;
        $this->query->addCssClass('form-control me-2');

        $button = new SubmitButton($this);
        $button->label[LanguageCode::EN] = 'Search';
        $button->label[LanguageCode::DE] = 'Suchen';
        $button->addCssClass('btn btn-secondary');

        return parent::getContent();

    }

}