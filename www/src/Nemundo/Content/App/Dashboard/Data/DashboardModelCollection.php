<?php
namespace Nemundo\Content\App\Dashboard\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class DashboardModelCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \Nemundo\Content\App\Dashboard\Data\Dashboard\DashboardModel());
$this->addModel(new \Nemundo\Content\App\Dashboard\Data\DashboardColumn\DashboardColumnModel());
$this->addModel(new \Nemundo\Content\App\Dashboard\Data\UserDashboard\UserDashboardModel());
}
}