<?php

class Student 
{
    private $id;
    private $name;
    private $email;
    private $phone;
    private $course;

    private static $file_path = "students.txt";

    public function __construct($_id, $_name, $_email, $_phone, $_course)
    {
        $this->id = trim($_id);
        $this->name = trim($_name);
        $this->email = trim($_email);
        $this->phone = trim($_phone);
        $this->course = trim($_course);
    }

    public function csv()
    {
        return $this->id . ',' . $this->name . ',' . $this->email . ',' . $this->phone . ',' . $this->course . PHP_EOL;
    }

    public function save()
    {
        
        file_put_contents(self::$file_path, $this->csv(), FILE_APPEND);
    }

    public static function loadAll()
    {
        if (!file_exists(self::$file_path)) {
            return [];
        }
        $students = file(self::$file_path, FILE_IGNORE_NEW_LINES);
        $student_objects = [];
        foreach ($students as $student) {
            list($id, $name, $email, $phone, $course) = explode(',', $student);
            $student_objects[] = new Student($id, $name, $email, $phone, $course);
        }
        return $student_objects;
    }

    public static function displayAll()
    {
        $students = self::loadAll();
        echo "<table>";
        echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Course</th></tr>";
        foreach ($students as $student) {
            echo "<tr>";
            echo "<td>{$student->id}</td>";
            echo "<td>{$student->name}</td>";
            echo "<td>{$student->email}</td>";
            echo "<td>{$student->phone}</td>";
            echo "<td>{$student->course}</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
}
?>

