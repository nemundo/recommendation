<?php


namespace Nemundo\Content\Com\Dropdown;


use Nemundo\Content\Collection\AbstractContentTypeCollection;
use Nemundo\Content\Parameter\ContentTypeParameter;
use Nemundo\Content\Type\AbstractContentType;
use Nemundo\Package\Bootstrap\Dropdown\BootstrapDropdown;
use Nemundo\Package\Bootstrap\Dropdown\BootstrapSiteDropdown;
use Nemundo\Package\BootstrapDropdown\BootstrapSubmenuDropdown;
use Nemundo\Package\BootstrapDropdown\Submenu;
use Nemundo\Web\Site\AbstractSite;

class ContentTypeCollectionSubmenuDropdown extends BootstrapSiteDropdown  // BootstrapSubmenuDropdown
{

    use ContentTypeDropdownTrait;

    /**
     * @var AbstractSite
     */
    public $redirectSite;


    public function addContentTypeCollection(AbstractContentTypeCollection $contentTypeCollection)
    {

        foreach ($contentTypeCollection->getContentTypeList() as $contentType) {
            $this->addSite($this->getMenuSite($contentType));
        }

    }


    public function addContentTypeCollectionAsSubmenu(AbstractContentTypeCollection $contentTypeCollection)
    {

        $submenu = new Submenu($this);
        $submenu->label = $contentTypeCollection->collection;
        foreach ($contentTypeCollection->getContentTypeList() as $contentType2) {
            $submenu->addSite($this->getMenuSite($contentType2));
        }

    }


    public function getContent()
    {


        /*
        if ($this->redirectSite == null) {
            $this->redirectSite = new Site();
        }*/

        foreach ($this->contentTypeList as $contentType) {
            $site = clone($this->redirectSite);
            $site->addParameter(new ContentTypeParameter($contentType->typeId));
            $site->title = $contentType->typeLabel;
            $this->addSite($site);
        }

        return parent::getContent();

    }


    private function getMenuSite(AbstractContentType $contentType)
    {

        $site = clone($this->redirectSite);
        $site->addParameter(new ContentTypeParameter($contentType->typeId));
        $site->title = $contentType->typeLabel;

        return $site;

    }


}