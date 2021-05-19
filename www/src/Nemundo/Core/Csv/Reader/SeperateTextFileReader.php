<?php

namespace Nemundo\Core\Csv\Reader;

use Nemundo\Core\Csv\CsvSeperator;
use Nemundo\Core\Log\LogMessage;
use Nemundo\Core\Type\File\File;
use Nemundo\Core\Validation\UrlValidation;


class SeperateTextFileReader extends AbstractCsvReader  // AbstractDataSource
{

    /**
     * @var string
     */
    //public $filename;

    /**
     * @var CsvSeperator
     */
    public $separator = CsvSeperator::SEMICOLON;

    /**
     * @var int
     */
    //public $lineOfStart = 0;

    /**
     * @var bool
     */
    //public $utf8Encode = false;

    /**
     * @var bool
     */
    //public $trimLine = true;


    protected function loadData()
    {

        $this->checkProperty('filename');


        // Ist Datei vorhanden
        if (!(new UrlValidation())->isUrl($this->filename)) {

            $file = new File($this->filename);
            if (!$file->fileExists()) {
                (new LogMessage())->writeError('File ' . $this->filename . ' does not exist.');
                return;
            }
        }

        //$count = 0;
        // falls Header, assocatives array
        $count = 0;
        $dataHeader = [];

        // Datei einlesen
        $file = fopen($this->filename, 'r');
        if ($file) {
            while (($line = fgets($file)) !== false) {

                // Utf8 Encode
                /* if ($this->utf8Encode) {
                     $line = utf8_encode($line);
                 }

                 if ($this->trimLine) {
                     $line = trim($line);
                 }*/


                if ($count >= $this->lineOfStart) {

                    $data = explode($this->separator, $line);


                    //(new Debug())->write($data);

                    //$this->addItem($data);


                    if ($this->useFirstRowAsHeader) {

                        if ($count == $this->lineOfStart) {

                            $dataHeader = array_map('trim', $data);

                        } else {


                            $dataNew = [];
                            //$rowCount = 0;
                            //foreach ($dataHeader as $rowHeader) {

                            foreach ($dataHeader as $key => $value) {
                                //$dataNew[trim($rowHeader)] = $data[$rowCount];
                                $dataNew[$value] = $data[$key];

                                //$rowCount++;
                            }

                            //$csvRow = new CsvRow($dataNew);
                            //$this->list[] = $dataNew;  // $csvRow;

                            $this->addItem($dataNew);

                        }
                    } else {
                        //$this->list[] = $data;  // new CsvRow($data);
                        $this->addItem($data);
                    }


                }

                $count++;


            }
            fclose($file);
        } else {
            (new LogMessage())->writeError('error opening the file.');
        }

    }


    /*
    public function getText()
    {

        $text = new TextDirectory();

        foreach ($this->getData() as $line) {
            $text->addValue($line);
        }

        return $text->getTextWithSeperator(PHP_EOL);

    }*/

}