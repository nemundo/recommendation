<?php

namespace Nemundo\Content\App\Dashboard\Content\Dashboard;

use Nemundo\Content\App\Dashboard\Content\DashboardColumn\DashboardColumnContentType;
use Nemundo\Content\App\Dashboard\Data\Dashboard\Dashboard;
use Nemundo\Content\App\Dashboard\Data\Dashboard\DashboardCount;
use Nemundo\Content\App\Dashboard\Data\Dashboard\DashboardDelete;
use Nemundo\Content\App\Dashboard\Data\Dashboard\DashboardReader;
use Nemundo\Content\App\Dashboard\Data\Dashboard\DashboardRow;
use Nemundo\Content\App\Dashboard\Data\Dashboard\DashboardUpdate;
use Nemundo\Content\Index\Tree\Event\TreeEvent;
use Nemundo\Content\Type\AbstractSearchContentType;
use Nemundo\Content\View\Listing\ContentListing;
use Nemundo\Core\Http\Request\File\FileRequest;
use Nemundo\Core\Random\UniqueId;
use Nemundo\Core\Structure\ForLoop;
use Nemundo\Core\Url\UrlConverter;

class DashboardContentType extends AbstractSearchContentType
{

    public $dashboard;

    public $description = '';

    /**
     * @var FileRequest
     */
    public $image;

    /**
     * @var int
     */
    public $columnCount = 1;

    /**
     * @var bool
     */
    public $active = true;


    protected function loadContentType()
    {
        $this->typeLabel = 'Dashboard';
        $this->typeId = 'c5944481-f5d5-46c7-a4c7-5b7d966eb794';
        $this->formClassList[] = DashboardContentForm::class;
        $this->viewClassList[] = DashboardContentView::class;
        $this->listingClass = ContentListing::class;

        //$this->image=new FileRequest();

    }


    protected function onCreate()
    {

        if ($this->dataId == null) {
            $this->dataId = (new UniqueId())->getUniqueId();
        }


        $url = (new UrlConverter())->convertToUrl($this->dashboard);


        /*

        $n = 0;

        do {

            $url = (new UrlConverter())->convertToUrl($this->dashboard);

            if ($n > 0) {
                $url .= $n;
            }

            $count = new DashboardCount();
            $count->filter->andEqual($count->model->url, $url);

            $n++;

        } while ($count->getCount() == 0);*/


        $data = new Dashboard();
        $data->id = $this->dataId;
        $data->dashboard = $this->dashboard;
        $data->description = $this->description;

        if ($this->image !== null) {
            if ($this->image->hasValue()) {
                $data->image->fromFileRequest($this->image);
            }
        }
        $data->url = $url;
        $data->active = $this->active;
        $data->save();

        $this->saveContent();

        $columnWidth = 12 / $this->columnCount;

        $loop = new ForLoop();
        $loop->minNumber = 1;
        $loop->maxNumber = $this->columnCount;
        foreach ($loop->getData() as $number) {

            $event = new TreeEvent();
            $event->parentId = $this->getContentId();

            $type = new DashboardColumnContentType();
            $type->columnWidth = $columnWidth;
            $type->addEvent($event);
            $type->saveType();

        }

    }


    protected function onUpdate()
    {

        $update = new DashboardUpdate();
        $update->dashboard = $this->dashboard;
        $update->description = $this->description;
        if ($this->image !== null) {
            if ($this->image->hasValue()) {
                $update->image->fromFileRequest($this->image);
            }
        }
        $update->url = (new UrlConverter())->convertToUrl($this->dashboard);
        $update->active = $this->active;
        $update->updateById($this->dataId);

    }


    protected function onDelete()
    {
        (new DashboardDelete())->deleteById($this->dataId);
    }


    protected function onIndex()
    {

        $this->addSearchWord($this->getSubject());

    }


    protected function onDataRow()
    {
        $this->dataRow = (new DashboardReader())->getRowById($this->dataId);
    }

    /**
     * @return \Nemundo\Model\Row\AbstractModelDataRow|DashboardRow
     */
    public function getDataRow()
    {
        return parent::getDataRow();
    }


    public function getSubject()
    {

        $dashboardRow = $this->getDataRow();
        $subject = $dashboardRow->dashboard;

        if (!$dashboardRow->active) {
            $subject .= ' (not active)';
        }

        return $subject;


    }


    public function existItem()
    {

        $value = false;

        $count = new DashboardCount();
        $count->filter->andEqual($count->model->id, $this->dataId);
        if ($count->getCount() == 1) {
            $value = true;
        }

        return $value;

    }

}