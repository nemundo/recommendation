<?php

namespace Nemundo\Content\App\Dashboard\Content\DashboardColumn;

use Nemundo\Content\App\Dashboard\Content\DashboardColumn\View\PageDashboardColumnContentView;
use Nemundo\Content\App\Dashboard\Content\DashboardColumn\View\WidgetDashboardColumnContentView;
use Nemundo\Content\App\Dashboard\Data\DashboardColumn\DashboardColumn;
use Nemundo\Content\App\Dashboard\Data\DashboardColumn\DashboardColumnDelete;
use Nemundo\Content\App\Dashboard\Data\DashboardColumn\DashboardColumnReader;
use Nemundo\Content\App\Dashboard\Data\DashboardColumn\DashboardColumnRow;
use Nemundo\Content\App\Dashboard\Data\DashboardColumn\DashboardColumnUpdate;
use Nemundo\Content\Type\AbstractContentType;

class DashboardColumnContentType extends AbstractContentType
{

    /**
     * @var int
     */
    public $columnWidth = 1;

    protected function loadContentType()
    {

        $this->typeLabel = 'Dashboard Column';
        $this->typeId = 'dbf55c01-20af-4f83-a417-320bd1ba9e52';
        $this->formClassList[] = DashboardColumnContentForm::class;
        $this->viewClassList[] = WidgetDashboardColumnContentView::class;
        $this->viewClassList[] = PageDashboardColumnContentView::class;

    }

    protected function onCreate()
    {

        $data = new DashboardColumn();
        $data->columnWidth = $this->columnWidth;
        $this->dataId = $data->save();

    }

    protected function onUpdate()
    {

        $update = new DashboardColumnUpdate();
        $update->columnWidth = $this->columnWidth;
        $update->updateById($this->dataId);

    }

    protected function onDelete()
    {

        (new DashboardColumnDelete())->deleteById($this->dataId);

    }

    protected function onIndex()
    {
    }

    protected function onDataRow()
    {
        $this->dataRow = (new DashboardColumnReader())->getRowById($this->dataId);
    }

    /**
     * @return \Nemundo\Model\Row\AbstractModelDataRow|DashboardColumnRow
     */
    public function getDataRow()
    {
        return parent::getDataRow();
    }


    public function getSubject()
    {

        $subject = 'Column Width: ' . $this->getDataRow()->columnWidth;
        return $subject;

    }

}