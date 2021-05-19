<?php

namespace Nemundo\App\ModelDesigner\Com\Form;


use Nemundo\Admin\Com\Title\AdminSubtitle;
use Nemundo\App\ModelDesigner\Json\AppJson;
use Nemundo\App\ModelDesigner\Type\Form\AbstractModelDesignerTypeFormPart;
use Nemundo\App\ModelDesigner\Type\ModelDesignerTypeTrait;
use Nemundo\App\ModelDesigner\Type\VirtualExternalModelDesignerType;
use Nemundo\Com\Container\LibraryTrait;
use Nemundo\Orm\Model\AbstractOrmModel;
use Nemundo\Orm\Type\Text\TextOrmType;
use Nemundo\Package\Bootstrap\Form\BootstrapForm;
use Nemundo\Package\Bootstrap\FormElement\BootstrapCheckBox;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;
use Nemundo\Project\AbstractProject;

class TypeForm extends BootstrapForm
{

    use LibraryTrait;

    /**
     * @var AbstractProject
     */
    public $project;

    /**
     * @var AppJson
     */
    public $appJson;

    /**
     * @var AbstractOrmModel
     */
    public $model;

    /**
     * @var TextOrmType|ModelDesignerTypeTrait
     */
    public $type;

    /**
     * @var string
     */
    public $tableName;

    /**
     * @var bool
     */
    public $updateMode = false;

    /**
     * @var BootstrapTextBox
     */
    private $fieldLabel;

    /**
     * @var BootstrapTextBox
     */
    private $fieldName;

    /**
     * @var BootstrapTextBox
     */
    private $variableName;

    /**
     * @var BootstrapCheckBox
     */
    private $allowNullValue;

    /**
     * @var AbstractModelDesignerTypeFormPart
     */
    private $formPart;


    public function getContent()
    {

        $this->id = 'type_form';
        $this->addDataAttribute('project', $this->project->projectName);
        $this->addDataAttribute('app', $this->appJson->appName);

        $subtitle = new AdminSubtitle($this);
        $subtitle->content = $this->type->typeLabel;

        $this->fieldLabel = new BootstrapTextBox($this);
        $this->fieldLabel->label = 'Field Label';
        $this->fieldLabel->validation = true;

        $this->fieldName = new BootstrapTextBox($this);
        $this->fieldName->label = 'Field Name';
        $this->fieldName->validation = true;

        $this->variableName = new BootstrapTextBox($this);
        $this->variableName->label = 'Variable Name';
        $this->variableName->validation = true;

        $this->allowNullValue = new BootstrapCheckBox($this);
        $this->allowNullValue->label = 'Allow Null Value';
        //$this->allowNullValue->value = true;

        if ($this->updateMode) {

            $this->fieldLabel->value = $this->type->label;
            $this->fieldName->value = $this->type->fieldName;
            $this->variableName->value = $this->type->variableName;
            $this->allowNullValue->value = $this->type->allowNullValue;

        }

        if ($this->type->isObjectOfTrait(ModelDesignerTypeTrait::class)) {

            $className = $this->type->modelDesignerFormPartClassName;
            $this->formPart = new $className($this);
            $this->formPart->type = $this->type;

        }

        if (!$this->updateMode) {
            $this->addJqueryScript('$("#' . $this->fieldLabel->name . '").keyup(function() {');
            $this->addJqueryScript('value = $("#' . $this->fieldLabel->name . '" ).val();');
            $this->addJqueryScript('value = value.toLowerCase();');
            $this->addJqueryScript('value = value.replace(/ä/g, "ae");');
            $this->addJqueryScript('value = value.replace(/ö/g, "oe");');
            $this->addJqueryScript('value = value.replace(/ü/g, "ue");');
            $this->addJqueryScript('value = value.replace(/é/g, "e");');
            // --> js Code Class

            $this->addJqueryScript('fieldName = value.replace(/ /g, "_");');
            $this->addJqueryScript('variableName = value.toLowerCase().replace(/ (.)/g,  function(letter) { return letter.toUpperCase(); }).replace(/ /g, "");');
            $this->addJqueryScript('$("#' . $this->fieldName->name . '" ).val(fieldName);');
            $this->addJqueryScript('$("#' . $this->variableName->name . '" ).val(variableName);');
            $this->addJqueryScript('});');
        }


        return parent::getContent();

    }


    protected function onValidate()
    {

        $returnValue = parent::onValidate();


        if (!$this->updateMode) {

            foreach ($this->model->getTypeList() as $type) {

                if (!$this->type->isObjectOfClass(VirtualExternalModelDesignerType::class)) {
                    if ($type->fieldName == $this->fieldName->getValue()) {
                        $this->fieldName->showErrorMessage = true;
                        $this->fieldName->errorMessage = 'Field Name already in use';
                        $returnValue = false;
                    }
                }

                if ($type->variableName == $this->variableName->getValue()) {
                    $this->variableName->showErrorMessage = true;
                    $this->variableName->errorMessage = 'Variable Name already in use';
                    $returnValue = false;
                }

            }

        }

        return $returnValue;

    }


    protected function onSubmit()
    {

        if (!$this->updateMode) {

            $this->type->label = $this->fieldLabel->getValue();
            $this->type->fieldName = $this->fieldName->getValue();
            $this->type->variableName = $this->variableName->getValue();
            $this->type->allowNullValue = $this->allowNullValue->getValue();

            if ($this->type->isObjectOfTrait(ModelDesignerTypeTrait::class)) {
                $this->formPart->getJson();
            }

            $this->model->addType($this->type);

        } else {

            $this->type->label = $this->fieldLabel->getValue();
            $this->type->fieldName = $this->fieldName->getValue();
            $this->type->variableName = $this->variableName->getValue();
            $this->type->allowNullValue = $this->allowNullValue->getValue();

            if ($this->type->isObjectOfTrait(ModelDesignerTypeTrait::class)) {
                $this->formPart->getJson();
            }


        }


        $this->appJson->writeJson();

    }

}