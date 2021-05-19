<?php

namespace Nemundo\Content\App\IssueTracker\Content\Issue;

use Nemundo\Content\App\IssueTracker\Data\Issue\Issue;
use Nemundo\Content\App\IssueTracker\Data\Issue\IssueDelete;
use Nemundo\Content\App\IssueTracker\Data\Issue\IssueReader;
use Nemundo\Content\App\IssueTracker\Data\Issue\IssueRow;
use Nemundo\Content\App\IssueTracker\Data\Issue\IssueUpdate;
use Nemundo\Content\App\IssueTracker\Parameter\IssueParameter;
use Nemundo\Content\App\IssueTracker\Site\IssueTrackerSite;
use Nemundo\Content\App\Task\Index\TaskIndexTrait;
use Nemundo\Content\App\Workflow\Type\AbstractProcess;
use Nemundo\Content\Type\AbstractSearchContentType;
use Nemundo\Core\Type\DateTime\Date;


// IssueProcess
class IssueProcess extends AbstractProcess
{

    use TaskIndexTrait;

    public $issue;

    public $description;

    public $priorityId;

    protected function loadContentType()
    {
        $this->typeLabel = 'Issue';
        $this->typeId = '74696cec-f004-4a7b-843d-feda69417792';
        $this->formClassList[] = IssueContentForm::class;
        $this->viewClassList[] = IssueContentView::class;
        $this->listingClass = IssueContentListing::class;
        $this->viewSite=IssueTrackerSite::$site;
        $this->parameterClass=IssueParameter::class;
    }

    protected function onCreate()
    {

        $data = new Issue();
        $data->issue = $this->issue;
        $data->description = $this->description;
        $data->priorityId=$this->priorityId;
        $this->dataId = $data->save();

    }

    protected function onUpdate()
    {

        $update = new IssueUpdate();
        $update->issue = $this->issue;
        $update->description = $this->description;
        $update->priorityId=$this->priorityId;
         $update->updateById($this->dataId);

    }

    protected function onDelete()
    {

        (new IssueDelete())->deleteById($this->dataId);

    }

    protected function onIndex()
    {

        $this->saveTaskIndex();

        $issueRow = $this->getDataRow();
        $this->addSearchText($issueRow->issue);
        $this->addSearchText($issueRow->description);

    }


    protected function onDataRow()
    {
        $reader = new IssueReader();
        $reader->model->loadPriority();
        $this->dataRow = $reader->getRowById($this->dataId);
    }


    /**
     * @return \Nemundo\Model\Row\AbstractModelDataRow|IssueRow
     */
    public function getDataRow()
    {
        return parent::getDataRow();
    }


    public function getSubject()
    {
        $subject = $this->getDataRow()->issue;
        return $subject;
    }


    public function getDeadline()
    {

        $deadline = (new Date())->setNow();
        return $deadline;

    }


}