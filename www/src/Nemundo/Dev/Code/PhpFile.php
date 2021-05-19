<?php

namespace Nemundo\Dev\Code;


use Nemundo\Core\Base\AbstractDocument;
use Nemundo\Core\TextFile\Writer\TextFileWriter;

class PhpFile extends AbstractDocument
{

    /**
     * @var bool
     */
    public $overwriteExistingFile = false;

    /**
     * @var array
     */
    private $lineList = [];


    public function add($line)
    {
        $this->lineList[] = $line;
    }

    public function saveFile()
    {

        $textFile = new TextFileWriter($this->filename);
        $textFile->overwriteExistingFile = $this->overwriteExistingFile;
        $textFile->addLine('<?php');

        foreach ($this->lineList as $line) {
            $textFile->addLine($line);
        }

        $textFile->saveFile();

    }

}