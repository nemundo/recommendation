<?php

namespace Nemundo\App\Script\Setup;


use Nemundo\App\Application\Setup\AbstractSetup;
use Nemundo\App\Script\Data\Script\Script;
use Nemundo\App\Script\Data\Script\ScriptCount;
use Nemundo\App\Script\Data\Script\ScriptDelete;
use Nemundo\App\Script\Data\Script\ScriptId;
use Nemundo\App\Script\Data\Script\ScriptUpdate;
use Nemundo\App\Script\Type\AbstractScript;


class ScriptSetup extends AbstractSetup
{

    public function addScript(AbstractScript $script)
    {

        $scriptClass = $script->getClassName();

        $count = new ScriptCount();
        $count->filter->andEqual($count->model->scriptClass, $script->getClassName());
        if ($count->getCount() == 0) {

            $data = new Script();
            $data->setupStatus = true;
            $data->scriptName = $script->scriptName;
            $data->description = $script->description;
            $data->scriptClass = $scriptClass;
            $data->consoleScript = $script->consoleScript;
            if ($this->application !== null) {
                $data->applicationId = $this->application->applicationId;
            }
            $data->save();

        } else {

            $id = new ScriptId();
            $id->filter->andEqual($id->model->scriptClass, $scriptClass);
            $scriptId = $id->getId();

            $update = new ScriptUpdate();
            $update->setupStatus = true;
            $update->scriptName = $script->scriptName;
            $update->description = $script->description;
            $update->scriptClass = $script->getClassName();
            $update->consoleScript = $script->consoleScript;
            if ($this->application !== null) {
                $update->applicationId = $this->application->applicationId;
            }
            $update->updateById($scriptId);

        }

        return $this;

    }


    public function removeScript(AbstractScript $script)
    {

        $delete = new ScriptDelete();
        $delete->filter->andEqual($delete->model->scriptClass, $script->getClassName());
        $delete->delete();

        return $this;

    }


    /*
    public function resetSetupStatus()
    {

        $update = new ScriptUpdate();
        $update->setupStatus = false;
        $update->update();

    }


    public function removeUnusedScript()
    {

        $delete = new ScriptDelete();
        $delete->filter->andEqual($delete->model->setupStatus, false);
        $delete->delete();

    }*/

}