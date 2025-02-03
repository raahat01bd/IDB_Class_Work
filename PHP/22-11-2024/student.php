<?php
class Student
{
    private $id;
    private $name;
    private $course;
    private $phone;

    private static $file_path = "data.txt";

    function __construct($_id, $_name, $_course, $_phone)
    {
        $this->id = trim($_id);
        $this->name = trim($_name);
        $this->course = trim($_course);
        $this->phone = trim($_phone);
    }

    public function csv()
    {
        return $this->id . ',' . $this->name . ',' . $this->course . ',' . $this->phone . PHP_EOL;
    }

    public function save()
    {
        if (!file_exists(self::$file_path)) {
            file_put_contents(self::$file_path, ""); // Create the file if it doesn't exist
        }
        file_put_contents(self::$file_path, $this->csv(), FILE_APPEND);
    }

    public static function loadAll()
    {
        if (!file_exists(self::$file_path)) {
            return []; // Return empty array if file doesn't exist
        }

        $students = file(self::$file_path, FILE_IGNORE_NEW_LINES);
        $student_objects = [];
        foreach ($students as $student) {
            list($id, $name, $course, $phone) = explode(',', $student);
            $student_objects[] = new Student($id, $name, $course, $phone);
        }
        return $student_objects;
    }

    public static function display_students()
    {
        $students = self::loadAll();
        if (empty($students)) {
            echo "<p>No students found.</p>";
            return;
        }

        echo "<table border='1' style='border-collapse: collapse; width: 50%;'>";
        echo "<tr><th>ID</th><th>Name</th><th>Course</th><th>Phone</th></tr>";
        foreach ($students as $student) {
            echo "<tr>
                    <td>{$student->id}</td>
                    <td>{$student->name}</td>
                    <td>{$student->course}</td>
                    <td>{$student->phone}</td>
                  </tr>";
        }
        echo "</table>";
    }
}
?>
