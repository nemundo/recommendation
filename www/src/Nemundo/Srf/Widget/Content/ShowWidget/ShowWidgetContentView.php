<?php

namespace Nemundo\Srf\Widget\Content\ShowWidget;

use Nemundo\Content\View\AbstractContentView;
use Nemundo\Srf\Com\Container\ShowContainer;

class ShowWidgetContentView extends AbstractContentView
{
    /**
     * @var ShowWidgetContentType
     */
    public $contentType;

    public function getContent()
    {

        $row = $this->contentType->getDataRow();

        $container = new ShowContainer($this);
        $container->showId = $row->showId;
        $container->showLimit = $row->showLimit;

        return parent::getContent();

    }

}