<?php
// Define the class
class LargestNumber {
    // Properties to store the numbers
    private $num1, $num2, $num3;

    // Constructor to initialize the values
    public function __construct($num1, $num2, $num3) {
        $this->num1 = $num1;
        $this->num2 = $num2;
        $this->num3 = $num3;
    }

    // Method to find the largest number
    public function findLargest() {
        $largest = $this->num1; // Assume the first number is the largest initially

        if ($this->num2 > $largest) {
            $largest = $this->num2; // If the second number is larger, update the largest
        }

        if ($this->num3 > $largest) {
            $largest = $this->num3; // If the third number is larger, update the largest
        }

        return $largest; // Return the largest number
    }
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the user input from the form
    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];
    $num3 = $_POST['num3'];

    // Create an object of the LargestNumber class
    $largestNum = new LargestNumber($num1, $num2, $num3);

    // Find and display the largest number
    $largest = $largestNum->findLargest();
    echo "The largest number is: " . $largest;
}
?>

<!-- HTML Form to take user input -->
<form method="POST">
    <label for="num1">Enter first number:</label>
    <input type="number" name="num1" required><br><br>

    <label for="num2">Enter second number:</label>
    <input type="number" name="num2" required><br><br>

    <label for="num3">Enter third number:</label>
    <input type="number" name="num3" required><br><br>

    <input type="submit" value="Find Largest">
</form>

</body>
</html>
