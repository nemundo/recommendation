<?php

namespace Nemundo\Dev\ProjectBuilder;

use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\File\FileCopy;
use Nemundo\Core\File\FileUtility;
use Nemundo\Core\Path\Path;
use Nemundo\Core\TextFile\Writer\TextFileWriter;
use Nemundo\Dev\Code\PhpFile;
use Nemundo\Dev\ProjectBuilder\Code\ControllerProjectCode;
use Nemundo\Dev\ProjectBuilder\Code\PageProjectCode;
use Nemundo\Dev\ProjectBuilder\Code\ProjectProjectCode;
use Nemundo\Dev\ProjectBuilder\Code\ProjectSiteCode;
use Nemundo\Dev\ProjectBuilder\Code\ProjectTemplateCode;
use Nemundo\Dev\ProjectBuilder\Code\ProjectWebCode;
use Nemundo\Dev\ProjectBuilder\Code\SetupProjectCode;
use Nemundo\FrameworkProject;
use Nemundo\Project\AbstractProject;
use Nemundo\Project\Project;


class ProjectBuilder extends AbstractBaseClass
{

    /**
     * @var AbstractProject
     */
    public $project;

    /**
     * @var bool
     */
    public $createWebEnvironment = true;

    /**
     * @var string
     */
    private $projectName;


    public function __construct()
    {

        $this->project = new Project();

    }


    public function createProject()
    {

        $this->projectName = strtolower($this->project->namespace);
        $projectPath = (new FileUtility())->appendDirectorySeparatorIfNotExists($this->project->path);

        $this->project->path = (new FileUtility())->appendDirectorySeparatorIfNotExists($this->project->path);

        if ($this->createWebEnvironment) {
            $this->copyAsset('.gitignore');
            $this->copyAsset('commit.bat');
            $this->copyAsset('deploy');
            $this->copyAsset('config.php');
            $this->copyAsset('config_admin.php');
            $this->copyAsset('tag.bat');
            $this->copyAsset('.htaccess', 'web');
            $this->copyAsset('bin/clean.php');
            $this->copyAsset('bin/cmd.php');
            $this->copyAsset('bin/init.php');
            $this->copyAsset('bin/class_test.php');
            $this->copyAsset('bin/config.php');

            $pathList = [];
            $pathList[] = $projectPath . 'test';
            $pathList[] = $projectPath . 'web';
            $pathList[] = $projectPath . 'web/img';
            $pathList[] = $projectPath . 'web/css';
            $pathList[] = $projectPath . 'admin';
            $pathList[] = $projectPath . 'bin';
            $pathList[] = $projectPath . 'tmp';
            $pathList[] = $projectPath . 'model';

            foreach ($pathList as $path) {
                (new Path($path))->createPath();
            }

            /*$code = new ProjectConfigCode();
            $code->path = $projectPath;
            $code->prefixNamespace = $this->project->namespace;
            $code->createCode();*/

            $webPath = (new Path())
                ->addPath($projectPath)
                ->addPath('web')
                ->getPath();

            $index = new PhpFile($webPath . 'index.php');
            //$index->filename = $webPath . 'index.php';
            $index->add('require "../config.php";');
            $index->add('(new \\' . $this->project->namespace . '\\Web\\' . $this->project->namespace . 'Web())->loadWeb();');
            $index->saveFile();

            $binPath = (new Path())
                ->addPath($projectPath)
                ->addPath('bin')
                ->getPath();

            $file = new PhpFile($binPath . 'setup.php');
            //$file->filename = $binPath . 'setup.php';
            $file->add('require  "config.php";');
            $file->add('(new \\' . $this->project->namespace . '\\Setup\\' . $this->project->namespace . 'Setup())->run();');
            $file->saveFile();

        }

        $srcPath = (new Path())
            ->addPath($projectPath)
            ->addPath('src')
            ->getPath();

        $code = new ProjectProjectCode();
        $code->prefixNamespace = $this->project->namespace;
        $code->path = $srcPath;
        $code->createCode();

        $code = new ControllerProjectCode();
        $code->prefixNamespace = $this->project->namespace;
        $code->path = $srcPath . 'Controller';
        $code->createCode();

        $code = new ProjectWebCode();
        $code->prefixNamespace = $this->project->namespace;
        $code->path = $srcPath . 'Web';
        $code->createCode();

        $code = new PageProjectCode();
        $code->prefixNamespace = $this->project->namespace;
        $code->path = $srcPath . 'Page';
        $code->pageClassName = 'Home';
        $code->createCode();

        $code = new ProjectSiteCode();
        $code->prefixNamespace = $this->project->namespace;
        $code->path = $srcPath . 'Site';
        $code->siteClassName = 'Home';
        $code->createCode();

        $code = new SetupProjectCode();
        $code->prefixNamespace = $this->project->namespace;
        $code->path = $srcPath . 'Setup';
        $code->createCode();

        // Package Setup
        /*$code = new ProjectPackageSetupCode();
        $code->prefixNamespace = $this->project->namespace;
        $code->path = $srcPath . 'Setup';
        $code->createCode();*/


        $code = new ProjectTemplateCode();
        $code->prefixNamespace = $this->project->namespace;
        $code->path = $srcPath . 'Template';
        $code->createCode();

        $filename = $projectPath . '.gitignore';
        $gitIgnore = new TextFileWriter($filename);
        $gitIgnore->addLine('config.ini');
        $gitIgnore->addLine('/admin');
        $gitIgnore->addLine('/web/data');
        $gitIgnore->addLine('/tmp');
        $gitIgnore->addLine('/log');
        $gitIgnore->saveFile();

        (new Debug())->write('To Do:');
        (new Debug())->write('- Composer Autoload definieren!!!');

    }


    private function copyAsset($filename, $path = null)
    {

        $copy = new FileCopy();
        $copy->sourceFilename = (new Path())
            ->addPath((new FrameworkProject())->path)
            ->addPath('..')
            ->addPath('package')
            ->addPath('project_builder')
            ->addPath($filename)
            ->getFilename();

        $destinationFilename = (new Path())
            ->addPath($this->project->path);

        if ($path !== null) {
            $destinationFilename->addPath($path);
        }

        $destinationFilename->addPath($filename);

        $copy->destinationFilename = $destinationFilename->getFilename();
        $copy->copyFile();

    }

}