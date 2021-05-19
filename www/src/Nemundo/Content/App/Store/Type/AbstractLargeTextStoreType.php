<?php

namespace Nemundo\Content\App\Store\Type;


use Nemundo\Workflow\App\Store\Data\LargeTextStore\LargeTextStore;
use Nemundo\Workflow\App\Store\Data\LargeTextStore\LargeTextStoreCount;
use Nemundo\Workflow\App\Store\Data\LargeTextStore\LargeTextStoreDelete;
use Nemundo\Workflow\App\Store\Data\LargeTextStore\LargeTextStoreReader;

abstract class AbstractLargeTextStoreType extends AbstractStoreType
{

    public function setValue($value)
    {

        $data = new LargeTextStore();
        $data->updateOnDuplicate = true;
        $data->id = $this->storeId;
        $data->text = $value;
        $data->save();

    }


    public function getValue()
    {

        $value = $this->defaultValue;

        $count = new LargeTextStoreCount();
        $count->filter->andEqual($count->model->id, $this->storeId);

        if ($count->getCount() > 0) {
            $row = (new LargeTextStoreReader())->getRowById($this->storeId);
            $value = $row->text;
        }

        return $value;

    }


    public function hasValue()
    {
        // TODO: Implement hasValue() method.
    }

    public function removeStore()
    {

        (new LargeTextStoreDelete())->deleteById($this->storeId);

        return $this;

    }

}