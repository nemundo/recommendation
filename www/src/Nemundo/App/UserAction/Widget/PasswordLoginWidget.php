<?php


namespace Nemundo\App\UserAction\Widget;


use Nemundo\Admin\Com\Widget\AdminWidget;
use Nemundo\App\UserAction\Form\LoginForm;
use Nemundo\App\UserAction\Form\PasswordLoginForm;
use Nemundo\User\Session\UserSession;
use Nemundo\Web\Site\AbstractSite;

class PasswordLoginWidget extends AdminWidget
{

    public $login;

    /**
     * @var AbstractSite
     */
    public $redirectSite;

    public function getContent()
    {

        $this->widgetTitle = 'Login';

        $form = new PasswordLoginForm($this);
        $form->login=$this->login;
        $form->redirectSite = $this->redirectSite;

        return parent::getContent();

    }

}