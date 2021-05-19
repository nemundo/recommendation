<?php

namespace Nemundo\App\ModelDesigner\Json;


use Nemundo\App\ModelDesigner\Builder\IndexBuilder;
use Nemundo\App\ModelDesigner\Builder\ModelBuilder;
use Nemundo\App\ModelDesigner\Builder\TypeBuilder;
use Nemundo\App\ModelDesigner\Collection\ImageFormatCollection;
use Nemundo\App\ModelDesigner\Collection\ModelTemplateCollection;
use Nemundo\App\ModelDesigner\Collection\PrimaryIndexCollection;
use Nemundo\App\ModelDesigner\Model\ModelDesignerOrmModel;
use Nemundo\App\ModelDesigner\Orm\OrmBuilder;
use Nemundo\App\ModelDesigner\Path\ModelPath;
use Nemundo\App\ModelDesigner\Type\ExternalModelDesignerType;
use Nemundo\App\ModelDesigner\Type\ImageModelDesignerType;
use Nemundo\App\ModelDesigner\Type\TextModelDesignerType;
use Nemundo\App\ModelDesigner\Type\VirtualExternalModelDesignerType;
use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Json\Document\JsonDocument;
use Nemundo\Core\Json\Reader\JsonReader;
use Nemundo\Core\Log\LogMessage;
use Nemundo\Core\Path\Path;
use Nemundo\Core\Sorting\SortingListOfObject;
use Nemundo\Core\Type\File\File;
use Nemundo\Model\Type\ImageFormat\AutoSizeModelImageFormat;
use Nemundo\Model\Type\ImageFormat\FixHeightModelImageFormat;
use Nemundo\Model\Type\ImageFormat\FixWidthModelModelImageFormat;
use Nemundo\Orm\Model\AbstractOrmModel;
use Nemundo\Orm\Model\Template\DefaultOrmModel;
use Nemundo\Orm\Type\File\ImageOrmType;
use Nemundo\Orm\Type\Text\TextOrmType;
use Nemundo\Project\AbstractProject;


class AppJson extends AbstractBase
{

    /**
     * @var string
     */
    public $appLabel;

    /**
     * @var string
     */
    public $appName;

    /**
     * @var string
     */
    public $namespace;

    /**
     * @var bool
     */
    public $isDeleted = false;

    /**
     * @var bool
     */
    public $loadType = true;


    /**
     * @var string
     */
    private $filename;

    /**
     * @var ModelDesignerOrmModel[]
     */
    private $modelList = [];

    /**
     * @var AbstractProject
     */
    private $project;


    public function fromProject(AbstractProject $project, $appName)
    {

        $this->project = $project;

        $jsonFilename = (new Path())
            ->addPath($project->modelPath)
            ->addPath($appName . '.json')
            ->getFilename();

        $this->fromFilename($jsonFilename);

    }


