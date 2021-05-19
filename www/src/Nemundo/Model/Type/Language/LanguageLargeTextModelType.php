<?php

namespace Nemundo\Model\Type\Language;

use Nemundo\Model\Form\Item\Text\LargeTextModelFormItem;
use Nemundo\Model\Item\Text\LargeTextModelItem;
use Nemundo\Model\Type\AbstractModelType;

class LanguageLargeTextModelType extends AbstractModelType
{

    protected function loadExternalType()
    {

        parent::loadExternalType();

        /*
        $this->formTypeClassName = LargeTextModelFormItem::class;
        $this->viewItemClassName = LargeTextModelItem::class;
        $this->tableItemClassName = LargeTextModelItem::class;
*/
    }

}