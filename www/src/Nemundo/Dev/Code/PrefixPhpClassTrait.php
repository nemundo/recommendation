<?php


namespace Nemundo\Dev\Code;


trait PrefixPhpClassTrait
{


    protected function prefixClassName($className)
    {

        // todo: check, ob \ schon vorhanden ist

        $className = '\\' . $className;
        return $className;

    }


}