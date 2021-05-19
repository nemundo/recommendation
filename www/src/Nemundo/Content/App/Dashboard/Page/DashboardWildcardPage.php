<?php


namespace Nemundo\Content\App\Dashboard\Page;


use Nemundo\Admin\Com\Button\AdminIconSiteButton;
use Nemundo\Com\Container\AbstractRestrictedUserHtmlContainer;
use Nemundo\Com\Html\Header\LibraryHeader;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Content\App\Dashboard\Content\Dashboard\DashboardContentType;
use Nemundo\Content\App\Dashboard\Site\Admin\DashboardEditSite;
use Nemundo\Content\App\Dashboard\Usergroup\DashboardUsergroup;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Web\ResponseConfig;
use Nemundo\Web\Site\Site;


class DashboardWildcardPage extends AbstractTemplateDocument
{

    public $dashboardId;


    public function getContent()
    {

        $dashboardContentType = new DashboardContentType($this->dashboardId);
        $dashboardRow = $dashboardContentType->getDataRow();

        LibraryHeader::$documentTitle = $dashboardContentType->getSubject();
        ResponseConfig::$description = $dashboardRow->description;
        ResponseConfig::$imageUrl = $dashboardRow->image->getImageUrlWithDomain($dashboardRow->model->imageAutoSize1200);

        $div = new AbstractRestrictedUserHtmlContainer($this);
        $div->restricted = true;
        $div->addRestrictedUsergroup(new DashboardUsergroup());

        $btn = new AdminIconSiteButton($div);
        $btn->site = clone(DashboardEditSite::$site);
        $btn->site->addParameter(new ContentParameter($dashboardContentType->getContentId()));

        /*
        $btn = new AdminIconSiteButton($div);
        $btn->site = clone(DashboardNewSite::$site);
        $btn->site->addParameter(new ContentParameter($dashboardContentType->getContentId()));
*/

        $view = $dashboardContentType->getDefaultView($this);
        $view->redirectSite = new Site();

        return parent::getContent();

    }

}