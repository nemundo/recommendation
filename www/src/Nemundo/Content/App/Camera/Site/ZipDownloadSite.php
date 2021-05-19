<?php


namespace Nemundo\Content\App\Camera\Site;


use Nemundo\Content\Action\ViewContentAction;
use Nemundo\Content\App\Camera\Content\Camera\CameraContentType;
use Nemundo\Content\App\Camera\Data\Camera\CameraPaginationReader;
use Nemundo\Content\App\Camera\Data\Camera\CameraReader;
use Nemundo\Content\App\PublicShare\Action\PublicShareAction;
use Nemundo\Content\Com\Widget\ContentWidget;
use Nemundo\Core\Archive\ZipArchive;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Http\Response\FileResponse;
use Nemundo\Core\Http\Response\HttpResponse;
use Nemundo\Core\Type\File\File;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Project\Path\TmpPath;
use Nemundo\Web\Site\AbstractSite;
use Paranautik\Xcontest\Crawler\Path\XcontestCachePath;

class ZipDownloadSite extends AbstractSite
{

    /**
     * @var ZipDownloadSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'Download Zip';
        $this->url = 'download-zip';
        $this->menuActive=false;

        ZipDownloadSite::$site=$this;

    }


    public function loadContent()
    {

        $archiveFilename = (new TmpPath())
            ->addPath('camera.zip')
            ->getFilename();

        $file = new File($archiveFilename);
        if ($file->fileExists()) {
            $file->deleteFile();
        }

        $zip = new ZipArchive();
        $zip->archiveFilename = $archiveFilename;
        //$zip->addPath((new XcontestCachePath())->getPath());

        $cameraReader = new CameraReader();
        foreach ($cameraReader->getData() as $cameraRow) {
            $zip->addFilename($cameraRow->image->getFullFilename());
        }

        $zip->createArchive();


        $response=new FileResponse();// new HttpResponse();
        $response->filename=$archiveFilename;
        $response->responseFilename='camera.zip';
        $response->sendResponse();


        //(new Debug())->write('Archive Filename: ' . $archiveFilename);


        //(new DownloadZipPage())->render();

    }


}