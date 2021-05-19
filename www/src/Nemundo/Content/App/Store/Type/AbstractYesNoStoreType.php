<?php

namespace Nemundo\Content\App\Store\Type;


use Nemundo\Workflow\App\Store\Data\YesNoStore\YesNoStore;
use Nemundo\Workflow\App\Store\Data\YesNoStore\YesNoStoreDelete;
use Nemundo\Workflow\App\Store\Data\YesNoStore\YesNoStoreReader;

abstract class AbstractYesNoStoreType extends AbstractStoreType
{

    /**
     * @var bool
     */
    protected $defaultValue = false;

    public function setValue($value)
    {


        $data = new YesNoStore();
        $data->updateOnDuplicate = true;
        $data->id = $this->storeId;
        $data->value = $value;
        $data->save();

    }


    public function getValue()
    {

        $value = $this->defaultValue;


        $storeReader = new YesNoStoreReader();
        $storeReader->filter->andEqual($storeReader->model->id, $this->storeId);
        foreach ($storeReader->getData() as $storeRow) {
            $value = $storeRow->value;
        }

        return $value;

    }

    public function hasValue()
    {
        // TODO: Implement hasValue() method.
    }

    public function removeStore()
    {

        (new YesNoStoreDelete())->deleteById($this->storeId);

        return $this;

    }

}