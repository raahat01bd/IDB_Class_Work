<?php
class Student
{
    private $id;
    private $name;
    private $phone;

    public static $path = "data.txt"; // File to store student data
    
    // Constructor to initialize student data
    public function __construct($id, $name, $phone)
    {
        $this->id = $id;
        $this->name = $name;
        $this->phone = $phone;
    }

    // Method to get student info as a string
    public function getInfo()
    {
        return "ID: $this->id, Name: $this->name, Phone: $this->phone";
    }

    // Method to save student data to file
    public function save()
    {
        $data = $this->id . ',' . $this->name . ',' . $this->phone . PHP_EOL;
        file_put_contents(self::$path, $data, FILE_APPEND);
    }

    // Method to load all students from the file
    public static function loadAll()
    {
        if (!file_exists(self::$path)) {
            return [];
        }

        $data = file_get_contents(self::$path);
        $students = explode(PHP_EOL, $data);
        $result = [];

        foreach ($students as $student) {
            if (!empty($student)) {
                $parts = explode(',', $student);
                $result[] = new Student($parts[0], $parts[1], $parts[2]);
            }
        }

        return $result;
    }

    // Method to display all students in a table
    public static function displayAll()
    {
        $students = self::loadAll();
        if (empty($students)) {
            echo "<p>No students found.</p>";
            return;
        }

        echo "<table>";
        echo "<tr><th>ID</th><th>Name</th><th>Phone</th></tr>";
        foreach ($students as $student) {
            echo "<tr>";
            echo "<td>{$student->id}</td>";
            echo "<td>{$student->name}</td>";
            echo "<td>{$student->phone}</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
}
?>
