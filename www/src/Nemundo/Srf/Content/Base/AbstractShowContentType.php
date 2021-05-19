<?php


namespace Nemundo\Srf\Content\Base;


use Nemundo\Content\Index\Search\Type\SearchIndexTrait;
use Nemundo\Content\Index\Tree\Type\AbstractTreeContentType;
use Nemundo\Content\Type\AbstractContentType;
use Nemundo\Srf\Data\Show\Show;
use Nemundo\Srf\Data\Show\ShowCount;
use Nemundo\Srf\Data\Show\ShowDelete;
use Nemundo\Srf\Data\Show\ShowId;
use Nemundo\Srf\Data\Show\ShowReader;
use Nemundo\Srf\Data\Show\ShowRow;
use Nemundo\Srf\MediaType\AbstractMediaType;

abstract class AbstractShowContentType extends AbstractContentType
{

    use SearchIndexTrait;

    public $show;

    public $srfId;

    /**
     * @var AbstractMediaType
     */
    protected $mediaType;


    protected function loadContentType()
    {
        // TODO: Implement loadContentType() method.
        $this->viewClassList[] = ShowContentView::class;

    }


    protected function onCreate()
    {

        $data = new Show();
        $data->updateOnDuplicate = true;
        $data->mediaTypeId = $this->mediaType->id;  // (new TvMediaType())->id;
        $data->show = $this->show;
        $data->srfId = $this->srfId;
        $this->dataId = $data->save();

    }


    protected function onUpdate()
    {

    }


    protected function onIndex()
    {

        //parent::onIndex();

        $row = $this->getDataRow();
        $this->addSearchWord($row->show);

    }


    protected function onDelete()
    {

        parent::onDelete();
        (new ShowDelete())->deleteById($this->dataId);

    }


    protected function onDataRow()
    {

        $this->dataRow = (new ShowReader())->getRowById($this->dataId);

    }


    /**
     * @return \Nemundo\Model\Row\AbstractModelDataRow|ShowRow
     */
    public function getDataRow()
    {
        return parent::getDataRow();
    }


    public function existItem()
    {

        $value = false;

        $count = new ShowCount();
        $count->filter->andEqual($count->model->srfId, $this->srfId);
        if ($count->getCount() > 0) {
            $value = true;

            $id = new ShowId();
            $id->filter->andEqual($id->model->srfId, $this->srfId);
            $this->dataId = $id->getId();

        }

        return $value;

    }


    public function getSubject()
    {

        return $this->getDataRow()->show;

    }

}