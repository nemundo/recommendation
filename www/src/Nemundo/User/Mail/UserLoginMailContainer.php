<?php

namespace Nemundo\User\Mail;


use Nemundo\App\UserAction\Site\UserActivationSite;
use Nemundo\Com\Html\Hyperlink\UrlHyperlink;
use Nemundo\Html\Paragraph\Paragraph;
use Nemundo\User\Data\User\UserReader;
use Nemundo\User\Parameter\SecureTokenParameter;


class UserLoginMailContainer extends AbstractUserLoginMailContainer
{

    protected function loadMailContainer()
    {
        $this->subject = 'User Login';
    }

    public function getContent()
    {

        $userRow = (new UserReader())->getRowById($this->userId);

        $p = new Paragraph($this);
        $p->content = 'Login: ' . $userRow->login;

        $site = clone(UserActivationSite::$site);
        $site->addParameter(new SecureTokenParameter($userRow->secureToken));

        $link = new UrlHyperlink($this);
        $link->content = $site->title;
        $link->url = $site->getUrlWithDomain();

        return parent::getContent();

    }

}