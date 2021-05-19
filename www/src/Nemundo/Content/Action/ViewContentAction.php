<?php

namespace Nemundo\Content\Action;


use Nemundo\Content\Site\ContentViewSite;

class ViewContentAction extends AbstractContentAction
{

    protected function loadContentType()
    {

        $this->typeLabel='View Content Action';
        $this->typeId='fa3a997c-c0e8-4b65-ae23-53916c10bf80';

        $this->actionLabel='View Content';

        $this->viewSite=ContentViewSite::$site;

    }

    public function onAction()
    {


    }

}