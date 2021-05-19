<?php

namespace Hackathon\Content\BajourArticle;

use Nemundo\Content\View\AbstractContentView;
use Nemundo\Html\Heading\H3;
use Nemundo\Html\Paragraph\Paragraph;

class BajourArticleContentView extends AbstractContentView
{
    /**
     * @var BajourArticleContentType
     */
    public $contentType;

    protected function loadView()
    {
        $this->viewName = 'default';
        $this->viewId = 'c919e8db-d0ae-44cb-9c49-871018255cf4';
        $this->defaultView = true;
    }

    public function getContent()
    {

        $h3=new H3($this);
        $h3->content=$this->contentType->getDataRow()->title;


        $p=new Paragraph($this);
        $p->content=$this->contentType->getDataRow()->lead;


        return parent::getContent();
    }
}