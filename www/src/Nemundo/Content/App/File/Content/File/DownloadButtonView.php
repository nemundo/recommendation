<?php

namespace Nemundo\Content\App\File\Content\File;

use Nemundo\Content\View\AbstractContentView;
use Nemundo\Package\Bootstrap\Button\BootstrapUrlButton;

class DownloadButtonView extends AbstractContentView
{
    /**
     * @var FileContentType
     */
    public $contentType;


    protected function loadView()
    {

        $this->viewName='Download Button';
        $this->viewId='c0ac0e65-e0d8-4829-b490-a8eb77843ad8';
        $this->defaultView=false;

    }


    public function getContent()
    {

        $fileRow = $this->contentType->getDataRow();

        $btn = new BootstrapUrlButton($this);
        $btn->content = 'Download';
        $btn->url = $fileRow->file->getUrl();

        return parent::getContent();

    }
}