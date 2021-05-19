<?php

namespace Nemundo\Core\Date\Weekday;


use Nemundo\Core\Base\AbstractBase;


class Weekday extends AbstractBase
{

    /**
     * @var string
     */
    public $language = 'de';

    private $weekday = [];

    //['de'] => (array(1 => 'Montag', 'Dienstag', 'Mittwoch', 'Donnerstag', 'Freitag', 'Samstag', 'Sonntag')),


    public function __construct()
    {

        $this->weekday['de'] = [1 => 'Montag', 'Dienstag', 'Mittwoch', 'Donnerstag', 'Freitag', 'Samstag', 'Sonntag'];
        $this->weekday['en'] = [1 => 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];

    }

    public function getWeekday($number)
    {
        return $this->weekday[$this->language][$number];

    }

}