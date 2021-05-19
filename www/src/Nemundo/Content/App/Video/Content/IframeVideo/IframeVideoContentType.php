<?php

namespace Nemundo\Content\App\Video\Content\IframeVideo;

use Nemundo\Content\App\Video\Data\IframeVideo\IframeVideo;
use Nemundo\Content\App\Video\Data\IframeVideo\IframeVideoDelete;
use Nemundo\Content\App\Video\Data\IframeVideo\IframeVideoReader;
use Nemundo\Content\App\Video\Data\IframeVideo\IframeVideoRow;
use Nemundo\Content\App\Video\Data\IframeVideo\IframeVideoUpdate;
use Nemundo\Content\Index\Tree\Com\Form\ContentSearchForm;
use Nemundo\Content\Type\AbstractContentType;
use Nemundo\Content\Type\AbstractSearchContentType;

class IframeVideoContentType extends AbstractSearchContentType
{

    public $subject;

    public $sourceUrl;

    protected function loadContentType()
    {
        $this->typeLabel = 'Iframe Embedded Video';
        $this->typeId = '71cf690b-c920-44cb-afbf-813a317cd882';
        $this->formClassList[] = IframeVideoContentForm::class;
        $this->formClassList[]=ContentSearchForm::class;
        $this->viewClassList[] = IframeVideoContentView::class;
    }

    protected function onCreate()
    {

        $data = new IframeVideo();
        $data->subject=$this->subject;
        $data->sourceUrl = $this->sourceUrl;
        $this->dataId = $data->save();

    }

    protected function onUpdate()
    {

        $update = new IframeVideoUpdate();
        $update->subject=$this->subject;
        $update->sourceUrl = $this->sourceUrl;
        $update->updateById($this->dataId);

    }

    protected function onDelete()
    {

        (new IframeVideoDelete())->deleteById($this->dataId);

    }

    protected function onIndex()
    {

        $this->addSearchText($this->getSubject());

    }

    protected function onDataRow()
    {

        $this->dataRow = (new IframeVideoReader())->getRowById($this->dataId);

    }

    /**
     * @return \Nemundo\Model\Row\AbstractModelDataRow|IframeVideoRow
     */
    public function getDataRow()
    {
        return parent::getDataRow();
    }


    public function getSubject()
    {

        return $this->getDataRow()->subject;

    }


}