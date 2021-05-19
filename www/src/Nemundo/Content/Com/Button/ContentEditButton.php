<?php


namespace Nemundo\Content\Com\Button;


use Nemundo\Admin\Com\Button\AdminIconSiteButton;
use Nemundo\Admin\Com\Button\AdminSiteButton;
use Nemundo\Content\Admin\Site\ContentEditSite;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Content\Parameter\ContentTypeParameter;
use Nemundo\Content\Index\Tree\Type\AbstractTreeContentType;
use Nemundo\Web\Site\Site;

class ContentEditButton extends AdminIconSiteButton
{

    /**
     * @var AbstractTreeContentType
     */
    public $contentType;

    public function getContent()
    {

        $this->site=clone(ContentEditSite::$site);
        $this->site->addParameter(new ContentParameter($this->contentType->getContentId()));

        return parent::getContent();

    }

}