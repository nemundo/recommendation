<?php


namespace Nemundo\Core\Date\Month;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Language\LanguageCode;

class MonthNumber extends AbstractBase
{


    public function getMonthNumber($monthText) {


        $monthList = [1=>'Jan','Feb','Mrz','Apr','Mai','Jun','Jul','Aug','Sep','Okt','Nov','Dez'];
        $monthNumber = array_search($monthText,$monthList);
        //$monthNumber++;


        if ($monthNumber == false) {

            //$monthList = (new Month())->mon [1=>'Jan','Feb','Mrz','Apr','Mai','Jun','Jul','Aug','Sep','Okt','Nov','Dez'];
            $monthNumber = array_search($monthText, (new MonthConfig())->month[LanguageCode::DE]);

        }


        return $monthNumber;


    }


}