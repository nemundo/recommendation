<?php


namespace Nemundo\Content\App\Feed\Content\Feed;


use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;
use Nemundo\Content\Form\AbstractContentForm;

class FeedContentForm extends AbstractContentForm
{

    /**
     * @var FeedContentType
     */
    public $contentType;

    /**
     * @var BootstrapTextBox
     */
    private $rssUrl;

    public function getContent()
    {

        $this->rssUrl=new BootstrapTextBox($this);
        $this->rssUrl->label='RSS Url';
        $this->rssUrl->validation=true;


        // check if valid rss

        return parent::getContent();

    }





    protected function onSubmit()
    {

        $this->contentType->feedUrl = $this->rssUrl->getValue();
        $this->contentType->feedTitle='[No Feed Title]';
        $this->contentType->saveType();

    }


}