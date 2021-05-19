<?php

namespace Nemundo\Package\Bootstrap\Navbar;


use Nemundo\Com\FormBuilder\SearchForm;
use Nemundo\Content\Index\Search\Site\Json\SearchJsonSite;
use Nemundo\Core\Language\LanguageCode;
use Nemundo\Html\Form\Button\SubmitButton;
use Nemundo\Package\Bootstrap\Autocomplete\AbstractAutocompleteJsonSite;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;
use Nemundo\Package\JqueryUi\Autocomplete\AutocompleteMultipleValueTextInput;


class BootstrapNavbarSearchForm extends SearchForm
{

    /**
     * @var AbstractAutocompleteJsonSite
     */
    public $sourceSite;

    /**
     * @var BootstrapTextBox
     */
    private $query;

    public function getContent()
    {

        $this->addCssClass('d-flex');

        $this->query = new AutocompleteMultipleValueTextInput($this);
        $this->query->name = 'q';  // (new SearchQueryParameter())->parameterName;
        //$this->query->id = (new SearchQueryParameter())->parameterName;

        //$this->query->value = (new SearchQueryParameter())->getValue();
        $this->query->seperator = ' ';
        $this->query->placeholder[LanguageCode::EN] = 'Search';
        $this->query->placeholder[LanguageCode::DE] = 'Suche';
        $this->query->sourceSite = $this->sourceSite;  // SearchJsonSite::$site;// SearchJsonSite::$site;
        $this->query->addCssClass('form-control me-2');

        $button = new SubmitButton($this);
        $button->label[LanguageCode::EN] = 'Search';
        $button->label[LanguageCode::DE] = 'Suchen';
        $button->addCssClass('btn btn-secondary');

        return parent::getContent();

    }

}