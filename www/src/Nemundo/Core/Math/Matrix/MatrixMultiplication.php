<?php

namespace Nemundo\Core\Math\Matrix;


use Nemundo\Core\Base\AbstractBase;

class MatrixMultiplication extends AbstractBase
{

    public function multiplicateMatrix(Matrix $matrixA, Matrix $matrixB)
    {

        $r = $matrixA->getRowCount();
        $c = $matrixB->getColumnCount();
        $p = $matrixB->getRowCount();

        $result = new Matrix();
        for ($i = 0; $i < $r; $i++) {
            for ($j = 0; $j < $c; $j++) {
                $result->setValue($i, $j, 0);
                for ($k = 0; $k < $p; $k++) {
                    $value = $result->getValue($i, $j);
                    $value = $value + $matrixA->getValue($i, $k) * $matrixB->getValue($k, $j);
                    $result->setValue($i, $j, $value);

                }
            }
        }

        return $result;

    }


}