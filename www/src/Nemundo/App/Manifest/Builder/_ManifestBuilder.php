<?php


namespace Nemundo\App\Manifest\Builder;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\TextFile\Writer\TextFileWriter;
use Nemundo\Project\Path\WebPath;

class ManifestBuilder extends AbstractBase
{


    public $jsonFilename='manifest.json';

    public $fallbackUrl = 'offline.html';


    private $urlList=[];

    public function addUrl($url) {

        $this->urlList[]=$url;
        return $this;

    }



    public function writeFile() {


        $filename = (new WebPath())
            ->addPath($this->jsonFilename)
            ->getFullFilename();

        (new Debug())->write($filename);

        $file=new TextFileWriter($filename);
        $file->overwriteExistingFile=true;
        $file->addLine('CACHE MANIFEST');

        foreach ($this->urlList as $url) {
            $file->addLine($url);
        }


        $file->addLine('FALLBACK:');
        $file->addLine('offline.html');


        $file->saveFile();





/*
        CACHE MANIFEST
index.html
stylesheet.css
images/logo.png
scripts/main.js
  */


    }

}