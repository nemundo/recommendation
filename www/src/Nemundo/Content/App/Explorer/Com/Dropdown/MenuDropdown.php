<?php


namespace Nemundo\Content\App\Explorer\Com\Dropdown;


use Nemundo\Content\App\Explorer\Parameter\RefererContentParameter;
use Nemundo\Content\App\Explorer\Site\AccessSite;
use Nemundo\Content\App\Explorer\Site\AttachToSite;
use Nemundo\Content\App\Explorer\Site\ChildOrderSite;
use Nemundo\Content\App\Explorer\Site\ContentDeleteSite;
use Nemundo\Content\App\Explorer\Site\ContentEditSite;
use Nemundo\Content\App\Explorer\Site\ContentRemoveSite;
use Nemundo\Content\App\Explorer\Site\Json\JsonExportSite;
use Nemundo\Content\App\Explorer\Site\Json\JsonImportSite;
use Nemundo\Content\App\Explorer\Site\MoveToSite;
use Nemundo\Content\App\Explorer\Site\PrintSite;
use Nemundo\Content\App\Explorer\Site\_Share\PrivateShareSite;
use Nemundo\Content\App\Explorer\Site\_Share\PublicShareEditSite;
use Nemundo\Content\App\Favorite\Site\FavoriteSaveSite;
use Nemundo\Content\Index\Tree\Type\AbstractContentType;
use Nemundo\Content\Index\Tree\Type\TreeIndexTrait;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Package\Bootstrap\Dropdown\BootstrapSiteDropdown;

class MenuDropdown extends BootstrapSiteDropdown
{

    /**
     * @var AbstractContentType
     */
    public $contentType;


    public function getContent()
    {

        $parentId = '';
        if ($this->contentType->isObjectOfTrait(TreeIndexTrait::class)) {
            $parentId = $this->contentType->getParentId();
        }

        if ($this->contentType->isEditable()) {
            $site = clone(ContentEditSite::$site);
            $site->addParameter(new ContentParameter());
            $site->addParameter(new RefererContentParameter($parentId));
            $this->addSite($site);
        }

        if ($this->contentType->hasViewSite()) {
            $site = $this->contentType->getViewSite();
            $site->title = 'View Detail';
            $this->addSite($site);
        }

        $site = clone(PrintSite::$site);
        $site->addParameter(new ContentParameter());
        $this->addSite($site);

        $this->addSeperator();

        $site = clone(PublicShareEditSite::$site);
        $site->addParameter(new ContentParameter());
        $site->addParameter(new RefererContentParameter($parentId));
        $this->addSite($site);

        $site = clone(FavoriteSaveSite::$site);
        $site->addParameter(new ContentParameter());
        $this->addSite($site);

        $site = clone(PrivateShareSite::$site);
        $site->addParameter(new ContentParameter());
        $site->addParameter(new RefererContentParameter($parentId));
        $this->addSite($site);


        /*
        $site = clone(AccessSite::$site);
        $site->addParameter(new ContentParameter());
        //$site->addParameter(new RefererContentParameter($contentType->getParentId()));
        $site->addParameter(new RefererContentParameter($parentId));
        $this->addSite($site);*/

       /* $site2 = clone(AttachToSite::$site);
        $site2->addParameter(new ContentParameter());
        //$site->addParameter(new RefererContentParameter($contentType->getParentId()));
        $site2->addParameter(new RefererContentParameter($parentId));
        $this->addSite($site2);

        $site = clone(MoveToSite::$site);
        $site->addParameter(new ContentParameter());
        //$site->addParameter(new RefererContentParameter($contentType->getParentId()));
        $site->addParameter(new RefererContentParameter($parentId));
        $this->addSite($site);*/

        $this->addSeperator();

        /*
        if ($this->contentType->hasChild()) {
            $site = clone(ChildOrderSite::$site);
            $site->addParameter(new ContentParameter());
            $site->addParameter(new RefererContentParameter($parentId));
            $this->addSite($site);
        }*/


        $site = clone(ChildOrderSite::$site);
        $site->addParameter(new ContentParameter());
        $site->addParameter(new RefererContentParameter($parentId));
        $this->addSite($site);


        // save to my favorite


        $site = clone(JsonExportSite::$site);
        $site->addParameter(new ContentParameter());
        $this->addSite($site);

        $site = clone(JsonImportSite::$site);
        $site->title = 'Import';
        $site->addParameter(new ContentParameter());
        $this->addSite($site);

        if ($this->contentType->isDeletable()) {
            $site = clone(ContentDeleteSite::$site);
            $site->addParameter(new ContentParameter());
            $site->addParameter(new RefererContentParameter($parentId));
            $this->addSite($site);

            $site = clone(ContentRemoveSite::$site);
            $site->addParameter(new ContentParameter());
            $site->addParameter(new RefererContentParameter($parentId));
            $this->addSite($site);
        }

        return parent::getContent();

    }

}