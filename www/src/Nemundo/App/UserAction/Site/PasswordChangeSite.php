<?php

namespace Nemundo\App\UserAction\Site;


use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\App\UserAction\Form\PasswordChangeForm;
use Nemundo\App\UserAction\Widget\PasswordChangeWidget;
use Nemundo\Core\Language\LanguageCode;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Html\Paragraph\Paragraph;
use Nemundo\Package\Bootstrap\Layout\Grid\BootstrapColumn;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;
use Nemundo\User\Parameter\PasswordChangeParameter;
use Nemundo\Web\Site\AbstractSite;


class PasswordChangeSite extends AbstractSite
{

    /**
     * @var PasswordChangeSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title[LanguageCode::EN] = 'Change Password';
        $this->title[LanguageCode::DE] = 'Passwort ändern';

        $this->url = 'change-password';
       // $this->menuActive = false;

        PasswordChangeSite::$site = $this;

    }


    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();


        //$col = new BootstrapColumn($page);
        //$col->columnWidth = 4;

        $layout = new BootstrapTwoColumnLayout($page);

        new PasswordChangeWidget($layout->col1);


        /*

        $passwordChangeParameter = new PasswordChangeParameter();
        if (!$passwordChangeParameter->exists()) {

            $title = new AdminTitle($col);
            $title->content[LanguageCode::EN] = 'Change your password';
            $title->content[LanguageCode::DE] = 'Ändern sie ihr Passwort';

            $form = new PasswordChangeForm($col);
            $form->redirectSite = PasswordChangeSite::$site;
            $form->redirectSite->addParameter($passwordChangeParameter);

        } else {
            $p = new Paragraph($col);
            $p->content = 'Passwort wurde geändert.';
        }*/

        $page->render();

    }

}