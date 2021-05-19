<?php

namespace Nemundo\Content\App\Translation\Install;

use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\Content\App\Translation\Application\TranslationApplication;
use Nemundo\Content\App\Translation\Content\Language\LanguageContentType;
use Nemundo\Content\App\Translation\Content\TranslationLargeText\TranslationLargeTextContentType;
use Nemundo\Content\App\Translation\Content\TranslationText\TranslationTextContentType;
use Nemundo\Content\App\Translation\Data\TranslationModelCollection;
use Nemundo\Content\Setup\ContentTypeSetup;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\App\Application\Type\Install\AbstractInstall;

class TranslationInstall extends AbstractInstall
{
    public function install()
    {

        (new ApplicationSetup())->addApplication(new TranslationApplication());

        (new ModelCollectionSetup())->addCollection(new TranslationModelCollection());

        (new ContentTypeSetup(new TranslationApplication()))
            ->addContentType(new LanguageContentType())
            ->addContentType(new TranslationTextContentType())
            ->addContentType(new TranslationLargeTextContentType());

    }
}