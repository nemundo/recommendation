<?php

namespace Nemundo\App\UserAction\Widget;


use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Admin\Com\Widget\AdminWidget;
use Nemundo\App\UserAction\Form\PasswordChangeForm;
use Nemundo\App\UserAction\Site\PasswordChangeSite;
use Nemundo\Core\Language\LanguageCode;
use Nemundo\Html\Paragraph\Paragraph;
use Nemundo\User\Parameter\PasswordChangeParameter;

class PasswordChangeWidget extends AdminWidget
{

    public function getContent()
    {

        //$title = new AdminTitle($col);
        $this->widgetTitle[LanguageCode::EN] = 'Change your password';
        $this->widgetTitle[LanguageCode::DE] = 'Ändern sie ihr Passwort';


        $passwordChangeParameter = new PasswordChangeParameter();
        if (!$passwordChangeParameter->exists()) {


            $form = new PasswordChangeForm($this);
            $form->redirectSite = PasswordChangeSite::$site;
            $form->redirectSite->addParameter($passwordChangeParameter);

        } else {
            $p = new Paragraph($this);
            $p->content = 'Passwort wurde geändert.';
        }

        return parent::getContent();
    }

}