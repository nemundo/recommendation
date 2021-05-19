<?php

namespace Nemundo\Com\JavaScript\Code;



class ListBoxJsonLoader //extends AbstractJavaScriptCode
{

    /**
     * @var string
     */
    public $url;

    /**
     * @var string
     */
    public $inputId;


    public $value;


    public $functionName = 'loadData';

    public function getCode()
    {


        //$this->addCodeLine('alert("hello");');


        //$this->addJavaScript('function loadProjekt() {');
        /*$this->addCodeLine('function ' . $this->functionName . '(id) {');
        $this->addCodeLine('$("body").css("cursor", "progress");');
        $this->addCodeLine('$.getJSON("' . $this->url . '", function(data) {');

        $this->addCodeLine('$.each(data, function (key, entry) {');
        $this->addCodeLine('$("#' . $this->inputId . '").append($("<option></option>").attr("value", entry.id).text(entry.value));');
        $this->addCodeLine('})');


        //$this->addCodeLine('$("#' . $this->inputId . '").val("' . $this->value . '");');

        $this->addCodeLine('if (id !== null) {');
        $this->addCodeLine('$("#' . $this->inputId . '").val(id);');
        $this->addCodeLine('}');


        $this->addCodeLine('});');
        $this->addCodeLine('$("body").css("cursor", "default");');

        $this->addCodeLine('}');

        //$this->addJavaScript('}');*/

        //return parent::getCode();

    }

}