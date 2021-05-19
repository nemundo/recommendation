<?php

namespace Nemundo\Model\Clean;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Debug\Debug;
use Nemundo\Db\Provider\MySql\Field\MySqlTableFieldReader;
use Nemundo\Db\Provider\MySql\Table\MySqlTableReader;

use Nemundo\Model\Setup\SetupLog;
use Nemundo\Model\Type\Complex\AbstractComplexType;
use Nemundo\App\Application\Type\Install\AbstractInstall;


// DatabaseInstallClean
abstract class AbstractDatabaseModelClean extends AbstractBase
{

    /**
     * @var bool
     */
    public $dropTable = false;

    /**
     * @var bool
     */
    public $dropField = false;

    /**
     * @var AbstractInstall[]
     */
    private $installList = [];


    protected function addInstall(AbstractInstall $install)
    {
        $this->installList[] = $install;
        return $this;
    }


    public function startInstall()
    {


        foreach ($this->installList as $install) {
            $install->install();
        }


        // include application install


        // Problem --> extends Model (z.B. User Model)


        $tableReader = new MySqlTableReader();
        foreach ($tableReader->getData() as $mySqlTable) {

            $found = false;

            foreach (SetupLog::$modelList as $model) {

                if ($model->tableName == $mySqlTable->tableName) {
                    $found = true;

                    $fieldReader = new MySqlTableFieldReader();
                    $fieldReader->tableName = $mySqlTable->tableName;
                    foreach ($fieldReader->getData() as $mySqlField) {

                        $typeFound = false;
                        foreach ($model->getTypeList() as $type) {

                            if ($type->isObjectOfClass(AbstractComplexType::class)) {

                                foreach ($type->getTypeList() as $subType) {
                                    if ($subType->fieldName == $mySqlField->fieldName) {
                                        $typeFound = true;
                                    }
                                }

                            } else {

                                if ($type->fieldName == $mySqlField->fieldName) {
                                    $typeFound = true;
                                }

                            }

                        }

                        if (!$typeFound) {
                            (new Debug())->write('Drop Field: ' . $mySqlField->fieldName. ' ('.$mySqlTable->tableName.')');
                            if ($this->dropField) {
                                $mySqlField->dropField();
                            }
                        }

                    }

                }

            }

            if (!$found) {
                (new Debug())->write('Drop Table: ' . $mySqlTable->tableName);

                if ($this->dropTable) {
                    $mySqlTable->dropTable();
                }

            }

        }

    }


}