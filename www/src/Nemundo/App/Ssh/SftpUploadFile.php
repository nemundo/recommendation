<?php


namespace Nemundo\App\Ssh;


use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Log\LogMessage;
use Nemundo\Dev\Linux\Ssh\SshConfig;
use phpseclib3\Crypt\PublicKeyLoader;
use phpseclib3\Net\SFTP;


class SftpUploadFile extends AbstractSsh
{

    public $sourceFilename;

    public $content;

    public $destinationFilename;

    /**
     * @var SFTP
     */
    private $sftp;




    protected function connect()
    {

        define('NET_SFTP_LOGGING', \phpseclib3\Net\SFTP::LOG_COMPLEX);
        $this->sftp = new \phpseclib3\Net\SFTP($this->connection->host);

        if (!$this->sftp->isConnected()) {

            //define('NET_SFTP_LOGGING', SFTP::LOG_COMPLEX);
            //$this->sftp = new SFTP($this->connection->host);


            if ($this->connection == null) {
                $this->connection = SshConfig::$sshConnction;
            }

            if ($this->connection->rsaKey !== null) {

                //$rsa = new RSA();
                //$rsa = new Crypt_RSA();

                $key = PublicKeyLoader::load($this->connection->rsaKey, $password = false);


                //$rsa->loadKey($this->connection->rsaKey);

                if (!$this->sftp->login($this->connection->user, $key)) {
                    (new LogMessage())->writeError('SSH Login fehlgeschlagen');
                    return false;
                }

            } else {

                if (!$this->sftp->login($this->connection->user, $this->connection->password)) {
                    (new LogMessage())->writeError('SSH Login fehlgeschlagen');
                    return false;
                }

            }

        }

    }


    public function getFileList($path)
    {

        $this->connect();

        $list = [];
        foreach ($this->sftp->nlist($path) as $filename) {
            if (($filename !== '.') && ($filename !== '..')) {
                $list[] = $filename;
            }
        }

        return $list;

    }


    public function getTextFileContent($filename)
    {

        $this->connect();
        $content = $this->sftp->get($filename);
        return $content;

    }


    public function deleteFilename($filename)
    {

        $this->connect();
        $this->sftp->delete($filename);

    }


    public function uploadFile()
    {

        $this->checkVariable();

        //$this->checkPropertyOnNull('sourceFilename');
        $this->checkPropertyOnNull('destinationFilename');

        /*if ($this->sourceFilename == null) {
            (new LogMessage())->writeError('Source Filename');
            return false;
        }*/

        $this->connect();
        /*if ($this->content !== null) {
            $this->sftp->put($this->destinationFilename, $this->content);
        }*/


        $this->sftp->chdir('/test01');


        (new Debug())->write($this->sftp->pwd());

        $this->sftp->put($this->destinationFilename, $this->sourceFilename, SFTP::SOURCE_LOCAL_FILE);

        //$this->sftp->put('filename.remote', 'filename.local', SFTP::SOURCE_LOCAL_FILE);


        (new Debug())->write($this->sftp->getSFTPLog());


    }


    public function createPath($path) {

        $this->connect();
        $this->sftp->chdir('/');
        $this->sftp->mkdir($path,-1,true);


        return $this;

    }


}