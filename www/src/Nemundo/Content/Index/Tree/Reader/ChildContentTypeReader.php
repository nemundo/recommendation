<?php


namespace Nemundo\Content\Index\Tree\Reader;


use Nemundo\Content\Index\Tree\Data\Tree\TreeReader;
use Nemundo\Content\Index\Tree\Data\Tree\TreeRow;

// ContentTypeChldReader
class ChildContentTypeReader extends AbstractParentChildContentTypeReader
{

    protected function getList($contentId, $list)
    {

        $reader = new TreeReader();
        $reader->model->loadChild();
        $reader->model->child->loadContentType();
        $reader->filter->andEqual($reader->model->parentId, $contentId);
        $reader->addOrder($reader->model->itemOrder);
        foreach ($reader->getData() as $treeRow) {
            $list[] = $treeRow->child->getContentType();
        }

        return $list;

    }





    public function getTreeRowList()
    {

        /** @var TreeRow[] $list */
        $list=[];

        $reader = new TreeReader();
        $reader->model->loadChild();
        $reader->model->child->loadContentType();
        $reader->filter->andEqual($reader->model->parentId, $this->contentType->getContentId());
        $reader->addOrder($reader->model->itemOrder);
        foreach ($reader->getData() as $treeRow) {
            $list[] = $treeRow;
        }

        return $list;

    }


}