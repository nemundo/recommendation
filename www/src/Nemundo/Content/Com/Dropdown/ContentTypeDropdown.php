<?php


namespace Nemundo\Content\Com\Dropdown;


use Nemundo\Content\Parameter\ContentTypeParameter;
use Nemundo\Content\Type\AbstractContentType;
use Nemundo\Package\Bootstrap\Dropdown\BootstrapSiteDropdown;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Web\Site\Site;

class ContentTypeDropdown extends BootstrapSiteDropdown
{

    /**
     * @var AbstractSite
     */
    public $redirectSite;

    /**
     * @var AbstractContentType[]
     */
    public $contentTypeList = [];


    public function addContentType(AbstractContentType $contentType)
    {

        $this->contentTypeList[] = $contentType;
        return $this;

    }


    public function getContent()
    {

        if ($this->redirectSite == null) {
            $this->redirectSite = new Site();
        }

        foreach ($this->contentTypeList as $contentType) {

            $site = clone($this->redirectSite);
            $site->addParameter(new ContentTypeParameter($contentType->typeId));
            $site->title = $contentType->typeLabel;
            $this->addSite($site);

        }

        return parent::getContent();

    }

}