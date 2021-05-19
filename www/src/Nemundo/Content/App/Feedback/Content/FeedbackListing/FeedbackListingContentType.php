<?php

namespace Nemundo\Content\App\Feedback\Content\FeedbackListing;

use Nemundo\Content\Form\ContentForm;
use Nemundo\Content\Type\AbstractContentType;

class FeedbackListingContentType extends AbstractContentType
{
    protected function loadContentType()
    {
        $this->typeLabel = 'Feedback Listing';
        $this->typeId = 'f886cfab-ffbc-405a-b556-86451b88e912';
        $this->formClassList[] = ContentForm::class;
        $this->viewClassList[] = FeedbackListingContentView::class;
        $this->dataId=0;
    }

}