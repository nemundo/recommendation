<?php

namespace Nemundo\Package\JqueryUi;


use Nemundo\Com\Package\AbstractPackage;

class JqueryUiPackage extends AbstractPackage
{

    protected function loadPackage()
    {

        $this->packageName = 'jquery_ui';
        $this->addJs('jquery-ui.min.js');
        $this->addJs('i18n/datepicker-de.js');
        $this->addCss('jquery-ui.css');

    }


}