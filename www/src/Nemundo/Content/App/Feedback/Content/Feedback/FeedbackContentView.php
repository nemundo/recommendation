<?php

namespace Nemundo\Content\App\Feedback\Content\Feedback;

use Nemundo\Admin\Com\Table\AdminLabelValueTable;
use Nemundo\Content\View\AbstractContentView;
use Nemundo\Core\Type\Text\Html;

class FeedbackContentView extends AbstractContentView
{
    /**
     * @var FeedbackContentType
     */
    public $contentType;

    protected function loadView()
    {

        $this->viewName = 'default';
        $this->viewId = '5d813269-8fe1-4ebf-97e1-2d9781bc9379';
        $this->defaultView = true;

    }


    public function getContent()
    {

        $feedbackRow = $this->contentType->getDataRow();

        $table = new AdminLabelValueTable($this);
        $table->addLabelValue($feedbackRow->model->contact->label, $feedbackRow->contact);
        $table->addLabelValue($feedbackRow->model->email->label, $feedbackRow->email);
        $table->addLabelValue($feedbackRow->model->message->label, (new Html( $feedbackRow->message))->getValue());

        return parent::getContent();
    }
}