<?php

namespace Nemundo\Package\TwitterCard;

use Nemundo\Com\Html\Header\LibraryHeader;
use Nemundo\Package\OpenGraph\AbstractOpenGraph;
use Nemundo\Web\ResponseConfig;

class TwitterCard extends AbstractOpenGraph
{

    public function getContent()
    {

        $this->prefix = 'twitter';

        $this->addMeta('card', 'summary');
        $this->addMeta('title', LibraryHeader::$documentTitle);
        $this->addMeta('description',ResponseConfig::$description);
        $this->addMeta('image', ResponseConfig::$imageUrl);

        return parent::getContent();

    }

}