<?php

namespace Hackathon\Site;

use Hackathon\Page\NewTopicPage;
use Nemundo\Web\Site\AbstractSite;

class NewTopicSite extends AbstractSite
{
    protected function loadSite()
    {
        $this->title = 'Topic';
        $this->url = 'NewTopic';
    }

    public function loadContent()
    {
        (new NewTopicPage())->render();
    }
}