<?php

namespace Nemundo\Core\Date\Month;


use Nemundo\Core\Language\LanguageCode;

class MonthConfig
{

    public $month;

    public $monthShort;

    public function __construct()
    {


        $this->month[LanguageCode::DE] = [1 => 'Januar', 'Februar', 'März', 'April', 'Mai', 'Juni', 'Juli', 'August', 'September', 'Oktober', 'November', 'Dezember'];
        $this->monthShort[LanguageCode::DE] = [1 => 'Jan', 'Feb', 'Mrz', 'Apr', 'Mai', 'Jun', 'Jul', 'Aug', 'Sep', 'Okt', 'Nov', 'Dez'];

    }

}