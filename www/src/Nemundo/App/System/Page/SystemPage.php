<?php

namespace Nemundo\App\System\Page;


use Nemundo\Admin\Com\Table\AdminLabelValueTable;
use Nemundo\Admin\Com\Widget\AdminWidget;
use Nemundo\App\System\Com\SystemInformationTable;
use Nemundo\App\System\Com\Table\MySqlSystemTable;
use Nemundo\App\System\Com\Table\PhpSystemTable;
use Nemundo\App\System\Com\Table\SystemTable;
use Nemundo\App\System\Widget\MailWidget;
use Nemundo\App\System\Widget\ProjectWidget;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Db\DbConfig;
use Nemundo\Db\Provider\MySql\Connection\MySqlConnection;
use Nemundo\Db\Provider\SqLite\Connection\SqLiteConnection;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;

class SystemPage extends AbstractTemplateDocument
{

    public function getContent()
    {

        $layout = new BootstrapTwoColumnLayout($this);

        $widget = new AdminWidget($layout->col1);
        $widget->widgetTitle = 'System';
        new SystemTable($widget);

        $widget = new AdminWidget($layout->col1);
        $widget->widgetTitle = 'PHP';
        new PhpSystemTable($widget);

        if (DbConfig::$defaultConnection->isObjectOfClass(MySqlConnection::class)) {
            $widget = new AdminWidget($layout->col2);
            $widget->widgetTitle = 'MySql';
            new MySqlSystemTable($widget);
        }

        if (DbConfig::$defaultConnection->isObjectOfClass(SqLiteConnection::class)) {
            $widget = new AdminWidget($layout->col2);
            $widget->widgetTitle = 'SqLite';

            $table=new AdminLabelValueTable($widget);
            $table->addLabelValue('Filename', DbConfig::$defaultConnection->filename);
        }

        new ProjectWidget($layout->col2);

        return parent::getContent();

    }

}