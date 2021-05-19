<?php

namespace Nemundo\Content\App\Contact\Install;

use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\App\Script\Setup\ScriptSetup;
use Nemundo\Content\App\Contact\Application\ContactApplication;
use Nemundo\Content\App\Contact\Content\Contact\ContactContentType;
use Nemundo\Content\App\Contact\Content\Phone\PhoneContentType;
use Nemundo\Content\App\Contact\Data\ContactModelCollection;
use Nemundo\Content\App\Contact\Script\ContactCleanScript;
use Nemundo\Content\Setup\ContentTypeSetup;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\App\Application\Type\Install\AbstractInstall;

class ContactInstall extends AbstractInstall
{
    public function install()
    {
        (new ApplicationSetup())->addApplication(new ContactApplication());
        (new ModelCollectionSetup())->addCollection(new ContactModelCollection());

        (new ContentTypeSetup(new ContactApplication()))
            ->addContentType(new PhoneContentType())
            ->addContentType(new ContactContentType());


        (new ScriptSetup(new ContactApplication()))
            ->addScript(new ContactCleanScript());


    }
}