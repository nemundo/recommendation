<?php
namespace Hackathon\Install;
use Nemundo\App\Application\Type\Install\AbstractUninstall;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Hackathon\Data\HackathonModelCollection;
use Hackathon\Application\HackathonApplication;
use Nemundo\App\Application\Setup\ApplicationSetup;
class HackathonUninstall extends AbstractUninstall {
public function uninstall() {
(new ModelCollectionSetup())->removeCollection(new HackathonModelCollection());
}
}