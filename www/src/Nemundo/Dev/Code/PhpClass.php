<?php

namespace Nemundo\Dev\Code;

use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Core\File\FileUtility;
use Nemundo\Core\TextFile\Writer\TextFileWriter;
use Nemundo\Project\AbstractProject;

// extends TextFileDocument
class PhpClass extends AbstractBaseClass
{

    /**
     * @var string
     */
    public $className;

    /**
     * @var string
     */
    public $extendsFromClass;

    /**
     * @var string
     */
    public $classComment;

    /**
     * @var string
     */
    public $namespace;

    /**
     * @var bool
     */
    public $abstractClass = false;

    /**
     * @var AbstractProject
     */
    public $project;

    /**
     * @var string
     */
    public $path;

    /**
     * @var bool
     */
    public $overwriteExistingPhpFile = false;

    /**
     * @var string
     */
    public $constructorParameter = '';

    /**
     * @var bool
     */
    public $includeClassStructure = true;

    private $useClass = [];

    private $traitClass = [];

    private $publicVariable = [];

    private $privateVariable = [];

    private $constVariable = [];

    /**
     * @var PhpVariable[]
     */
    private $phpVariable = [];

    private $phpConstructor = [];

    private $functionList = [];


    public function addFunction($function)
    {
        $this->functionList[] = $function;
    }

    /**
     *
     * @return PhpFunction[]
     */
    private function getFunctionList()
    {
        return $this->functionList;
    }


    function addUseClass($useClass)
    {
        $this->useClass[] = $useClass;
    }


    public function addTraitClass($className)
    {
        $this->traitClass[] = $className;
    }


    function addVariable($phpVariable)
    {
        $this->phpVariable[] = $phpVariable;
    }


    function addConstructor($code)
    {
        $this->phpConstructor[] = $code;
    }


    function addConstVariable($constName, $constValue)
    {

        $const = array();
        $const['name'] = $constName;
        $const['value'] = $constValue;

        $this->constVariable[] = $const;

    }


    public function getCode()
    {

        $php = [];
        $php[] = '<?php';

        if ($this->includeClassStructure) {

            if ($this->namespace !== null) {
                $php[] = 'namespace ' . $this->namespace . ';';
            }

            $this->useClass = array_unique($this->useClass);
            foreach ($this->useClass as $use) {
                $php[] = 'use ' . $use . ';';
            }

            if ($this->classComment !== null) {
                $php[] = '/**';
                $php[] = '* ' . $this->classComment;
                $php[] = '*/';
            }

            $extends = '';
            if ($this->extendsFromClass !== null) {
                $extends = 'extends ' . $this->extendsFromClass . ' ';
            }

            $className = '';
            if ($this->abstractClass) {
                $className = 'abstract ';
            }
            $className .= 'class ' . $this->className . ' ' . $extends . '{';
            $php[] = $className;

            foreach ($this->traitClass as $className) {
                $php[] = 'use ' . $className . ';';
            }

            foreach ($this->phpVariable as $variable) {
                $php = array_merge($php, $variable->getCode());
            }

            foreach ($this->publicVariable as $variable) {
                $php[] = 'public ' . $variable . ';';
            }

            foreach ($this->privateVariable as $variable) {
                $php[] = 'private ' . $variable . ';';
            }

            foreach ($this->constVariable as $const) {
                $php[] = 'const ' . $const['name'] . ' = "' . $const['value'] . '";';
            }

            if (sizeof($this->phpConstructor) > 0) {
                $php[] = 'public function __construct(' . $this->constructorParameter . ') {';
                $php = array_merge($php, $this->phpConstructor);
                $php[] = '}';
            }

            foreach ($this->getFunctionList() as $function) {
                $php = array_merge($php, $function->getCode());
            }

            $php[] = '}';
        }

        return $php;

    }


    function saveFile()
    {

        if ($this->project !== null) {

            $namespace = new PhpNamespace();
            $namespace->namespace = $this->namespace;
            $namespace->prefixNamespace = $this->project->namespace;
            $this->path = $this->project->path . DIRECTORY_SEPARATOR . $namespace->getPath();

        }

        if (!$this->checkProperty(['path', 'className'])) {
            return;
        }

        $filename = (new FileUtility())->appendDirectorySeparatorIfNotExists($this->path) . $this->className . '.php';

        $textFile = new TextFileWriter($filename);
        $textFile->createDirectory = true;
        $textFile->overwriteExistingFile = $this->overwriteExistingPhpFile;
        $textFile->addLine($this->getCode());
        $textFile->saveFile();

    }

}
