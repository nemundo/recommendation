<?php

namespace Nemundo\Content\Page;


use Nemundo\App\Application\Parameter\ApplicationParameter;
use Nemundo\Content\Com\Container\ContentTypeFormContainer;
use Nemundo\Content\Parameter\ContentTypeParameter;
use Nemundo\Content\Site\ContentSite;
use Nemundo\Content\Template\ContentTemplate;
use Nemundo\Html\Paragraph\Paragraph;

class ContentNewPage extends ContentTemplate
{

    public function getContent()
    {

        $parameter = new ContentTypeParameter();
        if ($parameter->hasValue()) {

            $contentType = $parameter->getContentType();

            if ($contentType->hasForm()) {
                $container = new ContentTypeFormContainer($this);
                $container->contentType = $parameter->getContentType();
                $container->redirectSite = clone(ContentSite::$site);
                $container->redirectSite->addParameter(new ApplicationParameter());
                $container->redirectSite->addParameter(new ContentTypeParameter());
            } else {
                $p = new Paragraph($this);
                $p->content = 'No Form';
            }

        }

        return parent::getContent();

    }

}