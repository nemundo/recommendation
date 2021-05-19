<?php

namespace Nemundo\Content\App\Video\Content\Vimeo;


use Nemundo\Content\App\Video\Data\Vimeo\Vimeo;
use Nemundo\Content\App\Video\Data\Vimeo\VimeoDelete;
use Nemundo\Content\App\Video\Data\Vimeo\VimeoReader;
use Nemundo\Content\App\Video\Data\Vimeo\VimeoRow;
use Nemundo\Content\App\Video\Data\Vimeo\VimeoUpdate;
use Nemundo\Content\Index\Tree\Com\Form\ContentSearchForm;
use Nemundo\Content\Type\AbstractContentType;
use Nemundo\Content\View\Listing\ContentListing;

class VimeoContentType extends AbstractContentType
{

    public $vimeoId;

    protected function loadContentType()
    {

        $this->typeLabel = 'Vimeo';
        $this->typeId = 'c72d0d4b-3f76-474a-ba04-5b9139458532';

        $this->formClassList[] = VimeoContentForm::class;
        $this->formClassList[] = ContentSearchForm::class;
        $this->viewClassList[] = VimeoContentView::class;
        $this->listingClass = ContentListing::class;

    }


    protected function onCreate()
    {

        $data = new Vimeo();
        $data->vimeoId = $this->vimeoId;
        $this->dataId = $data->save();

    }


    protected function onUpdate()
    {

        $update = new VimeoUpdate();
        $update->vimeoId = $this->vimeoId;
        $update->updateById($this->dataId);

    }

    protected function onDelete()
    {
        (new VimeoDelete())->deleteById($this->dataId);
    }


    protected function onDataRow()
    {
        $this->dataRow = (new VimeoReader())->getRowById($this->dataId);
    }


    /**
     * @return \Nemundo\Model\Row\AbstractModelDataRow|VimeoRow
     */
    public function getDataRow()
    {
        return parent::getDataRow();
    }


    public function getSubject()
    {
        return $this->getDataRow()->vimeoId;
    }

}