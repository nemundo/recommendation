<?php


namespace Nemundo\Srf\Content\Livestream;


use Nemundo\Content\Index\Search\Type\SearchIndexTrait;
use Nemundo\Content\Index\Tree\Type\AbstractTreeContentType;
use Nemundo\Content\Type\AbstractContentType;
use Nemundo\Srf\Data\RadioLivestream\RadioLivestream;
use Nemundo\Srf\Data\RadioLivestream\RadioLivestreamDelete;
use Nemundo\Srf\Data\RadioLivestream\RadioLivestreamId;
use Nemundo\Srf\Data\RadioLivestream\RadioLivestreamReader;
use Nemundo\Srf\Data\RadioLivestream\RadioLivestreamRow;


class SrfLivestreamContentType extends AbstractContentType
{

    use SearchIndexTrait;

    public $livestream;

    public $urn;


    protected function loadContentType()
    {
        $this->typeLabel = 'SRF Livestream';
        $this->typeId = 'f87f2b8d-c082-44ed-9c8b-dba95fb721ca';
        $this->formClassList[]=SrfLivestreamContentSearchForm::class;
        $this->viewClassList[] = SrfLivestreamContentView::class;
        $this->listingClass = SrfLivestreamContentListing::class;

    }


    protected function onCreate()
    {

        $data = new RadioLivestream();
        $data->updateOnDuplicate = true;
        $data->livestream = $this->livestream;
        $data->urn = $this->urn;
        $data->save();

        $id = new RadioLivestreamId();
        $id->filter->andEqual($id->model->urn, $this->urn);
        $this->dataId = $id->getId();

    }


    /*
    protected function onUpdate()
    {


    }*/


    protected function onIndex()
    {

        $row = $this->getDataRow();
        $this->addSearchWord($row->livestream);

    }


    protected function onDelete()
    {
        (new RadioLivestreamDelete())->deleteById($this->dataId);
    }


    /*
    public function existItem()
    {

        $value = false;

        $count = new RadioLivestreamCount();
        $count->filter->andEqual($count->model->urn, $this->urn);
        if ($count->getCount() == 1) {
            $value = true;
        }

        return $value;
    }*/


    protected function onDataRow()
    {
        $this->dataRow = (new RadioLivestreamReader())->getRowById($this->dataId);

    }


    /**
     * @return \Nemundo\Model\Row\AbstractModelDataRow|RadioLivestreamRow
     */
    public function getDataRow()
    {
        return parent::getDataRow();
    }

    public function getSubject()
    {

        $row = $this->getDataRow();

        $subject = $row->livestream;
        return $subject;

    }


}