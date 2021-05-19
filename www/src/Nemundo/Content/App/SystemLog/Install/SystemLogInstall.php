<?php
namespace Nemundo\Content\App\SystemLog\Install;
use Nemundo\App\Application\Type\Install\AbstractInstall;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\Content\App\SystemLog\Data\SystemLogModelCollection;
use Nemundo\Content\App\SystemLog\Application\SystemLogApplication;
use Nemundo\App\Application\Setup\ApplicationSetup;
class SystemLogInstall extends AbstractInstall {
public function install() {
(new ApplicationSetup())->addApplication(new SystemLogApplication());
(new ModelCollectionSetup())->addCollection(new SystemLogModelCollection());
}
}