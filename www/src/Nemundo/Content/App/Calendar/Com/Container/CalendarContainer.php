<?php


namespace Nemundo\Content\App\Calendar\Com\Container;


use Nemundo\Admin\Com\Button\AdminIconSiteButton;
use Nemundo\Admin\Com\Title\AdminSubtitle;
use Nemundo\Admin\Com\Widget\AdminWidget;
use Nemundo\Content\App\Calendar\Data\CalendarIndex\CalendarIndexReader;
use Nemundo\Content\App\Calendar\Parameter\CalendarParameter;
use Nemundo\Content\App\Calendar\Site\VCalendarIconSite;
use Nemundo\Content\App\Calendar\Type\CalendarIndexTrait;
use Nemundo\Content\Type\AbstractContentType;
use Nemundo\Html\Container\AbstractContainer;

class CalendarContainer extends AbstractContainer
{

    /**
     * @var AbstractContentType
     */
    public $contentType;

    public function getContent()
    {


        if ($this->contentType->isObjectOfTrait(CalendarIndexTrait::class)) {


            $widget=new AdminWidget($this);
            $widget->widgetTitle='Calendar';


            $reader = new CalendarIndexReader();
            $reader->filter->andEqual($reader->model->contentId,$this->contentType->getContentId());
            foreach ($reader->getData() as $indexRow) {

                $title=new AdminSubtitle($widget);
                $title->content=$this->contentType->getSubject();

                $title=new AdminSubtitle($widget);
                $title->content=$this->contentType->getDate()->getShortDateLeadingZeroFormat();

                $btn=new AdminIconSiteButton($widget);
                $btn->site=clone(VCalendarIconSite::$site);
                $btn->site->addParameter(new CalendarParameter($indexRow->id));

            }

        }

        return parent::getContent();

    }

}