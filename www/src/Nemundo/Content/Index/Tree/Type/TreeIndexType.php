<?php


namespace Nemundo\Content\Index\Tree\Type;


use Nemundo\Content\Index\Tree\Index\TreeIndexBuilder;
use Nemundo\Content\Type\Index\AbstractIndexType;

class TreeIndexType extends AbstractIndexType
{

    protected function loadIndexType()
    {
        $this->indexId='29e8b757-af09-47ac-9d56-94e5a92f466a';
        $this->indexLabel='Tree';
        $this->indexBuilderClass=TreeIndexBuilder::class;
        // TODO: Implement loadIndexType() method.
    }

}