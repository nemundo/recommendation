<?php

namespace Nemundo\Content\App\Project\Content\ProjectPhase;

use Nemundo\Content\App\Project\Data\ProjectPhase\ProjectPhase;
use Nemundo\Content\App\Project\Data\ProjectPhase\ProjectPhaseReader;
use Nemundo\Content\App\Project\Data\ProjectPhase\ProjectPhaseRow;
use Nemundo\Content\Type\AbstractContentType;


class ProjectPhaseContentType extends AbstractContentType
{

    public $projectId;

    public $projectPhase;



    protected function loadContentType()
    {
        $this->typeLabel = 'ProjectPhase';
        $this->typeId = '6a16cf0e-bffb-4d2b-aeac-fcf651c072db';
        $this->formClassList[] = ProjectPhaseContentForm::class;
        $this->viewClassList[]  = ProjectPhaseContentView::class;
    }

    protected function onCreate()
    {

        $data=new ProjectPhase();
        //$data->projectId= $this->getParentDataId();  //  $this->projectId;
        $data->projectPhase=$this->projectPhase;
        $this->dataId=$data->save();


    }

    protected function onUpdate()
    {
    }

    protected function onDataRow()
    {
        $this->dataRow=(new ProjectPhaseReader())->getRowById($this->dataId);
    }

    /**
     * @return \Nemundo\Model\Row\AbstractModelDataRow|ProjectPhaseRow
     */
    public function getDataRow()
    {
        return parent::getDataRow();
    }


    public function getSubject()
    {
        return $this->getDataRow()->projectPhase;
    }

}