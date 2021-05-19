<?php

namespace Nemundo\App\UserAction\Form;

use Nemundo\Admin\Com\Button\AdminSubmitButton;
use Nemundo\App\UserAction\Site\PasswordRequestSite;
use Nemundo\App\UserAction\Site\UserRegistrationSite;
use Nemundo\Com\FormBuilder\AbstractFormBuilder;
use Nemundo\Com\Html\Hyperlink\SiteHyperlink;
use Nemundo\Core\Language\LanguageCode;
use Nemundo\Html\Block\Hr;
use Nemundo\Package\Bootstrap\FormElement\BootstrapCheckBox;
use Nemundo\Package\Bootstrap\FormElement\BootstrapPasswordTextBox;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;
use Nemundo\User\Login\UserLogin;

class PasswordLoginForm extends AbstractFormBuilder
{

    public $login;


    /**
     * @var bool
     */
    //public $showForgotHyperlink = false;

    /**
     * @var bool
     */
    //public $showRegisterHyperlink = false;

    /**
     * @var bool
     */
    //public $autofocus=true;

    /**
     * @var BootstrapTextBox
     */
    //protected $login;

    /**
     * @var  BootstrapPasswordTextBox
     */
    private $password;

    /**
     * @var BootstrapCheckBox
     */
    private $saveLogin;


    public function getContent()
    {

      /*  $this->login = new BootstrapTextBox($this);
        $this->login->label = 'Login';
        $this->login->name = 'login';
        $this->login->autofocus =$this->autofocus; // true;
        $this->login->errorMessage = 'Kein gültiges Login oder Passwort';*/

        $this->password = new BootstrapPasswordTextBox($this);
        $this->password->label[LanguageCode::EN] = 'Password';
        $this->password->label[LanguageCode::DE] = 'Passwort';
        $this->password->name = 'password';
        $this->password->errorMessage = 'Ungültiges Passwort';

        /*$this->saveLogin = new BootstrapCheckBox($this);
        $this->saveLogin->label[LanguageCode::EN] = 'Save Password';
        $this->saveLogin->label[LanguageCode::DE] = 'Passwort speichern';
        $this->saveLogin->value = true;*/

        $submitButton = new AdminSubmitButton($this);
        $submitButton->label = 'Login';

        /*
        if ($this->showForgotHyperlink) {

            (new Hr($this));

            $link = new SiteHyperlink($this);
            $link->site = PasswordRequestSite::$site;

        }


        if ($this->showRegisterHyperlink) {

            (new Hr($this));

            $link = new SiteHyperlink($this);
            $link->site = UserRegistrationSite::$site;

        }*/

        return parent::getContent();

    }


    protected function onValidate()
    {

        $returnValue = null;

        $login = new UserLogin();
        $login->login = $this->login;  // login->getValue();
        $login->password = $this->password->getValue();
        $login->saveCookiePassword = true;  // $this->saveLogin->getValue();

        if ($login->loginUser()) {
            $returnValue = true;
        } else {
            $this->password->showErrorMessage = true;
            $returnValue = false;
        }

        return $returnValue;

    }

    protected function onSubmit()
    {

    }

}
