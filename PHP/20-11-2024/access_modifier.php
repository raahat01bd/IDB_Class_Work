<?php
// Declare a namespace for the vehicles
namespace VehicleNamespace;

// Define an interface for vehicles
interface VehicleInterface {
    public function startEngine();
    public function stopEngine();
    public function displayDetails();
}

// Abstract class representing a generic vehicle
abstract class Vehicle implements VehicleInterface {
    protected $brand;
    protected $model;
    private $year;

    // Constructor to initialize brand, model, and year
    public function __construct($brand, $model, $year) {
        $this->brand = $brand;
        $this->model = $model;
        $this->setYear($year); // Using setter for year
    }

    // Public method to access private year
    public function getYear() {
        return $this->year;
    }

    // Private method to set year (only within this class)
    private function setYear($year) {
        $this->year = $year;
    }

    // Implementing methods from the interface
    public function startEngine() {
        echo "Starting the engine of $this->brand $this->model ($this->year).\n";
    }

    public function stopEngine() {
        echo "Stopping the engine of $this->brand $this->model ($this->year).\n";
    }

    // Abstract method to be implemented by subclasses
    abstract public function displayDetails();
}

// Car class that inherits from the Vehicle class
class Car extends Vehicle {
    private $numberOfDoors;

    // Constructor to initialize car-specific properties
    public function __construct($brand, $model, $year, $numberOfDoors) {
        parent::__construct($brand, $model, $year); // Calling parent constructor
        $this->numberOfDoors = $numberOfDoors;
    }

    // Implementing the abstract method from Vehicle class
    public function displayDetails() {
        echo "This is a $this->brand $this->model car with $this->numberOfDoors doors.\n";
    }
}

// Motorcycle class that inherits from the Vehicle class
class Motorcycle extends Vehicle {
    private $hasSidecar;

    // Constructor to initialize motorcycle-specific properties
    public function __construct($brand, $model, $year, $hasSidecar) {
        parent::__construct($brand, $model, $year); // Calling parent constructor
        $this->hasSidecar = $hasSidecar;
    }

    // Implementing the abstract method from Vehicle class
    public function displayDetails() {
        $sidecar = $this->hasSidecar ? 'has a sidecar' : 'does not have a sidecar';
        echo "This is a $this->brand $this->model motorcycle and $sidecar.\n";
    }
}

// Instantiate objects of Car and Motorcycle classes
$car = new Car("Toyota", "Corolla", 2020, 4);
$motorcycle = new Motorcycle("Harley-Davidson", "Sportster", 2019, true);

// Call methods on the objects
$car->startEngine();
$car->displayDetails();
$car->stopEngine();

echo "\n";

$motorcycle->startEngine();
$motorcycle->displayDetails();
$motorcycle->stopEngine();

// Accessing private property 'year' via a public method (getter)
echo "\nAccessing the year of the car: " . $car->getYear() . "\n";
echo "Accessing the year of the motorcycle: " . $motorcycle->getYear() . "\n";
?>
