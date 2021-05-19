<?php

namespace Nemundo\App\UserAction\Form;

use Nemundo\Admin\Com\Button\AdminSubmitButton;
use Nemundo\App\UserAction\Site\PasswordRequestSite;
use Nemundo\App\UserAction\Site\UserRegistrationSite;
use Nemundo\Com\FormBuilder\AbstractFormBuilder;
use Nemundo\Com\Html\Hyperlink\SiteHyperlink;
use Nemundo\Core\Language\LanguageCode;
use Nemundo\Html\Block\Div;
use Nemundo\Html\Block\Hr;
use Nemundo\Package\Bootstrap\FormElement\BootstrapCheckBox;
use Nemundo\Package\Bootstrap\FormElement\BootstrapPasswordTextBox;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;
use Nemundo\User\Login\UserLogin;

class LoginForm extends AbstractFormBuilder
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
     * @var bool
     */
    public $autofocus=true;

    /**
     * @var BootstrapTextBox
     */
    protected $login;

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

        $this->login = new BootstrapTextBox($this);
        $this->login->label = 'Login';
        $this->login->name = 'login';
        $this->login->autofocus =$this->autofocus;
        $this->login->errorMessage = 'Kein gültiges Login oder Passwort';

        $this->password = new BootstrapPasswordTextBox($this);
        $this->password->label[LanguageCode::EN] = 'Password';
        $this->password->label[LanguageCode::DE] = 'Passwort';
        $this->password->name = 'password';

        $this->saveLogin = new BootstrapCheckBox($this);
        $this->saveLogin->label[LanguageCode::EN] = 'Save Password';
        $this->saveLogin->label[LanguageCode::DE] = 'Passwort speichern';
        $this->saveLogin->value = true;

        $submitButton = new AdminSubmitButton($this);
        $submitButton->label = 'Login';

        if ($this->showForgotHyperlink) {

            // (new Hr($this));

            $div = new Div($this);

            $link = new SiteHyperlink($div);
            $link->site = PasswordRequestSite::$site;

        }


        if ($this->showRegisterHyperlink) {

            //(new Hr($this));

            $div = new Div($this);

            $link = new SiteHyperlink($div);
            $link->site = UserRegistrationSite::$site;

        }

        return parent::getContent();

    }


    protected function onValidate()
    {

        $returnValue = null;

        $login = new UserLogin();
        $login->login = $this->login->getValue();
        $login->password = $this->password->getValue();
        $login->saveCookiePassword = true;

        if ($login->loginUser()) {
            $returnValue = true;
        } else {
            $this->login->showErrorMessage = true;
            $returnValue = false;
        }

        return $returnValue;

    }

    protected function onSubmit()
    {

    }

}
