<?php


namespace Nemundo\Content\App\Bookmark\Content;


use Nemundo\Content\Form\AbstractContentFormPart;
use Nemundo\Core\Validation\ValidationType;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;

class UrlContentFormPart extends AbstractContentFormPart
{

    /**
     * @var UrlContentType
     */
    public $contentType;

    /**
     * @var BootstrapTextBox
     */
    private $url;


    protected function loadContainer()
    {

        parent::loadContainer();

        $this->url = new BootstrapTextBox($this);
        $this->url->label = 'Url';
        $this->url->validation = true;
        $this->url->validationType = ValidationType::IS_URL;

    }


    public function saveData()
    {

        $this->contentType->fromUrl($this->url->getValue());
        $this->contentType->saveType();

        return $this->contentType->getContentId();

    }

}