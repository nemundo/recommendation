<?php

namespace Nemundo\User\Reader;


use Nemundo\Core\Base\DataSource\AbstractDataSource;
use Nemundo\User\Data\User\UserReader;
use Nemundo\User\Type\UserItemType;

class UserTypeReader extends AbstractDataSource
{


    /**
     * @return UserItemType[]
     */
    public function getData()
    {
        return parent::getData();
    }


    protected function loadData()
    {

        $userReader = new UserReader();
        foreach ($userReader->getData() as $userRow) {

            $userType = new UserItemType();  //($userRow->id);
            $userType->fromUserRow($userRow);

            $this->addItem($userType);


        }


    }


}