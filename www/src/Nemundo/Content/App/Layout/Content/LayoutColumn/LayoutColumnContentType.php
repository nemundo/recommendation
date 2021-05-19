<?php

namespace Nemundo\Content\App\Layout\Content\LayoutColumn;

use Nemundo\Content\App\Dashboard\Content\DashboardColumn\DashboardColumnContentForm;
use Nemundo\Content\App\Dashboard\Content\DashboardColumn\View\PageDashboardColumnContentView;
use Nemundo\Content\App\Dashboard\Content\DashboardColumn\View\WidgetDashboardColumnContentView;
use Nemundo\Content\App\Dashboard\Data\DashboardColumn\DashboardColumn;
use Nemundo\Content\App\Dashboard\Data\DashboardColumn\DashboardColumnDelete;
use Nemundo\Content\App\Dashboard\Data\DashboardColumn\DashboardColumnReader;
use Nemundo\Content\App\Dashboard\Data\DashboardColumn\DashboardColumnRow;
use Nemundo\Content\App\Dashboard\Data\DashboardColumn\DashboardColumnUpdate;
use Nemundo\Content\App\Layout\Content\LayoutColumn\View\PageLayoutColumnContentView;
use Nemundo\Content\App\Layout\Content\LayoutColumn\View\WidgetLayoutColumnContentView;
use Nemundo\Content\Type\AbstractContentType;

class LayoutColumnContentType extends AbstractContentType
{

    /**
     * @var int
     */
    public $columnWidth = 1;

    protected function loadContentType()
    {
        $this->typeLabel = 'Layout Column';
        $this->typeId = 'c6dbe405-4440-4d3b-881a-d44881f5cf8c';
        $this->formClassList[] = LayoutColumnContentForm::class;
        $this->viewClassList[] = LayoutColumnContentView::class;

        $this->viewClassList[] = PageLayoutColumnContentView::class;
        $this->viewClassList[] = WidgetLayoutColumnContentView::class;

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