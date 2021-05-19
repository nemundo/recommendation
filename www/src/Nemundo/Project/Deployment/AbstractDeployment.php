<?php


namespace Nemundo\Project\Deployment;


use Brunniswald\Package\BrunniswaldPackage;
use Nemundo\App\Application\Copy\AppPackageCopy;
use Nemundo\Com\Package\PackageSetup;
use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\File\DirectoryReader;
use Nemundo\Core\Path\Path;
use Nemundo\Core\Random\RandomNumber;
use Nemundo\Core\Repository\AbstractRepository;
use Nemundo\Core\TextFile\Writer\TextFileWriter;
use Nemundo\Dev\Code\PhpFile;
use Nemundo\Dev\Deployment\DeploymentPath;
use Nemundo\Dev\Deployment\ProjectDeployment;
use Nemundo\Dev\ProjectBuilder\Copy\AssetCopy;
use Nemundo\Project\AbstractProject;
use Nemundo\Project\Collection\AbstractProjectCollection;
use Nemundo\Project\Config\ConfigFileBuilder;

abstract class AbstractDeployment extends AbstractBase
{

    /**
     * @var AbstractProject
     */
    public $project;

    protected $deploymentPath;

    public $webPath = 'web';

    /**
     * @var bool
     */
    protected $createConfigFile = true;


    /**
     * @var ConfigFileBuilder
     */
    protected $configFileBuilder;


    /**
     * @var bool
     */
    public $deleteBeforeDeploy = false;

    /**
     * @var string[]
     */
    private $composerLibraryList=[];


    abstract protected function loadDeployment();


    public function __construct()
    {

        //$this->projectCollection = new ProjectCollection();
        $this->configFileBuilder=new ConfigFileBuilder();

        $this->loadDeployment();

    }


    /*
    protected function addRepository(AbstractRepository $repository)
    {

        //$this->repositoryList[]=$repository;

        //$this->projectCollection->addProject($project);
        return $this;

    }*/



    public function addComposer($library) {



        $this->composerLibraryList[]=$library;

        // composer require phpoffice/phpspreadsheet


        return $this;

    }



    public function getDeploymentPath() {

        $path= new Path($this->deploymentPath);
        return $path;

    }


    // deployProject
    public function deploy()
    {

        (new Path($this->deploymentPath))->createPath();

        $reader = new DirectoryReader();
        $reader->path = $this->deploymentPath;
        $reader->includeDirectories = true;
        $reader->includeFiles = true;
        foreach ($reader->getData() as $file) {

            if ($file->isDirectory()) {
                if (($file->filename !== '.git') && ($file->filename !== '.idea')) {
                    (new Path($file->fullFilename))->deleteDirectory();
                }
            }

            if ($file->isFile()) {
                $file->deleteFile();
            }

        }

        // exit;
        //$deployPath = new Path($this->deploymentPath);


        if ($this->deleteBeforeDeploy) {
            (new Path($this->deploymentPath))->emptyDirectory();
        }

        /*
        if (!$deployPath->isEmpty()) {
            (new Debug())->write('Could not delete all files');
            exit;
        }*/

        $webPath = (new Path($this->deploymentPath))
            ->addPath($this->webPath)
            ->getPath();

        $copy = new AppPackageCopy();
        $copy->destinationPath = $webPath;
        $copy->copyPackage();

        foreach ($this->project->getApplicationList() as $application) {

            foreach ($application->getPackageList() as $package) {

                $setup=new PackageSetup();
                $setup->destinationPath = $webPath;
                $setup->addPackage($package);

            }

        }

        $configFilename = (new Path($this->deploymentPath))
            ->addPath('config.php')
            ->getFullFilename();

        $php = new PhpFile($configFilename);
        $php->add('function autoloader($class) {');
        $php->add('$class = str_replace(chr(92), DIRECTORY_SEPARATOR, $class);');
        $php->add('include "src" . DIRECTORY_SEPARATOR . $class . ".php";');
        $php->add('}');
        $php->add('spl_autoload_register("autoloader");');
        $php->add('\Nemundo\Project\ProjectConfig::$projectPath = __DIR__ . DIRECTORY_SEPARATOR;');
        $php->add('(new \Nemundo\Project\Loader\MySqlProjectLoader())->loadProject();');


       /* $loader=new \Nemundo\Project\Loader\SqLiteProjectLoader();
        $loader->loadConfigFile=false;
        $loader->loadProject();*/

//\Nemundo\Web\WebConfig::

//(new \Nemundo\Project\Loader\MySqlProjectLoader())->loadProject();

        $php->saveFile();


        $index = new PhpFile($webPath . 'index.php');
        $index->add('ini_set("display_errors", 1);');
        $index->add('error_reporting(E_ALL);');
        $index->add('require "../config.php";');
        $index->add('(new \\' . $this->project->webLoadClass . '())->loadWeb();');
        $index->saveFile();

        $index = new TextFileWriter($webPath . '.htaccess');
        $index->addLine('RewriteEngine on');
        $index->addLine('RewriteCond %{REQUEST_FILENAME} !-f');
        $index->addLine('RewriteRule  ^(.*) index.php [L]');
        $index->saveFile();

        $setupFilename = (new Path($this->deploymentPath))
            ->addPath('bin')
            ->createPath()
            ->addPath('setup.php')
            ->getFullFilename();

        $index = new PhpFile($setupFilename);
        $index->add('require_once "config.php";');
        $index->add('(new \\' . $this->project->setupClass . '())->run();');
        $index->saveFile();

        foreach ($this->project->getDependencyList() as $project) {
            $projectDeployment = new ProjectDeployment();
            $projectDeployment->path = new Path($this->deploymentPath);
            $projectDeployment->copyProject($project);
        }

        $copy = new AssetCopy();
        $copy->destinationPath = $this->deploymentPath;

        $copy
            //->copyAsset('web/.htaccess')  //, $this->webPath)
            ->copyAsset('bin/config.php')
            ->copyAsset('bin/clean.php')
            ->copyAsset('bin/cmd.php')
            ->copyAsset('bin/init.php')
            ->copyAsset('deploy')
            ->copyAsset('.gitignore')
            ->copyAsset('commit.bat');

        //    ->copyAsset('start.bat');

        if ($this->createConfigFile) {
            $this->configFileBuilder->writeFile();
        }


        $filename = (new Path($this->deploymentPath))->addPath('start.bat')->getFullFilename();

        $random = new RandomNumber();
        $random->minNumber = 60000;
        $random->maxNumber = 70000;
        $port = $random->getNumber();

        $file = new TextFileWriter($filename);
        $file->addLine('start http://localhost:' . $port);
        $file->addLine('cd '.$this->webPath);
        $file->addLine('php -S localhost:' . $port);
        $file->saveFile();


        foreach ($this->composerLibraryList as $composerLibrary) {

            $cmd = 'composer require '.$composerLibrary;
            (new Debug())->write($cmd);

        }


        $this->onDeploy();

    }


    protected function onDeploy()
    {

    }

}