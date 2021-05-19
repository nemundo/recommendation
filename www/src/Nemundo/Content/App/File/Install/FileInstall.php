<?php

namespace Nemundo\Content\App\File\Install;

use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\App\Script\Setup\ScriptSetup;
use Nemundo\Com\Package\PackageSetup;
use Nemundo\Content\App\File\Application\FileApplication;
use Nemundo\Content\App\File\Content\Audio\AudioContentType;
use Nemundo\Content\App\File\Content\Document\DocumentContentType;
use Nemundo\Content\App\File\Content\File\FileContentType;
use Nemundo\Content\App\File\Content\Image\ImageContentType;
use Nemundo\Content\App\File\Content\Upload\UploadContentType;
use Nemundo\Content\App\File\Content\Video\VideoContentType;
use Nemundo\Content\App\File\Content\WebFile\WebFileContentType;
use Nemundo\Content\App\File\Data\FileModelCollection;
use Nemundo\Content\App\File\Job\UrlDownloadJob;
use Nemundo\Content\App\File\Script\FileDownloadScript;
use Nemundo\Content\App\File\Script\ImageImportScript;
use Nemundo\Content\Setup\ContentTypeSetup;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\Package\Dropzone\DropzonePackage;
use Nemundo\App\Application\Type\Install\AbstractInstall;

class FileInstall extends AbstractInstall
{
    public function install()
    {

        (new ApplicationSetup())
            ->addApplication(new FileApplication());

        (new ModelCollectionSetup())
            ->addCollection(new FileModelCollection());

        /*
        (new ScriptSetup(new FileApplication()))
            ->addScript(new FileDownloadScript())
            ->addScript(new ImageImportScript());*/

        (new ContentTypeSetup(new FileApplication()))
            ->addContentType(new FileContentType())
            ->addContentType(new WebFileContentType())
            ->addContentType(new DocumentContentType())
            ->addContentType(new AudioContentType())
            ->addContentType(new VideoContentType())
            ->addContentType(new ImageContentType())
            ->addContentType(new UploadContentType())
            ->addContentType(new UrlDownloadJob());


        /*
        (new PackageSetup())
            ->addPackage(new DropzonePackage());
*/


    }
}