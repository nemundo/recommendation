<?php


namespace Nemundo\Srf\Com\Container;


use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Html\Container\AbstractHtmlContainer;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;
use Nemundo\Srf\Content\TvEpisode\TvEpisodeContentType;
use Nemundo\Srf\Content\TvShow\TvShowContentType;
use Nemundo\Srf\Data\Episode\EpisodeReader;

class ShowContainer extends AbstractHtmlContainer
{

    public $showId;

    public $showLimit=10;

    public function getContent()
    {

        $showContentType=new TvShowContentType($this->showId);

        //$title = new AdminTitle($this);
        //$title->content = $showContentType->getSubject();

        $table=new AdminClickableTable($this);

        $reader=new EpisodeReader();
        $reader->filter->andEqual($reader->model->showId,$showContentType->getDataId());
        $reader->addOrder($reader->model->dateTime,SortOrder::DESCENDING);
        $reader->limit =$this->showLimit;
        foreach ($reader->getData() as $episodeRow) {

            $contentType=new TvEpisodeContentType($episodeRow->id);

            $row=new BootstrapClickableTableRow($table);
            $row->addText($episodeRow->title);
            $row->addText($episodeRow->description);
            $row->addText($episodeRow->dateTime->getShortDateTimeLeadingZeroFormat());

            $row->addClickableSite($contentType->getViewSite());

        }

        return parent::getContent();

    }

}