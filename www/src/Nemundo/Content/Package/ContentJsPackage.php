<?php


namespace Nemundo\Content\Package;


use Nemundo\Com\Package\AbstractPackage;
use Nemundo\Content\ContentProject;

class ContentJsPackage extends AbstractPackage
{

    protected function loadPackage()
    {
        $this->project=new ContentProject();
        $this->packageName='content_js';
        $this->addJs('content.js');
    }

}