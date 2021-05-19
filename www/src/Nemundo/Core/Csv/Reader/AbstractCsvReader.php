<?php

namespace Nemundo\Core\Csv\Reader;


use Nemundo\Core\Base\DataSource\AbstractDataSource;
use Nemundo\Core\Log\LogMessage;

abstract class AbstractCsvReader extends AbstractDataSource
{

    use CsvTrait;

    protected $header = [];


    public function getHeader()
    {

        $this->getData();
        return $this->header;

    }


    public function getHeaderByNumber($number)
    {

        $label = '';
        if (isset($this->getHeader()[$number])) {
            $label = $this->getHeader()[$number];
        } else {
            (new LogMessage())->writeError('Header Number ' . $number . ' does not exist.');
        }

        return $label;

    }


}