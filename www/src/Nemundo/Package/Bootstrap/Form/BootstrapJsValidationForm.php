<?php

namespace Nemundo\Package\Bootstrap\Form;


use Nemundo\Com\ComConfig;
use Nemundo\Com\Container\LibraryTrait;
use Nemundo\Com\FormBuilder\Item\AbstractFormBuilderItem;
use Nemundo\Package\Jquery\Event\ClickJqueryEvent;

class BootstrapJsValidationForm extends BootstrapForm
{

    use LibraryTrait;


    public function getContent()
    {

        $this->submitButton->id = 'form_submit';

        $event = new ClickJqueryEvent();
        $event->eventId = $this->submitButton->id;
        $event->returnFalse = false;

        $event->addCodeLine('console.log("click");');


        $event->addCodeLine('foundError = false;');

        /** @var AbstractFormBuilderItem $container */
        foreach ($this->getContainerList() as $container) {

            if ($container->isObjectOfClass(AbstractFormBuilderItem::class)) {

                if ($container->validation) {

                    $container->showErrorMessage = true;

                    $labelId = 'label_' . $container->name;


                    $event->addCodeLine('if ($("#' . $container->name . '").val() == "") {');
                    $event->addCodeLine('console.log("error: ' . $container->name . '");');
                    $event->addCodeLine('$("#' . $labelId . '").children("b").html("' . ComConfig::$errorMessageIsValue . '");');
                    $event->addCodeLine('foundError = true;');
                    $event->addCodeLine('} else {');
                    $event->addCodeLine('$("#' . $labelId . '").children("b").html("");');
                    $event->addCodeLine('}');

                }

            }

        }

        $event->addCodeLine('if (foundError) {');
        $event->addCodeLine('event.preventDefault();');
        $event->addCodeLine('}');

        $this->addJqueryCode($event);

        return parent::getContent();

    }


}