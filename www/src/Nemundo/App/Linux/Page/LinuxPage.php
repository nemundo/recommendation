<?php


namespace Nemundo\App\Linux\Page;


use Nemundo\Admin\Com\Button\AdminSiteButton;
use Nemundo\Admin\Com\Container\PathContainer;
use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\Admin\Com\Table\Row\AdminClickableTableRow;
use Nemundo\Admin\Com\Title\AdminSubtitle;
use Nemundo\App\Git\Parameter\PathParameter;
use Nemundo\App\Linux\Parameter\FilenameParameter;
use Nemundo\App\Linux\Reader\FindReader;
use Nemundo\App\Linux\Site\FileDownloadSite;
use Nemundo\App\Linux\Site\LinuxSite;
use Nemundo\App\Linux\Template\LinuxTemplate;
use Nemundo\Core\System\OperatingSystem;
use Nemundo\Core\TextFile\Reader\TextFileReader;
use Nemundo\Core\Type\File\File;
use Nemundo\Core\Type\Text\Html;
use Nemundo\Core\Type\Text\Text;
use Nemundo\Html\Typography\Code;
use Nemundo\Package\Bootstrap\Breadcrumb\BootstrapBreadcrumb;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;

class LinuxPage extends LinuxTemplate
{

    public function getContent()
    {

        $container = new PathContainer($this);

        if ((new OperatingSystem())->isLinux()) {
            $container->path='/';
        }

        if ((new OperatingSystem())->isWindows()) {
            $container->path='c:/';
        }



        /*
        $pathCmd = null;

        $pathParameter = new PathParameter();
        if ($pathParameter->hasValue()) {
            $pathCmd = $pathParameter->getValue() . '/';
        } else {
            $pathCmd = '/';
        }


        $reader = new FindReader();
        $reader->path = $pathCmd;
        $reader->type = 'd';

        $breadcrumb = new BootstrapBreadcrumb($this);

        $valueNew = '/';

        $site = clone(LinuxSite::$site);
        $site->title = 'Base';
        $site->addParameter(new PathParameter($valueNew));
        $breadcrumb->addSite($site);

        foreach ((new Text($pathCmd))->split('/') as $str) {

            $valueNew .= '/' . $str;

            if ($str !== '') {
                $site = clone(LinuxSite::$site);
                $site->title = $str;
                $site->addParameter(new PathParameter($valueNew));
                $breadcrumb->addSite($site);
            }

        }


        $layout = new BootstrapTwoColumnLayout($this);


        $table = new AdminClickableTable($layout->col1);

        $header = new AdminTableHeader($table);
        $header->addText('Path');
        $header->addText('Time');


        foreach ($reader->getData() as $line) {

            $row = new AdminClickableTableRow($table);
            $path = $line[0];
            $row->addText($path);
            $row->addText($line[1]);

            /*foreach ($line as $item) {
                $row->addText($item);
            }*/
/*            $site = clone(LinuxSite::$site);
            $site->addParameter(new PathParameter($pathCmd . $path));
            $row->addClickableSite($site);

        }


        $reader = new FindReader();
        $reader->path = $pathCmd;
        $reader->type = 'f';
        foreach ($reader->getData() as $line) {

            $row = new AdminClickableTableRow($table);

            $path = $line[0];
            $row->addText($path);
            $row->addText($line[1]);

            $site = clone(LinuxSite::$site);
            $site->addParameter(new FilenameParameter($pathCmd . $path));
            $site->addParameter(new PathParameter());

            $row->addClickableSite($site);

        }


        $filenameParameter = new FilenameParameter();


        if ($filenameParameter->hasValue()) {

            $filename = $filenameParameter->getValue();

            $file = new TextFileReader($filename);
            $text = $file->getText();

            $subtitle = new AdminSubtitle($layout->col2);
            $subtitle->content = (new File($filename))->filename;

            $btn = new AdminSiteButton($layout->col2);
            $btn->site = FileDownloadSite::$site;
            $btn->site->addParameter($filenameParameter);


            $code = new Code($layout->col2);
            $code->content = (new Html($text))->getValue();

        }*/

        return parent::getContent();

    }

}