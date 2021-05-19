<?php

namespace Nemundo\Core\Date\Month;


use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Core\Language\LanguageCode;

class Month extends AbstractBaseClass
{


    private $month = [];

    public function __construct()
    {

        $this->month[LanguageCode::DE] = [1 => 'Januar', 'Februar', 'März', 'April', 'Mai', 'Juni', 'Juli', 'August', 'September', 'Oktober', 'November', 'Dezember'];

        // 'en' => (array(1 => 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'))

    }


    public function getMonth($number)
    {
        return $this->month['de'][$number];
    }


    /*
        public static $month = array(
            'de' => (array(1 => 'Januar', 'Februar', 'März', 'April', 'Mai', 'Juni', 'Juli', 'August', 'September', 'Oktober', 'November', 'Dezember')),
            'en' => (array(1 => 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'))
        );
      */

}