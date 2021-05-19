<?php

namespace Nemundo\Core\TextFile\Writer;


use Nemundo\Core\Path\Path;
use Nemundo\Core\Type\File\File;

class LargeTextFileWriter extends AbstractTextFileWriter
{

    // overide


    private $file;

    private $isOpen = false;


    public function __destruct()
    {
        $this->closeFile();
    }


    public function addLine($line)
    {

        $this->openFile();
        fwrite($this->file, $line . PHP_EOL);

        return $this;

    }


    private function openFile()
    {

        if (!$this->isOpen) {


            if (!file_exists($this->filename)) {

                $file = new File($this->filename);
                (new Path())
                    ->addPath($file->getPath())
                    ->createPath();

            }


            $mode = 'a';
            if (!file_exists($this->filename)) {
                $mode = 'w';
            }

            $this->file = fopen($this->filename, $mode);
            $this->isOpen = true;

        }

    }


    public function closeFile()
    {
        if ($this->isOpen) {
            fclose($this->file);
            $this->isOpen = false;
        }
    }

}