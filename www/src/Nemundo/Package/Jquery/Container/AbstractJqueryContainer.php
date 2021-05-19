<?php

namespace Nemundo\Package\Jquery\Container;


use Nemundo\Html\Container\AbstractHtmlContainer;

class AbstractJqueryContainer extends AbstractHtmlContainer
{


    protected function addJqueryScript($script) {

        JqueryHeader::addJqueryScript($script);

    }

}