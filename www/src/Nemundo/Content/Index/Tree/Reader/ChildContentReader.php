<?php

namespace Nemundo\Content\Index\Tree\Reader;


use Nemundo\Content\Index\Tree\Data\Tree\TreeReader;

class ChildContentReader extends AbstractParentChildContentReader
{


    protected function loadData()
    {

        $reader = new TreeReader();
        $reader->model->loadChild();
        $reader->model->child->loadContentType();
        $reader->model->loadView();
        $reader->filter->andEqual($reader->model->parentId, $this->contentType->getContentId());
        $reader->addOrder($reader->model->itemOrder);
        $reader->limit = $this->limit;
        foreach ($reader->getData() as $treeRow) {
            $this->addItem($treeRow);
        }

    }

}