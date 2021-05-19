<?php

namespace Nemundo\Package\JqueryFileUpload;


use Nemundo\Com\Container\LibraryTrait;
use Nemundo\Html\Container\AbstractHtmlContainer;
use Nemundo\Html\Form\Input\FileInput;
use Nemundo\Package\Bootstrap\Progress\BootstrapProgress;
use Nemundo\Package\Jquery\Package\JqueryPackage;
use Nemundo\Web\Site\AbstractSite;

class JqueryFileUpload extends AbstractHtmlContainer
{

    use LibraryTrait;

    /**
     * @var AbstractSite
     */
    public $uploadSite;


    public function getContent()
    {

        $this->addPackage(new JqueryPackage());
        $this->addPackage(new JqueryFileUploadPackage());

        //$div = new Div($this);
        //$div->id = 'dropzone';
        //$div->addCssClass('fade well');


        $fileInput = new FileInput($this);
        $fileInput->id = 'fileupload';
        $fileInput->name = 'fileupload';
        $fileInput->multiple = true;

        $progress = new BootstrapProgress($this);
        $progress->id = 'progress';

        $this->addJqueryScript('$("#fileupload").fileupload({');
        $this->addJqueryScript('url: "' . $this->uploadSite->getUrl() . '",');
        $this->addJqueryScript('dataType: "json",');
        //$this->addJqueryScript('dropZone: $("#dropzone"),');


        $this->addJqueryScript('done: function (e, data) {');
        $this->addJqueryScript('$.each(data.result.files, function (index, file) {');
        $this->addJqueryScript('console.log(fertig);');
        $this->addJqueryScript('console.log(file.name);');
        $this->addJqueryScript('$("<p/>").text(file.name).appendTo("#file_progress");');
        $this->addJqueryScript(' });');
        $this->addJqueryScript('},');
        $this->addJqueryScript(' progressall: function (e, data) {');
        $this->addJqueryScript('var progress = parseInt(data.loaded / data.total * 100, 10);');
        $this->addJqueryScript('$("#progress .progress-bar").css("width", progress + "%");');
        $this->addJqueryScript('}');
        $this->addJqueryScript('});');


        return parent::getContent();

    }

}