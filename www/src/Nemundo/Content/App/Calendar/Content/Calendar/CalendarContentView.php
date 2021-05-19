<?php

namespace Nemundo\Content\App\Calendar\Content\Calendar;

use Nemundo\Admin\Com\Button\AdminIconSiteButton;
use Nemundo\Content\App\Calendar\Parameter\CalendarParameter;
use Nemundo\Content\App\Calendar\Site\VCalendarIconSite;

use Nemundo\Content\Index\Tree\Com\Container\ContentChildContainer;
use Nemundo\Content\View\AbstractContentView;
use Nemundo\Html\Paragraph\Paragraph;

class CalendarContentView extends AbstractContentView
{
    /**
     * @var CalendarContentType
     */
    public $contentType;

    protected function loadView()
    {

        $this->viewName='default';
        $this->viewId='e972c836-0c12-4ce7-b75e-21e29a4157dd';
        $this->defaultView=true;

    }

    public function getContent()
    {


        $calendarRow=$this->contentType->getDataRow();

        $p=new Paragraph($this);
        $p->content=   $calendarRow->date->getShortDateLeadingZeroFormat().' '.$calendarRow->event;


        $btn=new AdminIconSiteButton($this);
        $btn->site=clone(VCalendarIconSite::$site);
        $btn->site->addParameter(new CalendarParameter($calendarRow->id));



        $container = new ContentChildContainer($this);
        $container->contentType=$this->contentType;



        //$child=new ContentChildContainer($this);
        //$child->contentType=$this->contentType;


        // outlook


        return parent::getContent();
    }
}