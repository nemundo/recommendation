<?php

namespace Nemundo\Content\App\Podcast\Content\Podcast;

use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Table\Row\AdminTableRow;
use Nemundo\Content\App\Podcast\Data\Episode\EpisodeReader;
use Nemundo\Content\View\AbstractContentView;
use Nemundo\Db\Sql\Order\SortOrder;

class PodcastContentView extends AbstractContentView
{
    /**
     * @var PodcastContentType
     */
    public $contentType;

    protected function loadView()
    {
        $this->viewName = 'default';
        $this->viewId = '44fa477d-f083-4619-a8fd-022c431f3fca';
        $this->defaultView = true;
    }

    public function getContent()
    {

        $table=new AdminTable($this);

        $episodeReader=new EpisodeReader();
        $episodeReader->filter->andEqual($episodeReader->model->podcastId,$this->contentType->getDataId());
        $episodeReader->limit=10;
        $episodeReader->addOrder($episodeReader->model->dateTime,SortOrder::DESCENDING);

        foreach ($episodeReader->getData() as $episodeRow) {

            $row=new AdminTableRow($table);
            $row->addText($episodeRow->title);
            $row->addText($episodeRow->dateTime->getShortDateTimeLeadingZeroFormat());

        }




        return parent::getContent();
    }
}