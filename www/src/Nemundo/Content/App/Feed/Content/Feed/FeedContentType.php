<?php


namespace Nemundo\Content\App\Feed\Content\Feed;


use Nemundo\Content\App\Feed\Content\Item\FeedItemContentType;
use Nemundo\Content\App\Feed\Data\Feed\Feed;
use Nemundo\Content\App\Feed\Data\Feed\FeedCount;
use Nemundo\Content\App\Feed\Data\Feed\FeedDelete;
use Nemundo\Content\App\Feed\Data\Feed\FeedId;
use Nemundo\Content\App\Feed\Data\Feed\FeedReader;
use Nemundo\Content\App\Feed\Data\Feed\FeedRow;
use Nemundo\Content\App\Feed\Data\Feed\FeedUpdate;
use Nemundo\Content\App\Feed\Data\FeedItem\FeedItemReader;
use Nemundo\Content\Index\Tree\Com\Form\ContentSearchForm;
use Nemundo\Content\Type\AbstractSearchContentType;
use Nemundo\Db\Sql\Order\SortOrder;

class FeedContentType extends AbstractSearchContentType
{

    public $feedUrl;

    public $feedTitle;

    public $description;

    protected function loadContentType()
    {

        $this->typeLabel = 'Feed';
        $this->typeId = '93250a52-8f7d-4971-af46-467369ae5993';

        $this->formClassList[] = FeedContentForm::class;
        $this->formClassList[] = ContentSearchForm::class;
        $this->viewClassList[]  = FeedContentView::class;
        $this->adminClass = FeedContentAdmin::class;
        $this->listingClass=FeedContentListing::class;

    }


    protected function onCreate()
    {

        $data = new Feed();
        $data->feedUrl = $this->feedUrl;
        $data->title = $this->feedTitle;
        $data->description=$this->description;
        $this->dataId = $data->save();

    }


    protected function onUpdate()
    {

        if ($this->feedTitle !== null) {
            $update = new FeedUpdate();
            $update->title = $this->feedTitle;
            $update->description=$this->description;
            $update->updateById($this->dataId);
        }

    }


    protected function onIndex()
    {

        $feedRow = $this->getDataRow();
        $this->addSearchText($feedRow->title);

    }


    protected function onDelete()
    {

        foreach ($this->getFeedItemReader()->getData() as $itemRow) {
            $feedItemContentType = new FeedItemContentType($itemRow->id);
            $feedItemContentType->deleteType();
        }

        (new FeedDelete())->deleteById($this->dataId);
        $this->deleteSearchIndex();

    }


    protected function onDataRow()
    {

        $this->dataRow = (new FeedReader())->getRowById($this->dataId);

    }


    public function existItem()
    {

        $value = null;

        $count = new FeedCount();
        $count->filter->andEqual($count->model->feedUrl, $this->feedUrl);
        if ($count->getCount() === 0) {
            $value = false;


        } else {

            $value = true;

            $id = new FeedId();
            $id->filter->andEqual($id->model->feedUrl, $this->feedUrl);
            $this->dataId = $id->getId();

        }

        return $value;

    }


    /**
     * @return \Nemundo\Model\Row\AbstractModelDataRow|FeedRow
     */
    public function getDataRow()
    {
        return parent::getDataRow();
    }


    public function getSubject()
    {
        return $this->getDataRow()->title;
    }


    public function getFeedItemReader()
    {


        $reader = new FeedItemReader();
        $reader->filter->andEqual($reader->model->feedId, $this->getDataId());
        $reader->addOrder($reader->model->dateTime, SortOrder::DESCENDING);

        return $reader;

    }


    public function getFeedItemPaginationReader()
    {


    }


}