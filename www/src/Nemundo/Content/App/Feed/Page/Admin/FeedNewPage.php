<?php

namespace Nemundo\Content\App\Feed\Page\Admin;

use Nemundo\Content\App\Feed\Content\Feed\FeedContentType;
use Nemundo\Content\App\Feed\Site\Admin\FeedAdminSite;
use Nemundo\Content\App\Feed\Template\FeedAdminTemplate;

class FeedNewPage extends FeedAdminTemplate
{
    public function getContent()
    {

        $form = (new FeedContentType())->getDefaultForm($this);
        $form->redirectSite = FeedAdminSite::$site;

        return parent::getContent();

    }
}