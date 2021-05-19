<?php


namespace Nemundo\Model\Script;


use Nemundo\App\Script\Type\AbstractConsoleScript;
use Nemundo\Core\Debug\Debug;
use Nemundo\Db\DbConfig;
use Nemundo\Db\Provider\MySql\Table\MySqlTableReader;
use Nemundo\Db\Sql\Parameter\SqlStatement;


// im Dev
class TableCharsetUpdateScript extends AbstractConsoleScript
{

    protected function loadScript()
    {
        $this->scriptName = 'charset-update';
    }


    public function run()
    {

        # For each table
   /*     REPAIR TABLE table_name;
OPTIMIZE TABLE table_name;
     */

        $tableReader = new MySqlTableReader();
        foreach ($tableReader->getData() as $mySqlTable) {




            // ALTER TABLE wp_comments ENGINE=InnoDB;
            //(new Debug())->write($mySqlTable->tableName.' '.$mySqlTable->charset);


            $sql=new SqlStatement();
            $sql->sql = 'ALTER TABLE `'.$mySqlTable->tableName.'` CONVERT TO CHARACTER SET utf8mb4;';
            DbConfig::$defaultConnection->execute($sql);


            $sql=new SqlStatement();
            $sql->sql = 'ALTER TABLE `'.$mySqlTable->tableName.'` ENGINE=InnoDB;';
            DbConfig::$defaultConnection->execute($sql);




            // COLLATE utf8mb4_unicode_ci;




        }


    }

}