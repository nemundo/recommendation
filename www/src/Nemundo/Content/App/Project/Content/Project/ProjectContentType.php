<?php

namespace Nemundo\Content\App\Project\Content\Project;

use Nemundo\Content\App\Project\Content\ProjectPhase\ProjectPhaseContentType;
use Nemundo\Content\App\Project\Data\Project\Project;
use Nemundo\Content\App\Project\Data\Project\ProjectReader;
use Nemundo\Content\App\Project\Data\Project\ProjectRow;
use Nemundo\Content\Type\AbstractContentType;


class ProjectContentType extends AbstractContentType
{

    //use GroupIndexTrait;
    //use DocumentGroupIndexTrait;

    public $project;


    protected function loadContentType()
    {
        $this->typeLabel = 'Project';
        $this->typeId = 'f88b8821-b6d1-4cb9-bece-6a1e1fba96b5';
        $this->formClassList[] = ProjectContentForm::class;
        $this->viewClassList[]  = ProjectContentView::class;


        $this->restrictedChild=true;
        $this->addRestrictedContentType(new ProjectPhaseContentType());

    }

    protected function onCreate()
    {

        $data=new Project();
        $data->project=$this->project;
        $this->dataId=$data->save();


    }

    protected function onUpdate()
    {
    }


    protected function onIndex()
    {

        /*$this->saveGroupIndex();
        $this->saveGroupDocumentIndex();*/

    }

    protected function onDataRow()
    {
        $this->dataRow=(new ProjectReader())->getRowById($this->dataId);
    }

    /**
     * @return \Nemundo\Model\Row\AbstractModelDataRow|ProjectRow
     */
    public function getDataRow()
    {
        return parent::getDataRow();
    }


    public function getSubject()
    {
        return $this->getDataRow()->project;
    }


}