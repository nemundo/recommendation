<?php


namespace Nemundo\Content\Com\Table;


use Nemundo\Admin\Com\Table\AdminLabelValueTable;
use Nemundo\Content\Row\ContentCustomRow;

class ContentInfoTable extends AdminLabelValueTable
{

    /**
     * @var ContentCustomRow
     */
    public $contentRow;

    public function addDefault()
    {


        $this->addCreator();
        $this->addSubject();

    }


    public function addSubject()
    {
        $this->addLabelValue($this->contentRow->model->subject->label, $this->contentRow->subject);
        return $this;
    }


    public function addCreator()
    {
        $this->addLabelValue('Ersteller', $this->contentRow->user->displayName);
        $this->addLabelValue('Date/Time', $this->contentRow->dateTime);
        return $this;
    }


    public function getContent()
    {


        return parent::getContent(); // TODO: Change the autogenerated stub
    }


}