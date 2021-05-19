<?php

namespace Nemundo\App\Ssh;


use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Core\Log\LogMessage;
use phpseclib\Net\SFTP;


class LinuxFile extends AbstractBaseClass
{

    /**
     * @var SshConnection
     */
    public $connection;

    /**
     * @var SFTP
     */
    protected $sftp;

    /**
     * @var bool
     */
    private $connected = false;


    public function __construct()
    {
        $this->connection = new SshConnection();
    }


    public function __destruct()
    {
        $this->disconnect();
    }

    protected function connect()
    {

        if (!$this->connected) {
            $this->sftp = new SFTP($this->connection->host, $this->connection->port);

            if (!$this->sftp->isConnected()) {
                if (!$this->sftp->login($this->connection->user, $this->connection->password)) {
                    (new LogMessage())->writeError('SSH Login fehlgeschlagen');
                    return false;
                }
            }
            $this->connected = true;
        }

        return true;

    }

    public function disconnect()
    {
        $this->sftp->disconnect();
    }


    // destinationPath
    public function downloadFile($sourceFilename, $destinationFilename)
    {

        if (!$this->connect()) {
            return;
        }

        $this->sftp->get($sourceFilename, $destinationFilename);

    }


    public function uploadFile($sourceFilename, $destinationFilename)
    {

        if (!$this->connect()) {
            return;
        }

        if (!file_exists($sourceFilename)) {
            (new LogMessage())->writeError('File does not exist: ' . $sourceFilename);
            return;
        }

        $response = $this->sftp->put($destinationFilename, $sourceFilename, SFTP::SOURCE_LOCAL_FILE);

        if (!$response) {
            (new LogMessage())->writeError('Error SFTP Upload');
        }

    }


    public function uploadDirectory($sourcePath, $destinationPath)
    {

        $directoryReader = new \Nemundo\Core\File\DirectoryReader();
        $directoryReader->path = $sourcePath;

        foreach ($directoryReader->getData() as $item) {
            $this->uploadFile($item->fullFilename, $destinationPath . $item->filename);
        }

        return $this;

    }


    public function createTextFile($filename, $content)
    {

        if (!$this->connect()) {
            return;
        }

        if (is_array($content)) {
            $content = implode(PHP_EOL, $content);
        }

        $response = $this->sftp->put($filename, $content);

        return $response;

    }


    public function createDirectory($path)
    {

        if (!$this->connect()) {
            return;
        }

        $this->sftp->chdir('/');
        $this->sftp->mkdir($path, -1, true);

    }


    public function deleteDirectory($path)
    {
        // $sftp->rmdir('test'); // delete the directory
    }


}