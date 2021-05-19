<?php


namespace Nemundo\Srf\Content\Base;


use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Admin\Com\Title\AdminSubtitle;
use Nemundo\Com\FormBuilder\SearchForm;
use Nemundo\Com\Html\Hyperlink\SiteHyperlink;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Content\App\Dashboard\Com\Form\DashboardSaveForm;
use Nemundo\Content\App\Favorite\Com\FavoriteButton;
use Nemundo\Content\Com\Input\ContentTypeHiddenInput;
use Nemundo\Content\View\AbstractContentListing;
use Nemundo\Core\Time\Second;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Html\Block\Div;
use Nemundo\Html\Block\Hr;
use Nemundo\Html\Paragraph\Paragraph;
use Nemundo\Package\Bootstrap\Layout\Grid\BootstrapRow;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;
use Nemundo\Srf\Com\ListBox\ShowListBox;
use Nemundo\Srf\Content\TvEpisode\TvEpisodeContentType;
use Nemundo\Srf\Data\Episode\EpisodePaginationReader;
use Nemundo\Srf\Data\Episode\EpisodeReader;
use Nemundo\Srf\Parameter\EpisodeParameter;
use Nemundo\Srf\Parameter\ShowParameter;
use Nemundo\Srf\Site\SrfEpisodeSite;

class EpisodeContentListing extends AbstractContentListing
{

    public function getContent()
    {


        $form=new SearchForm($this);

        new ContentTypeHiddenInput($form);

        $formRow=new BootstrapRow($form);

        $show=new ShowListBox($formRow);
        $show->searchMode=true;
        $show->submitOnChange=true;


        $table = new AdminClickableTable($this);

        $episodeReader = new EpisodePaginationReader();
        $episodeReader->model->loadShow();

        if ($show->hasValue()) {
        $episodeReader->filter->andEqual($episodeReader->model->showId,$show->getValue());
        }

        $episodeReader->addOrder($episodeReader->model->dateTime, SortOrder::DESCENDING);

        $header=new TableHeader($table);
        $header->addText($episodeReader->model->title->label);
        $header->addText($episodeReader->model->show->label);


        foreach ($episodeReader->getData() as $episodeRow) {

            $row=new BootstrapClickableTableRow($table);
            $row->addText($episodeRow->title);
            $row->addText($episodeRow->show->show);

            $site = $this->getRedirectSite($episodeRow->id);
            $site->addParameter(new ShowParameter());
            $row->addClickableSite($site);


            /*
            $subtitle = new AdminSubtitle($layout->col2);
            $hyperlink = new SiteHyperlink($subtitle);
            $hyperlink->content = $episodeRow->title;
            $hyperlink->site = clone(SrfEpisodeSite::$site);
            $hyperlink->site->addParameter(new EpisodeParameter($episodeRow->id));

            $div = new Div($layout->col2);
            $div->content = $episodeRow->dateTime->getShortDateTimeLeadingZeroFormat();

            $div = new Div($layout->col2);
            $div->content =  (new Second( $episodeRow->length))->getText();
            //$div->content = 'Length: ' . $episodeRow->length;

            //$div = new Div($layout->col2);
            //$div->content = 'Length: ' . (new Second( $episodeRow->length))->getHourMinute();
            //$div->content = 'Length: ' . $episodeRow->length;


            $p = new Paragraph($layout->col2);
            $p->content = $episodeRow->description;


            $episodeType =new TvEpisodeContentType($episodeRow->id);


            $shareButton = new Div($layout->col2);

            $favoriteButton=new FavoriteButton($shareButton);
            $favoriteButton->contentType = $episodeType;

            $dashboard=new DashboardSaveForm($shareButton);
            $dashboard->contentType = $episodeType;




            /*$form = new StreamSaveForm($layout->col2);
            $form->contentId = $episodeType->getContentId();*/


            //(new Hr($layout->col2));

        }


        return parent::getContent();

    }

}