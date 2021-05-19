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
use Nemundo\Package\Bootstrap\Document\BootstrapDocument;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;

class FullPagePublicSharePage extends BootstrapDocument
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


            $contentType->getDefaultView($this);



        } else {


            $this->statusCode = StatusCode::NOT_FOUND;

            $p = new Paragraph($this);
            $p->content = 'Content not Found';


        }


        return parent::getContent();

    }
}