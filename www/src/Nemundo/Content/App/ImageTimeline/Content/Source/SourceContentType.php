<?php

namespace Nemundo\Content\App\ImageTimeline\Content\Source;

use Nemundo\Content\App\ImageTimeline\Data\Source\Source;
use Nemundo\Content\Type\AbstractContentType;

class SourceContentType extends AbstractContentType
{

    public $source;

    protected function loadContentType()
    {
        $this->typeLabel = 'Source';
        $this->typeId = '406020d1-52e4-4788-b397-3a879895270e';
        $this->formClassList[] = SourceContentForm::class;
        $this->viewClassList[] = SourceContentView::class;
    }

    protected function onCreate()
    {

        $data=new Source();
        $data->source=$this->source;
        $this->dataId=$data->save();


    }

    protected function onUpdate()
    {
    }

    protected function onDelete()
    {
    }

    protected function onIndex()
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