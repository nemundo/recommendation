<?php

namespace Nemundo\Db\Provider\MySql\Data;


use Nemundo\Core\Csv\Writer\CsvWriter;
use Nemundo\Core\File\UniqueFilename;
use Nemundo\Core\Path\Path;
use Nemundo\Core\Type\File\File;


class MySqlLoadData extends AbstractMySqlLoadData
{

    /**
     * @var CsvWriter
     */
    private $csvWriter;

    public function __construct($tmpPath)
    {

        parent::__construct();

        $this->csvFilename = (new Path())
            ->addPath($tmpPath)
            ->addPath((new UniqueFilename())->getUniqueFilename('csv'))
            ->getFilename();

        $this->csvWriter = new CsvWriter($this->csvFilename);

    }


    public function addRow($data)
    {

        $this->csvWriter->addRow($data);
        return $this;

    }


    public function importData()
    {

        $this->csvWriter->closeFile();
        parent::importData();

        (new File($this->csvFilename))->deleteFile();

    }

}