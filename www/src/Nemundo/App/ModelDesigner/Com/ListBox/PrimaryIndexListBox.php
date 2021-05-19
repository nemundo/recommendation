<?php

namespace Nemundo\App\ModelDesigner\Com\ListBox;


use Nemundo\App\ModelDesigner\Collection\PrimaryIndexCollection;
use Nemundo\Core\Debug\Debug;
use Nemundo\Db\Index\AbstractPrimaryIndex;
use Nemundo\Package\Bootstrap\FormElement\BootstrapListBox;

class PrimaryIndexListBox extends BootstrapListBox
{

    public function getContent()
    {

        $this->label = 'Primary Index';
        $this->validation = true;
        $this->emptyValueAsDefault = false;

        foreach ((new PrimaryIndexCollection())->getPrimaryIndexCollection() as $primaryIndex) {
            $this->addItem($primaryIndex->primaryIndexName, $primaryIndex->primaryIndexLabel);
        }

        return parent::getContent();

    }


    public function getPrimaryIndex()
    {

        $value = null;

        foreach ((new PrimaryIndexCollection())->getPrimaryIndexCollection() as $primaryIndex) {
            if ($primaryIndex->primaryIndexName == $this->getValue()) {
                $value = $primaryIndex;
            }
        }


        if ($value == null) {
            (new Debug())->write('no index');
        }

        return $value;


    }


}