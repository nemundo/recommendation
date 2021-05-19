<?php


namespace Nemundo\Dev\Js;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\TextFile\Reader\TextFileReader;
use Nemundo\Core\TextFile\Writer\TextFileWriter;

class JsPacker extends AbstractBase
{

    /**
     * @var string
     */
    public $desinationFilename;

    public function packPackage(AbstractJsPackage $jsPackage)
    {

        $exportFile = new TextFileWriter($this->desinationFilename);
        $exportFile->overwriteExistingFile = true;

        foreach ($jsPackage->getFilenameList() as $filename) {

            $fileReader = new TextFileReader($filename);
            foreach ($fileReader->getData() as $line) {
                $line = trim($line);
                if ($line !== '') {
                    $exportFile->addLine($line);
                }
            }

        }

        $exportFile->saveFile();

    }

}