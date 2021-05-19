<?php


namespace Nemundo\Office\Excel\Date;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Type\DateTime\Date;

class ExcelDate extends AbstractBase
{

    public function getDate($number)
    {

        $date = (new Date())->fromTimestamp(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($number)->getTimestamp());
        return $date;

    }

}