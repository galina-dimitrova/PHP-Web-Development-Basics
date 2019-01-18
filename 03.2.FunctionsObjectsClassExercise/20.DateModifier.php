<?php
class DateModifier {
    public $startDate;
    public $endDate;

    /**
     * DateModifier constructor.
     * @param $startDate
     * @param $endDate
     */
    public function __construct($startDate, $endDate)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }


    public function calcDifference(DateTime $from, DateTime $to) {
        $count = 0;
        if ($from<$to) {
            for ($date = $from; $date<$to; $date->modify('+1 day')) {
                $count+=1;
            }
        } elseif ($to<$from){
            for ($date = $to; $date<$from; $date->modify('+1 day')) {
                $count+=1;
            }
        }
        return $count;
    }
}
//
$startD = explode(" ", readline());
$start = new DateTime("$startD[2]-$startD[1]-$startD[0]");
$endD = explode(" ", readline());
$end = new DateTime("$endD[2]-$endD[1]-$endD[0]");
$modifier = new DateModifier($start, $end);
echo $modifier->calcDifference($start,$end);