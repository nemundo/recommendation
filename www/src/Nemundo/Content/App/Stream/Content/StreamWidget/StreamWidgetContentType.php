<?php

namespace Nemundo\Content\App\Stream\Content\StreamWidget;

use Nemundo\Content\App\Stream\Data\StreamWidget\StreamWidgetReader;
use Nemundo\Content\App\Stream\Data\StreamWidget\StreamWidgetRow;
use Nemundo\Content\App\Stream\Site\StreamSite;
use Nemundo\Content\Type\AbstractContentType;

class StreamWidgetContentType extends AbstractContentType
{
    protected function loadContentType()
    {
        $this->typeLabel = 'Stream Widget';
        $this->typeId = 'e224c94d-c8db-4a1b-b1b6-5e207ea1a9ba';
        $this->formClassList[] = StreamWidgetContentForm::class;
        $this->viewClassList[] = StreamWidgetContentView::class;

        $this->viewSite=StreamSite::$site;

    }

    protected function onCreate()
    {



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
        $this->dataRow=(new StreamWidgetReader())->getRowById($this->dataId);
    }

    /**
     * @return \Nemundo\Model\Row\AbstractModelDataRow|StreamWidgetRow
     */
    public function getDataRow()
    {
        return parent::getDataRow();
    }
}