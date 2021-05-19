<?php

namespace Nemundo\Content\Index\Tree\Item;


use Nemundo\Content\Data\Content\ContentDelete;
use Nemundo\Content\Index\Tree\Data\Tree\TreeDelete;
use Nemundo\Core\Base\AbstractBase;

class TreeItem extends AbstractBase
{

    public $contentId;

    public function __construct($contentId)
    {
        $this->contentId=$contentId;
    }


    // delete by contentId


    public function removeFromParent()
    {

        $delete = new TreeDelete();
        $delete->filter->andEqual($delete->model->childId, $this->contentId);
        $delete->delete();

    }





}