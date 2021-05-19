<?php

namespace Nemundo\Geo\Kml\Document;


use Nemundo\Core\Archive\ZipArchive;
use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Path\Path;
use Nemundo\Core\File\UniqueFilename;
use Nemundo\Core\Http\Response\ContentType;
use Nemundo\Core\Http\Response\FileResponse;
use Nemundo\Core\Type\File\File;
use Nemundo\Project\ProjectConfig;


// AbstractHttpResponse
class KmzResponse extends AbstractBase
{

    /**
     * @var string
     */
    public $filename = 'test.kmz';


    public function render($kmlFilename)
    {

        $kmzFilename = (new Path())
            ->addPath(ProjectConfig::$tmpPath)
            ->addPath((new UniqueFilename())->getUniqueFilename('kmz'))
            ->getFilename();

        $zip = new ZipArchive();
        $zip->archiveFilename = $kmzFilename;
        $zip->addFilename($kmlFilename);
        $zip->createArchive();

        $response = new FileResponse();
        $response->filename = $kmzFilename;
        $response->contentType = ContentType::KMZ;
        $response->responseFilename = $this->filename;
        $response->sendResponse();

        (new File($kmzFilename))->deleteFile();

    }

}