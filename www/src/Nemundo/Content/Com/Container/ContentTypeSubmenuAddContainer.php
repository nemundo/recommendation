<?php


namespace Nemundo\Content\Com\Container;


use Nemundo\Admin\Com\Title\AdminSubtitle;
use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\Content\Com\Dropdown\ContentTypeSubmenuDropdown;
use Nemundo\Content\Index\Tree\Event\TreeEvent;
use Nemundo\Content\Index\Tree\Type\AbstractTreeContentType;
use Nemundo\Content\Parameter\ContentTypeParameter;
use Nemundo\Content\Type\EventTrait;
use Nemundo\Html\Container\AbstractHtmlContainer;
use Nemundo\Package\Bootstrap\Tabs\Panel\BootstrapTabsPanel;
use Nemundo\Package\Bootstrap\Tabs\Panel\BootstrapTabsPanelContainer;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Web\Site\Site;

class ContentTypeSubmenuAddContainer extends AbstractHtmlContainer
{

    use EventTrait;

    /**
     * @var string
     */
    public $parentId;

    /**
     * @var AbstractSite
     */
    public $redirectSite;

    /**
     * @var AbstractApplication[]
     */
    private $applicationList = [];

    /**
     * @var AbstractTreeContentType[]
     */
    private $contentTypeList = [];


    public function addApplication(AbstractApplication $application)
    {
        $this->applicationList[] = $application;
        return $this;
    }

    public function addContentType(AbstractTreeContentType $contentType)
    {
        $this->contentTypeList[] = $contentType;
        return $this;
    }


    public function getContent()
    {

        if ($this->redirectSite == null) {
            $this->redirectSite = new Site();
        }

        $dropdown = new ContentTypeSubmenuDropdown($this);
        $dropdown->redirectSite = $this->redirectSite;

        $parameter = new ContentTypeParameter();
        if ($parameter->hasValue()) {

            $event=new TreeEvent();
            $event->parentId= $this->parentId;

            $container=new ContentTypeFormContainer($this);
            $container->contentType = $parameter->getContentType();
            $container->contentType->addEvent($event);
            //$container->contentType->parentId =
            //$container->pare

        }


        /*
        $parameter = new ContentTypeParameter();
        if ($parameter->hasValue()) {

            /*
            $contentType = $parameter->getContentType();
            //$contentType->parentId = $this->parentId;

            foreach ($this->eventList as $event) {
                $contentType->addEvent($event);
            }



            /*
            $subtitle=new AdminSubtitle($this);
            $subtitle->content=$contentType->typeLabel;

            $tab = new BootstrapTabsPanel($this);

            if ($contentType->hasForm()) {

                $panel = new BootstrapTabsPanelContainer($tab);
                $panel->panelTitle = 'New';
                $panel->active = true;

                $form = $contentType->getForm($panel);
                $form->redirectSite = $this->redirectSite;

            }


            if ($contentType->hasSearchForm()) {

                $panel = new BootstrapTabsPanelContainer($tab);
                $panel->panelTitle = 'Search';

                if (!$contentType->hasForm()) {
                    $panel->active = true;
                }

                $form = $contentType->getSearchForm($panel);
                $form->redirectSite = $this->redirectSite;

            }*/

        //}

        return parent::getContent();

    }

}