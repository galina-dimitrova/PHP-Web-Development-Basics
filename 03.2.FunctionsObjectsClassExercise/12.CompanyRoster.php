<?php
$n = intval(readline());
$employees = array();
for ($i = 0; $i<$n; $i++) {
    $input = explode(" ", readline());
    $name=$input[0];
    $salary = (float)$input[1];
    $position = $input[2];
    $department = $input[3];
    if (count($input)==4) {
        $email = "n/a";
        $age = "-1";
    } elseif (count($input)==5) {
        if (is_numeric($input[4])) {
            $age = $input[4];
            $email = "n/a";

        } else {
            $email = $input[4];
            $age = "-1";
        }
    } elseif (count($input)==6) {
            $email = $input[4];
            $age = $input[5];
        }
    $employee = new Employee($name, (float)$salary, $position, $department, $email, $age);
    array_push($employees, $employee);
}
echo "Highest Average Salary: ".getMaxSalaryEmployees($employees)[0]->department.PHP_EOL;
foreach (getMaxSalaryEmployees($employees) as $empl) {
    echo $empl->name.' '.number_format($empl->salary,2,'.', '').' '.$empl->email.' '.$empl->age.PHP_EOL;
}

function getMaxSalaryEmployees($employees) {
    usort($employees, function (Employee $a, Employee $b)
    {
        return $a->department<=> $b->department;
    });
    $maxDep = [];
    $maxSalary = 0;
    $allSalary = $employees[0]->salary;
    $count = 1;
    $avgSal = $allSalary/$count;
    if (count($employees)==1) {
        array_push($maxDep, $employees[0]);
    } else {
        for ($j = 1; $j<count($employees); $j++) {
            if ($employees[$j]->department == $employees[$j-1]->department) {
                $allSalary+=$employees[$j]->salary;
                $count+=1;
                $avgSal = $allSalary/$count;
            } else {
                $allSalary = $employees[$j]->salary;
                $count=1;
            }
            if ($avgSal>$maxSalary) {
                $maxSalary = $avgSal;
                $maxDep = array();
                foreach ($employees as $emp) {
                    if ($emp->department == $employees[$j-1]->department) {
                        array_push($maxDep, $emp);
                    }
                }
            }
        }
    }
    usort($maxDep, function (Employee $a,Employee $b)
    {
        return $b->salary <=> $a->salary;
    });
    return $maxDep;
}

class Employee {
    public $name;
    public $salary;
    public $position;
    public $department;
    public $email;
    public $age;

    public function __construct($name, float $salary, $position, $department, $email, $age)
    {
        $this->name = $name;
        $this->salary = $salary;
        $this->position = $position;
        $this->department = $department;
        $this->email = $email;
        $this->age = $age;
    }
}