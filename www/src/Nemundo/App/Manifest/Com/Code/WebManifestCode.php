<?php


namespace Nemundo\App\Manifest\Com\Code;


use Nemundo\App\Manifest\Filename\WebmanifestFilename;
use Nemundo\Core\TextFile\Reader\TextFileReader;
use Nemundo\Core\Type\File\File;
use Nemundo\Core\Type\Text\Html;
use Nemundo\Html\Typography\Code;

class WebManifestCode extends Code
{

    public function getContent()
    {

        $filename = (new WebmanifestFilename())->getFullFilename();

        if ((new File($filename))->fileExists()) {
            $reader = new TextFileReader($filename);
            $this->content = (new Html($reader->getText()))->getValue();
        }

        return parent::getContent();

    }

}