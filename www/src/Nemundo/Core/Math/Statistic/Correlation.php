<?php


namespace Nemundo\Core\Math\Statistic;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Math\Base\NumberList;

class Correlation extends AbstractBase
{


    /**
     * @var NumberList
     */
    //public $aList;

    //public $bList;



    private $aList=[];


    private $bList=[];


    public function addValueA($value) {
        $this->aList[]=$value;
        return $this;
    }


    public function addValueB($value) {
        $this->bList[]=$value;
        return $this;
    }



    public function getCorrelation()
    {


        $x = $this->aList;
        $y= $this->bList;

        //function pearson_correlation($x,$y){
        if (count($x) !== count($y)) {
            return -1;
        }
        $x = array_values($x);
        $y = array_values($y);
        $xs = array_sum($x) / count($x);
        $ys = array_sum($y) / count($y);
        $a = 0;
        $bx = 0;
        $by = 0;
        for ($i = 0; $i < count($x); $i++) {
            $xr = $x[$i] - $xs;
            $yr = $y[$i] - $ys;
            $a += $xr * $yr;
            $bx += pow($xr, 2);
            $by += pow($yr, 2);
        }
        $b = sqrt($bx * $by);
        return $a / $b;
        //}


    }


    public function getText() {


        // r =


    }


}