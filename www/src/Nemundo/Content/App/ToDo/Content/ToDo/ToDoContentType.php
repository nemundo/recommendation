<?php

namespace Nemundo\Content\App\ToDo\Content\ToDo;

use Nemundo\Content\App\Task\Index\TaskIndexTrait;
use Nemundo\Content\App\ToDo\Data\ToDo\ToDo;
use Nemundo\Content\App\ToDo\Data\ToDo\ToDoReader;
use Nemundo\Content\App\ToDo\Data\ToDo\ToDoRow;

use Nemundo\Content\Type\AbstractContentType;
use Nemundo\Core\Type\DateTime\Date;

class ToDoContentType extends AbstractContentType
{

    use TaskIndexTrait;

    public $todo;

    protected function loadContentType()
    {
        $this->typeLabel = 'ToDo';
        $this->typeId = '35f35d0d-5699-49ca-86db-c62849d200b6';
        $this->formClassList[] = ToDoContentForm::class;
        $this->viewClassList[]  = ToDoContentView::class;
    }

    protected function onCreate()
    {

        $data=new ToDo();
        $data->toDo=$this->todo;
        $this->dataId=$data->save();

    }

    protected function onUpdate()
    {
    }

    protected function onIndex()
    {

        $this->saveTaskIndex();

    }


    protected function onDataRow()
    {
        $this->dataRow=(new ToDoReader())->getRowById($this->dataId);
    }

    /**
     * @return \Nemundo\Model\Row\AbstractModelDataRow|ToDoRow
     */
    public function getDataRow()
    {
        return parent::getDataRow();
    }


    public function getSubject()
    {
        return $this->getDataRow()->toDo;
    }


    public function getDeadline()
    {

        return (new Date())->setNow()->addDay(3);

    }

}