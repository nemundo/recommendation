<?php


namespace Nemundo\Srf\Content\Base;


use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Content\View\AbstractContentView;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;

use Nemundo\Srf\Com\Container\ShowContainer;
use Nemundo\Srf\Content\TvEpisode\TvEpisodeContentType;
use Nemundo\Srf\Data\Episode\EpisodeReader;


class ShowContentView extends AbstractContentView
{

    protected function loadView()
    {

        $this->viewId='8c591a18-59b4-4e30-bdd6-7e38ff738742';
        $this->viewName='default';
        $this->defaultView=true;


        // TODO: Implement loadView() method.
    }


    public function getContent()
    {

        $container=new ShowContainer($this);
        $container->showId =$this->contentType->getDataId();


        /*
        $title = new AdminTitle($this);
        $title->content = $this->contentType->getSubject();

        $table=new AdminClickableTable($this);

        $reader=new EpisodeReader();
        $reader->filter->andEqual($reader->model->showId,$this->contentType->getDataId());
        $reader->addOrder($reader->model->dateTime,SortOrder::DESCENDING);
        $reader->limit = 10;
        foreach ($reader->getData() as $episodeRow) {

            $contentType=new TvEpisodeContentType($episodeRow->id);

            $row=new BootstrapClickableTableRow($table);
            $row->addText($episodeRow->title);
            $row->addText($episodeRow->description);
            $row->addText($episodeRow->dateTime->getShortDateTimeLeadingZeroFormat());

            $row->addClickableSite($contentType->getViewSite());

        }*/




        return parent::getContent();

    }

}