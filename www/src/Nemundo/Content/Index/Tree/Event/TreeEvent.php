<?php


namespace Nemundo\Content\Index\Tree\Event;


use Nemundo\Content\Event\AbstractContentEvent;
use Nemundo\Content\Index\Tree\Data\Tree\Tree;

use Nemundo\Content\Index\Tree\Index\TreeIndexBuilder;
use Nemundo\Content\Type\AbstractContentType;
use Nemundo\Content\Type\AbstractType;

class TreeEvent extends AbstractContentEvent
{

    public $parentId;

    /**
     * @param AbstractType|AbstractContentType $contentType
     */
    public function onCreate(AbstractType $contentType)
    {


        $builder = new TreeIndexBuilder($contentType);
        $builder->parentId = $this->parentId;
        //$builder->childId = $contentType->getContentId();
        $builder->buildIndex();

    }

}