<?php

namespace Nemundo\Core\Language;


use Nemundo\Core\Base\AbstractBaseClass;


class Translation extends AbstractBaseClass
{

    public function getText($text)
    {

        $textNew = null;

        if (is_array($text)) {
            if (isset($text[LanguageConfig::$currentLanguageCode])) {
                $textNew = $text[LanguageConfig::$currentLanguageCode];
            } else {
                $textNew = 'No Language Definition exists';
            }
        } else {
            $textNew = $text;
        }

        return $textNew;

    }

}