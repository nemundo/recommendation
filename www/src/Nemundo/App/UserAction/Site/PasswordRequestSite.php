<?php

namespace Nemundo\App\UserAction\Site;


use Nemundo\App\UserAction\Form\PasswordRequestForm;
use Nemundo\Core\Language\LanguageCode;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Html\Paragraph\Paragraph;
use Nemundo\Package\Bootstrap\Layout\Grid\BootstrapColumn;
use Nemundo\Web\Parameter\UrlParameter;
use Nemundo\Web\Site\AbstractSite;

class PasswordRequestSite extends AbstractSite
{

    /**
     * @var PasswordRequestSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title[LanguageCode::EN] = 'Request Password';
        $this->title[LanguageCode::DE] = 'Passwort vergessen';

        $this->url = 'request-password';
        $this->menuActive = false;

        PasswordRequestSite::$site = $this;

    }


    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();
        $col = new BootstrapColumn($page);
        $col->columnWidth = 4;

        $parameter = new UrlParameter();
        $parameter->parameterName = 'pwd';
        if ($parameter->notExists()) {

            $form = new PasswordRequestForm($col);
            $form->redirectSite = PasswordRequestSite::$site;

            $parameter = new UrlParameter();
            $parameter->parameterName = 'pwd';
            $parameter->value = 1;

            $form->redirectSite->addParameter($parameter);

        } else {
            $p = new Paragraph($col);
            $p->content = 'Link zum Ändern des Passwort wurde geschickt.';
        }

        $page->render();

    }

}