<?php

namespace Nemundo\Core\Ftp;

use Nemundo\Core\Base\DataSource\AbstractDataSource;


class FtpReader extends AbstractDataSource
{

    /**
     * @var string
     */
    public $host;

    /**
     * @var string
     */
    public $path;

    /**
     * @var string
     */
    public $scheme = 'ftp';


    /**
     * @return FtpFile[]
     */
    public function getData()
    {
        return parent::getData();
    }


    protected function loadData()
    {

        $conn_id = ftp_connect($this->host);
        $login_result = ftp_login($conn_id, 'anonymous', '');
        $contents = ftp_nlist($conn_id, $this->path);

        foreach ($contents as $filename) {
            $ftpFile = new FtpFile();
            $ftpFile->host = $this->host;
            $ftpFile->filename = $filename;
            $ftpFile->url = $this->scheme . '://' . $this->host . $filename;

            $this->addItem($ftpFile);
        }

        ftp_close($conn_id);

    }

}