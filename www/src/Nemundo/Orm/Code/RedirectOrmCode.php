<?php

namespace Nemundo\Orm\Code;


use Nemundo\Core\Type\Text\Text;
use Nemundo\Dev\Code\PhpClass;
use Nemundo\Dev\Code\PhpFunction;
use Nemundo\Dev\Code\PhpVariable;
use Nemundo\Model\Redirect\AbstractRedirectFilenameSite;
use Nemundo\Model\Redirect\AbstractRedirectFileSite;
use Nemundo\Model\Type\AbstractModelType;
use Nemundo\Orm\Type\File\MultiRedirectFilenameOrmType;
use Nemundo\Orm\Type\File\RedirectFilenameOrmType;
use Nemundo\Orm\Type\File\RedirectFileOrmType;
use Nemundo\Orm\Type\OrmTypeTrait;
use Nemundo\Orm\Utility\RedirectVariableName;
use Nemundo\Orm\Utility\UppercaseFirstLetter;

class RedirectOrmCode extends AbstractOrmCode
{

    public function createClass()
    {

        $namespace = $this->model->namespace . '\\Redirect';

        $configPhp = new PhpClass();
        $configPhp->overwriteExistingPhpFile = true;
        $configPhp->project = $this->project;
        $configPhp->namespace = $namespace;
        $configPhp->className = $this->model->className . 'RedirectConfig';

        $found = false;

        /** @var AbstractModelType|OrmTypeTrait $type */
        foreach ($this->model->getTypeList() as $type) {

            if ($type->isObjectOfClass(RedirectFileOrmType::class) ||
                $type->isObjectOfClass(RedirectFilenameOrmType::class) ||
                $type->isObjectOfClass(MultiRedirectFilenameOrmType::class)
            ) {

                $found = true;

                $className = $this->model->className . (new UppercaseFirstLetter())->uppercaseFirstLetter($type->variableName) . 'RedirectSite';
                $url = $this->model->tableName . '-' . $type->fieldName . '-redirect';

                $variableName = new RedirectVariableName();
                $variableName->model = $this->model;
                $variableName->type = $type;
                $registerVariableName = $variableName->getVariableName();

                $modelClassName = $this->prefixClassName($this->model->namespace . '\\' . $this->model->className . 'Model');

                $php = new PhpClass();
                $php->project = $this->project;
                $php->namespace = $this->model->namespace . '\\Redirect';
                $php->className = $className;

                if ($type->isObjectOfClass(RedirectFileOrmType::class)) {
                    $php->extendsFromClass = $this->prefixClassName(AbstractRedirectFileSite::class);
                } else {
                    $php->extendsFromClass = $this->prefixClassName(AbstractRedirectFilenameSite::class);
                }


                $php->overwriteExistingPhpFile = true;

                $function = new PhpFunction($php);
                $function->functionName = 'loadSite()';
                $function->add('parent::loadSite();');
                $function->add('$this->url = "' . (new Text($url))->replace('_', '-')->getValue() . '";');

                if ($type->isObjectOfClass(RedirectFilenameOrmType::class) ||
                    $type->isObjectOfClass(RedirectFileOrmType::class)
                ) {
                    $function->add('$this->model = new  ' . $modelClassName . '();');
                    $function->add('$this->type = $this->model->' . $type->variableName . ';');
                }


                if ($type->isObjectOfClass(MultiRedirectFilenameOrmType::class)) {
                    $function->add('$model = new ' . $modelClassName . '();');
                    $function->add('$this->model = $model->' . $type->variableName . '->getExternalModel();');
                    $function->add('$this->type = $this->model->file;');

                }

                $variable = new PhpVariable($configPhp);
                $variable->variableName = $registerVariableName;
                $variable->dataType = $className;
                $variable->staticVariable = true;

                $function->add($this->model->className . 'RedirectConfig::$' . $registerVariableName . ' = $this;');

                $php->saveFile();

            }

        }

        if ($found) {
            $configPhp->saveFile();
        }

    }

}