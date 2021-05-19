<?php


namespace Nemundo\Content\App\Favorite\Page;


use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Content\App\Favorite\Com\Container\FavoriteContainer;
use Nemundo\Content\App\Favorite\Site\FavoriteSite;
use Nemundo\Content\Com\Widget\ContentWidget;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;

class FavoritePage extends AbstractTemplateDocument
{

    public function getContent()
    {

        //$title = new AdminTitle($this);
        //$title->content = FavoriteSite::$site->title;

        $layout = new BootstrapTwoColumnLayout($this);
        $layout->col1->columnWidth = 4;
        $layout->col2->columnWidth = 8;

        $container = new FavoriteContainer($layout->col1);
        $container->redirectSite = FavoriteSite::$site;


        $contentParameter = new ContentParameter();
        if ($contentParameter->hasValue()) {
            $content = $contentParameter->getContent(false);

            $title = new AdminTitle($layout->col2);
            $title->content = $content->getSubject();

            if ($content->hasView()) {
                //$view = $content->getDefaultView($layout->col2);

                $widget = new ContentWidget($layout->col2);
                $widget->contentType = $content;
                $widget->redirectSite = FavoriteSite::$site;

            }

        }

        return parent::getContent();

    }

}