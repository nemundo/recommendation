<?php

namespace Nemundo\Dev\App\Site;


use Nemundo\Admin\Config\Site\ConfigSite;
use Nemundo\Admin\Log\Site\LogFileSite;
use Nemundo\Admin\MySql\Site\MySqlSite;
use Nemundo\Admin\Usergroup\Site\UsergroupSite;
use Nemundo\App\Mail\Site\MailSite;
use Nemundo\App\Migration\Site\MigrationSite;
use Nemundo\App\Scheduler\Site\SchedulerSite;
use Nemundo\App\Script\Site\ScriptSite;
use Nemundo\App\System\Site\SystemSite;
use Nemundo\App\SystemLog\Site\SystemLogSite;
use Nemundo\App\UserAdmin\Site\UserAdminSite;
use Nemundo\Web\Site\AbstractSite;

class SystemAdminSite extends AbstractSite
{

    protected function loadSite()
    {

        $this->title = 'System Admin';
        $this->url = 'system-admin';

        new SchedulerSite($this);
        new MailSite($this);
        new ScriptSite($this);
        new MySqlSite($this);
        new UserAdminSite($this);
        new UsergroupSite($this);
        new SystemLogSite($this);
        new SystemSite($this);
        new LogFileSite($this);
        new ConfigSite($this);

    }


    public function loadContent()
    {

    }

}