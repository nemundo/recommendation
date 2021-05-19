<?php

namespace Nemundo\Model\Setup;


use Nemundo\Core\Directory\TextDirectory;
use Nemundo\Core\Language\LanguageConfig;
use Nemundo\Core\Log\LogMessage;
use Nemundo\Core\Path\Path;
use Nemundo\Db\Base\AbstractDbBase;
use Nemundo\Db\Provider\MySql\Connection\MySqlConnection;
use Nemundo\Db\Provider\MySql\Index\MySqlFullTextIndex;
use Nemundo\Db\Provider\MySql\Index\MySqlIndex;
use Nemundo\Db\Provider\MySql\Index\MySqlUniqueIndex;
use Nemundo\Db\Provider\MySql\Table\MySqlTable;
use Nemundo\Db\Provider\SqLite\Connection\SqLiteConnection;
use Nemundo\Db\Provider\SqLite\Index\SqLiteIndex;
use Nemundo\Db\Provider\SqLite\Index\SqLiteUniqueIndex;
use Nemundo\Db\Provider\SqLite\Table\SqLiteTable;
use Nemundo\Db\Table\AbstractTable;
use Nemundo\Model\Definition\Index\ModelIndex;
use Nemundo\Model\Definition\Index\ModelSearchIndex;
use Nemundo\Model\Definition\Index\ModelUniqueIndex;
use Nemundo\Model\Definition\Model\AbstractModel;
use Nemundo\Model\Path\DataPath;
use Nemundo\Model\Path\RedirectDataPath;
use Nemundo\Model\Type\DateTime\CreatedDateTimeType;
use Nemundo\Model\Type\DateTime\DateTimeType;
use Nemundo\Model\Type\DateTime\DateType;
use Nemundo\Model\Type\DateTime\ModifiedDateTimeType;
use Nemundo\Model\Type\DateTime\TimeType;
use Nemundo\Model\Type\External\AbstractExternalComplexType;
use Nemundo\Model\Type\External\Id\ExternalIdType;
use Nemundo\Model\Type\External\Id\ExternalUniqueIdType;
use Nemundo\Model\Type\File\AbstractFileType;
use Nemundo\Model\Type\File\FileType;
use Nemundo\Model\Type\File\ImageType;
use Nemundo\Model\Type\File\RedirectFilenameType;
use Nemundo\Model\Type\Id\UniqueIdType;
use Nemundo\Model\Type\Number\DecimalNumberType;
use Nemundo\Model\Type\Number\NumberType;
use Nemundo\Model\Type\Number\YesNoType;
use Nemundo\Model\Type\Text\LargeTextType;
use Nemundo\Model\Type\Text\TextType;
use Nemundo\Model\Type\Text\TranslationTextType;
use Nemundo\Orm\Model\AbstractOrmModel;


abstract class AbstractModelSetup extends AbstractDbBase
{


    /**
     * @var AbstractModel
     */
    public static $setupLog = [];


    // split !!!

    // addModel($model)
    // removeModel($model)


