<?php

namespace Nemundo\App\Application\Script;

use Nemundo\App\Application\Data\Application\ApplicationReader;
use Nemundo\App\Script\Type\AbstractConsoleScript;

class AppInstallScript extends AbstractConsoleScript
{
    protected function loadScript()
    {
        $this->scriptName = 'app-install';
    }

    public function run()
    {

        $applicationReader = new ApplicationReader();
        $applicationReader->filter->andEqual($applicationReader->model->install, true);
        foreach ($applicationReader->getData() as $applicationRow) {

            $application = $applicationRow->getApplication();

            if ($application !== null) {
                if ($application->hasInstall()) {
                    $application->installApp();
                }
            }

        }


    }

}