<?php

namespace Nemundo\Srf\Content\RadioShow;

use Nemundo\Content\Index\Tree\Type\AbstractTreeContentType;
use Nemundo\Srf\Content\Base\AbstractShowContentType;
use Nemundo\Srf\MediaType\RadioMediaType;


// SrfRadioShow
class RadioShowContentType extends AbstractShowContentType  // AbstractTreeContentType
{
    protected function loadContentType()
    {

parent::loadContentType();

        $this->typeLabel = 'RadioShow';
        $this->typeId = '30b6969f-20ed-466d-ad38-78fb519ed897';

        //$this->viewClassList[]  = RadioShowContentView::class;

        $this->mediaType=new RadioMediaType();

    }


    /*
    protected function onCreate()
    {
    }

    protected function onUpdate()
    {
    }

    protected function onDataRow()
    {
    }

    /**
     * @return \Nemundo\Model\Row\AbstractModelDataRow
     */
    /*public function getDataRow()
    {
        return parent::getDataRow();
    }*/

}