<?php

namespace Nemundo\Content\App\Contact\Content\Phone;

use Nemundo\Content\App\Contact\Data\Phone\Phone;
use Nemundo\Content\App\Contact\Data\Phone\PhoneReader;
use Nemundo\Content\App\Contact\Data\Phone\PhoneRow;
use Nemundo\Content\Type\AbstractContentType;

class PhoneContentType extends AbstractContentType
{

    public $label;

    public $phone;

    protected function loadContentType()
    {
        $this->typeLabel = 'Phone';
        $this->typeId = '8c5cb075-94e6-4178-8d1b-11950cf027bd';
        $this->formClassList[] = PhoneContentForm::class;
        $this->viewClassList[]  = PhoneContentView::class;
        $this->listingClass=PhoneContentListing::class;
    }

    protected function onCreate()
    {

        $data=new Phone();
        $data->phone=$this->phone;
        $this->dataId=$data->save();

    }

    protected function onUpdate()
    {
    }

    protected function onDataRow()
    {
        $this->dataRow=(new PhoneReader())->getRowById($this->dataId);
    }

    /**
     * @return \Nemundo\Model\Row\AbstractModelDataRow|PhoneRow
     */
    public function getDataRow()
    {
        return parent::getDataRow();
    }

    public function getSubject()
    {
        return $this->getDataRow()->phone;
    }


}