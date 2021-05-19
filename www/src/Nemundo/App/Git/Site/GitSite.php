<?php


namespace Nemundo\App\Git\Site;


use Nemundo\App\Git\Page\GitPage;
use Nemundo\Web\Site\AbstractSite;

class GitSite extends AbstractSite
{

    protected function loadSite()
    {
        $this->title = 'Git';
        $this->url = 'git';
    }


    public function loadContent()
    {
        (new GitPage())->render();
    }

}