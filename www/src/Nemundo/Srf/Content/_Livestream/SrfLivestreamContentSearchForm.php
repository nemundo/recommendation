<?php


namespace Nemundo\Srf\Content\Livestream;


use Nemundo\Content\Index\Tree\Com\Form\AbstractContentSearchForm;
use Nemundo\Srf\Com\ListBox\RadioLivestreamListBox;

class SrfLivestreamContentSearchForm extends AbstractContentSearchForm
{

    /**
     * @var RadioLivestreamListBox
     */
    private $livestream;

    public function getContent()
    {

        $this->livestream = new RadioLivestreamListBox($this);
        $this->livestream->validation = true;

        return parent::getContent();

    }


    /*protected function loadUpdateForm()
    {
      //  $this->livestream->value = $this->dataId;
    }*/


    protected function onSubmit()
    {

        $this->saveTree($this->livestream->getContentType());

    }

}