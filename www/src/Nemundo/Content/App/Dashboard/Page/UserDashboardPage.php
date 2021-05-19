<?php


namespace Nemundo\Content\App\Dashboard\Page;


use Nemundo\Admin\Com\Button\AdminIconSiteButton;
use Nemundo\Com\FormBuilder\SearchForm;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Content\App\Dashboard\Com\Form\DashboardSearchForm;
use Nemundo\Content\App\Dashboard\Com\ListBox\UserDashboardListBox;
use Nemundo\Content\App\Dashboard\Content\UserDashboard\UserDashboardContentType;
use Nemundo\Content\App\Dashboard\Parameter\UserDashboardParameter;
use Nemundo\Content\App\Dashboard\Site\Admin\UserDashboardEditSite;
use Nemundo\Content\App\Dashboard\Site\UserDashboardSite;
use Nemundo\Content\Com\Container\ContentTypeChildAdminContainer;
use Nemundo\Package\Bootstrap\Layout\Grid\BootstrapRow;

class UserDashboardPage extends AbstractTemplateDocument
{

    public function getContent()
    {




        $btn=new AdminIconSiteButton($this);
        $btn->site= clone(UserDashboardEditSite::$site);
        $btn->site->addParameter(new UserDashboardParameter());

        //new DashboardSearchForm($this);

        $userDashboardParameter = new UserDashboardParameter();

        if ($userDashboardParameter->hasValue()) {
            $contentType = new UserDashboardContentType($userDashboardParameter->getValue());
            $contentType->getDefaultView($this);
        }

        return parent::getContent();

    }

}