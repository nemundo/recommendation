<?php

namespace Nemundo\App\UserAction\Form;


use Nemundo\Com\FormBuilder\AbstractFormBuilder;
use Nemundo\Core\Http\Url\UrlReferer;
use Nemundo\User\Builder\UserBuilder;
use Nemundo\User\Com\ListBox\UserListBox;
use Nemundo\User\Login\UserLogin;
use Nemundo\User\Session\UserSession;

class UserChangeForm extends AbstractFormBuilder
{

    /**
     * @var UserListBox
     */
    private $userListBox;

    public function getContent()
    {

        $this->userListBox = new UserListBox($this);
        $this->userListBox->submitOnChange = true;
        $this->userListBox->emptyValueAsDefault = false;
        $this->userListBox->value = (new UserSession())->userId;

        return parent::getContent();

    }


    protected function onSubmit()
    {

        $userRow = (new UserBuilder($this->userListBox->getValue()))->getUserRow();

        $userLogin = new UserLogin();
        $userLogin->login = $userRow->login;
        $userLogin->password = $userRow->login;
        $userLogin->passwordVerification = false;
        $userLogin->loginUser();

        (new UrlReferer())->redirect();

    }

}