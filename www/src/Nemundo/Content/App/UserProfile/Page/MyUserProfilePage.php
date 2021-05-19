<?php

namespace Nemundo\Content\App\UserProfile\Page;

use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Content\App\UserProfile\Content\UserProfile\UserProfileContentType;
use Nemundo\User\Session\UserSession;

class MyUserProfilePage extends AbstractTemplateDocument
{
    public function getContent()
    {

        $profile = (new UserProfileContentType())->fromUserId((new UserSession())->userId);
        $profile->getDefaultView($this);
        $profile->getDefaultForm($this);


        return parent::getContent();
    }
}