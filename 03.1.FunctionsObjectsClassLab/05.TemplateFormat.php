<?php
$input = array_map(null, explode(",", readline()));
$question = null;
$answer = null;
//pri 0 i 1? imam 2 gre6ni
for ($i = 0; $i < count($input); $i++) {
    if ($i==1) {
        echo '<?xml version="1.0" encoding="UTF-8"?>'.PHP_EOL;
        echo '<quiz>'.PHP_EOL;
    }
    if ($i%2==0) {
        $question = $input[$i];
    } elseif ($i%2==1) {
        $answer = $input[$i];
        printDoc($question, $answer);
    }
    if ($i == count($input)-1){
        echo '</quiz>';
    }
}

function printDoc($question, $answer) {
    echo "<question>
    $question
  </question>
  <answer>
   $answer
  </answer>".PHP_EOL;
}
