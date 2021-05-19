<?php

namespace Nemundo\Package\JqueryUi\Autocomplete;

use Nemundo\Com\Container\LibraryTrait;
use Nemundo\Html\Form\Input\TextInput;
use Nemundo\Package\JqueryUi\JqueryUiPackage;

class AutocompleteMultipleValueTextInput extends TextInput
{

    use LibraryTrait;
    use AutocompleteTrait;

    /**
     * @var string
     */
    public $seperator = ', ';


    public function getContent()
    {

        $className = 'autocomplete_text_input';

        $this->addCssClass($className);

        $this->checkSourceSite();

        $this->addPackage(new JqueryUiPackage());

        $this->addJqueryScript('function split( val ) {');
        $this->addJqueryScript('return val.split( /' . $this->seperator . '\s*/ );');
        $this->addJqueryScript('}');
        $this->addJqueryScript('function extractLast( term ) {');
        $this->addJqueryScript('return split( term ).pop();');
        $this->addJqueryScript('}');


        //$this->addJqueryScript('$("#' . $this->name . '" )');

        $this->addJqueryScript('$(".' . $className . '" )');
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
        $this->addJqueryScript('$.getJSON("' . $this->sourceSite->getUrl() . '", { term : extractLast( request.term )},response);');
        $this->addJqueryScript('},');
        $this->addJqueryScript('focus: function() {');
        $this->addJqueryScript('return false;');
        $this->addJqueryScript('},');
        $this->addJqueryScript('select: function( event, ui ) {');
        $this->addJqueryScript('var terms = split( this.value );');
        $this->addJqueryScript('terms.pop();');
        $this->addJqueryScript('terms.push( ui.item.value );');
        $this->addJqueryScript('terms.push( "" );');
        $this->addJqueryScript('this.value = terms.join("' . $this->seperator . '");');
        $this->addJqueryScript('return false;');
        $this->addJqueryScript('}');
        $this->addJqueryScript('});');

        return parent::getContent();

    }

}