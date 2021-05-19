<?php

namespace Nemundo\Content\App\Store\Type;


use Nemundo\Workflow\App\Store\Data\TextStore\TextStore;
use Nemundo\Workflow\App\Store\Data\TextStore\TextStoreDelete;
use Nemundo\Workflow\App\Store\Data\TextStore\TextStoreReader;

abstract class AbstractTextStoreType extends AbstractStoreType
{

    public function setValue($value)
    {

        $data = new TextStore();
        $data->updateOnDuplicate = true;
        $data->id = $this->storeId;
        $data->text = $value;
        $data->save();

    }


    public function getValue()
    {

        $value = $this->defaultValue;

        $storeReader = new TextStoreReader();
        $storeReader->filter->andEqual($storeReader->model->id, $this->storeId);
        foreach ($storeReader->getData() as $storeRow) {
            $value = $storeRow->text;
        }

        return $value;

    }


    public function hasValue()
    {
        // TODO: Implement hasValue() method.
    }
    public function removeStore()
    {

        (new TextStoreDelete())->deleteById($this->storeId);

        return $this;

    }

}