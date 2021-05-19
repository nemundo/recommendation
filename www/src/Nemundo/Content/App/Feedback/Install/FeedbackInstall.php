<?php

namespace Nemundo\Content\App\Feedback\Install;

use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\App\Application\Type\Install\AbstractInstall;
use Nemundo\Content\App\Feedback\Application\FeedbackApplication;
use Nemundo\Content\App\Feedback\Content\Feedback\FeedbackContentType;
use Nemundo\Content\App\Feedback\Content\FeedbackListing\FeedbackListingContentType;
use Nemundo\Content\App\Feedback\Content\FeedbackWidget\FeedbackWidgetContentType;
use Nemundo\Content\App\Feedback\Data\FeedbackModelCollection;
use Nemundo\Content\App\Feedback\Usergroup\FeedbackUsergroup;
use Nemundo\Content\App\Inbox\Application\InboxApplication;
use Nemundo\Content\Setup\ContentTypeSetup;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\User\Setup\UsergroupSetup;

class FeedbackInstall extends AbstractInstall
{
    public function install()
    {

        (new InboxApplication())->installApp();

        (new ApplicationSetup())->addApplication(new FeedbackApplication());
        (new ModelCollectionSetup())->addCollection(new FeedbackModelCollection());

        (new ContentTypeSetup())
            ->addContentType(new FeedbackWidgetContentType())
            ->addContentType(new FeedbackListingContentType())
            ->addContentType(new FeedbackContentType());

        (new FeedbackWidgetContentType())->saveType();
        //(new FeedbackLis)

        (new UsergroupSetup())
            ->addUsergroup(new FeedbackUsergroup());

    }
}