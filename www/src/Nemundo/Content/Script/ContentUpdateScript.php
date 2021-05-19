<?php


namespace Nemundo\Content\Script;


use Nemundo\App\Script\Type\AbstractConsoleScript;
use Nemundo\Content\Data\Content\ContentReader;
use Nemundo\Content\Data\Content\ContentUpdate;

class ContentUpdateScript extends AbstractConsoleScript
{

    protected function loadScript()
    {
        $this->scriptName = 'content-update';
    }


    public function run()
    {

        $reader = new ContentReader();
        $reader->model->loadContentType();
        foreach ($reader->getData() as $contentRow) {

            $contentType = $contentRow->getContentType();

            $update = new ContentUpdate();
            $update->subject = $contentType->getSubject();
            $update->updateById($contentRow->id);

        }

    }

}