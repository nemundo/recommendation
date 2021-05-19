<?php

namespace Nemundo\Core\File;


use Nemundo\Core\Random\UniqueId;

class UniqueFilename
{

    public function getUniqueFilename($fileExtension=null)
    {

        $filename = (new UniqueId())->getUniqueId();

        if ($fileExtension!==null) {
            $filename.= '.' . $fileExtension;
        }

        return $filename;
    }

}