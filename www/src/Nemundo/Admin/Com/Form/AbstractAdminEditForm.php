<?php


namespace Nemundo\Admin\Com\Form;


// AbstractSaveEditForm

// AbstractUpdateAdminForm
// AbstractEditForm
abstract class AbstractAdminEditForm extends AbstractAdminForm
{


    // editId
    // updateId
    public $dataId;


    abstract protected function loadUpdateForm();


    abstract protected function onSave();

    // onUpdate
    abstract protected function onUpdate();


    public function getContent()
    {

        if ($this->dataId !== null) {
            $this->loadUpdateForm();
        }

        return parent::getContent();



    }


    final protected function onSubmit()
    {

        if ($this->dataId == null) {
            $this->onSave();
        } else {
            $this->onUpdate();
        }

    }


}