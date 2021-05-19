<?php


namespace Nemundo\App\UserAction\Widget;


use Nemundo\Admin\Com\Widget\AdminWidget;
use Nemundo\App\UserAction\Form\LoginForm;
use Nemundo\User\Session\UserSession;
use Nemundo\Web\Site\AbstractSite;

class LoginWidget extends AdminWidget
{

    /**
     * @var bool
     */
    public $showForgotHyperlink = false;

    /**
     * @var bool
     */
    public $showRegisterHyperlink = false;

    /**
     * @var AbstractSite
     */
    public $redirectSite;

    public function getContent()
    {

        if ((new UserSession())->isUserLogged()) {
            $this->visible = false;
        }

        $this->widgetTitle = 'Login';

        $form = new LoginForm($this);
        $form->showForgotHyperlink =$this->showForgotHyperlink;
        $form->showRegisterHyperlink =$this->showRegisterHyperlink;
        $form->autofocus = false;
        $form->redirectSite = $this->redirectSite;

        return parent::getContent();

    }

}