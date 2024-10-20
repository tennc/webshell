<?php

// Function to get the USER's input for a valid number
function getNumberInput($prompt) {
    while (true) {
        echo $prompt;
        $input = trim(fgets(STDIN));

        if (is_numeric($input)) {
            return (float)$input;
        } else {
            echo "Please enter a valid number.\n";
        }
    }
}

// Function to get USER's input for operator
function getOperatorInput($prompt) {
    echo $prompt;
    return trim(fgets(STDIN));
} 

// Prompt the user for inputs
$num1 = getNumberInput("Enter the first number: ");
$operator = getOperatorInput("Choose an operator(+, -, *, /, %, **): ");
$num2 = getNumberInput("Enter the second number: ");

// Function to calculate basic mathematics
function calculate($num1, $num2, $operator) {
    switch ($operator) {
        case "+":
            return $num1 + $num2;
            break;

        case "-":
            return $num1 - $num2;
            break;
            
        case "*":
            return $num1 * $num2;
            break;
            
        case "/":
            return ($num1 == 0 || $num2 == 0) ? "ERROR! Number can't be divided by ZERO" : $num1 / $num2;
            break;
            
        case "%":
            return ($num1 == 0 || $num2 == 0) ? "ERROR! Division by ZERO" : $num1 % $num2;
            break;
            
        case "**":
            return $num1 ** $num2;
            break;
            
        default:
            return "Invalid operator! Please enter the right one(+, -, *, /, %, **)";
    }
}

// Calculate the result
$result = calculate($num1, $num2, $operator);

// Print the result
echo "\n==================================================\n";
echo "RESULT: $result\n";
echo "==================================================\n";

?>