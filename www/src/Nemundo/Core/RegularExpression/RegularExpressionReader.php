<?php

namespace Nemundo\Core\RegularExpression;


use Nemundo\Core\Base\DataSource\AbstractDataSource;
use Nemundo\Core\Log\LogMessage;


class RegularExpressionReader extends AbstractDataSource
{
    /**
     * @var string
     */
    public $text;

    /**
     * @var string
     */
    public $regularExpression;


    /**
     * @return RegularExpressionRow[]
     */
    public function getData()
    {
        return parent::getData();
    }


    protected function loadData()
    {

        if (!$this->checkProperty(array('text', 'regularExpression'))) {
            return [];
        }

        $regex = $this->regularExpression;

        // Sonderzeichen ersetzen
        $regex = str_replace('/', '\\/', $regex);
        $regex = '/' . $regex . '/is';
        $anzahl = preg_match_all($regex, $this->text, $data, PREG_SET_ORDER);
        // falls fehler
        if ($anzahl === false) {
            (new LogMessage())->writeError('Fehler bei Crawler. Regex: ' . $regex);
        }

        foreach ($data as $item) {

            // Resultat über kompletter Regex löschen
            unset($item[0]);
            $item = array_values($item);
            $item = array_map('trim', $item);

            $row = new RegularExpressionRow($item);
            $this->addItem($row);

        }

    }


    public function getDataRow()
    {

        if (isset($this->getData()[0])) {
            return $this->getData()[0];
        } else {
            return array();
        }
    }

}