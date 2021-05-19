<?php

namespace Nemundo\Content\Index\Search\Com\Form;


use Nemundo\Admin\Com\Button\AdminSearchButton;
use Nemundo\Com\FormBuilder\SearchForm;
use Nemundo\Content\Com\ListBox\ContentTypeListBox;
use Nemundo\Content\Index\Search\Parameter\SearchQueryParameter;
use Nemundo\Content\Index\Search\Site\Json\SearchContentTypeJsonSite;
use Nemundo\Content\Index\Search\Site\Json\SearchJsonSite;
use Nemundo\Content\Parameter\ContentTypeParameter;
use Nemundo\Content\Type\AbstractSearchContentType;
use Nemundo\Core\Language\LanguageCode;
use Nemundo\Html\Character\HtmlCharacter;
use Nemundo\Package\Bootstrap\Autocomplete\BootstrapAutocompleteMultipleValueTextBox;
use Nemundo\Package\Bootstrap\Layout\Grid\BootstrapRow;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;


class ContentTypeQuerySearchForm extends SearchForm
{

    /**
     * @var AbstractSearchContentType
     */
    public $contentType;

    /**
     * @var BootstrapTextBox
     */
    private $query;

    public function getContent()
    {

        $formRow = new BootstrapRow($this);

        $this->query = new BootstrapAutocompleteMultipleValueTextBox($formRow);
        $this->query->name = (new SearchQueryParameter())->parameterName;
        $this->query->seperator = ' ';
        $this->query->searchMode = true;
        $this->query->column = true;
        $this->query->columnSize = 4;
        $this->query->placeholder[LanguageCode::EN] = 'Search';
        $this->query->placeholder[LanguageCode::DE] = 'Suche';
        $this->query->label = HtmlCharacter::NON_BREAKING_SPACE;
        $this->query->sourceSite = clone(SearchContentTypeJsonSite::$site);  // SearchJsonSite::$site;
$this->query->sourceSite->addParameter(new ContentTypeParameter($this->contentType->typeId));

        $button = new AdminSearchButton($formRow);
        $button->column = true;

        return parent::getContent();

    }


    public function hasValue()
    {

        return (new SearchQueryParameter())->hasValue();

    }

    public function getSearchQuery()
    {

        $value = (new SearchQueryParameter())->getValue();
        return $value;


    }


    public function getWordId()
    {

        $wordId = (new SearchQueryParameter())->getWordId();  // md5(mb_strtolower( $this->getSearchQuery()));
        return $wordId;
    }


}