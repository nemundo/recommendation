<?php


namespace Nemundo\Content\Index\Tree\Com\Dropdown;


use Nemundo\Content\Index\Tree\Base\RestrictedContentTypeTrait;
use Nemundo\Content\Parameter\ContentTypeParameter;
use Nemundo\Content\Type\AbstractContentType;
use Nemundo\Package\Bootstrap\Dropdown\BootstrapSiteDropdown;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Web\Site\Site;

class RestrictedContentTypeDropdown extends BootstrapSiteDropdown
{

    use RestrictedContentTypeTrait;

    /**
     * @var AbstractSite
     */
    public $redirectSite;

    /**
     * @var AbstractContentType[]
     */
    //public $contentTypeList = [];


    /*
    public function addContentType(AbstractContentType $contentType)
    {

        $this->contentTypeList[] = $contentType;
        return $this;

    }*/


    public function getContent()
    {

        if ($this->redirectSite == null) {
            $this->redirectSite = new Site();
        }
        
        foreach ($this->getRestrictedContentTypeData() as $contentTypeRow) {

            $site = clone($this->redirectSite);
            $site->addParameter(new ContentTypeParameter($contentTypeRow->restrictedContentTypeId));
            $site->title = $contentTypeRow->restrictedContentType->contentType;
            $this->addSite($site);

        }

        return parent::getContent();

    }

}