<?php

namespace Nemundo\Content\App\Explorer\Page;

use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Content\App\Explorer\Template\ExplorerTemplate;
use Nemundo\Content\Parameter\ContentParameter;

class ViewPage extends ExplorerTemplate
{
    public function getContent()
    {

        $contentType = (new ContentParameter())->getContent(false);

        $title = new AdminTitle($this);
        $title->content = $contentType->getSubject();

        if ($contentType->hasView()) {
            $contentType->getDefaultView($this);
        }

        return parent::getContent();

    }
}