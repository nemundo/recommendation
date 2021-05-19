<?php

namespace Nemundo\Geo\Com\SearchMap;


use Nemundo\Html\Container\AbstractHtmlContainer;
use Nemundo\Com\Container\LibraryTrait;

class MapSearchCh extends AbstractHtmlContainer
{

    use LibraryTrait;

    public $place;


    public function getContent()
    {

        $this->tagName = 'div';
        $this->addJsUrl('//map.search.ch/api/map.js');

        $this->id = 'mapcontainer';
        $this->addAttribute('style', 'width:100%; height:400px;border:1px');

        $this->addJavaScript('var Map = new SearchChMap({ center:"' . $this->place . '" });');

        return parent::getContent();

    }

}