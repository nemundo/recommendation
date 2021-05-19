<?php

namespace Nemundo\Content\App\Translation\Com\Form;

use Nemundo\Content\App\Translation\Content\TranslationText\TranslationTextContentType;
use Nemundo\Core\Csv\Reader\CsvReader;
use Nemundo\Core\Debug\Debug;
use Nemundo\Package\Bootstrap\Form\BootstrapForm;
use Nemundo\Package\Bootstrap\FormElement\BootstrapFileUpload;


class TranslationImportForm extends BootstrapForm
{

    /**
     * @var BootstrapFileUpload
     */
    private $file;

    public function getContent()
    {

        $this->file = new BootstrapFileUpload($this);
        $this->file->label = 'Csv File';
        $this->file->multiUpload = true;
        $this->file->acceptFileType = '.csv';

        return parent::getContent();

    }


    protected function onSubmit()
    {

        foreach ($this->file->getMultiFileRequest() as $fileRequest) {

            $csvReader = new CsvReader();
            //$csvReader->separator = CsvSeperator::COMMA;
            $csvReader->filename = $fileRequest->tmpFileName;

            $code = $csvReader->getHeaderByNumber(2);

            foreach ($csvReader->getData() as $csvRow) {

                $translationId = $csvRow->getValueByNumber(0);
                $text = $csvRow->getValueByNumber(2);

                $contentType = new TranslationTextContentType($translationId);
                $contentType->text[$code] = $text;
                $contentType->saveType();

            }

        }

        (new Debug())->write('Translation Import finished');
        exit;

    }

}