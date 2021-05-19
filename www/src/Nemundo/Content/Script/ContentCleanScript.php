<?php


namespace Nemundo\Content\Script;


use Nemundo\App\Script\Type\AbstractConsoleScript;
use Nemundo\Content\Data\Content\ContentDelete;
use Nemundo\Content\Data\ContentType\ContentTypeCount;
use Nemundo\Core\Debug\Debug;
use Nemundo\Content\Data\Content\ContentReader;
use Nemundo\Content\Data\Content\ContentUpdate;
use Nemundo\Content\Install\ContentInstall;
use Nemundo\Content\Install\ContentUninstall;

class ContentCleanScript extends AbstractConsoleScript
{

    protected function loadScript()
    {
        $this->scriptName = 'content-clean';
    }


    public function run()
    {


        $reader = new ContentReader();
        $reader->model->loadContentType();
        foreach ($reader->getData() as $contentRow) {


            $count = new ContentTypeCount();
            $count->filter->andEqual($count->model->id,$contentRow->contentTypeId);
            if ($count->getCount() ==0) {

                (new Debug())->write('No Content Type. Content Id '.$contentRow->id);

                (new ContentDelete())->deleteById($contentRow->id);

            }



            /*$contentType = $contentRow->getContentType();

            if ($contentType->existItem()) {

            }*/

            //$contentType->deleteType();

        }



        //(new ContentUninstall())->uninstall();
        //(new ContentInstall())->install();

    }

}