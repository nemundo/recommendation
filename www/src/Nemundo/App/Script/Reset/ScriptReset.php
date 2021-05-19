<?php


namespace Nemundo\App\Script\Reset;


use Nemundo\App\Script\Data\Script\ScriptDelete;
use Nemundo\App\Script\Data\Script\ScriptUpdate;
use Nemundo\Project\Reset\AbstractReset;

class ScriptReset extends AbstractReset
{

    public function reset()
    {

        $update = new ScriptUpdate();
        $update->setupStatus = false;
        $update->update();

    }

    public function remove()
    {

        $delete = new ScriptDelete();
        $delete->filter->andEqual($delete->model->setupStatus, false);
        $delete->delete();

    }

}