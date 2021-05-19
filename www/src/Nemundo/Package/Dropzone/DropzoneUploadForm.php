<?php


namespace Nemundo\Package\Dropzone;


use Nemundo\Com\Container\LibraryTrait;
use Nemundo\Html\Form\AbstractForm;
use Nemundo\Web\Site\AbstractSite;

class DropzoneUploadForm extends AbstractForm
{

    use LibraryTrait;

    /**
     * @var string
     */
    public $acceptedFileType;

    /**
     * @var AbstractSite
     */
    public $uploadSite;

    public function getContent()
    {

        $this->addPackage(new DropzonePackage());
        $this->addCssClass('dropzone');

        $this->id = 'dropzone2';
        $this->action = $this->uploadSite->getUrl();

        $this->addJavaScript('Dropzone.options.dropzone2 = {');

        if ($this->acceptedFileType !== null) {
            $this->addJavaScript('acceptedFiles: "' . $this->acceptedFileType . '",');
        }
        $this->addJavaScript('timeout: 0');
        $this->addJavaScript('};');

        return parent::getContent();

    }

}