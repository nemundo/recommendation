<?php

namespace Nemundo\Content\Action;


use Nemundo\Content\Site\ContentEditSite;

class EditContentAction extends AbstractContentAction
{

    protected function loadContentType()
    {

        $this->typeLabel='Edit Content Action';
        $this->typeId='a017fb95-47a2-44b7-a33b-1cfcf1c25f14';

        $this->actionLabel='Edit Content';

        $this->viewSite=ContentEditSite::$site;

        // TODO: Implement loadContentType() method.
    }

    public function onAction()
    {


    }


}