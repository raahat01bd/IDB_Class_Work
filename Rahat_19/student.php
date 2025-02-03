<?php

class Student 
{
    private $id;
    private $name;
    private $batch;

    private static $file_path = "students.txt";

    public function __construct($_id, $_name, $_batch)
    {
        $this->id = trim($_id);
        $this->name = trim($_name);
        $this->batch = trim($_batch);
    }

    public function csv()
    {
        return $this->id . ',' . $this->name . ',' . $this->batch . PHP_EOL;
    }

    public function save()
    {
        if (!file_exists(self::$file_path)) {
            file_put_contents(self::$file_path, "");
        }
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
            list($id, $name, $batch) = explode(',', $student);
            $student_objects[] = new Student($id, $name, $batch);
        }
        return $student_objects;
    }

    public static function result()
    {
        $students = self::loadAll();
        echo "<table>";
        echo "<tr><th>ID</th><th>Name</th><th>Batch</th></tr>";
        foreach ($students as $student) {
            echo "<tr>";
            echo "<td>{$student->id}</td>";
            echo "<td>{$student->name}</td>";
            echo "<td>{$student->batch}</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
}
?>  
