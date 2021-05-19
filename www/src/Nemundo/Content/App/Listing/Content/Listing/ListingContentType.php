<?php

namespace Nemundo\Content\App\Listing\Content\Listing;

use Nemundo\Content\App\Listing\Data\Listing\Listing;
use Nemundo\Content\Type\AbstractContentType;


class ListingContentType extends AbstractContentType
{

    public $listing;

    protected function loadContentType()
    {
        $this->typeLabel = 'Listing';
        $this->typeId = 'a5d2de62-8290-4ff3-ad9b-41f5a9c3aeb1';
        $this->formClassList[] = ListingContentForm::class;
        $this->viewClassList[]  = ListingContentView::class;
    }

    protected function onCreate()
    {

        $data=new Listing();
        $this->dataId=$data->save();

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
    public function getDataRow()
    {
        return parent::getDataRow();
    }
}