<?php


namespace Nemundo\App\Script\Row;


// Nemundo\App\Script\Row\ScriptCustomRow

use Nemundo\App\Script\Data\Script\ScriptRow;
use Nemundo\App\Script\Type\AbstractScript;
use Nemundo\Core\System\ObjectBuilder;

class ScriptCustomRow extends ScriptRow
{


    public function getScript() {


        /** @var AbstractScript $object */
        $object = (new ObjectBuilder)->getObject($this->scriptClass);

        return $object;

    }



}