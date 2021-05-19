<?php

namespace Nemundo\Admin\Web;


use Nemundo\Admin\AdminConfig;
use Nemundo\Admin\Controller\AdminController;
use Nemundo\Admin\Page\NotFoundPage;
use Nemundo\Admin\Template\AdminTemplate;
use Nemundo\Com\Html\Header\LibraryHeader;
use Nemundo\User\Login\CookieLogin;
use Nemundo\Web\Base\AbstractWeb;
use Nemundo\Web\WebConfig;


class AdminWeb extends AbstractWeb
{

    public function loadWeb()
    {

        (new CookieLogin())->checkLogin();

        LibraryHeader::addCssUrl(WebConfig::$webUrl.'style/style.css');

        WebConfig::$notFound404Page=NotFoundPage::class;

        AdminConfig::$webController = new AdminController();
        AdminConfig::$defaultTemplateClassName = AdminTemplate::class;
        AdminConfig::$userMode = true;


        AdminConfig::$webController->render();

    }

}