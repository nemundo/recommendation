<?php

namespace Nemundo\Com\FormBuilder\Item;


use Nemundo\Com\Container\AbstractRestrictedUserHtmlContainer;


// wieso zweimal Abstract Class

abstract class AbstractFormItemBase extends AbstractRestrictedUserHtmlContainer
{

    abstract public function checkValue();

}