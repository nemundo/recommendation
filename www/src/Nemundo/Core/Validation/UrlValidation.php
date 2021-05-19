<?php

namespace Nemundo\Core\Validation;


use Nemundo\Core\Base\AbstractBase;

class UrlValidation extends AbstractBase
{

    public function isUrl($url)
    {

        $returnValue = false;

        if (is_string($url)) {

            // Leerstring im Url ersetzen
            //$url = str_replace(' ', '%20', $url);

            if (!filter_var($url, FILTER_VALIDATE_URL) === false) {
                $returnValue = true;
            }
        }

        return $returnValue;

    }

}