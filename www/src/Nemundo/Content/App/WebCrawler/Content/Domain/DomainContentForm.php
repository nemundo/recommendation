<?php

namespace Nemundo\Content\App\WebCrawler\Content\Domain;

use Nemundo\Content\App\WebCrawler\Data\Domain\Domain;
use Nemundo\Content\Form\AbstractContentForm;
use Nemundo\Core\Http\Url\UrlInformation;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;

class DomainContentForm extends AbstractContentForm
{
    /**
     * @var DomainContentType
     */
    public $contentType;

    /**
     * @var BootstrapTextBox
     */
    private $domain;

    public function getContent()
    {

        $this->domain = new BootstrapTextBox($this);
        $this->domain->label = 'Url';
        $this->domain->validation = true;

        return parent::getContent();
    }

    public function onSubmit()
    {
//        $this->contentType->saveType();

        $url = $this->domain->getValue();

        $data = new Domain();
        $data->ignoreIfExists = true;
        $data->domain = (new UrlInformation($url))->getDomain();
        $data->url = $url;
        $data->save();

    }
}