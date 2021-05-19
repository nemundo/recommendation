<?php

namespace Nemundo\App\System\Com;

use Nemundo\Admin\Com\Table\AdminLabelValueTable;
use Nemundo\Admin\Com\Title\AdminSubtitle;
use Nemundo\Com\Html\Listing\UnorderedList;
use Nemundo\Core\Date\Duration\TimeDuration;
use Nemundo\Core\Http\Cookie\CookieReader;
use Nemundo\Core\Http\Session\SessionReader;
use Nemundo\Core\System\PhpEnvironment;
use Nemundo\Core\Type\DateTime\DateTime;
use Nemundo\Db\Provider\MySql\Information\MySqlVersion;
use Nemundo\Html\Container\AbstractHtmlContainer;

class SystemInformationTable extends AbstractHtmlContainer
{

    public function getContent()
    {

        $title = new AdminSubtitle($this);
        $title->content = 'System';
        $table = new AdminLabelValueTable($this);
        $table->addLabelValue('Sytem Date/Time', (new DateTime())->setNow()->getIsoDateTime());
        $table->addLabelValue('Timezone', (new PhpEnvironment())->getTimezone());


        $phpEnvironment = new PhpEnvironment();

        $title = new AdminSubtitle($this);
        $title->content = 'Php';
        $table = new AdminLabelValueTable($this);
        $table->addLabelValue('Show Error', $phpEnvironment->getShowError());
        $table->addLabelValue('PHP Version', $phpEnvironment->getPhpVersion());
        $table->addLabelValue('Max File Upload', $phpEnvironment->getMaxFileUpload());
        $table->addLabelValue('Max File Upload Size', $phpEnvironment->getMaxFileUploadSize());
        $table->addLabelValue('Max Post File Size', $phpEnvironment->getMaxPostSize());
        $table->addLabelValue('Memory Limit', $phpEnvironment->getMemoryLimit());
        $table->addLabelValue('Time Limit', $phpEnvironment->getTimeLimit());
        $table->addLabelValue('php.ini Filename', $phpEnvironment->getPhpIniFilename());

        $ul = new UnorderedList();
        foreach ($phpEnvironment->getPhpModul() as $modul) {
            $ul->addText($modul);
        }
        $table->addLabelCom('Php Modul', $ul);


        $title = new AdminSubtitle($this);
        $title->content = 'MySql';
        $table = new AdminLabelValueTable($this);
        $table->addLabelValue('MySql Version', (new MySqlVersion())->getMySqlVersion());
        $table->addLabelValue('Up Time', (new TimeDuration((new MySqlVersion())->getUpTime()))->getText());

        $title = new AdminSubtitle($this);
        $title->content = 'Cookie';
        $table = new AdminLabelValueTable($this);
        $reader = new CookieReader();
        foreach ($reader->getData() as $cookie) {
            $table->addLabelValue($cookie->cookieName, $cookie->getValue());
        }

        $title = new AdminSubtitle($this);
        $title->content = 'Session';
        $table = new AdminLabelValueTable($this);
        $reader = new SessionReader();
        foreach ($reader->getData() as $session) {
            $table->addLabelValue($session->sessionName, $session->getValue());
        }


        /*
        $title = new AdminSubtitle($this);
        $title->content = 'Staging';
        $table = new AdminLabelValueTable($this);
        $table->addLabelValue('Staging', DeploymentConfig::$stagingEnviroment);
*/

        return parent::getContent();

    }

}