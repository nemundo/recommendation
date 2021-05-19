<?php

namespace Nemundo\Content\Page;


use Nemundo\Com\FormBuilder\UrlReferer\UrlRefererHiddenInput;
use Nemundo\Com\FormBuilder\UrlReferer\UrlRefererRequest;
use Nemundo\Com\FormBuilder\UrlReferer\UrlRefererSite;
use Nemundo\Com\Html\Hyperlink\UrlHyperlink;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Content\Parameter\ContentParameter;

class ContentEditPage extends AbstractTemplateDocument
{

    public function getContent()
    {

        $contentParameter = new ContentParameter();
        $contentParameter->contentTypeCheck = false;
        $contentType = $contentParameter->getContent();

        $form = $contentType->getDefaultForm($this);
        $hidden = new UrlRefererHiddenInput($form);
        $form->redirectSite = new UrlRefererSite();


        /*
        $hyperlink = new UrlHyperlink($this);
        $hyperlink->content = 'Zurück '. (new UrlRefererRequest())->getValue();
        $hyperlink->url = (new UrlRefererRequest())->getValue();
*/

        return parent::getContent();

    }

}