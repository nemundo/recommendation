<?php

namespace Nemundo\App\ModelDesigner\Com\Form;


use Nemundo\App\ModelDesigner\Com\ListBox\IndexListBox;
use Nemundo\App\ModelDesigner\Parameter\AppParameter;
use Nemundo\App\ModelDesigner\Parameter\ModelParameter;
use Nemundo\App\ModelDesigner\Parameter\ProjectParameter;
use Nemundo\Core\Debug\Debug;
use Nemundo\Package\Bootstrap\Form\BootstrapForm;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;

class IndexForm extends BootstrapForm
{

    /**
     * @var BootstrapTextBox
     */
    private $indexName;

    /**
     * @var IndexListBox
     */
    private $indexType;

    public function getContent()
    {

        $this->indexName= new BootstrapTextBox($this);
        $this->indexName->label = 'Index Name';
        $this->indexName->validation=true;

        $this->indexType = new IndexListBox($this);
        $this->indexType->validation=true;

        return parent::getContent();

    }


    protected function onSubmit()
    {

        $project = (new ProjectParameter())->getProject();
        $app = (new AppParameter())->getApp($project);
        $model = (new ModelParameter())->getModel($app);

        $index = $this->indexType->getIndex();
        $index->indexName = $this->indexName->getValue();
        $model->addIndex($index);

        $app->writeJson();

    }

}