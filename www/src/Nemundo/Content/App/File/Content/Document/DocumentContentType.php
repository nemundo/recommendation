<?php

namespace Nemundo\Content\App\File\Content\Document;

use Nemundo\Content\App\File\Content\File\AbstractFileContentType;
use Nemundo\Content\App\File\Content\File\UrlFileContentForm;
use Nemundo\Content\App\File\Data\Document\Document;
use Nemundo\Content\App\File\Data\Document\DocumentDelete;
use Nemundo\Content\App\File\Data\Document\DocumentReader;
use Nemundo\Content\App\File\Data\Document\DocumentRow;
use Nemundo\Content\App\File\Data\Document\DocumentUpdate;
use Nemundo\Content\Index\Tree\Com\Form\ContentSearchForm;
use Nemundo\Core\File\FileInformation;
use Nemundo\Core\File\Pdf\PdfFile;
use Nemundo\Core\System\OperatingSystem;
use Nemundo\Core\TextFile\Reader\TextFileReader;


class DocumentContentType extends AbstractFileContentType
{

    protected function loadContentType()
    {

        $this->typeLabel = 'Document';
        $this->typeId = '09386a3f-c44d-438b-9d7a-6c46d3f9537e';
        $this->formClassList[] = DocumentContentForm::class;
        $this->formClassList[] = UrlFileContentForm::class;
        $this->formClassList[] = ContentSearchForm::class;
        $this->viewClassList[] = DocumentContentView::class;
        $this->listingClass = DocumentContentListing::class;
        $this->formPartClass=DocumentContentFormPart::class;

    }

    protected function onCreate()
    {

        $data = new Document();
        $data->document->fromFileProperty($this->file);
        $this->dataId = $data->save();

    }

    protected function onUpdate()
    {
    }


    protected function onDelete()
    {
        (new DocumentDelete())->deleteById($this->dataId);
    }


    protected function onIndex()
    {

        $documentRow = $this->getDataRow();
        $filename = $documentRow->document->getFullFilename();
        $file = new FileInformation($filename);

        $text = '';

        if ((new OperatingSystem())->isLinux()) {

            if ($file->isPdf()) {

                $pdfFile = new PdfFile($filename);
                $text = $pdfFile->getPdfText();

            }

        }

        if ($file->isText()) {

            $txtFile = new TextFileReader($filename);
            $text = $txtFile->getText();

        }


        $update = new DocumentUpdate();
        $update->text = $text;
        $update->updateById($this->dataId);

        $this->addSearchWord($documentRow->document->getFilename());
        $this->addSearchText($text);

    }


    protected function onDataRow()
    {
        $this->dataRow = (new DocumentReader())->getRowById($this->dataId);
    }


    /**
     * @return \Nemundo\Model\Row\AbstractModelDataRow|DocumentRow
     */
    public function getDataRow()
    {
        return parent::getDataRow();
    }


    public function getSubject()
    {
        return $this->getDataRow()->document->getFilename();
    }


    public function getText()
    {
        return $this->getDataRow()->text;
    }


}