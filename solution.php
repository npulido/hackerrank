<?php
$_fp = fopen("php://stdin", "r");

if ($_fp) {
    //SETUP INPUT DATA
    $count = 0; // INPUT COUNTER
    while (($buffer = fgets($_fp, 4096)) !== false) {
        $lines[$count] = $buffer;
        $count++;
    }
    if (!feof($_fp)) {
        echo "Error: unexpected fgets() fail\n";
    }
    $number_of_cases = $lines[0]; // DEFINE T, NUMBER OF TEST CASES, aka THE FIRST LINE FROM THE INPUT
    
    //**SOLUTION START **
    $x=1; //START AT 1
    while($x<=$number_of_cases) {
        $total = 0; // RUNNING COUNT OF RESULT FOR EACH LINE
        $number = $lines[$x];
        $c=0; // CHARACTER ITERATOR
        $string_length = strlen($number) - 1;
        while($c<=$string_length){
            $char = $number[$c]; 
            if($char!=0){
                $result = $number/$char; // EVALUATE FOR DIVISIBILITY
                if(!strpos($result, '.')){ // NO DECIMAL FOUND, ASSUMED INT THUS EVENLY DIVISIBLE BY DIGIT
                   $total++; // INCREMENT COUNT FOR MATCHING DIGIT
                }
            }
            $c++; // Internal Substring Char Iterator
        }
            echo $total . "\n"; //OUTPUT RESULT FOR EACH LINE
            $x++; // INCREMENT $X, NEXT LINE
    }   
    fclose($_fp); // CLOSE STDIO
}
?>