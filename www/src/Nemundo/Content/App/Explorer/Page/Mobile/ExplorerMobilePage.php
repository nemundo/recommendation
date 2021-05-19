<?php

namespace Nemundo\Content\App\Explorer\Page\Mobile;

use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Content\App\Explorer\Site\ExplorerSite;
use Nemundo\Content\App\Explorer\Site\Mobile\NewMobileSite;
use Nemundo\Content\Com\Widget\ContentWidget;
use Nemundo\Content\Index\Tree\Com\Breadcrumb\TreeBreadcrumb;
use Nemundo\Content\Index\Tree\Com\Dropdown\RestrictedContentTypeDropdown;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Html\Header\Title;

class ExplorerMobilePage extends AbstractTemplateDocument // ExplorerTemplate
{
    public function getContent()
    {


        $contentType = (new ContentParameter())->getContent(false);

        $title = new Title($this);
        $title->content = $contentType->getSubject();


        $breadcrumb = new TreeBreadcrumb($this);
        $breadcrumb->redirectSite = ExplorerSite::$site;
        $breadcrumb->addActiveParentContentType($contentType);

        $dropdown = new RestrictedContentTypeDropdown($this);
        $dropdown->redirectSite = clone(NewMobileSite::$site);
        $dropdown->redirectSite->addParameter(new ContentParameter());
        $dropdown->contentTypeId = $contentType->typeId;



        if ($contentType->hasView()) {

            $widget = new ContentWidget($this);
            $widget->contentType = $contentType;

        }


        return parent::getContent();
    }
}