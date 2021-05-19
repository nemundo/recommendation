<?php

namespace Nemundo\Core\Text;


use Nemundo\Core\Base\AbstractBaseClass;


class TextConverter extends AbstractBaseClass
{


    public function lowerCase($text)
    {

        // nicht standardmässig installiert!
        //$text = mb_strtolower($text);

        $text = strtolower($text);

        $text = str_replace("Ü", "ü", $text);
        $text = str_replace("Ä", "ä", $text);
        $text = str_replace("Ö", "ö", $text);

        return $text;

    }


    public function convertToCode($text, $lowerCase = true, $removeSpace = false)
    {

        // Lower Case
        if ($lowerCase) {
            $text = $this->lowerCase($text);
        }

        // Remove Space
        if ($removeSpace) {
            $text = str_replace(" ", "", $text);
        }

        $text = str_replace("-", "_", $text);

        // Entfernung Umlaute
        $text = str_replace("Ü", "Ue", $text);
        $text = str_replace("Ä", "Ae", $text);
        $text = str_replace("Ö", "Oe", $text);
        $text = str_replace("ü", "ue", $text);
        $text = str_replace("ä", "ae", $text);
        $text = str_replace("ö", "oe", $text);
        $text = str_replace("é", "e", $text);
        $text = str_replace("è", "e", $text);
        $text = str_replace("á", "e", $text);
        $text = str_replace("à", "e", $text);
        $text = str_replace("ß", "ss", $text);
        $text = str_replace("ç", "c", $text);

        // Entfernung Sonderzeichen
        $text = str_replace("/", "_", $text);
        $text = str_replace("?", "", $text);
        $text = str_replace("«", "", $text);
        $text = str_replace("»", "", $text);
        $text = str_replace("=", "", $text);
        $text = str_replace("<", "", $text);
        $text = str_replace(">", "", $text);
        $text = str_replace("&", "", $text);
        $text = str_replace(".", "", $text);
        $text = str_replace(",", "", $text);
        $text = str_replace("(", "", $text);
        $text = str_replace(")", "", $text);
        $text = str_replace(":", "", $text);
        $text = str_replace(";", "", $text);
        $text = str_replace("!", "", $text);
        $text = str_replace("'", "", $text);
        $text = str_replace("[", "", $text);
        $text = str_replace("]", "", $text);
        $text = str_replace("/", "", $text);
        $text = str_replace("\\", "", $text);

        $text = str_replace(" ", "_", $text);

        return $text;

    }


    //static function convertToCamelVariable()


    public function convertToUrl($text)
    {
        $text =$this->convertToCode($text);
        $text = str_replace("_", "-", $text);
        return $text;
    }


    /*
    static function convertToFilename($text)
    {
        $text = TextConverter::convertToCode($text);
        return $text;
    }


    static function convertToConstName($text)
    {
        $text = TextConverter::convertToCode($text, false, false);
        $text = strtoupper($text);
        $text = str_replace(' ', '_', $text);
        return $text;
    }


    static function Bool2Str($value)
    {

        $returnValue = "false";

        if ($value) $returnValue = "true";
        if (!$value) $returnValue = "false";

        return $returnValue;

    }


    /**
     * Entfernt Html Tags und Umlaute
     * @param $text
     * @return string
     */
   /* static function removeHtmlTag($text)
    {

        $text = htmlspecialchars_decode($text);
        $text = html_entity_decode($text);
        $text = strip_tags($text);
        return $text;

    }


    static function textToHtml($text)
    {

        $text = str_replace(' ', '&nbsp;', $text);
        $text = nl2br($text);
        return $text;

    }

    static function leadingZero($number, $length)
    {

        $number = str_pad($number, $length, '0', STR_PAD_LEFT);
        return $number;

    }*/


}
