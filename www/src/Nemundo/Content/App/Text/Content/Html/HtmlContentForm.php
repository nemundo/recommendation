<?php


namespace Nemundo\Content\App\Text\Content\Html;


use Nemundo\Package\Bootstrap\FormElement\BootstrapLargeTextBox;
use Nemundo\Content\Form\AbstractContentForm;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;

class HtmlContentForm extends AbstractContentForm
{

    /**
     * @var BootstrapTextBox
     */
    private $subject;

    /**
     * @var BootstrapLargeTextBox
     */
    private $html;

    /**
     * @var HtmlContentType
     */
    public $contentType;

    public function getContent()
    {

        $this->subject=new BootstrapTextBox($this);
        $this->subject->label = 'Subject';

        $this->html = new BootstrapLargeTextBox($this);
        $this->html->label = 'Html';

        return parent::getContent();
    }


    protected function loadUpdateForm()
    {

        $largeTextRow = $this->contentType->getDataRow();
        $this->subject->value=$largeTextRow->subject;
        $this->html->value = $largeTextRow->largeText;

    }

    protected function onSubmit()
    {

        $this->contentType->subject = $this->subject->getValue();
        $this->contentType->html = $this->html->getValue();
        $this->contentType->saveType();

    }

}