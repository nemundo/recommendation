<?php

namespace Nemundo\Content\App\Contact\Content\Phone;

use Nemundo\Com\Html\Hyperlink\PhoneHyperlink;
use Nemundo\Content\View\AbstractContentView;

class PhoneContentView extends AbstractContentView
{
    /**
     * @var PhoneContentType
     */
    public $contentType;


    protected function loadView()
    {
        $this->viewName='';
        $this->viewId='';
        $this->defaultView=true;
    }


    public function getContent()
    {

        $phone=new PhoneHyperlink($this);
        $phone->phone=$this->contentType->getDataRow()->phone;

        return parent::getContent();
    }
}