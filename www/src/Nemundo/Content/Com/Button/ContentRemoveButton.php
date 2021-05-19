<?php


namespace Nemundo\Content\Com\Button;


use Nemundo\Admin\Com\Button\AdminIconSiteButton;
use Nemundo\Content\Admin\Site\ContentRemoveSite;
use Nemundo\Content\Index\Tree\Type\AbstractTreeContentType;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Content\Parameter\ParentParameter;

class ContentRemoveButton extends AdminIconSiteButton
{

    /**
     * @var AbstractTreeContentType
     */
    public $parentContentType;

    /**
     * @var AbstractTreeContentType
     */
    public $contentType;


    public function getContent()
    {

        $this->site = clone(ContentRemoveSite::$site);
        $this->site->addParameter(new ContentParameter($this->contentType->getContentId()));
        $this->site->addParameter(new ParentParameter($this->parentContentType->getContentId()));

        return parent::getContent();

    }

}