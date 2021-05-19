<?php

namespace Nemundo\Model\Type\Language;


use Nemundo\Model\Form\Item\Text\TextModelFormItem;
use Nemundo\Model\Item\Text\TextModelItem;
use Nemundo\Model\Type\AbstractModelType;


class LanguageTextModelType extends AbstractModelType
{

    /**
     * @var int
     */
    public $length = 255;

}