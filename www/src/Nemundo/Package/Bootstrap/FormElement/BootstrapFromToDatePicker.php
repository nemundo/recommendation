<?php

namespace Nemundo\Package\Bootstrap\FormElement;

use Nemundo\Admin\Parameter\Date\DateFromParameter;
use Nemundo\Admin\Parameter\Date\DateToParameter;
use Nemundo\Core\Language\LanguageCode;
use Nemundo\Core\Type\DateTime\Date;
use Nemundo\Html\Container\AbstractContainer;
use Nemundo\Html\Container\AbstractHtmlContainer;
use Nemundo\Package\Bootstrap\Layout\Grid\BootstrapRow;

class BootstrapFromToDatePicker extends AbstractHtmlContainer
{

    use BootstrapFormStyle;

    /**
     * @var BootstrapDatePicker
     */
    private $from;

    /**
     * @var BootstrapDatePicker
     */
    private $to;

    /**
     * @var bool
     */
    public $searchMode = false;

    /**
     * @var bool
     */
    public $validation = false;

    protected function loadContainer()
    {

        parent::loadContainer();

        //$formRow = new BootstrapRow($this);

        $this->from = new BootstrapDatePicker($this);  // $formRow);
        $this->from->name=(new DateFromParameter())->getParameterName();
        $this->from->label[LanguageCode::EN] = 'From';
        $this->from->label[LanguageCode::DE] = 'Von';

        $this->to = new BootstrapDatePicker($this);  //($formRow);
        $this->to->name=(new DateToParameter())->getParameterName();
        $this->to->label[LanguageCode::EN] = 'To';
        $this->to->label[LanguageCode::DE] = 'Bis';

    }


    public function getContent()
    {

        $this->loadStyle();

        $this->from->searchMode = $this->searchMode;
        $this->from->validation = $this->validation;

        $this->to->searchMode = $this->searchMode;
        $this->to->validation = $this->validation;

        return parent::getContent();

    }


    public function setDateFrom(Date $date)
    {

        $this->from->value = $date->getShortDateLeadingZeroFormat();
        return $this;

    }


    public function setDateTo(Date $date)
    {
        $this->to->value = $date->getShortDateLeadingZeroFormat();
        return $this;
    }


    public function hasValueFrom()
    {
        return $this->from->hasValue();
    }


    public function hasValueTo()
    {
        return $this->to->hasValue();
    }


    public function getDateFrom()
    {
        return $this->from->getDateValue();
    }


    public function getDateTo()
    {
        return $this->to->getDateValue();
    }


}