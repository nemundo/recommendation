<?php

namespace Nemundo\Content\App\Explorer\Page;

use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Content\App\Explorer\Parameter\RefererContentParameter;
use Nemundo\Content\App\Explorer\Site\ItemSite;
use Nemundo\Content\App\Explorer\Template\ExplorerTemplate;
use Nemundo\Content\Index\Tree\Com\Form\ContentTreeAttachmentForm;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;

class AttachToPage extends ExplorerTemplate
{
    public function getContent()
    {

        $contentParameter=new ContentParameter();
        $contentParameter->contentTypeCheck=false;
        $contentType = $contentParameter->getContent();


        $layout=new BootstrapTwoColumnLayout($this);

        $form = new ContentTreeAttachmentForm($layout->col1);
        $form->contentType = $contentType;
        $form->redirectSite = clone(ItemSite::$site);
        $form->redirectSite->addParameter(new ContentParameter((new RefererContentParameter())->getValue()));



        return parent::getContent();
    }
}