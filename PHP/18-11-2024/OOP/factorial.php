<form method="POST">
    <label for="number">Enter a number:</label>
    <input type="number" name="number" required><br><br>

    <input type="submit" value="Calculate Factorial">

</form>
<?php

class FactorialCalculator {
  
    private $number;

   
    public function __construct($number) {
        $this->number = $number;
    }

    
    public function calculateFactorial() {
        $factorial = 1; 

        
        for ($i = 1; $i <= $this->number; $i++) {
            $factorial *= $i; 
        }

        return $factorial;
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $number = $_POST['number'];

    
    $factorialCalc = new FactorialCalculator($number);

    
    $result = $factorialCalc->calculateFactorial();
    echo "The factorial of $number is: " . $result;
}
?>


