<?php

namespace Nemundo\Package\Bootstrap\Autocomplete;


use Nemundo\Core\Json\Document\JsonResponse;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Web\Site\AbstractSiteTree;

abstract class AbstractAutocompleteJsonSite extends AbstractSite
{

    abstract protected function loadAutocompleteJson();

    /**
     * @var array
     */
    private $wordList = [];


    public function __construct(AbstractSiteTree $site = null)
    {

        $this->menuActive = false;
        $this->url = 'autocomplete-json';

        parent::__construct($site);
    }



    protected function addWord($word)
    {
        $this->wordList[] = $word;
    }


    protected function getKeyword()
    {

        $keyword = (new AutocompleteParameter())->getValue();
        return $keyword;

    }


    public function loadContent()
    {

        $this->loadAutocompleteJson();

        $json = new JsonResponse();
        foreach ($this->wordList as $word) {
            $json->addRow($word);
        }
        $json->render();

    }



}