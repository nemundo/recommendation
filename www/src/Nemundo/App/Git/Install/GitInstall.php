<?php
namespace Nemundo\App\Git\Install;
use Nemundo\App\Application\Type\Install\AbstractInstall;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\App\Git\Data\GitModelCollection;
use Nemundo\App\Git\Application\GitApplication;
use Nemundo\App\Application\Setup\ApplicationSetup;
class GitInstall extends AbstractInstall {
public function install() {
(new ApplicationSetup())->addApplication(new GitApplication());
(new ModelCollectionSetup())->addCollection(new GitModelCollection());
}
}