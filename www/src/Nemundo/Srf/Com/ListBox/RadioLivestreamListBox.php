<?php


namespace Nemundo\Srf\Com\ListBox;


use Nemundo\Package\Bootstrap\FormElement\BootstrapListBox;
use Nemundo\Srf\Content\Livestream\SrfLivestreamContentType;
use Nemundo\Srf\Data\RadioLivestream\RadioLivestreamReader;

class RadioLivestreamListBox extends BootstrapListBox
{


    protected function loadContainer()
    {
        parent::loadContainer();

        $this->label = 'Livestream';

        $reader = new RadioLivestreamReader();
        $reader->addOrder($reader->model->livestream);
        foreach ($reader->getData() as $livestreamRow) {
            $this->addItem($livestreamRow->id, $livestreamRow->livestream);
        }

    }


    public function getContentType() {


        return (new SrfLivestreamContentType($this->getValue()));

    }


}