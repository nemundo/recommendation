<?php


namespace Nemundo\App\Backup\Site;


use Nemundo\App\Backup\Path\RestoreBackupPath;
use Nemundo\Core\Archive\ZipExtractor;
use Nemundo\Core\Type\File\File;
use Nemundo\Package\Dropzone\DropzoneFileRequest;
use Nemundo\Web\Site\AbstractSite;

class UploadSite extends AbstractSite
{

    /**
     * @var UploadSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->url = 'upload';
        UploadSite::$site = $this;
    }


    public function loadContent()
    {

        (new RestoreBackupPath())->createPath();

        $fileRequest = new DropzoneFileRequest();
        $filename = $fileRequest->saveAsOrginalFilename((new RestoreBackupPath())->getPath());

        $zip = new ZipExtractor();
        $zip->archiveFilename = $filename;
        $zip->extractPath = (new RestoreBackupPath())->getPath();
        $zip->extract();

        (new File($filename))->deleteFile();

    }

}