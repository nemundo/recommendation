<?php

namespace Nemundo\Srf\Content\EpisodeSearch;

use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Content\Com\Form\AddContentForm;
use Nemundo\Content\Com\Form\AddForm;
use Nemundo\Content\Form\AbstractContentContainer;
use Nemundo\Content\Form\AbstractContentForm;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;
use Nemundo\Package\Bootstrap\Pagination\BootstrapPagination;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;
use Nemundo\Srf\Content\Episode\SrfEpisodeContentType;
use Nemundo\Srf\Data\Episode\EpisodePaginationReader;
use Nemundo\Srf\Parameter\EpisodeParameter;
use Nemundo\Web\Site\Site;

class EpisodeSearchContentForm extends AbstractContentContainer
{

    /**
     * @var EpisodeSearchContentType
     */
    public $contentType;

    public function getContent()
    {

        $layout = new BootstrapTwoColumnLayout($this);

        $table = new AdminClickableTable($layout->col1);

        $episodeReader = new EpisodePaginationReader();
        //$episodeReader->filter->andEqual($episodeReader->model->showId, $showId);
        $episodeReader->addOrder($episodeReader->model->dateTime, SortOrder::DESCENDING);
        $episodeReader->paginationLimit = 10;
        foreach ($episodeReader->getData() as $episodeRow) {

            $row = new BootstrapClickableTableRow($table);
            $row->addText($episodeRow->title);


            $episodeType = new SrfEpisodeContentType($episodeRow->id);

            $site = new Site();
            $site->addParameter($episodeType->getParameter());
            $row->addClickableSite($site);


            /*$subtitle = new AdminSubtitle($layout->col2);
            $hyperlink = new SiteHyperlink($subtitle);
            $hyperlink->content = $episodeRow->title;
            $hyperlink->site = clone(SrfEpisodeSite::$site);
            $hyperlink->site->addParameter(new EpisodeParameter($episodeRow->id));

            $div = new Div($layout->col2);
            $div->content = $episodeRow->dateTime->getShortDateTimeLeadingZeroFormat();

            $div = new Div($layout->col2);
            $div->content = 'Length: ' . $episodeRow->length;


            $p = new Paragraph($layout->col2);
            $p->content = $episodeRow->description;*/


            /*$form = new StreamSaveForm($layout->col2);
            $form->contentId = $episodeType->getContentId();*/


            //(new Hr($layout->col2));

        }


        $pagination = new BootstrapPagination($this);
        $pagination->paginationReader = $episodeReader;


        $episodeParameter=new EpisodeParameter();
        if ($episodeParameter->hasValue()) {

            $episodeType=$episodeParameter->getContentType();
            $episodeType->getView($layout->col2);

            $form=new AddForm($layout->col2);
            $form->parentContentType = $this->contentType->getParentContentType();
            $form->contentType=$episodeType;
            $form->redirectSite =  $this->contentType->getParentContentType()->getViewSite();

        }




        return parent::getContent();
    }

    public function onSubmit()
    {
        $this->contentType->saveType();
    }
}