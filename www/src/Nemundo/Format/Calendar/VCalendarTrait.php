<?php


namespace Nemundo\Format\Calendar;


use Nemundo\Core\Type\DateTime\DateTime;

trait VCalendarTrait
{

    /**
     * @var DateTime
     */
    public $dateFrom;

    /**
     * @var DateTime
     */
    public $dateTo;

    /**
     * @var string
     */
    public $label;

    /**
     * @var string
     */
    public $description;

    /**
     * @var string
     */
    public $location;

    /**
     * @var bool
     */
    public $dayEvent = false;

}