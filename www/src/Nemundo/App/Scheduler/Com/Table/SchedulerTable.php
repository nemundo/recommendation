<?php

namespace Nemundo\App\Scheduler\Com\Table;


use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\App\Application\Com\Container\AbstractApplicationFilterContainer;
use Nemundo\App\Application\Parameter\ApplicationParameter;
use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\App\Scheduler\Check\RepeatingTime;
use Nemundo\App\Scheduler\Data\Scheduler\SchedulerReader;
use Nemundo\App\Scheduler\Parameter\SchedulerParameter;
use Nemundo\App\Scheduler\Site\SchedulerEditSite;
use Nemundo\App\Scheduler\Site\SchedulerResetSite;
use Nemundo\App\Scheduler\Site\SchedulerRunSite;
use Nemundo\App\Scheduler\Site\SchedulerSchedulerLogSite;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Html\Container\AbstractHtmlContainer;


class SchedulerTable extends AbstractApplicationFilterContainer
{

   public $isActive=false;


    public function getContent()
    {

        $table = new AdminTable($this);

        $header = new TableHeader($table);
        $header->addText('Application');
        $header->addText('Script');
        $header->addText('Description');
        $header->addText('Class Name');
        $header->addText('Override Setting');
        $header->addText('Active');
        $header->addText('Running');
        $header->addText('Repeat Every');
        $header->addText('Specific Start Time');
        $header->addText('Start Time');
        $header->addEmpty();
        $header->addEmpty();
        $header->addEmpty();
        $header->addEmpty();

        $schedulerReader = new SchedulerReader();
        $schedulerReader->model->loadScript();
        $schedulerReader->model->script->loadApplication();

        if ($this->applicationId !== null) {
            $schedulerReader->filter->andEqual($schedulerReader->model->script->applicationId, $this->applicationId);
        }

        if ($this->isActive) {
            $schedulerReader->filter->andEqual($schedulerReader->model->active,true);
        }

        foreach ($schedulerReader->getData() as $schedulerRow) {

            $row = new TableRow($table);
            $row->addText($schedulerRow->script->application->application);
            $row->addText($schedulerRow->script->scriptName);
            $row->addText($schedulerRow->script->description);
            $row->addText($schedulerRow->script->scriptClass);
            $row->addYesNo($schedulerRow->overrideSetting);
            $row->addYesNo($schedulerRow->active);
            $row->addYesNo($schedulerRow->running);

            $repeatingTime = new RepeatingTime();
            $repeatingTime->day = $schedulerRow->day;
            $repeatingTime->hour = $schedulerRow->hour;
            $repeatingTime->minute = $schedulerRow->minute;
            $row->addText($repeatingTime->getText());

            $row->addYesNo($schedulerRow->specificStartTime);
            if ($schedulerRow->specificStartTime) {

                if ($schedulerRow->startTime !== null) {
                    $row->addText($schedulerRow->startTime->getIsoTime());
                } else {
                    $row->addEmpty();
                }

            } else {
                $row->addEmpty();
            }

            if (!$schedulerRow->overrideSetting) {
                $site = clone(SchedulerEditSite::$site);
                $site->addParameter(new SchedulerParameter($schedulerRow->id));
                $site->addParameter(new ApplicationParameter());
                $row->addIconSite($site);
            } else {
                $row->addEmpty();
            }

            $site = clone(SchedulerSchedulerLogSite::$site);
            $site->addParameter(new SchedulerParameter($schedulerRow->id));
            $row->addIconSite($site);

            $site = clone(SchedulerResetSite::$site);
            $site->addParameter(new SchedulerParameter($schedulerRow->id));
            $row->addIconSite($site);

            $site = clone(SchedulerRunSite::$site);
            $site->addParameter(new SchedulerParameter($schedulerRow->id));
            $row->addIconSite($site);

        }

        return parent::getContent();

    }

}