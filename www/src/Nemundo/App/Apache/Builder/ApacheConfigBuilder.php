<?php


namespace Nemundo\App\Apache\Builder;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Directory\TextDirectory;
use Nemundo\Core\TextFile\Writer\TextFileWriter;
use Nemundo\Project\Path\TmpPath;

class ApacheConfigBuilder extends AbstractBase
{

    public $serverName = 'default';

    public $path;


    public function getContent()
    {

        $line = new TextDirectory();
        $line->addValue('<VirtualHost *:80>');
        $line->addValue('ServerName ' . $this->serverName);
        $line->addValue('DocumentRoot ' . $this->path);
        $line->addValue('<Directory "' . $this->path . '">');
        $line->addValue('Require all granted');
        $line->addValue('AllowOverride All');
        $line->addValue('</Directory>');
        $line->addValue('</VirtualHost>');
        $content = $line->getTextWithSeperator("\r\n");

        return $content;

    }


    public function createConfigFile()
    {


        $filename = (new TmpPath())
            ->addPath($this->serverName . '.conf')
            ->getFilename();

        $file = new TextFileWriter($filename);
        $file->addLine($this->getContent());
        $file->saveFile();


        return $filename;

    }


}