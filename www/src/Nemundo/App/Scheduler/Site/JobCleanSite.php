<?php


namespace Nemundo\App\Scheduler\Site;


use Nemundo\App\Scheduler\Data\Job\JobDelete;
use Nemundo\Core\Http\Url\UrlReferer;
use Nemundo\Package\FontAwesome\Site\AbstractDeleteIconSite;

class JobCleanSite extends AbstractDeleteIconSite
{

    /**
     * @var JobCleanSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'Delete Job';
        $this->url = 'delete-job';

        JobCleanSite::$site = $this;

    }


    public function loadContent()
    {

        (new JobDelete())->delete();

        (new UrlReferer())->redirect();

        // TODO: Implement loadContent() method.
    }


}