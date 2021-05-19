<?php

namespace Nemundo\Package\OpenGraph;

use Nemundo\Html\Header\AbstractHeaderHtmlContainer;
use Nemundo\Com\Html\Header\LibraryHeader;
use Nemundo\Html\Header\Meta\Meta;
use Nemundo\Web\ResponseConfig;


abstract class AbstractOpenGraph extends AbstractHeaderHtmlContainer
{

    /**
     * @var string
     */
    //public $title;

    /**
     * @var string
     */
   // public $siteName;

    /**
     * @var string
     */
    //public $description;

    /**
     * @var string
     */
    //public $imageUrl;

    protected $prefix;


   /* protected function loadContainer()
    {

        parent::loadContainer();

        $this->title = LibraryHeader::$documentTitle;   // ResponseConfig::$title;
        $this->description = ResponseConfig::$description;
        $this->imageUrl = ResponseConfig::$imageUrl;

    }*/


    protected function addMeta($property, $content)
    {

        if ($content !== null) {
            $meta = new Meta($this);
            $meta->addAttribute('property', $this->prefix . ':' . $property);
            $meta->addAttribute('content', $content);
        }

    }


}