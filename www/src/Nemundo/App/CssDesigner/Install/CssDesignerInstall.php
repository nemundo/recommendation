<?php
namespace Nemundo\App\CssDesigner\Install;
use Nemundo\App\Application\Type\Install\AbstractInstall;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\App\CssDesigner\Data\CssDesignerModelCollection;
use Nemundo\App\CssDesigner\Application\CssDesignerApplication;
use Nemundo\App\Application\Setup\ApplicationSetup;
class CssDesignerInstall extends AbstractInstall {
public function install() {
(new ApplicationSetup())->addApplication(new CssDesignerApplication());
(new ModelCollectionSetup())->addCollection(new CssDesignerModelCollection());
}
}