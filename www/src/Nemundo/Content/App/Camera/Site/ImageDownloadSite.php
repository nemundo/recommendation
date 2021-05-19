<?php


namespace Nemundo\Content\App\Camera\Site;


use Nemundo\Content\Action\ViewContentAction;
use Nemundo\Content\App\Camera\Content\Camera\CameraContentType;
use Nemundo\Content\App\Camera\Data\Camera\CameraPaginationReader;
use Nemundo\Content\App\Camera\Data\Camera\CameraReader;
use Nemundo\Content\App\Camera\Parameter\CameraParameter;
use Nemundo\Content\App\PublicShare\Action\PublicShareAction;
use Nemundo\Content\Com\Widget\ContentWidget;
use Nemundo\Core\Archive\ZipArchive;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Http\Response\FileResponse;
use Nemundo\Core\Http\Response\HttpResponse;
use Nemundo\Core\Type\File\File;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Package\FontAwesome\Site\AbstractIconSite;
use Nemundo\Project\Path\TmpPath;
use Nemundo\Web\Site\AbstractSite;
use Paranautik\Xcontest\Crawler\Path\XcontestCachePath;

class ImageDownloadSite extends AbstractIconSite
{

    /**
     * @var ImageDownloadSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'Download Image';
        $this->url = 'download-image';
        $this->icon->icon= 'download';
        $this->menuActive=false;

        ImageDownloadSite::$site=$this;

    }


    public function loadContent()
    {


        $cameraId = (new CameraParameter())->getValue();
$cameraRow = (new CameraContentType($cameraId))->getDataRow();



        $response=new FileResponse();// new HttpResponse();
        $response->filename= $cameraRow->image->getFullFilename();  //  $archiveFilename;
        $response->responseFilename= $cameraRow->id.  '.jpg';
        $response->sendResponse();


        //(new Debug())->write('Archive Filename: ' . $archiveFilename);


        //(new DownloadZipPage())->render();

    }


}