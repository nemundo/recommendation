<?php

namespace Nemundo\Content\App\Translation\Language;

use Nemundo\Content\App\Translation\Data\Language\LanguageReader;
use Nemundo\Core\Base\AbstractBase;

class DefaultLanguage extends AbstractBase
{

    private static $id;

    private static $code;

    public function getId()
    {

        if (DefaultLanguage::$id == null) {
            $reader = new LanguageReader();
            $reader->filter->andEqual($reader->model->defaultLanguage, true);
            foreach ($reader->getData() as $languageRow) {
                DefaultLanguage::$id = $languageRow->id;
            }
        }

        return DefaultLanguage::$id;

    }


    public function getCode() {

        if (DefaultLanguage::$code == null) {
            $reader = new LanguageReader();
            $reader->filter->andEqual($reader->model->defaultLanguage, true);
            foreach ($reader->getData() as $languageRow) {
                DefaultLanguage::$code = $languageRow->code;
            }
        }

        return DefaultLanguage::$code;

    }

}