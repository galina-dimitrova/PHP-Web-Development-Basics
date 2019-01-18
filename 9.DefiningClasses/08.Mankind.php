<?php
class Human {
    public $firstName;
    public $lastName;

    /**
     * Human constructor.
     * @param $firstName
     * @param $lastName
     */
    public function __construct($firstName, $lastName)
    {
        $this->setFirstName($firstName);
        $this->setLastName($lastName);
    }


    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param mixed $firstName
     */
    private function setFirstName($firstName): void
    {
        if(ord($firstName[0])>=65&&ord($firstName[0])<=90) {
           if (strlen($firstName)>=4) {
               $this->firstName = $firstName;
           } else {
               echo "Expected length at least 4 symbols!Argument: firstName";
               exit();
           }
        } else {
            echo "Expected upper case letter!Argument: firstName";
            exit();
        }
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param mixed $lastName
     */
    private function setLastName($lastName): void
    {
        if((ord($lastName[0])>=65)&&(ord($lastName[0])<=90)) {
            if (strlen($lastName)>=3) {
                $this->lastName = $lastName;
            } else {
                echo "Expected length at least 3 symbols!Argument: lastName";
                exit();
            }
        } else {
            echo "Expected upper case letter!Argument: lastName";
            exit();
        }
    }
}

class Student extends Human{
    public $facultyNumber;

    public function __construct($firstName, $lastName, $facultyNumber)
{
    parent::__construct($firstName, $lastName);
    $this->setFacultyNumber($facultyNumber);
}

    /**
     * @return mixed
     */
    public function getFacultyNumber()
    {
        return $this->facultyNumber;
    }

    /**
     * @param mixed $facultyNumber
     */
    private function setFacultyNumber($facultyNumber): void
    {
        if (strlen($facultyNumber)>=5&&strlen($facultyNumber)<=10&&(is_numeric($facultyNumber))) {
                $this->facultyNumber = $facultyNumber;
        } else{
            echo "Invalid faculty number!";
            exit();
        }
    }

    public function __toString()
    {
        return "First Name: ".$this->getFirstName().PHP_EOL.
            "Last Name: ".$this->getLastName().PHP_EOL.
            "Faculty number: ".$this->getFacultyNumber().PHP_EOL;
    }
}

class Worker extends Human{
    public $weekSalary;
    public $hoursDay;

    /**
     * Worker constructor.
     * @param $firstName
     * @param $lastName
     * @param $weekSalary
     * @param $hoursDay
     */
    public function __construct($firstName, $lastName,$weekSalary, $hoursDay)
    {
        parent::__construct($firstName, $lastName);
        $this->setWeekSalary($weekSalary);
        $this->setHoursDay($hoursDay);
        $this->setLastName($lastName);
    }

    /**
     * @return mixed
     */
    public function getWeekSalary()
    {
        return $this->weekSalary;
    }

    /**
     * @param mixed $weekSalary
     */
    private function setWeekSalary($weekSalary): void
    {
        if ($weekSalary>10){
            $this->weekSalary = $weekSalary;
        } else{
            echo "Expected value mismatch!Argument: weekSalary";
            exit();
        }
    }

    /**
     * @return mixed
     */
    public function getHoursDay()
    {
        return $this->hoursDay;
    }

    /**
     * @param mixed $hoursDay
     */
    private function setHoursDay($hoursDay): void
    {
        if ($hoursDay>=1&&$hoursDay<=12) {
            $this->hoursDay = $hoursDay;
        } else{
            echo "Expected value mismatch!Argument: workHoursPerDay";
            exit();
        }
    }

    /**
     * @param mixed $lastName
     */
    private function setLastName($lastName): void
    {
        if (strlen($lastName)>3){
            $this->lastName = $lastName;
        }else{
            echo "Expected length more than 3 symbols!Argument: lastName";
            exit();
        }
    }

    public function getSalaryHour(){
        return number_format($this->weekSalary/(7*$this->hoursDay), 2, '.', '');
    }

    public function __toString()
    {
        return "First Name: ".$this->getFirstName().PHP_EOL.
            "Last Name: ".$this->getLastName().PHP_EOL.
            "Week Salary: ".number_format($this->getWeekSalary(), 2, '.', '').PHP_EOL.
            "Hours per day: ".number_format($this->getHoursDay(), 2, '.', '').PHP_EOL.
            "Salary per hour: ".$this->getSalaryHour().PHP_EOL;
    }
}

$studentInfo = explode(" ", readline());
$firstName= $studentInfo[0];
$lastName = $studentInfo[1];
$facultyNumber = $studentInfo[2];
$student = new Student($firstName, $lastName, $facultyNumber);

$workerInfo = explode(" ", readline());
$firstName = $workerInfo[0];
$lastName = $workerInfo[1];
$weekSalary = $workerInfo[2];
$workingHours = $workerInfo[3];
$worker = new Worker($firstName, $lastName, $weekSalary, $workingHours);

echo $student.PHP_EOL;
echo $worker;
