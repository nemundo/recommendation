<?php

namespace Nemundo\Content\App\Share\Page;

use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Content\App\Share\Data\PrivateShare\PrivateShareCount;
use Nemundo\Content\Com\Widget\ContentWidget;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Html\Paragraph\Paragraph;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;
use Nemundo\User\Session\UserSession;


class PrivateShareContentPage extends AbstractTemplateDocument
{
    public function getContent()
    {


        $layout=new BootstrapTwoColumnLayout($this);


        $contentId = (new ContentParameter())->getValue();

        $count = new PrivateShareCount();
        $count->filter->andEqual($count->model->contentId,$contentId);
        $count->filter->andEqual($count->model->userId,  (new UserSession())->userId);
        if ($count->getCount() == 1) {

            $content = (new ContentParameter())->getContent(false);

            $widget = new ContentWidget($layout->col1);
            $widget->contentType=$content;
            $widget->viewId = $content->getDefaultViewId();
            $widget->showMenu=false;
            $widget->editable=false;
            $widget->viewEditable=false;

        } else {

            $p=new Paragraph($layout->col1);
            $p->content='Not allowed';

        }


        return parent::getContent();

    }
}