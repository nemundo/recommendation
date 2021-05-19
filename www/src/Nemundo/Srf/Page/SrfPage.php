<?php


namespace Nemundo\Srf\Page;



use Nemundo\Admin\Com\Title\AdminSubtitle;
use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Com\Html\Hyperlink\SiteHyperlink;
use Nemundo\Content\App\Dashboard\Com\Form\DashboardSaveForm;

use Nemundo\Core\Time\Second;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Html\Block\ContentDiv;
use Nemundo\Html\Block\Div;
use Nemundo\Html\Block\Hr;
use Nemundo\Html\Paragraph\Paragraph;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;
use Nemundo\Package\Bootstrap\Listing\BootstrapHyperlinkList;

use Nemundo\Package\Bootstrap\Listing\BootstrapSiteList;
use Nemundo\Srf\Content\TvEpisode\TvEpisodeContentType;
use Nemundo\Srf\Content\TvShow\TvShowContentType;
use Nemundo\Srf\Data\Episode\EpisodeReader;
use Nemundo\Srf\Data\Show\ShowReader;
use Nemundo\Srf\Parameter\EpisodeParameter;
use Nemundo\Srf\Parameter\ShowParameter;
use Nemundo\Srf\Site\SrfEpisodeSite;
use Nemundo\Srf\Site\SrfSite;
use Nemundo\Srf\Template\SrfTemplate;

class SrfPage extends SrfTemplate
{

    public function getContent()
    {

        $layout = new BootstrapTwoColumnLayout($this);
        $layout->col1->columnWidth = 2;
        $layout->col2->columnWidth = 10;

        $list = new BootstrapSiteList($layout->col1);

        $showReader = new ShowReader();
        $showReader->model->loadMediaType();
        $showReader->addOrder($showReader->model->show);
        foreach ($showReader->getData() as $showRow) {
            $site = clone(SrfSite::$site);
            $site->title = $showRow->show . ' (' . $showRow->mediaType->media . ')';
            $site->addParameter(new ShowParameter($showRow->id));
            $list->addSite($site);
        }

        $showParameter = new ShowParameter();

        if ($showParameter->exists()) {

            $showId = $showParameter->getValue();
            $showType = new TvShowContentType($showId);  // new SrfShowContentType($showId);

            $title = new AdminTitle($layout->col2);
            $title->content = $showType->getSubject();

            $episodeReader = new EpisodeReader();
            $episodeReader->filter->andEqual($episodeReader->model->showId, $showId);
            $episodeReader->addOrder($episodeReader->model->dateTime, SortOrder::DESCENDING);
            foreach ($episodeReader->getData() as $episodeRow) {

                $subtitle = new AdminSubtitle($layout->col2);
                $hyperlink = new SiteHyperlink($subtitle);
                $hyperlink->content = $episodeRow->title;
                $hyperlink->site = clone(SrfEpisodeSite::$site);
                $hyperlink->site->addParameter(new EpisodeParameter($episodeRow->id));

                $div = new ContentDiv($layout->col2);
                $div->content = $episodeRow->dateTime->getShortDateTimeLeadingZeroFormat();

                $div = new ContentDiv($layout->col2);
                $div->content =  (new Second( $episodeRow->length))->getText();
                //$div->content = 'Length: ' . $episodeRow->length;

                //$div = new Div($layout->col2);
                //$div->content = 'Length: ' . (new Second( $episodeRow->length))->getHourMinute();
                //$div->content = 'Length: ' . $episodeRow->length;


                $p = new Paragraph($layout->col2);
                $p->content = $episodeRow->description;


                $episodeType =new TvEpisodeContentType($episodeRow->id);


                $shareButton = new Div($layout->col2);

                /*$favoriteButton=new FavoriteButton($shareButton);
                $favoriteButton->contentType = $episodeType;*/

                /*$dashboard=new DashboardSaveForm($shareButton);
                $dashboard->contentType = $episodeType;*/




                /*$form = new StreamSaveForm($layout->col2);
                $form->contentId = $episodeType->getContentId();*/


                (new Hr($layout->col2));

            }


        }


        return parent::getContent();
    }

}