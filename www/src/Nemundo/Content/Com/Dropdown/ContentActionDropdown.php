<?php

namespace Nemundo\Content\Com\Dropdown;


use Nemundo\Content\Action\ContentActionTrait;
use Nemundo\Content\Data\ContentAction\ContentActionReader;
use Nemundo\Content\Parameter\ContentActionParameter;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Content\Site\ContentActionSite;
use Nemundo\Core\Debug\Debug;
use Nemundo\Package\Bootstrap\Dropdown\BootstrapSiteDropdown;

class ContentActionDropdown extends BootstrapSiteDropdown
{

    public $contentId;

    use ContentActionTrait;

    public function getContent()
    {

        //(new Debug())->write($this->contentId);

        foreach ($this->getContentActionList() as $contentAction) {

            $site = clone(ContentActionSite::$site);
            $site->title = $contentAction->actionLabel;
            $site->addParameter(new ContentParameter($this->contentId));
            $site->addParameter(new ContentActionParameter($contentAction->typeId));
            $this->addSite($site);

        }


        return parent::getContent();

    }





    public function addDefaultAction() {



        $reader = new ContentActionReader();
        $reader->model->loadContentType();
        $reader->addOrder($reader->model->contentType->contentType);

        // sort nach action label

        foreach ($reader->getData() as $actionRow) {
            $this->addContentAction($actionRow->contentType->getContentType());
        }



        foreach ($this->getContentActionList() as $action) {

            $site = null;

            /*if ($action->hasViewSite()) {
                $site = $action->getViewSite();
            } else {
                $site = ContentActionSite::$site;
            }*/

            $site = clone(ContentActionSite::$site);
            $site->title = $action->actionLabel;
            $site->addParameter(new ContentParameter($this->contentId));
            $site->addParameter(new ContentActionParameter($action->typeId));

            $this->addSite($site);

        }

    }



}