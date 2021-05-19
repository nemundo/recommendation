<?php

namespace Nemundo\Content\App\Feedback\Site;

use Nemundo\Content\App\Feedback\Page\FeedbackPage;
use Nemundo\Web\Site\AbstractSite;

class FeedbackSite extends AbstractSite
{
    protected function loadSite()
    {
        $this->title = 'Feedback';
        $this->url = 'feedback';
    }

    public function loadContent()
    {
        (new FeedbackPage())->render();
    }
}