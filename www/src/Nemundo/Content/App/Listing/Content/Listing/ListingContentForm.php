<?php

namespace Nemundo\Content\App\Listing\Content\Listing;

use Nemundo\Content\App\Listing\Com\Form\ListingValueForm;
use Nemundo\Content\Form\AbstractContentContainer;

class ListingContentForm extends AbstractContentContainer
{
    /**
     * @var ListingContentType
     */
    public $contentType;

    public function getContent()
    {


        $form = new ListingValueForm($this);
        $form->listingId = $this->contentType->getDataId();

        return parent::getContent();

    }

    public function onSubmit()
    {
        $this->contentType->saveType();
    }
}