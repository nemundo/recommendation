<?php

namespace Nemundo\Com\FormBuilder\Item;

use Nemundo\Com\Container\LibraryTrait;
use Nemundo\Core\Type\DateTime\Date;
use Nemundo\Core\Validation\ValidationType;
use Nemundo\Package\Jquery\Package\JqueryPackage;
use Nemundo\Package\JqueryUi\JqueryUiPackage;


abstract class AbstractDatePicker extends AbstractTextBox
{

    use LibraryTrait;

    public function __construct($parentContainer = null)
    {
        parent::__construct($parentContainer);
        $this->validationType = ValidationType::IS_DATE;

    }


    public function prepareHtml()
    {

        parent::prepareHtml();

        $this->addPackage(new JqueryPackage());
        $this->addPackage(new JqueryUiPackage());

        $this->addJqueryScript('$("#' . $this->name . '").datepicker({');
        $this->addJqueryScript('dateFormat: "dd.mm.yy",');
        $this->addJqueryScript('language: "ge",');
        $this->addJqueryScript('autoclose: true');
        $this->addJqueryScript('});');

    }


    // getDate
    public function getDateValue()
    {

        $date = null;
        if ($this->hasValue()) {
            $date = new Date();
            $date->fromGermanFormat($this->getValue());
        }

        return $date;

    }

}