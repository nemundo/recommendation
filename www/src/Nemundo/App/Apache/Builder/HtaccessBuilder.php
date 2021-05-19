<?php


namespace Nemundo\App\Apache\Builder;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\File\FileUtility;
use Nemundo\Core\TextFile\Writer\TextFileWriter;

class HtaccessBuilder extends AbstractBase
{

    public $path;

    public $message = 'Admin';

    /**
     * @var bool
     */
    public $passwordProtection = true;

    public function buildFile()
    {

        $this->path = (new FileUtility())->appendDirectorySeparatorIfNotExists($this->path);

        $filename = $this->path . '.htaccess';

        $file = new TextFileWriter($filename);
        $file->overwriteExistingFile = true;

        if ($this->passwordProtection) {
            $file->addLine('AuthType Basic');
            $file->addLine('AuthName "' . $this->message . '"');
            $file->addLine('AuthUserFile ' . $this->path . '.htpasswd');
            $file->addLine('Require valid-user');
        }

        $file->addLine('RewriteEngine on');
        $file->addLine('RewriteCond %{REQUEST_FILENAME} !-f');
        $file->addLine('RewriteRule  ^(.*) index.php [L]');

        $file->saveFile();

    }


    public function addUser($user, $password)
    {

        $filename = $this->path . '.htpasswd';

        $file = new TextFileWriter($filename);
        $file->overwriteExistingFile = true;
        $file->addLine($user . ':' . crypt($password, rand(10, 99)));
        $file->saveFile();

    }

}