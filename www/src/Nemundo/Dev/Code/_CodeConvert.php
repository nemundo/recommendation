<?php

namespace Nemundo\Dev\Code;


use Nemundo\Core\Text\TextConverter;

class CodeConvert
{

    public static function convertToVariable($variableName)
    {
        $variableName = TextConverter::convertToCode($variableName, false, true);
        $variableName = str_replace('_', '', $variableName);

        // erster Buchstaben klein
        if (isset($variableName[0])) {
            $variableName[0] = strtolower($variableName[0]);
        }

        return $variableName;
    }


    public static function convertToClassName($name)
    {
        $name = TextConverter::convertToCode($name, false, true);
        $name = str_replace('_', '', $name);
        return $name;
    }


}

