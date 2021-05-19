<?php

namespace Nemundo\Content\App\ImageTimeline\Content\ImageTimeline\View;

use Nemundo\Com\Html\Hyperlink\UrlHyperlink;
use Nemundo\Content\App\ImageTimeline\Content\ImageTimeline\ImageTimelineContentType;
use Nemundo\Content\App\ImageTimeline\Data\Image\ImageReader;
use Nemundo\Content\View\AbstractContentView;
use Nemundo\Html\Formatting\Small;
use Nemundo\Html\Paragraph\Paragraph;
use Nemundo\Package\Bootstrap\Carousel\BootstrapImageCarousel;
use Nemundo\Package\Bootstrap\Layout\Grid\BootstrapRow;

abstract class AbstractImageTimelineContentView extends AbstractContentView
{
    /**
     * @var ImageTimelineContentType
     */
    public $contentType;

    public function getContent()
    {

        //$p=new Paragraph($this);
        //$p->content = 'View: '.$this->viewName;


        $timelineRow = $this->contentType->getDataRow();

        if ($timelineRow->sourceUrl !== '') {

            $row = new BootstrapRow($this);

            $hyperlink = new UrlHyperlink();
            $hyperlink->openNewWindow=true;
            $hyperlink->content = $timelineRow->source;
            $hyperlink->url = $timelineRow->sourceUrl;

            $small = new Small($row);
            $small->content = 'Quelle: ' . $hyperlink->getContent()->bodyContent;  // $timelineRow->sourceUrl;

        }

        return parent::getContent();
    }
}