<?php

namespace Nemundo\Content\App\Translation\Install;

use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\Content\App\Translation\Application\TranslationApplication;
use Nemundo\Content\App\Translation\Content\Language\LanguageContentType;
use Nemundo\Content\App\Translation\Content\TranslationLargeText\TranslationLargeTextContentType;
use Nemundo\Content\App\Translation\Content\TranslationText\TranslationTextContentType;
use Nemundo\Content\App\Translation\Data\Translation\TranslationReader;
use Nemundo\Content\App\Translation\Data\TranslationModelCollection;
use Nemundo\Content\Setup\ContentTypeSetup;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\App\Application\Type\Install\AbstractInstall;
use Nemundo\App\Application\Type\Install\AbstractUninstall;

class TranslationUninstall extends AbstractUninstall
{
    public function uninstall()
    {


        $reader = new TranslationReader();
        foreach ($reader->getData() as $translationRow) {
            (new TranslationTextContentType($translationRow->id))->deleteType();
        }





    }
}