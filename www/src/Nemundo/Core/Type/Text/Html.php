<?php

namespace Nemundo\Core\Type\Text;


use Nemundo\Core\Type\AbstractType;

class Html extends AbstractType
{


    public function importHtml($html)
    {

        $this->value = htmlspecialchars($html);
        return $this;

    }


    public function getValue()
    {
        $value = parent::getValue();
        $value = nl2br($value);
        //$value = str_replace(' ', '	&nbsp;', $value);
        $value = str_replace(chr(11), '&nbsp;&nbsp;&nbsp;&nbsp;', $value);
        $value = preg_replace('|(https?://[a-zA-Z0-9-./_\?=:%\&#]+)|', '<a href="$1" target="_blank">$1</a>', $value);

        return $value;
    }


    public function removeHtmlTags()
    {
        $this->value = trim(strip_tags($this->value));
        return $this;
    }


    public function convertHtmlTags()
    {
        $this->value = html_entity_decode($this->value);
        return $this;
    }


}