<?php

namespace Nemundo\App\ModelDesigner\Collection;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Model\Definition\Index\AbstractModelIndex;
use Nemundo\Model\Definition\Index\ModelIndex;
use Nemundo\Model\Definition\Index\ModelSearchIndex;
use Nemundo\Model\Definition\Index\ModelUniqueIndex;

class IndexCollection extends AbstractBase
{

    /**
     * @return AbstractModelIndex[]
     */
    public function getIndexCollection()
    {

        $collection = [];
        $collection[] = new ModelIndex();
        $collection[] = new ModelUniqueIndex();
        $collection[] = new ModelSearchIndex();

        return $collection;

    }

}