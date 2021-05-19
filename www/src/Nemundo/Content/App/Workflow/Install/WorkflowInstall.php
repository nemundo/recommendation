<?php
namespace Nemundo\Content\App\Workflow\Install;
use Nemundo\App\Application\Type\Install\AbstractInstall;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\Content\App\Workflow\Data\WorkflowModelCollection;
use Nemundo\Content\App\Workflow\Application\WorkflowApplication;
use Nemundo\App\Application\Setup\ApplicationSetup;
class WorkflowInstall extends AbstractInstall {
public function install() {
(new ApplicationSetup())->addApplication(new WorkflowApplication());
(new ModelCollectionSetup())->addCollection(new WorkflowModelCollection());
}
}