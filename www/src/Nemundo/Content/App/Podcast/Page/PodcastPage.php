<?php

namespace Nemundo\Content\App\Podcast\Page;

use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Admin\Com\Table\Row\AdminClickableTableRow;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Content\App\Podcast\Content\Podcast\PodcastContentType;
use Nemundo\Content\App\Podcast\Data\Episode\EpisodeReader;
use Nemundo\Content\App\Podcast\Data\Podcast\PodcastReader;
use Nemundo\Content\App\Podcast\Parameter\EpisodeParameter;
use Nemundo\Content\App\Podcast\Parameter\PodcastParameter;
use Nemundo\Content\Com\Widget\ContentWidget;
use Nemundo\Package\Bootstrap\Layout\BootstrapThreeColumnLayout;
use Nemundo\Package\Bootstrap\Listing\BootstrapSiteList;
use Nemundo\Web\Site\Site;

class PodcastPage extends AbstractTemplateDocument
{
    public function getContent()
    {

        $layout = new BootstrapThreeColumnLayout($this);


        (new PodcastContentType())->getDefaultForm($layout->col1);


        $list = new BootstrapSiteList($layout->col1);

        $podcastReader = new PodcastReader();
        $podcastReader->addOrder($podcastReader->model->podcast);
        foreach ($podcastReader->getData() as $podcastRow) {

            if ((new PodcastParameter())->getValue() == $podcastRow->id) {

                $list->addActiveText($podcastRow->podcast);

            } else {

                $site = new Site();
                $site->title = $podcastRow->podcast;
                $site->addParameter(new PodcastParameter($podcastRow->id));
                $list->addSite($site);

            }

        }


        $podcastId = (new PodcastParameter())->getValue();


        $table = new AdminClickableTable($layout->col2);

        $episodeReader = new EpisodeReader();
        $episodeReader->filter->andEqual($episodeReader->model->podcastId, $podcastId);

        foreach ($episodeReader->getData() as $episodeRow) {

            $row = new AdminClickableTableRow($table);

            if ((new EpisodeParameter())->getValue() == $episodeRow->id) {
                $row->setActiveRow();
            }

            $row->addText($episodeRow->title);

            $site = new Site();
            $site->addParameter(new EpisodeParameter($episodeRow->id));
            $row->addClickableSite($site);


        }


        $episodeParameter = new EpisodeParameter();
        if ($episodeParameter->hasValue()) {

            //$episodeParameter->getEpisodeContent()->getDefaultView($layout->col3);

            $widget = new ContentWidget($layout->col3);
            $widget->contentType = $episodeParameter->getEpisodeContent();
            $widget->loadAction=true;


        }


        return parent::getContent();
    }
}