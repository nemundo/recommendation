<?php
namespace Nemundo\Content\App\Subscription\Install;
use Nemundo\App\Application\Type\Install\AbstractInstall;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\Content\App\Subscription\Data\SubscriptionModelCollection;
use Nemundo\Content\App\Subscription\Application\SubscriptionApplication;
use Nemundo\App\Application\Setup\ApplicationSetup;
class SubscriptionInstall extends AbstractInstall {
public function install() {
(new ApplicationSetup())->addApplication(new SubscriptionApplication());
(new ModelCollectionSetup())->addCollection(new SubscriptionModelCollection());
}
}