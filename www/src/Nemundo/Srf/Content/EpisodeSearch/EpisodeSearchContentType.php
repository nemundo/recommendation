<?php

namespace Nemundo\Srf\Content\EpisodeSearch;

use Nemundo\Content\Index\Tree\Type\AbstractTreeContentType;

class EpisodeSearchContentType extends AbstractTreeContentType
{
    protected function loadContentType()
    {
        $this->typeLabel = 'SRF EpisodeSearch';
        $this->typeId = '11227556-ae60-42d1-a46e-7e949b62f1f5';
        $this->formClassList[] = EpisodeSearchContentForm::class;
        $this->viewClassList[]  = EpisodeSearchContentView::class;
    }

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
    public function getDataRow()
    {
        return parent::getDataRow();
    }
}