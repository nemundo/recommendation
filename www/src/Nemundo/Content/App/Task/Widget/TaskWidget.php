<?php


namespace Nemundo\Content\App\Task\Widget;


use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Admin\Com\Widget\AdminWidget;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Content\App\ToDo\Content\ToDo\ToDoContentType;
use Nemundo\Core\Language\LanguageCode;
use Nemundo\Db\Filter\Filter;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;
use Nemundo\Content\App\Task\Data\TaskIndex\TaskIndexReader;
use Nemundo\Process\Template\Content\User\UserContentType;
use Nemundo\User\Session\UserSession;

class TaskWidget extends AdminWidget
{

    public function getContent()
    {

        $this->widgetTitle[LanguageCode::EN] = 'Task';
        $this->widgetTitle[LanguageCode::DE] = 'Aufgaben';


        //(new ToDoContentType())->getDefaultForm($this);


        //$this->widgetSite=AufgabeSite::$site;


        $taskReader = new TaskIndexReader();
        $taskReader->model->loadContent();
        $taskReader->model->content->loadContentType();
        //$taskReader->model->loadAssignment();
        //$taskReader->model->loadUser();
        //$taskReader->model->loadTaskType();
        //$taskReader->model->loadSource();
        //$taskReader->model->source->loadContentType();

        /*$filter = new Filter();
        $userType = new UserContentType((new UserSession())->userId);
        foreach ($userType->getGroupIdList() as $groupId) {
            $filter->orEqual($taskReader->model->assignmentId, $groupId);
        }
        $taskReader->filter->andFilter($filter);

        $taskReader->filter->andEqual($taskReader->model->closed, false);

        $taskReader->addOrder($taskReader->model->deadline);
        $taskReader->addOrder($taskReader->model->subject);
        $taskReader->addGroup($taskReader->model->contentId);*/

        //$count = new CountField($taskReader);

        $taskReader->limit = 10;

        $table = new AdminClickableTable($this);

        $header = new TableHeader($table);
        $header->addEmpty();
        //$header->addText($taskReader->model->taskType->label);
        $header->addText($taskReader->model->task->label);
        //$header->addText($taskReader->model->assignment->label);
        $header->addText($taskReader->model->deadline->label);

        foreach ($taskReader->getData() as $taskRow) {

            $row = new BootstrapClickableTableRow($table);

            //$taskRow->getTrafficLight($row);

            //$row->addText($taskRow->taskType->contentType);
            $row->addText($taskRow->task);

            //$row->addText($taskRow->source->subject);
            //$row->addText($taskRow->source->contentType->contentType);


            //$taskRow->getAssignmentSpan($row);
            $row->addText($taskRow->deadline->getShortDateLeadingZeroFormat());
            //$row->addText($taskRow->getCreator());
            $row->addClickableSite($taskRow->content->getContentType()->getViewSite());


        }


        return parent::getContent();
    }

}