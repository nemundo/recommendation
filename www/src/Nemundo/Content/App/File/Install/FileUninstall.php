<?php

namespace Nemundo\Content\App\File\Install;

use Nemundo\App\Script\Setup\ScriptSetup;
use Nemundo\Content\App\File\Application\FileApplication;
use Nemundo\Content\App\File\Content\Audio\AudioContentType;
use Nemundo\Content\App\File\Content\Document\DocumentContentType;
use Nemundo\Content\App\File\Content\File\FileContentType;
use Nemundo\Content\App\File\Content\Image\ImageContentType;
use Nemundo\Content\App\File\Content\Upload\UploadContentType;
use Nemundo\Content\App\File\Content\Video\VideoContentType;
use Nemundo\Content\App\File\Data\FileModelCollection;
use Nemundo\Content\App\File\Job\UrlDownloadJob;
use Nemundo\Content\App\File\Script\FileDownloadScript;
use Nemundo\Content\App\File\Script\ImageImportScript;
use Nemundo\Content\Setup\ContentTypeSetup;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\App\Application\Type\Install\AbstractUninstall;

class FileUninstall extends AbstractUninstall
{

    public function uninstall()
    {

        (new ContentTypeSetup(new FileApplication()))
            ->removeContentType(new FileContentType())
            ->removeContentType(new DocumentContentType())
            ->removeContentType(new AudioContentType())
            ->removeContentType(new VideoContentType())
            ->removeContentType(new ImageContentType())
            ->removeContentType(new UploadContentType())
            ->removeContentType(new UrlDownloadJob());


        (new ModelCollectionSetup())
            ->removeCollection(new FileModelCollection());

        /*
        (new ScriptSetup(new FileApplication()))
            ->removeScript(new FileDownloadScript())
            ->removeScript(new ImageImportScript());
*/


    }
}