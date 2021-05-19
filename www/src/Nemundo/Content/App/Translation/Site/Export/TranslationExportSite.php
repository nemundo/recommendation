<?php

namespace Nemundo\Content\App\Translation\Site\Export;


use Nemundo\Content\App\Translation\Content\TranslationText\TranslationTextContentType;
use Nemundo\Content\App\Translation\Data\Language\LanguageReader;
use Nemundo\Content\App\Translation\Data\Translation\TranslationReader;
use Nemundo\Content\App\Translation\Language\DefaultLanguage;
use Nemundo\Core\Archive\ZipArchive;
use Nemundo\Core\Csv\Writer\CsvWriter;
use Nemundo\Core\Http\Response\FileResponse;
use Nemundo\Project\Path\TmpPath;
use Nemundo\Web\Site\AbstractSite;

class TranslationExportSite extends AbstractSite
{

    /**
     * @var TranslationExportSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Translation Export';
        $this->url = 'translation-export';
        $this->menuActive = false;
        TranslationExportSite::$site = $this;
    }


    public function loadContent()
    {

        $zip = new ZipArchive();
        $zip->archiveFilename = (new TmpPath())
            ->addPath('translation.zip')
            ->getFilename();

        $languageReader = new LanguageReader();
        $languageReader->filter->andEqual($languageReader->model->defaultLanguage, false);
        foreach ($languageReader->getData() as $languageRow) {

            $filename = (new TmpPath())
                ->addPath($languageRow->code . '.csv')
                ->getFilename();

            $csv = new CsvWriter($filename);
            //$csv->separator=CsvSeperator::COMMA;

            $header = [];
            $header[] = 'id';
            $header[] = (new DefaultLanguage())->getCode();  //getId() 'en';  //$defaultLanguage->code;
            $header[] = $languageRow->code;
            $csv->addRow($header);

            $reader = new TranslationReader();  // new SourceReader();
            foreach ($reader->getData() as $translationRow) {

                $translationContentType = new TranslationTextContentType($translationRow->id);

                $row = [];
                $row[] = $translationRow->id;

                $row[] =$translationContentType->getTranslationText((new DefaultLanguage())->getId());
                $row[] =$translationContentType->getTranslationText($languageRow->id);

                $csv->addRow($row);

            }

            $csv->closeFile();

            $zip->addFilename($filename);

        }

        $zip->createArchive();

        $response = new FileResponse();
        $response->filename = $zip->archiveFilename;
        $response->sendResponse();


    }


}