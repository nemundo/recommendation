<?php

namespace Nemundo\Package\OpenGraph;


use Nemundo\Com\Html\Header\LibraryHeader;
use Nemundo\Web\ResponseConfig;

class OpenGraph extends AbstractOpenGraph
{

    public function getContent()
    {

        $this->prefix = 'og';

        $this->addMeta('title', LibraryHeader::$documentTitle); // $this->title);
        $this->addMeta('description', ResponseConfig::$description);
        $this->addMeta('image',ResponseConfig::$imageUrl);

        return parent::getContent();

    }

}