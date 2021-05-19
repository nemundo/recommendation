<?php


namespace Nemundo\Srf\Widget;


use Nemundo\Admin\Com\Widget\AdminWidget;
use Nemundo\Com\Container\LibraryTrait;
use Nemundo\Html\Iframe\Iframe;
use Nemundo\Package\Bootstrap\FormElement\BootstrapListBox;
use Nemundo\Package\NemundoJs\NemundoJsPackage;
use Nemundo\Srf\Data\RadioLivestream\RadioLivestreamReader;
use Nemundo\Srf\Package\SrfPackage;

class RadioLivestreamWidget extends AdminWidget
{

    use LibraryTrait;

    protected function loadWidget()
    {
        $this->widgetTitle = 'Srf Radio Livestream';
    }


    public function getContent()
    {

        $this->addPackage(new NemundoJsPackage());
        $this->addPackage(new SrfPackage());

        $listbox = new BootstrapListBox($this);
        $listbox->inputId = 'livestream_input';
        $reader = new RadioLivestreamReader();
        foreach ($reader->getData() as $livestreamRow) {
            $listbox->addItem($livestreamRow->urn, $livestreamRow->livestream);
        }

        $player = new Iframe($this);
        $player->id = 'livestream_player';
        $player->width = '100%';

        return parent::getContent();

    }

}