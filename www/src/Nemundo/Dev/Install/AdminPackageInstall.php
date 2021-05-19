<?php

namespace Nemundo\Dev\Install;


use Nemundo\Com\Package\PackageSetup;
use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\File\FileCopy;
use Nemundo\Core\Path\Path;
use Nemundo\Core\Random\RandomNumber;
use Nemundo\Core\TextFile\Reader\TextFileReader;
use Nemundo\Core\TextFile\Writer\TextFileWriter;
use Nemundo\Core\Type\Text\Text;
use Nemundo\FrameworkProject;
use Nemundo\Package\Bootstrap\Package\BootstrapPackage;
use Nemundo\Package\FontAwesome\FontAwesomePackage;
use Nemundo\Package\Jquery\Package\JqueryPackage;
use Nemundo\Package\JqueryUi\JqueryUiPackage;
use Nemundo\Package\NemundoJs\NemundoJsPackage;
use Nemundo\Project\Path\ProjectPath;


class AdminPackageInstall extends AbstractBase
{

    /**
     * @var string
     */
    private $projectPath;


    public function install()
    {

        $adminPath = (new ProjectPath())
            ->addPath('admin');

        $this->projectPath =$adminPath->getPath();

        $adminPath->emptyDirectory();

        $this->copyAssetFile('.htaccess', '.htaccess');
        $this->copyAssetFile('config.php', 'config.php');
        $this->copyAssetFile('index.php', 'index.php');
        $this->copyAssetFile('start.bat', 'start.bat');

        $filename = (new ProjectPath())
            ->addPath('admin')
            ->addPath('start.bat')
            ->getFullFilename();

        $file = new TextFileReader($filename);
        $content = $file->getText();

        $random = new RandomNumber();
        $random->minNumber = 10000;
        $random->maxNumber = 50000;
        $port = $random->getNumber();
        $content = (new Text($content))->replace('[port]', $port)->getValue();

        $write = new TextFileWriter($filename);
        $write->overwriteExistingFile = true;
        $write->addLine($content);
        $write->saveFile();

        $setup = new PackageSetup();
        $setup->destinationPath = $this->projectPath;
        $setup->addPackage(new BootstrapPackage());
        $setup->addPackage(new FontAwesomePackage());
        $setup->addPackage(new JqueryPackage());
        $setup->addPackage(new JqueryUiPackage());
        $setup->addPackage(new NemundoJsPackage());

    }


    private function copyAssetFile($filenameFrom, $filenameTo)
    {

        $fileCopy = new FileCopy();
        $fileCopy->overwriteExistingFile = true;
        $fileCopy->sourceFilename = (new Path())
            ->addPath((new FrameworkProject())->path)
            ->addPath('..')
            ->addPath('package')
            ->addPath('admin')
            ->addPath($filenameFrom)
            ->getFilename();

        $fileCopy->destinationFilename = (new Path())
            ->addPath($this->projectPath)
            ->addPath($filenameTo)
            ->getFilename();

        $fileCopy->copyFile();

    }

}