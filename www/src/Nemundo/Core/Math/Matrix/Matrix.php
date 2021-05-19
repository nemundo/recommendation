<?php

namespace Nemundo\Core\Math\Matrix;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Log\LogMessage;
use Nemundo\Core\Structure\ForLoop;

class Matrix extends AbstractBase
{

    public $rowCount = 1;

    public $columnCount = 1;


    private $matrix;


    public function __construct($matrix = null)
    {

        // check


        if ($matrix !== null) {

            if (!is_array($matrix)) {
                (new LogMessage())->writeError('No valid array');
            }

            $this->matrix = $matrix;
        }


    }


    public function createMatrix()
    {

        $this->matrix = [];

        $rowLoop = new ForLoop();
        $rowLoop->minNumber = 0;
        $rowLoop->maxNumber = $this->rowCount - 1;

        foreach ($rowLoop->getData() as $row) {

            $columnLoop = new ForLoop();
            $columnLoop->minNumber = 0;
            $columnLoop->maxNumber = $this->columnCount - 1;

            foreach ($columnLoop->getData() as $column) {
                $this->setValue($row, $column, 0);
            }

        }

    }


    public function setValue($x, $y, $value)
    {
        $this->matrix[$x][$y] = $value;
        return $this;
    }


    public function getValue($x, $y)
    {
        $value = $this->matrix[$x][$y];
        return $value;
    }


    public function getRowCount()
    {

        $rowCount = sizeof($this->matrix);
        return $rowCount;

    }


    public function getColumnCount()
    {
        $columnCount = sizeof($this->matrix[0]);
        return $columnCount;
    }


    /*
    public function printMatrix()
    {

        $table = new Table();
        $table->border = 1;


        $rowLoop = new ForLoop();
        $rowLoop->minNumber = 0;
        $rowLoop->maxNumber = $this->getRowCount() - 1;

        foreach ($rowLoop->getData() as $row) {
            $tableRow = new TableRow($table);

            $columnLoop = new ForLoop();
            $columnLoop->minNumber = 0;
            $columnLoop->maxNumber = $this->getColumnCount() - 1;

            foreach ($columnLoop->getData() as $column) {
                $tableRow->addText($this->matrix[$row][$column]);
            }


        }


        echo $table->getContent();

    }*/


}