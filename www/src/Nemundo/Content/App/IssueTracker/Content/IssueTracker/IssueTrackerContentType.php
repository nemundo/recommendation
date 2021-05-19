<?php

namespace Nemundo\Content\App\IssueTracker\Content\IssueTracker;

use Nemundo\Content\Form\ContentForm;
use Nemundo\Content\Type\AbstractContentType;

class IssueTrackerContentType extends AbstractContentType
{
    protected function loadContentType()
    {
        $this->typeLabel = 'IssueTracker App (Issue Listing)';
        $this->typeId = '98ccfb9d-6bb9-4263-8f37-2564c772e719';

        $this->formClassList[] = ContentForm::class;  // IssueTrackerContentForm::class;
        $this->viewClassList[] = IssueTrackerContentView::class;
        $this->viewClassList[] = IssueTrackerAllContentView::class;

        $this->dataId=0;

    }


}