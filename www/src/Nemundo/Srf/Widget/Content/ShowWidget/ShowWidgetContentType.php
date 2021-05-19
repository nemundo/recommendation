<?php

namespace Nemundo\Srf\Widget\Content\ShowWidget;

use Nemundo\Content\Index\Tree\Type\AbstractTreeContentType;
use Nemundo\Srf\Widget\Data\ShowWidget\ShowWidget;
use Nemundo\Srf\Widget\Data\ShowWidget\ShowWidgetReader;
use Nemundo\Srf\Widget\Data\ShowWidget\ShowWidgetRow;
use Nemundo\Srf\Widget\Data\ShowWidget\ShowWidgetUpdate;

class ShowWidgetContentType extends AbstractTreeContentType
{

    public $showId;

    public $showLimit;

    protected function loadContentType()
    {
        $this->typeLabel = 'SRF Show Widget';
        $this->typeId = 'adbc3941-85d9-4190-95cf-5710989efd15';
        $this->formClassList[] = ShowWidgetContentForm::class;
        $this->viewClassList[]  = ShowWidgetContentView::class;
    }

    protected function onCreate()
    {

        $data = new ShowWidget();
        $data->showId = $this->showId;
        $data->showLimit = $this->showLimit;
        $this->dataId = $data->save();

    }

    protected function onUpdate()
    {

        $update = new ShowWidgetUpdate();
        $update->showId = $this->showId;
        $update->showLimit = $this->showLimit;
        $update->updateById($this->dataId);

    }

    protected function onDataRow()
    {

        $reader = new ShowWidgetReader();
        $reader->model->loadShow();
        $this->dataRow = $reader->getRowById($this->dataId);

    }

    /**
     * @return \Nemundo\Model\Row\AbstractModelDataRow|ShowWidgetRow
     */
    public function getDataRow()
    {
        return parent::getDataRow();
    }

    public function getSubject()
    {
        return $this->getDataRow()->show->show;
    }

}