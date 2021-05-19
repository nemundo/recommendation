<?php


namespace Nemundo\App\Scheduler\Com\LastUpdate;


use Nemundo\App\Scheduler\Check\LastUpdate;
use Nemundo\App\Scheduler\Data\SchedulerLog\SchedulerLogReader;
use Nemundo\App\Scheduler\Job\AbstractScheduler;
use Nemundo\App\Scheduler\Status\FinishedSchedulerStatus;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Html\Paragraph\Paragraph;

class LastUpdateParagraph extends Paragraph
{

    /**
     * @var AbstractScheduler
     */
    public $scheduler;


    public function getContent()
    {

        $this->content = (new LastUpdate($this->scheduler))->getLastUpdateText();

        return parent::getContent();

    }

}