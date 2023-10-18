<?php
if ($argc == 2) {
    if (is_numeric($argv[1])) {
        include_once('functions.php');
        $limit = $argv[1];

        class Student
        {
            private $id;
            private $name;
            private $lastName;
            private $cedula;
            private $age;

            public function __construct($id, $name, $lastName, $cedula, $age)
            {
                $this->id = $id;
                $this->name = $name;
                $this->lastName = $lastName;
                $this->cedula = $cedula;
                $this->age = $age;
            }

            // Retrieve a list of students from the database.
            public static function getStudents($limit)
            {
                $conn = getConnection();
                $sql = "SELECT * FROM `students` LIMIT $limit;";
                $result = mysqli_query($conn, $sql);
                $students = [];

                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $object = new Student($row['id'], $row['name'], $row['lastName'], $row['cedula'], $row['age']);
                        $students[] = $object;
                    }
                }

                $conn->close();
                return $students;
            }

            // Display student information
            public function showStudent()
            {
                echo $this->id . ", " . $this->name . ", " . $this->lastName . ", " . $this->cedula . ", " . $this->age;
            }
        }
        // Due to being a static method, there's no need for an instance to access the method
        $studentObjects = Student::getStudents($limit);

        if (!empty($studentObjects)) {
            // Display each student's information
            foreach ($studentObjects as $student) {
                echo $student->showStudent() . PHP_EOL;
            }
        } else {
            echo "No hay estudiantes disponibles para mostrar" . PHP_EOL;
        }
    }
}
