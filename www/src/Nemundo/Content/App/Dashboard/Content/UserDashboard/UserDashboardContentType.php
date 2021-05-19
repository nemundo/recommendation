<?php

namespace Nemundo\Content\App\Dashboard\Content\UserDashboard;

use Nemundo\Content\App\Dashboard\Data\UserDashboard\UserDashboard;
use Nemundo\Content\App\Dashboard\Data\UserDashboard\UserDashboardDelete;
use Nemundo\Content\App\Dashboard\Data\UserDashboard\UserDashboardReader;
use Nemundo\Content\App\Dashboard\Data\UserDashboard\UserDashboardRow;
use Nemundo\Content\App\Dashboard\Data\UserDashboard\UserDashboardUpdate;
use Nemundo\Content\App\Dashboard\Parameter\UserDashboardParameter;
use Nemundo\Content\Type\AbstractContentType;

class UserDashboardContentType extends AbstractContentType
{

    public $dashboard;

    protected function loadContentType()
    {

        $this->typeLabel = 'User Dashboard';
        $this->typeId = '6107eebc-323d-48e1-ab63-cb92e6749e48';
        $this->formClassList[] = UserDashboardContentForm::class;
        $this->viewClassList[]  = UserDashboardContentView::class;
        $this->parameterClass=UserDashboardParameter::class;

    }

    protected function onCreate()
    {

        $data = new UserDashboard();
        $data->dashboard = $this->dashboard;
        $this->dataId = $data->save();

    }

    protected function onUpdate()
    {

        $update = new UserDashboardUpdate();
        $update->dashboard = $this->dashboard;
        $update->updateById($this->dataId);

    }


    protected function onDelete()
    {
        (new UserDashboardDelete())->deleteById($this->dataId);
    }


    protected function onDataRow()
    {
        $this->dataRow = (new UserDashboardReader())->getRowById($this->dataId);
    }

    /**
     * @return \Nemundo\Model\Row\AbstractModelDataRow|UserDashboardRow
     */
    public function getDataRow()
    {
        return parent::getDataRow();
    }


    public function getSubject()
    {
        return $this->getDataRow()->dashboard;
    }


}