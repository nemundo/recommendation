<?php

namespace Nemundo\Content\App\Translation\Row;


// Nemundo\Content\App\Translation\Row\LanguageCustomRow

use Nemundo\Content\App\Translation\Data\Language\LanguageRow;

class LanguageCustomRow extends LanguageRow
{

    public function getLabel() {

        $label = $this->language;  // $this->code;
        if ($this->defaultLanguage) {
            $label .= ' (default)';
        }

        return $label;

    }

}