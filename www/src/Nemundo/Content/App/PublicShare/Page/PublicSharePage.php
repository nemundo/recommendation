<?php

namespace Nemundo\Content\App\PublicShare\Page;

use Nemundo\Admin\Com\Widget\AdminWidget;
use Nemundo\Com\Template\AbstractTemplateDocument;

use Nemundo\Content\App\PublicShare\Data\PublicShare\PublicShareCount;
use Nemundo\Content\App\PublicShare\Data\PublicShare\PublicShareReader;
use Nemundo\Content\App\PublicShare\Parameter\PublicShareParameter;
use Nemundo\Content\App\PublicShare\Site\PublicShareSite;
use Nemundo\Content\Com\Widget\ContentWidget;
use Nemundo\Core\Http\Response\StatusCode;
use Nemundo\Html\Header\Title;
use Nemundo\Html\Paragraph\Paragraph;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;

class PublicSharePage extends AbstractTemplateDocument
{

    public function getContent()
    {


        $publicShareId = (new PublicShareParameter())->getValue();

        $count = new PublicShareCount();
        $count->filter->andEqual($count->model->id, $publicShareId);
        if ($count->getCount() == 1) {

            $reader = new PublicShareReader();
            $reader->model->loadContent();
            $reader->model->content->loadContentType();
            $shareRow = $reader->getRowById((new PublicShareParameter())->getValue());


            $contentType = $shareRow->content->getContentType();

            $title = new Title($this);
            $title->content = $contentType->getSubject();

            $layout = new BootstrapTwoColumnLayout($this);
            $layout->col1->columnWidth=12;
            $layout->col2->columnWidth=0;

            $widget=new ContentWidget($layout->col1);
            $widget->contentType= $contentType;
            $widget->viewId = $shareRow->viewId;
            $widget->editable=false;
            $widget->redirectSite= clone(PublicShareSite::$site);
            //$widget->redirectSite->addParameter(new PublicShareParameter());

            /*
            $widget = new AdminWidget($layout->col1);
            $widget->widgetTitle = $contentType->getSubject();
            $contentType->getDefaultView($widget);*/

            /*$container = new CalendarContainer($layout->col2);
            $container->contentType = $contentType;*/

        } else {


            $this->statusCode = StatusCode::NOT_FOUND;

            $p = new Paragraph($this);
            $p->content = 'Content not Found';


        }


        return parent::getContent();

    }
}