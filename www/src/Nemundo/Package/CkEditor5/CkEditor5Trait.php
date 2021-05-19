<?php

namespace Nemundo\Package\CkEditor5;


use Nemundo\Com\Container\LibraryTrait;

trait CkEditor5Trait
{

    use LibraryTrait;


    //loadEditor
    protected function loadCkEditor($id) {


        $this->addPackage(new CkEditor5Package());

        $this->addJqueryScript('ClassicEditor');
        $this->addJqueryScript('.create( document.querySelector("#' . $id . '"), {');

        $this->addJqueryScript('toolbar: [ \'heading\', \'|\', \'bold\', \'italic\', \'link\', \'bulletedList\', \'numberedList\', \'blockQuote\' ],');
        //$this->addJqueryScript('height: 500');
        $this->addJqueryScript('})');

        $this->addJqueryScript('.catch( error => {');
        $this->addJqueryScript('console.error( error );');
        $this->addJqueryScript('});');


    }



    protected function loadInlineEditor($id) {


        $this->addPackage(new CkEditor5Package());

        $this->addJqueryScript('InlineEditor');
        $this->addJqueryScript('.create( document.querySelector("#' . $id . '"), {');

        $this->addJqueryScript('toolbar: [ \'heading\', \'|\', \'bold\', \'italic\', \'link\', \'bulletedList\', \'numberedList\', \'blockQuote\' ],');
        //$this->addJqueryScript('height: 500');
        $this->addJqueryScript('})');

        $this->addJqueryScript('.catch( error => {');
        $this->addJqueryScript('console.error( error );');
        $this->addJqueryScript('});');


    }


}