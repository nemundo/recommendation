<?php

namespace Nemundo\Content\Site;


use Nemundo\Admin\Com\Widget\AdminWidget;
use Nemundo\Com\FormBuilder\UrlReferer\UrlRefererHiddenInput;
use Nemundo\Com\FormBuilder\UrlReferer\UrlRefererSite;
use Nemundo\Content\Action\AbstractContentAction;
use Nemundo\Content\Parameter\ContentActionParameter;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Core\Http\Url\UrlReferer;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;
use Nemundo\Web\Site\AbstractSite;

class ContentActionSite extends AbstractSite
{

    /**
     * @var ContentActionSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'Content Action';
        $this->url = 'content-action';
        $this->menuActive = false;

        ContentActionSite::$site = $this;

    }


    public function loadContent()
    {

        /** @var AbstractContentAction $action */
        $action = (new ContentActionParameter())->getContentType();
        $action->actionContentId = (new ContentParameter())->getValue();

        $found = false;

        if ($action->hasForm()) {

            $document = (new DefaultTemplateFactory())->getDefaultTemplate();

            $layout = new BootstrapTwoColumnLayout($document);

            $contentType = (new ContentParameter())->getContent(false);

            $widget = new AdminWidget($layout->col1);
            $widget->widgetTitle = $contentType->getSubject();

            $contentType->getDefaultView($widget);

            $widget = new AdminWidget($layout->col2);
            $widget->widgetTitle = $action->actionLabel;

            $form = $action->getDefaultForm($widget);
            $hidden = new UrlRefererHiddenInput($form);
            $form->redirectSite = new UrlRefererSite();

            $document->render();

            $found = true;

        }


        if ($action->hasViewSite()) {

            $site = $action->getViewSite();
            $site->addParameter(new ContentParameter());
            $site->redirect();

            $found = true;

        }


        if (!$found) {

            $action->onAction();
            (new UrlReferer())->redirect();

        }


    }

}