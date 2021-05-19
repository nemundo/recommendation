<?php

namespace Nemundo\App\ModelDesigner\Builder;


use Nemundo\App\ModelDesigner\Collection\IndexCollection;
use Nemundo\Core\Base\AbstractBase;

class IndexBuilder extends AbstractBase
{

    public function getIndex($indexName) {

        $value = null;
        foreach ((new IndexCollection())->getIndexCollection() as $index) {
            if ($index->indexType == $indexName) {
                $value =$index;
            }
        }

        return $value;

    }

}