<?php


namespace Nemundo\Content\Com\Container;


use Nemundo\Content\Admin\Site\ContentDeleteSite;
use Nemundo\Content\Admin\Site\ContentEditSite;
use Nemundo\Content\Admin\Site\ContentRemoveSite;
use Nemundo\Content\Index\Tree\Com\Container\SortableContentContainer;
use Nemundo\Content\Index\Tree\Type\AbstractTreeContentType;
use Nemundo\Html\Container\AbstractContainer;
use Nemundo\Web\Site\AbstractSite;

class ContentTypeChildAdminContainer extends AbstractContainer
{

    /**
     * @var AbstractTreeContentType
     */
    public $contentType;

    /**
     * @var AbstractSite
     */
    public $redirectSite;

    public function getContent()
    {

        $container = new ContentTypeSubmenuAddContainer($this);
        $container->parentId = $this->contentType->getContentId();
        $container->redirectSite=$this->redirectSite;

        $container = new SortableContentContainer($this);
        $container->contentType = $this->contentType;
        $container->deleteRedirect = ContentRemoveSite::$site;  //DeleteSite::$site;
        $container->editRedirect=ContentEditSite::$site;
        //$container->redirectSite=$this->redirectSite;

        return parent::getContent();

    }

}