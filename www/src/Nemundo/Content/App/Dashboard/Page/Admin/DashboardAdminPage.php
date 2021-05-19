<?php


namespace Nemundo\Content\App\Dashboard\Page\Admin;


use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\Content\App\Dashboard\Content\Dashboard\DashboardContentType;
use Nemundo\Content\App\Dashboard\Data\Dashboard\DashboardReader;
use Nemundo\Content\App\Dashboard\Parameter\DashboardParameter;
use Nemundo\Content\App\Dashboard\Site\Admin\DashboardDeleteSite;
use Nemundo\Content\App\Dashboard\Site\Admin\DashboardEditSite;
use Nemundo\Content\App\Dashboard\Template\DashboardAdminTemplate;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Package\Bootstrap\Image\BootstrapResponsiveImage;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;


class DashboardAdminPage extends DashboardAdminTemplate
{

    public function getContent()
    {

        $reader = new DashboardReader();

        $table = new AdminClickableTable($this);

        $header = new AdminTableHeader($table);
        $header->addText($reader->model->active->label);
        $header->addText($reader->model->dashboard->label);
        $header->addText($reader->model->description->label);
        $header->addText($reader->model->image->label);
        $header->addText($reader->model->url->label);
        $header->addEmpty();

        foreach ($reader->getData() as $dashboardRow) {

            $row = new BootstrapClickableTableRow($table);
            $row->addYesNo($dashboardRow->active);
            $row->addText($dashboardRow->dashboard);
            $row->addText($dashboardRow->description);

            //$row->addText($dashboardRow->dashboard);

            $img = new BootstrapResponsiveImage($row);
            $img->src= $dashboardRow->image->getImageUrl($dashboardRow->model->imageAutoSize300);

            $row->addText($dashboardRow->url);

            $site = clone(DashboardDeleteSite::$site);
            $site->addParameter(new DashboardParameter($dashboardRow->id));
            $row->addIconSite($site);

            $site = clone(DashboardEditSite::$site);
            $site->addParameter(new ContentParameter((new DashboardContentType($dashboardRow->id))->getContentId()));
            $row->addClickableSite($site);

        }

        return parent::getContent();

    }

}