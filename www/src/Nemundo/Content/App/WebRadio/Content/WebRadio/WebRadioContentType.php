<?php

namespace Nemundo\Content\App\WebRadio\Content\WebRadio;

use Nemundo\Content\App\WebRadio\Data\WebRadio\WebRadio;
use Nemundo\Content\App\WebRadio\Data\WebRadio\WebRadioDelete;
use Nemundo\Content\App\WebRadio\Data\WebRadio\WebRadioReader;
use Nemundo\Content\App\WebRadio\Data\WebRadio\WebRadioRow;
use Nemundo\Content\App\WebRadio\Data\WebRadio\WebRadioUpdate;
use Nemundo\Content\Index\Tree\Com\Form\ContentSearchForm;
use Nemundo\Content\Type\AbstractSearchContentType;

class WebRadioContentType extends AbstractSearchContentType
{

    //use JsonContentTrait;

    public $webRadio;

    public $streamUrl;

    protected function loadContentType()
    {
        $this->typeLabel = 'Web Radio';
        $this->typeId = 'fc084e18-1760-49a3-87a6-189e9bdff9fe';
        $this->formClassList[] = WebRadioContentForm::class;
        $this->formClassList[] = ContentSearchForm::class;
        $this->viewClassList[] = WebRadioContentView::class;
    }

    protected function onCreate()
    {

        $data = new WebRadio();
        $data->webRadio = $this->webRadio;
        $data->streamUrl = $this->streamUrl;
        $this->dataId = $data->save();

    }

    protected function onUpdate()
    {

        $update = new WebRadioUpdate();
        $update->webRadio = $this->webRadio;
        $update->streamUrl = $this->streamUrl;
        $update->updateById($this->dataId);

    }

    protected function onIndex()
    {

        $this->addSearchText($this->getDataRow()->webRadio);

    }


    protected function onDelete()
    {
        (new WebRadioDelete())->deleteById($this->dataId);
    }


    protected function onDataRow()
    {
        $this->dataRow = (new WebRadioReader())->getRowById($this->dataId);
    }

    /**
     * @return \Nemundo\Model\Row\AbstractModelDataRow|WebRadioRow
     */
    public function getDataRow()
    {
        return parent::getDataRow();
    }

    public function getSubject()
    {
        return $this->getDataRow()->webRadio;
    }


    public function getData()
    {

        $webradioRow = $this->getDataRow();

        $data = [];
        $data['id'] = $webradioRow->id;
        $data['web_radio'] = $webradioRow->webRadio;
        $data['stream_url'] = $webradioRow->streamUrl;

        return $data;

    }


    public function importJson($data)
    {

        $this->webRadio = $data['web_radio'];
        $this->streamUrl = $data['stream_url'];
        $this->saveType();

    }


}