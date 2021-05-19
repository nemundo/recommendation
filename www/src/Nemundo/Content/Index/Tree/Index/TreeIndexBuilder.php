<?php


namespace Nemundo\Content\Index\Tree\Index;


use Nemundo\Content\Builder\ContentBuilder;
use Nemundo\Content\Data\ContentView\ContentViewReader;
use Nemundo\Content\Index\Tree\Data\Tree\Tree;
use Nemundo\Content\Index\Tree\Data\Tree\TreeCount;
use Nemundo\Content\Index\Tree\Data\Tree\TreeDelete;
use Nemundo\Content\Index\Tree\Data\Tree\TreeValue;
use Nemundo\Content\Type\Index\AbstractIndexBuilder;
use Nemundo\Core\Base\AbstractBase;

// TreeBuilder
class TreeIndexBuilder extends AbstractIndexBuilder
{

    public $parentId;

    //public $childId;

//    public $viewId;

    public function buildIndex()
    {

        $value = new TreeValue();
        $value->field = $value->model->itemOrder;
        $value->filter->andEqual($value->model->parentId, $this->parentId);
        $itemOrder = $value->getMaxValue();

        if ($itemOrder == '') {
            $itemOrder = -1;
        }
        $itemOrder++;


        //$content = (new ContentBuilder())->getContent($this->childId);


        /*
        $viewId = 0;
        $reader = new ContentViewReader();
        $reader->filter->andEqual($reader->model->contentTypeId, $content->typeId);
        $reader->limit=1;
        foreach ($reader->getData() as $viewRow) {
            $viewId = $viewRow->id;
        }*/


        $data = new Tree();
        //$data->ignoreIfExists = true;
        $data->parentId = $this->parentId;
        $data->childId =$this->contentType->getContentId();   // $this->childId;
        $data->itemOrder = $itemOrder;
        $data->viewId = $this->contentType->getDefaultViewId();  // $content->getDefaultViewId();  // $viewId;  //  $this->viewId;
        $data->save();


    }


    public function exist()
    {


        $value = false;

        $count = new TreeCount();
        $count->filter->andEqual($count->model->parentId, $this->parentId);
        $count->filter->andEqual($count->model->childId, $this->contentType->getContentId());   // $this->childId);
        if ($count->getCount() > 0) {
            $value = true;
        }

        return $value;

    }



    public function deleteIndex()
    {

        $delete = new TreeDelete();
        $delete->filter->orEqual($delete->model->parentId, $this->parentId);
        $delete->filter->orEqual($delete->model->childId, $this->contentType->getContentId());
        $delete->delete();

        // TODO: Implement deleteIndex() method.
    }

}