<?php


namespace Nemundo\Content\App\Stream\Index;


use Nemundo\Content\App\Stream\Data\Stream\Stream;
use Nemundo\Content\App\Stream\Data\Stream\StreamDelete;

trait StreamIndexTrait
{


    public function saveStreamIndex() {


        $data=new Stream();
        $data->contentId=$this->getContentId();
        $data->save();


    }


    protected function deleteStreamIndex() {

        $delete=new StreamDelete();
        $delete->filter->andEqual($delete->model->contentId, $this->getContentId());
        $delete->delete();


    }


}