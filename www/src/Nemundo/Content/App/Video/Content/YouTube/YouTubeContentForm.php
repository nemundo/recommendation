<?php


namespace Nemundo\Content\App\Video\Content\YouTube;


use Nemundo\Content\Form\AbstractContentForm;
use Nemundo\Core\Type\Text\Text;
use Nemundo\Crawler\HtmlParser\HtmlParser;
use Nemundo\Package\Bootstrap\FormElement\BootstrapLargeTextBox;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;


// Fehlermeldung, falls kein v= vorhanden ist

class YouTubeContentForm extends AbstractContentForm
{

    /**
     * @var YouTubeContentType
     */
    public $contentType;

    /**
     * @var BootstrapTextBox
     */
    private $url;

    /**
     * @var BootstrapTextBox
     */
    private $videoTitle;

    /**
     * @var BootstrapLargeTextBox
     */
    private $description;


    public function getContent()
    {

        $this->url = new BootstrapTextBox($this);
        $this->url->label = 'YouTube Url';
        $this->url->validation = true;

        $this->videoTitle = new BootstrapTextBox($this);
        $this->videoTitle->label = 'Title';

        $this->description = new BootstrapLargeTextBox($this);
        $this->description->label = 'Description';

        return parent::getContent();

    }


    protected function loadUpdateForm()
    {

        $this->url->disabled = true;
        $this->url->validation = false;

        $videoRow = $this->contentType->getDataRow();

        //$this->url->value = $videoRow->youtubeId;
        $this->videoTitle->value = $videoRow->title;
        $this->description->value = $videoRow->description;

    }


    protected function onSubmit()
    {

        $parser = new HtmlParser();
        $parser->fromUrl($this->url->getValue());

        $title = $parser->getPageTitle();
        $title = (new Text($title))->removeRight('- YouTube')->getValue();
        $description = $parser->getDescription();

        $this->contentType->youTubeUrl = $this->url->getValue();
        $this->contentType->title = $title;
        $this->contentType->description = $description;
        $this->contentType->saveType();

    }

}