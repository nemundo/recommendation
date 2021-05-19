<?php


namespace Nemundo\Core\Math\Percent;


use Nemundo\Core\Base\AbstractBase;

abstract class AbstractPercent extends AbstractBase
{

    public function __construct()
    {
        $this->loadPercent();
    }

    abstract protected function loadPercent();


    /**
     * @var int
     */
    protected $value = 0;


    /**
     * @var int
     */
    protected $baseValue = 0;

    /**
     * @var int
     */
    protected $roundDigit = 2;


    // getText

    public function getValue()
    {

        $percent = 0;

        if ($this->baseValue <> 0) {
            $percent = round(($this->value / $this->baseValue) * 100, $this->roundDigit);
        }

        return $percent;

    }

    public function getText() {

        $text = $this->getValue().' %';
        return $text;

    }


}