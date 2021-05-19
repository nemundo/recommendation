<?php

namespace Nemundo\Core\Ftp;


use Nemundo\Core\Log\LogMessage;
use Nemundo\Core\Path\Path;
use Nemundo\Core\Type\File\File;

class FtpDownload
{

    /**
     * @var string
     */
    public $host;

    /**
     * @var string
     */
    public $filename;

    /**
     * @var string
     */
    public $destinationFilename;


    public function downloadFile()
    {


        (new Path())
            ->addPath(new File($this->destinationFilename))
            ->createPath();



        //$path = (new File($this->destinationFilename))->getPath();
       // (new Directory($path))->createDirectory();


        $conn_id = ftp_connect($this->host);
        $login_result = ftp_login($conn_id, 'anonymous', '');

        if (!ftp_get($conn_id, $this->destinationFilename, $this->filename, FTP_BINARY)) {
            (new LogMessage())->writeError('Ftp Download Error. Filename: ' . $this->filename);
        }

        ftp_close($conn_id);


    }


}