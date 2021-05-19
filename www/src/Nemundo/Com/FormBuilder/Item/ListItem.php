<?php

namespace Nemundo\Com\FormBuilder\Item;


use Nemundo\Core\Base\AbstractBase;

class ListItem extends AbstractBase
{

    /**
     * @var string
     */
    public $label;

    /**
     * @var string
     */
    public $value;

    /**
     * @var bool
     */
    public $checked=false;

}