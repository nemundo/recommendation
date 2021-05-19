<?php

namespace Nemundo\Content\App\Podcast\Content\Podcast;

use Nemundo\Content\Form\AbstractContentForm;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;

class PodcastContentForm extends AbstractContentForm
{

    /**
     * @var PodcastContentBuilder
     */
    public $contentType;

    /**
     * @var BootstrapTextBox
     */
    private $rssUrl;

    public function getContent()
    {

        $this->rssUrl = new BootstrapTextBox($this);
        $this->rssUrl->label = 'RSS Url';
        $this->rssUrl->validation = true;

        return parent::getContent();
    }


    public function onSubmit()
    {

        $builder = new PodcastContentBuilder();
        $builder->rssUrl = $this->rssUrl->getValue();
        $builder->saveType();


        // Job


    }

}