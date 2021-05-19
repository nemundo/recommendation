<?php

namespace Nemundo\Content\App\Store\Admin;


use Nemundo\Html\Container\AbstractHtmlContainer;
use Nemundo\Workflow\App\Store\Form\LargeTextStoreForm;
use Nemundo\Workflow\App\Store\Type\AbstractStoreType;

class StoreAdmin extends AbstractHtmlContainer
{

    /**
     * @var AbstractStoreType[]
     */
    private $storeList = [];

    public function addStore(AbstractStoreType $store)
    {
        $this->storeList[] = $store;
        return $this;
    }


    public function getContent()
    {

        /*
        $form = new SearchForm($this);

        $listbox = new BootstrapListBox($form);
        $listbox->label = 'Textbaustein';
        $listbox->submitOnChange = true;
        $listbox->value = $listbox->getValue();

        foreach ($this->storeList as $store) {
            $listbox->addItem($store->storeName);
        }

      $storeId =   $listbox->getValue();*/

        foreach ($this->storeList as $store) {
            //$listbox->addItem($store->storeName);

            $form = new LargeTextStoreForm($this);
            $form->store = $store;

        }


        return parent::getContent();

    }

}