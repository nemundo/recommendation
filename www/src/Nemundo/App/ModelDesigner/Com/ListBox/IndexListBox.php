<?php

namespace Nemundo\App\ModelDesigner\Com\ListBox;


use Nemundo\App\ModelDesigner\Builder\IndexBuilder;
use Nemundo\App\ModelDesigner\Collection\IndexCollection;
use Nemundo\Model\Definition\Index\AbstractModelIndex;
use Nemundo\Package\Bootstrap\FormElement\BootstrapListBox;

class IndexListBox extends BootstrapListBox
{

    public function getContent()
    {

        $this->label = 'Index Type';

        foreach ((new IndexCollection())->getIndexCollection() as $index) {
            $this->addItem($index->indexType, $index->indexLabel);
        }

        return parent::getContent();
    }


    /**
     * @return AbstractModelIndex
     */
    public function getIndex()
    {

        /*$value = null;
        foreach ((new IndexCollection())->getIndexCollection() as $index) {
            if ($index->indexName == $this->getValue()) {
                $value =$index;
            }
        }*/

        $value = (new IndexBuilder())->getIndex($this->getValue());
        return $value;

    }


}