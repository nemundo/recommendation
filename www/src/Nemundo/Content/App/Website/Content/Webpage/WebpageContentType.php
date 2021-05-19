<?php

namespace Nemundo\Content\App\Website\Content\Webpage;

use Nemundo\Content\App\Website\Data\Webpage\Webpage;
use Nemundo\Content\App\Website\Data\Webpage\WebpageReader;
use Nemundo\Content\App\Website\Data\Webpage\WebpageRow;
use Nemundo\Content\Type\AbstractContentType;


class WebpageContentType extends AbstractContentType
{

    public $title;

    public $description;

    protected function loadContentType()
    {
        $this->typeLabel = 'Webpage';
        $this->typeId = '2a99adad-8455-401d-be49-c39ad46cfb60';
        $this->formClassList[] = WebpageContentForm::class;
        $this->viewClassList[]  = WebpageContentView::class;
    }

    protected function onCreate()
    {

        $data=new Webpage();
        $data->title=$this->title;
        $data->description=$this->description;
        $this->dataId=$data->save();

    }

    protected function onUpdate()
    {
    }

    protected function onDataRow()
    {
        $this->dataRow=(new WebpageReader())->getRowById($this->dataId);
    }

    /**
     * @return \Nemundo\Model\Row\AbstractModelDataRow|WebpageRow
     */
    public function getDataRow()
    {
        return parent::getDataRow();
    }


    public function getSubject()
    {
        return $this->getDataRow()->title;
    }


}