    // createModel(AbstractModel $model)
    public function createTable()
    {

        if (!$this->checkProperty('model')) {
            exit;
        }

        if (!$this->model->checkModel()) {
            exit;
        }

        if (!$this->checkConnection()) {
            return false;
        }

        if ($this->model->isObjectOfClass(AbstractOrmModel::class)) {
            (new LogMessage())->writeError('AbstractOrmModel Class. Class: ' . $this->model->getClassName());
        }

        $sql = new TextDirectory();

        /** @var AbstractTable $table */
        $table = null;

        if ($this->connection->isObjectOfClass(MySqlConnection::class)) {
            $table = new MySqlTable();
        }

        if ($this->connection->isObjectOfClass(SqLiteConnection::class)) {
            $table = new SqLiteTable();
        }

        $table->connection = $this->connection;
        $table->tableName = $this->model->tableName;
        $table->primaryIndex = $this->model->primaryIndex;

        foreach ($this->model->getTypeList(true) as $type) {

            if ($type->isObjectOfClass(AbstractExternalComplexType::class)) {
                $setup = new ModelSetup();
                $setup->model = $type->getExternalModel();
                $setup->createTable();
            }

            if ($type->isObjectOfClass(UniqueIdType::class)) {
                $table->addTextField($type->fieldName, 36, $type->allowNullValue);
            }

            if ($type->isObjectOfClass(ExternalIdType::class)) {
                $table->addNumberField($type->fieldName, $type->allowNullValue);
            }

            if ($type->isObjectOfClass(ExternalUniqueIdType::class)) {
                $table->addTextField($type->fieldName, 36, $type->allowNullValue);
            }

            if ($type->isObjectOfClass(TextType::class) && !$type->isObjectOfClass(TranslationTextType::class)) {
                $table->addTextField($type->fieldName, $type->length, $type->allowNullValue);
            }

            if ($type->isObjectOfClass(TranslationTextType::class)) {
                /*foreach ((new LanguageType())->getLanguageData() as $languageRow) {
                    $table->addTextField($type->fieldName . '_' . $languageRow->code, $type->length, $type->allowNullValue);
                }*/

                foreach (LanguageConfig::$languageList as $language) {
                    $table->addTextField($type->fieldName . '_' . $language, $type->length, $type->allowNullValue);
                }


            }

            if ($type->isObjectOfClass(AbstractFileType::class)) {
                $table->addTextField($type->fieldName, 255, $type->allowNullValue);
            }

            if ($type->isObjectOfClass(LargeTextType::class)) {
                $table->addLargeTextField($type->fieldName, $type->allowNullValue);
            }

            if ($type->isObjectOfClass(NumberType::class)) {
                $table->addNumberField($type->fieldName, $type->allowNullValue);
            }

            if ($type->isObjectOfClass(DecimalNumberType::class)) {
                $table->addDecimalNumberField($type->fieldName, $type->allowNullValue);
            }

            if ($type->isObjectOfClass(YesNoType::class)) {
                $table->addYesNoField($type->fieldName, $type->allowNullValue);
            }

            if ($type->isObjectOfClass(DateType::class)) {
                $table->addDateField($type->fieldName, $type->allowNullValue);
            }

            if ($type->isObjectOfClass(TimeType::class)) {
                $table->addTimeField($type->fieldName, $type->allowNullValue);
            }

            if ($type->getClassName() == DateTimeType::class) {
                $table->addDateTimeField($type->fieldName, $type->allowNullValue);
            }

            if ($type->isObjectOfClass(CreatedDateTimeType::class)) {

                if ($this->connection->isObjectOfClass(MySqlConnection::class)) {
                    $table->addCreatedTimestamp($type->fieldName);
                }

                if ($this->connection->isObjectOfClass(SqLiteConnection::class)) {
                    $table->addDateTimeField($type->fieldName);
                }

            }

            if ($type->isObjectOfClass(ModifiedDateTimeType::class)) {

                if ($this->connection->isObjectOfClass(MySqlConnection::class)) {
                    $table->addModifiedTimestamp($type->fieldName);
                }

                if ($this->connection->isObjectOfClass(SqLiteConnection::class)) {
                    $table->addDateTimeField($type->fieldName);
                }

            }

        }

        foreach ($this->model->getIndexList() as $index) {

            $dbIndex = null;
            if ($index->getClassName() == ModelIndex::class) {


                if ($this->connection->isObjectOfClass(MySqlConnection::class)) {
                    $dbIndex = new MySqlIndex($table);
                }

                if ($this->connection->isObjectOfClass(SqLiteConnection::class)) {
                    $dbIndex = new SqLiteIndex($table);
                }

            }

            if ($index->getClassName() == ModelUniqueIndex::class) {

                if ($this->connection->isObjectOfClass(MySqlConnection::class)) {
                    $dbIndex = new MySqlUniqueIndex($table);
                }

                if ($this->connection->isObjectOfClass(SqLiteConnection::class)) {
                    $dbIndex = new SqLiteUniqueIndex($table);
                }

            }

            if ($index->getClassName() == ModelSearchIndex::class) {
                //$dbIndex = new MySqlFullTextIndex($table);

                if ($this->connection->isObjectOfClass(MySqlConnection::class)) {
                    $dbIndex = new MySqlFullTextIndex($table);
                }

                if ($this->connection->isObjectOfClass(SqLiteConnection::class)) {
                    $dbIndex = new SqLiteIndex($table);
                }


            }

            if ($dbIndex !== null) {
                $dbIndex->indexName = $index->indexName;
                foreach ($index->getFieldNameList() as $fieldName) {
                    $dbIndex->addField($fieldName);
                }
            }

        }

        $table->createTable();

        foreach ($this->model->getTypeList() as $type) {

            if ($type->isObjectOfClass(FileType::class)) {
                (new Path($type->getDataPath()))->createPath();
            }

            if ($type->isObjectOfClass(ImageType::class)) {
                foreach ($type->getFormatList() as $resizeFormat) {
                    $path = $type->getDataPath() . $resizeFormat->getPath();
                    (new Path($path))->createPath();
                }
            }

            if ($type->isObjectOfClass(RedirectFilenameType::class)) {
                (new Path($type->file->getDataPath()))->createPath();
            }

        }


        //AbstractModelSetup::$setupLog

        SetupLog::$modelList[] = $this->model;

        /*
        $logFilename = (new SetupLogPath())->getFilename();

        $fileWriter = new TextFileWriter($logFilename);
        $fileWriter->createDirectory = true;
        $fileWriter->appendToExistingFile = true;
        $fileWriter->addLine($this->model->tableName);
        $fileWriter->saveFile();*/

        return $sql;

    }


    public function dropTable()
    {

        if (!$this->checkObject('model', $this->model, AbstractModel::class)) {
            exit;
        }

        (new DataPath())
            ->addPath($this->model->tableName)
            ->deleteDirectory();

        (new RedirectDataPath())
            ->addPath($this->model->tableName)
            ->deleteDirectory();

        $table = new MySqlTable();
        $table->connection = $this->connection;
        $table->tableName = $this->model->tableName;
        $table->dropTable();

    }

}