<?php

namespace Nemundo\App\MySql\Site\Action;


use Nemundo\Admin\MySql\Parameter\TableParameter;
use Nemundo\Core\Csv\Document\CsvDocument;
use Nemundo\Db\Provider\MySql\Field\MySqlTableFieldReader;
use Nemundo\Db\Reader\DataReader;
use Nemundo\Web\Site\AbstractSite;

// TableCsvExportSite
class CsvExportSite extends AbstractSite
{

    /**
     * @var CsvExportSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'Csv Export';
        $this->url = 'csv-export';
        $this->menuActive = false;

        CsvExportSite::$site = $this;
    }


    public function loadContent()
    {

        $tableName = (new TableParameter())->getValue();

        $csv = new CsvDocument();
        $csv->convertExcel = true;
        $csv->filename = $tableName . '.csv';


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