<?php

namespace Nemundo\Admin\Com\Button;


use Nemundo\Com\Container\ContainerUserRestrictionTrait;
use Nemundo\Package\Bootstrap\Button\BootstrapButtonSize;
use Nemundo\Package\Bootstrap\FormElement\BootstrapSubmitButton;

class AdminSubmitButton extends BootstrapSubmitButton
{

    use ContainerUserRestrictionTrait;

    public function getContent()
    {

        /*
         *  WIEDER AKTIEVEREN
        if (!parent::checkUserVisibility()) {
            $this->disabled = true;
        }*/
        $this->checkContainerVisibility();

        $this->size = BootstrapButtonSize::SMALL;

        return parent::getContent();

    }


    public function checkUserVisibility()
    {


        //  $this->disabled = true;
        //(new Debug())->write('check');
        //exit;

        //  $value = parent::checkUserVisibility();

        //  $value = parent::checkVisibility();

        /*  if (!parent::checkUserVisibility()) {
              $this->disabled = true;
          }*/

        return true;

    }

}