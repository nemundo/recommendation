<?php


namespace Nemundo\App\Backup\Page;

use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Widget\AdminWidget;
use Nemundo\App\Backup\Parameter\FileParameter;
use Nemundo\App\Backup\Path\DumpBackupPath;
use Nemundo\App\Backup\Path\RestoreBackupPath;
use Nemundo\App\Backup\Site\DownloadSite;
use Nemundo\App\Backup\Site\UploadSite;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Core\File\DirectoryReader;
use Nemundo\Html\Form\Input\AcceptFileType;
use Nemundo\Html\Typography\Code;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;
use Nemundo\Package\Dropzone\DropzoneUploadForm;

class BackupPage extends AbstractTemplateDocument
{

    public function getContent()
    {

        $layout = new BootstrapTwoColumnLayout($this);

        $widget = new AdminWidget($layout->col1);
        $widget->widgetTitle = 'Backup Dump';

        $table = new AdminTable($widget);

        $header = new TableHeader($table);
        $header->addText('File');
        $header->addText('Size');
        $header->addEmpty();

        $reader = new DirectoryReader();
        $reader->path = (new DumpBackupPath())->getPath();
        foreach ($reader->getData() as $file) {

            $row = new TableRow($table);
            $row->addText($file->filename);
            $row->addText($file->getFileSizeText());

            $site = clone(DownloadSite::$site);
            $site->addParameter(new FileParameter($file->filename));
            $row->addSite($site);

        }

        $widget = new AdminWidget($layout->col2);
        $widget->widgetTitle = 'Dump Upload (Zip File)';

        $dropzone = new DropzoneUploadForm($widget);
        $dropzone->acceptedFileType=AcceptFileType::ZIP;
        $dropzone->uploadSite = UploadSite::$site;

        $widget = new AdminWidget($layout->col2);
        $widget->widgetTitle = 'Restore Dump';

        $table = new AdminTable($widget);

        $header = new TableHeader($table);
        $header->addText('File');
        $header->addText('Size');

        $reader = new DirectoryReader();
        $reader->path = (new RestoreBackupPath())->getPath();
        foreach ($reader->getData() as $file) {
            $row = new TableRow($table);
            $row->addText($file->filename);
            $row->addText($file->getFileSizeText());
        }


        /*
        $code = new Code($widget);
        $code->content = 'sudo php bin/cmd.php backup-dump';
*/

        $code = new Code($widget);
        $code->content = 'sudo php bin/cmd.php backup-restore';

        return parent::getContent();

    }

}