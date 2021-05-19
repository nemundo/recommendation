<?php

namespace Nemundo\App\MySql\Site\Action;


use Nemundo\Admin\MySql\Parameter\TableParameter;
use Nemundo\Db\Provider\MySql\Field\MySqlTableFieldReader;
use Nemundo\Db\Reader\DataReader;
use Nemundo\Office\Excel\Document\ExcelDocument;
use Nemundo\Web\Site\AbstractSite;

class ExcelExportSite extends AbstractSite
{

    /**
     * @var CsvExportSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->url = 'excel-export';
        $this->menuActive = false;
    }


    protected function registerSite()
    {
        ExcelExportSite::$site = $this;
    }


    public function loadContent()
    {

        $tableName = (new TableParameter())->getValue();

        $csv = new ExcelDocument();
        $csv->filename = $tableName . '.xlsx';


        $fieldReader = new MySqlTableFieldReader();
        $fieldReader->tableName = $tableName;

        $fieldList = [];
        foreach ($fieldReader->getData() as $field) {
            $fieldList[] = $field->fieldName;
        }

        $csv->addRow($fieldList);

        $reader = new DataReader();
        $reader->tableName = $tableName;

        foreach ($reader->getData() as $row) {

            $data = [];
            foreach ($fieldList as $field) {
                $data[] = $row->getValue($field);
            }
            $csv->addRow($data);

        }

        $csv->render();

    }

}