<?php

namespace Nemundo\Content\App\Explorer\Store;


use Nemundo\Content\App\Store\Type\AbstractNumberStoreType;

class HomeContentIdStore extends AbstractNumberStoreType
{

    protected function loadStore()
    {

        $this->storeLabel = 'Home Content Id';
        $this->storeId = '542a963c-f44f-407d-b9a3-aa1f95c81df4';

    }

}