    public function fromFilename($filename)
    {

        $this->filename = $filename;

        $file = new File($this->filename);
        if ($file->fileExists()) {

            $reader = new JsonReader();
            $reader->fromFilename($this->filename);

            $jsonText = $reader->getData();

            $this->appLabel = $jsonText['app'];
            $this->appName = $jsonText['name'];
            $this->namespace = $jsonText['namespace'];
            $this->isDeleted = $jsonText['is_deleted'];

            if (isset($jsonText['model'])) {

                foreach ($jsonText['model'] as $jsonRow) {

                    $templateName = (new DefaultOrmModel())->templateName;
                    if (isset($jsonRow['template'])) {
                        $templateName = $jsonRow['template'];
                    }

                    $model = (new ModelTemplateCollection())->getModelByTemplateName($templateName);
                    $model->templateName = $templateName;
                    $model->modelId = $jsonRow['model_id'];
                    $model->label = '';
                    if (isset($jsonRow['label'])) {
                        $model->label = $jsonRow['label'];
                    }
                    $model->className = $jsonRow['class_name'];
                    $model->tableName = $jsonRow['table_name'];
                    $model->namespace = $jsonRow['namespace'];

                    if (isset($jsonRow['row_class_name'])) {
                        $model->rowClassName = $jsonRow['row_class_name'];
                    }

                    $model->isDeleted = $jsonRow['is_deleted'];
                    foreach ((new PrimaryIndexCollection())->getPrimaryIndexCollection() as $primaryIndex) {
                        if ($primaryIndex->primaryIndexName == $jsonRow['primary_index']) {
                            $model->primaryIndex = $primaryIndex;
                        }
                    }

                    if ($this->loadType) {

                        if (isset($jsonRow['type'])) {
                            foreach ($jsonRow['type'] as $typeJson) {

                                $type = (new TypeBuilder())->getType($typeJson['type']);

                                $type->label = '';
                                if (isset($typeJson['label'])) {
                                    $type->label = $typeJson['label'];
                                }

                                $type->fieldName = $typeJson['field_name'];
                                $type->variableName = $typeJson['variable_name'];
                                $type->allowNullValue = $typeJson['allow_null'];
                                $type->isDeleted = $typeJson['is_deleted'];

                                if ($type->isObjectOfClass(TextModelDesignerType::class)) {
                                    $type->length = $typeJson['length'];
                                }

                                if ($type->isObjectOfClass(ExternalModelDesignerType::class)) {

                                    $externalModelId = $typeJson['external_model_id'];
                                    $type->externalModelId = $externalModelId;

                                    $externalModel = (new ModelBuilder())->getModelById($externalModelId);
                                    if ($externalModel !== null) {
                                        $type->externalClassName = $externalModel->namespace . '\\' . $externalModel->className;
                                        $type->rowClassName = $externalModel->rowClassName;
                                    }

                                }

                                if ($type->isObjectOfClass(VirtualExternalModelDesignerType::class)) {

                                    $externalModelId = $typeJson['external_model_id'];
                                    $type->externalModelId = $externalModelId;
                                    $type->externalFieldName = $typeJson['external_field_name'];

                                    $externalModel = (new ModelBuilder())->getModelById($externalModelId);
                                    if ($externalModel !== null) {
                                        $type->externalClassName = $externalModel->namespace . '\\' . $externalModel->className;
                                        $type->rowClassName = $externalModel->rowClassName;
                                    }

                                }

                                if ($type->isObjectOfClass(ImageOrmType::class)) {

                                    foreach ($typeJson['format'] as $imageFormatJson) {

                                        $imageFormat = (new ImageFormatCollection())->getImageFormat($imageFormatJson['format_type']);
                                        $imageFormat->size = $imageFormatJson['size'];

                                        if ($imageFormat->isObjectOfClass(AutoSizeModelImageFormat::class)) {
                                            $imageFormat->size = $imageFormatJson['size'];
                                        }

                                        if ($imageFormat->isObjectOfClass(FixWidthModelModelImageFormat::class)) {
                                            $imageFormat->width = $imageFormatJson['size'];
                                        }

                                        if ($imageFormat->isObjectOfClass(FixHeightModelImageFormat::class)) {
                                            $imageFormat->height = $imageFormatJson['size'];
                                        }

                                        $type->addFormat($imageFormat);

                                    }

                                    /*
                                    $formatList = [];
                                    foreach ($type->getFormatList() as $format) {

                                        //(new Debug())->write($format);

                                        $formatJson = [];
                                        $formatJson['format_type']=$format->imageFormatName;

                                        if ($format->isObjectOfClass(AutoSizeModelImageFormat::class)) {
                                            $formatJson['size']=$format->size;
                                        }

                                        if ($format->isObjectOfClass(FixWidthModelModelImageFormat::class)) {
                                            $formatJson['width']=$format->width;
                                        }

                                        if ($format->isObjectOfClass(FixHeightModelImageFormat::class)) {
                                            $formatJson['height']=$format->height;
                                        }

                                        $formatList[]= $formatJson;

                                    }

                                    $typeJson['format'] =$formatList;*/

                                }

                                $model->addType($type);

                            }
                        }

                        if (isset($jsonRow['index'])) {
                            foreach ($jsonRow['index'] as $indexJson) {

                                $index = (new IndexBuilder())->getIndex($indexJson['index_type']);
                                $index->indexName = $indexJson['index_name'];

                                foreach ($indexJson['field_name'] as $fieldName) {
                                    $type = (new TypeBuilder())->getTypeFromModel($model, $fieldName);
                                    $index->addType($type);
                                }

                                $model->addIndex($index);

                            }

                        }

                    }

                    $this->modelList[] = $model;

                }

            }

            $sorting = new SortingListOfObject();
            $sorting->objectList = $this->modelList;
            $sorting->sortingProperty = 'className';
            $this->modelList = $sorting->getSortedListOfObject();

        }

    }


    public function getJsonFilename()
    {
        return $this->filename;
    }


    public function getModelList($hideDeletedModel = true)
    {

        $list = $this->modelList;

        if ($hideDeletedModel) {

            $list = [];

            foreach ($this->modelList as $model) {

                if (!$model->isDeleted) {
                    $list[] = $model;
                }

            }

        }

        return $list;

    }


