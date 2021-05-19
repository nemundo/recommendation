<?php

namespace Nemundo\Package\JqueryUi\Autocomplete;

use Nemundo\Com\Container\LibraryTrait;
use Nemundo\Html\Form\Input\TextInput;
use Nemundo\Package\JqueryUi\JqueryUiPackage;

class AutocompleteTextInput extends TextInput
{

    use LibraryTrait;
    use AutocompleteTrait;

    public function getContent()
    {

        $className = 'autocomplete_text_input';

        $this->addCssClass($className);

        $this->checkSourceSite();

        $this->addPackage(new JqueryUiPackage());


        $this->addJqueryScript('$("#' . $this->name . '" )');
        $this->addJqueryScript('.on( "keydown", function( event ) {');
        $this->addJqueryScript('if ( event.keyCode === $.ui.keyCode.TAB &&');
        $this->addJqueryScript('$( this ).autocomplete( "instance" ).menu.active ) {');
        $this->addJqueryScript('event.preventDefault();');
        $this->addJqueryScript('}');
        $this->addJqueryScript('})');

        $this->addJqueryScript('.autocomplete({');
        $this->addJqueryScript('minLength: ' . $this->minLength . ',');
        $this->addJqueryScript('delay: ' . $this->delay . ',');
        $this->addJqueryScript('source: function( request, response ) {');
        $this->addJqueryScript('$.getJSON("' . $this->sourceSite->getUrl() . '", { term : request.term },response);');
        $this->addJqueryScript('},');
        $this->addJqueryScript('focus: function() {');
        $this->addJqueryScript('return false;');
        $this->addJqueryScript('},');
        $this->addJqueryScript('});');

        return parent::getContent();

    }

}