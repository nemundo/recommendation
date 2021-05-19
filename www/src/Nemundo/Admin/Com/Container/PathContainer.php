<?php


namespace Nemundo\Admin\Com\Container;


use Nemundo\Admin\Com\Button\AdminSiteButton;
use Nemundo\Admin\Com\Title\AdminSubtitle;
use Nemundo\App\Linux\Parameter\FilenameParameter;
use Nemundo\App\Linux\Parameter\PathParameter;
use Nemundo\App\Linux\Site\FileDownloadSite;
use Nemundo\Core\File\DirectoryReader;
use Nemundo\Core\System\OperatingSystem;
use Nemundo\Core\TextFile\Reader\TextFileReader;
use Nemundo\Core\Type\File\File;
use Nemundo\Core\Type\Text\Html;
use Nemundo\Core\Type\Text\Text;
use Nemundo\Html\Container\AbstractContainer;
use Nemundo\Html\Typography\Code;
use Nemundo\Package\Bootstrap\Breadcrumb\BootstrapBreadcrumb;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;
use Nemundo\Package\Bootstrap\Listing\BootstrapSiteList;
use Nemundo\Web\Site\Site;


class PathContainer extends AbstractContainer
{

    public $path;

    public function getContent()
    {


        $breadcrumb = new BootstrapBreadcrumb($this);

        $valueNew = '/';

        $pathCmd = (new PathParameter())->getValue();

        $site = new Site();
        $site->title = 'Base';
        $site->addParameter(new \Nemundo\App\Git\Parameter\PathParameter($valueNew));
        $breadcrumb->addSite($site);

        foreach ((new Text($pathCmd))->split('/') as $str) {

            $valueNew .= '/' . $str;

            if ($str !== '') {
                $site = new Site();
                $site->title = $str;
                $site->addParameter(new PathParameter($valueNew));
                $site->removeParameter(new FilenameParameter());
                $breadcrumb->addSite($site);
            }

        }


        $layout = new BootstrapTwoColumnLayout($this);
        $layout->col1->columnWidth = 2;
        $layout->col2->columnWidth = 10;


        $list = new BootstrapSiteList($layout->col1);

        $reader = new DirectoryReader();
        $reader->path = $this->path . (new PathParameter())->getValue();
        $reader->includeDirectories = true;
        $reader->includeFiles = false;
        foreach ($reader->getData() as $file) {

            $site = new Site();
            $site->title = $file->filename;
            $site->addParameter(new PathParameter((new PathParameter())->getValue() . '/' . $file->filename));
            $list->addSite($site);

        }

        $reader = new DirectoryReader();
        $reader->path = $this->path . (new PathParameter())->getValue();
        $reader->includeDirectories = false;
        $reader->includeFiles = true;
        foreach ($reader->getData() as $file) {

            $site = new Site();
            $site->title = $file->filename;
            $site->addParameter(new PathParameter());
            $site->addParameter(new FilenameParameter($file->filename));
            $list->addSite($site);

        }


        $filenameParameter = new FilenameParameter();
        if ($filenameParameter->hasValue()) {


            $filename = '';

            if ((new OperatingSystem())->isWindows()) {
                //$filename .= 'c:\\';
            }


            $filename = $this->path . (new PathParameter())->getValue() . DIRECTORY_SEPARATOR . $filenameParameter->getValue();

            $file = new TextFileReader($filename);
            $text = $file->getText();

            $subtitle = new AdminSubtitle($layout->col2);
            $subtitle->content = (new File($filename))->filename;

            /*$btn = new AdminSiteButton($layout->col2);
            $btn->site = FileDownloadSite::$site;
            $btn->site->addParameter(new FilenameParameter($filename));*/
            //$btn->site->addParameter($filenameParameter);

            $code = new Code($layout->col2);
            $code->content = (new Html($text))->getValue();

        }


        return parent::getContent();

    }

}