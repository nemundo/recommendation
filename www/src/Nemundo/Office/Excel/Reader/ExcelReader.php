<?php

namespace Nemundo\Office\Excel\Reader;


use Nemundo\Core\Csv\Reader\AbstractCsvReader;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Log\LogMessage;
use Nemundo\Core\Type\File\File;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;


class ExcelReader extends AbstractCsvReader
{

    /**
     * @var string
     */
    public $filename;

    /**
     * @var bool
     */
    public $useFirstRowAsHeader = true;

    /**
     * @var string
     */
    public $sheetName;

    /**
     * @var Spreadsheet
     */
    private $spreadsheet;

    /**
     * @return ExcelRow[]
     */
    public function getData()
    {
        return parent::getData();
    }


    protected function loadData()
    {

        if (!$this->checkProperty('filename')) {
            return false;
        }

        $this->checkFileExists();

        /*$file = new File($this->filename);
        if ($file->fileExists()) {
            $this->spreadsheet = IOFactory::load($this->filename);
        } else {
            (new LogMessage())->writeError('File ' . $this->filename . ' does not exists.');
            return false;
        }*/


        $this->spreadsheet = IOFactory::load($this->filename);
        //(new Debug())->write($this->spreadsheet->getSheetNames());


        $objWorksheet = null;
        if ($this->sheetName == null) {
            $objWorksheet = $this->spreadsheet->getActiveSheet();
        } else {

            // falls Sheet Name kein String ist
            if (!is_string($this->sheetName)) {
                $this->sheetName = strval($this->sheetName);
            }

            $objWorksheet = $this->spreadsheet->getSheetByName($this->sheetName);
        }

        $highestRow = $objWorksheet->getHighestRow();

        $highestColumn = $objWorksheet->getHighestColumn();
        $highestColumnIndex = Coordinate::columnIndexFromString($highestColumn);

        $count = 0;
        //$dataHeader = [];


        for ($row = 1; $row <= $highestRow; ++$row) {

            $item = [];
            for ($col = 1; $col <= $highestColumnIndex; $col++) {
                $item[] = trim($objWorksheet->getCellByColumnAndRow($col, $row)->getValue());
            }

            if ($count >= $this->lineOfStart) {

                if ($this->useFirstRowAsHeader) {

                    if ($count == $this->lineOfStart) {
                        //$dataHeader = $item;
                        $this->header = $item;

                    } else {

                        $itemNew = [];
                        $rowCount = 0;
                        //foreach ($dataHeader as $rowHeader) {
                        foreach ($this->header as $rowHeader) {

                            //(new Debug())->write($rowHeader);

                            //$itemNew[$rowHeader] = $item[$rowCount];
                            $itemNew[$rowHeader] = $item[$rowCount];
                            $rowCount++;
                        }

                        $dataRow = new ExcelRow($itemNew);
                        $this->addItem($dataRow);

                    }
                } else {
                    $dataRow = new ExcelRow($item);
                    $this->addItem($dataRow);
                }
            }

            $count++;

        }

    }


    public function getHeader() {

        //$this->loadData();
        $this->getData();
        return $this->header;

    }



}