    public function getModelByTableName($tableName, $hideDeletedModel = true)
    {

        /** @var ModelDesignerOrmModel $modelValue */
        $modelValue = null;
        foreach ($this->getModelList($hideDeletedModel) as $model) {
            if ($model->tableName == $tableName) {
                $modelValue = $model;
            }
        }

        if ($modelValue == null) {
            (new LogMessage())->writeError('No model found');
            exit;
        }

        return $modelValue;

    }


    public function addModel(AbstractOrmModel $model)
    {

        if ($model == null) {
            exit;
        }


        $this->modelList[] = $model;
        $this->writeJson();

    }


    public function removeModel(AbstractOrmModel $model)
    {

        $model->isDeleted = true;
        $this->writeJson();

    }


    public function deleteApp()
    {

        $this->isDeleted = true;
        $this->writeJson();


    }


    public function undoDeleteApp()
    {

        $this->isDeleted = false;
        $this->writeJson();


    }


    public function writeJson()
    {

        if ($this->filename == null) {

            $this->filename = (new ModelPath())
                ->addPath($this->appName . '.json')
                ->getFilename();

        }

        $json = new JsonDocument();
        $json->filename = $this->filename;

        $jsonRow['app'] = $this->appLabel;
        $jsonRow['name'] = $this->appName;
        $jsonRow['namespace'] = $this->namespace;
        $jsonRow['is_deleted'] = $this->isDeleted;

        foreach ($this->modelList as $model) {

            //(new Debug())->write( $model->templateName);

            $row = null;
            $row['template'] = $model->templateName;
            $row['model_id'] = $model->modelId;
            $row['label'] = $model->label;
            $row['class_name'] = $model->className;
            $row['table_name'] = $model->tableName;
            $row['namespace'] = $model->namespace;
            $row['row_class_name'] = $model->rowClassName;
            $row['primary_index'] = $model->primaryIndex->primaryIndexName;
            $row['is_deleted'] = $model->isDeleted;

            /** @var ExternalModelDesignerType|VirtualExternalModelDesignerType|TextModelDesignerType|ImageModelDesignerType $type */
            foreach ($model->getTypeList(false, false) as $type) {

                if ($type->isEditable) {

                    $typeJson = [];
                    $typeJson['type'] = $type->typeName;
                    $typeJson['label'] = $type->label;
                    $typeJson['field_name'] = $type->fieldName;
                    $typeJson['variable_name'] = $type->variableName;
                    $typeJson['allow_null'] = $type->allowNullValue;
                    $typeJson['is_deleted'] = $type->isDeleted;

                    if ($type->isObjectOfClass(TextOrmType::class)) {
                        $typeJson['length'] = $type->length;
                    }

                    if ($type->isObjectOfClass(ExternalModelDesignerType::class)) {
                        $typeJson['external_model_id'] = $type->externalModelId;
                    }

                    if ($type->isObjectOfClass(VirtualExternalModelDesignerType::class)) {
                        $typeJson['external_model_id'] = $type->externalModelId;
                        $typeJson['external_field_name'] = $type->externalFieldName;
                    }

                    if ($type->isObjectOfClass(ImageOrmType::class)) {

                        $formatList = [];
                        foreach ($type->getFormatList() as $format) {

                            $formatJson = [];
                            $formatJson['format_type'] = $format->imageFormatName;
                            $formatJson['size'] = $format->size;

                            /*
                            if ($format->isObjectOfClass(AutoSizeModelImageFormat::class)) {
                                $formatJson['size']=$format->size;
                            }

                            if ($format->isObjectOfClass(FixWidthModelModelImageFormat::class)) {
                                $formatJson['width']=$format->width;
                            }

                            if ($format->isObjectOfClass(FixHeightModelImageFormat::class)) {
                            $formatJson['height']=$format->height;
                            }*/

                            $formatList[] = $formatJson;

                        }

                        $typeJson['format'] = $formatList;

                    }

                    $row['type'][] = $typeJson;

                }

            }

            $indexList = [];
            foreach ($model->getIndexList() as $index) {

                if ($index->isEditable) {

                    $indexJson = [];
                    $indexJson['index_name'] = $index->indexName;
                    $indexJson['index_type'] = $index->indexType;

                    $indexFieldNameJson = [];
                    foreach ($index->getTypeList() as $type) {
                        $indexFieldNameJson[] = $type->fieldName;
                    }

                    $indexJson['field_name'] = $indexFieldNameJson;

                    $indexList[] = $indexJson;

                }

            }

            $row['index'] = $indexList;
            $jsonRow['model'][] = $row;

        }

        $json->setData($jsonRow);
        $json->writeFile();

        // load json

        $orm = new OrmBuilder();
        $orm->project = $this->project;
        $orm->app = $this;
        $orm->createOrm();

    }

}