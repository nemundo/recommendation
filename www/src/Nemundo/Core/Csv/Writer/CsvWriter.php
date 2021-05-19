<?php

namespace Nemundo\Core\Csv\Writer;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Csv\CsvSeperator;
use Nemundo\Core\Log\LogMessage;
use Nemundo\Core\Path\Path;
use Nemundo\Core\Type\File\File;


class CsvWriter extends AbstractBase
{

    /**
     * @var string
     */
    public $separator = CsvSeperator::SEMICOLON;

    /**
     * @var bool
     */
    public $overwriteExistingFile = false;

    /**
     * @var string
     */
    private $filename;

    private $file;

    public function __construct($filename)
    {

        $this->filename = $filename;

        (new Path())
            ->addPath((new File($this->filename))->getPath())
            ->createPath();

        $this->file = @fopen($this->filename, 'w');
        if (!$this->file) {
            (new LogMessage())->writeError('Csv File could not be open. Filename: ' . $filename);
            return;
        }

    }


    public function __destruct()
    {

        $this->closeFile();

    }


    /**
     * @param $row string[]
     * @return $this
     */
    public function addRow($row)
    {

        fputcsv($this->file, $row, $this->separator);
        return $this;

    }


    public function closeFile()
    {

        if (is_resource($this->file)) {
            fclose($this->file);
        }

    }

}
