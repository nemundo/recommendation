<?php

namespace Nemundo\Office\Excel\Document;

use Nemundo\Core\Base\AbstractDocument;
use Nemundo\Core\Http\Response\ContentType;
use Nemundo\Core\Http\Response\HttpResponse;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class ExcelDocument extends AbstractDocument
{

    /**
     * @var string
     */
    public $filename = 'document.xlsx';

    /**
     * @var Spreadsheet
     */
    private $spreadsheet;

    /**
     * @var int
     */
    private $rowCount = 1;

    /**
     * @var array
     */
    private $rowList = [];


    function __construct()
    {

        $this->spreadsheet = new Spreadsheet();

    }


    // addBoldRow

    public function addBoldRow($row) {

        $this->addRow($row,true);

    }


    // private function
    public function addRow($row, $bold = false)
    {
        $this->rowList[] = $row;

        $count = 1;
        foreach ($row as $value) {
            $this->spreadsheet->setActiveSheetIndex(0)->setCellValueByColumnAndRow($count, $this->rowCount, $value);

            // Bold
            if ($bold) {
                $this->spreadsheet->setActiveSheetIndex(0)->getStyleByColumnAndRow($count, $this->rowCount)->getFont()->setBold(true);
            }

            $count++;
        }

        $this->rowCount++;

    }


    public function addEmptyRow()
    {
        $this->addRow([]);
    }


    protected function writeFileIntern($filename)
    {

        $writer = new Xlsx($this->spreadsheet);
        $writer->save($filename);

    }


    public function saveFile()
    {
        $this->writeFileIntern($this->filename);
    }


    public function render()
    {

        $response = new HttpResponse();
        $response->contentType = ContentType::EXCEL;
        $response->attachmentFilename = $this->filename;
        $response->sendResponse();

        $this->writeFileIntern('php://output');

    }

}
