<?php

namespace Nemundo\Content\Index\Tree\Action\ViewChange;


use Nemundo\Content\Action\AbstractContentAction;
use Nemundo\Content\Index\Tree\Com\Form\ContentViewChangeForm;

class ViewChangeContentAction extends AbstractContentAction
{

    protected function loadContentType()
    {

        $this->typeLabel='Tree View Change Content Action';
        $this->typeId='905d3d1b-6e4b-4594-92b4-339532361d96';

        $this->actionLabel='Change View';
        $this->formClassList[]= ViewChangeContentForm::class;

    }


}