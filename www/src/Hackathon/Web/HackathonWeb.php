<?php

namespace Hackathon\Web;

use Hackathon\Controller\HackathonController;
use Nemundo\Admin\AdminConfig;
use Nemundo\Admin\Template\AdminTemplate;
use Nemundo\Com\Html\Header\LibraryHeader;
use Nemundo\User\Login\CookieLogin;
use Nemundo\Web\Base\AbstractWeb;

class HackathonWeb extends AbstractWeb
{

    public function loadWeb()
    {

        (new CookieLogin())->checkLogin();

        LibraryHeader::$documentTitle = 'Recommendation';

        /*ResponseConfig::$title = '';
        ResponseConfig::$description = '';
        ResponseConfig::$imageUrl = null;*/


        AdminConfig::$userMode=true;

        AdminConfig::$defaultTemplateClassName = AdminTemplate::class;
        AdminConfig::$webController = new HackathonController();
        AdminConfig::$webController->render();

    }
}