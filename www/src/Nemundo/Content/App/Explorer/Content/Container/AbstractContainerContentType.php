<?php

namespace Nemundo\Content\App\Explorer\Content\Container;

use Nemundo\Content\App\Explorer\Data\Container\Container;
use Nemundo\Content\App\Explorer\Data\Container\ContainerCount;
use Nemundo\Content\App\Explorer\Data\Container\ContainerReader;
use Nemundo\Content\App\Explorer\Data\Container\ContainerRow;
use Nemundo\Content\App\Explorer\Data\Container\ContainerUpdate;
use Nemundo\Content\Index\Search\Type\SearchIndexTrait;

use Nemundo\Content\Type\AbstractContentType;
use Nemundo\Content\Type\AbstractSearchContentType;
use Nemundo\Core\Random\UniqueId;

abstract class AbstractContainerContentType extends AbstractSearchContentType  // AbstractContentType  // AbstractContentType  // AbstractConten TreeContentType
{

    //use SearchIndexTrait;

    protected $container;

    protected $description;

    protected function onCreate()
    {

        if ($this->dataId == null) {
            $this->dataId = (new UniqueId())->getUniqueId();
        }

        $data = new Container();
        $data->id = $this->dataId;
        $data->container = $this->container;
        $data->description = $this->description;
        $data->save();

    }

    protected function onUpdate()
    {

        $update = new ContainerUpdate();
        $update->container = $this->container;
        $update->description = $this->description;
        $update->updateById($this->dataId);

        /*
        $type = new ContainerRenameLogContentType();
        $type->itemContentId = $this->getContentId();
        $type->containerNew = $this->container;
        $type->saveType();*/

    }


    protected function onIndex()
    {

        $containerRow = $this->getDataRow();
        $this->addSearchText($containerRow->container);
        $this->addSearchText($containerRow->description);

    }

    protected function onDataRow()
    {
        $this->dataRow = (new ContainerReader())->getRowById($this->dataId);
    }

    /**
     * @return \Nemundo\Model\Row\AbstractModelDataRow|ContainerRow
     */
    public function getDataRow()
    {
        return parent::getDataRow();
    }


    public function getSubject()
    {
        return $this->getDataRow()->container;
    }


    public function existItem()
    {

        $value = false;

        $count = new ContainerCount();
        $count->filter->andEqual($count->model->id, $this->dataId);
        if ($count->getCount() == 1) {
            $value = true;
        }

        return $value;

    }

}