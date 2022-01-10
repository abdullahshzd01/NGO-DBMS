<!DOCTYPE hmtl>

<html>

    <?php
        // Create connection
        $mysql = new mysqli("localhost", "root", "", "hamaray_bachchay");

        // Check connection
        if ($mysql->connect_error)
        {
            echo "Failed to connect to MySQL: " . $mysql -> connect_error;
            exit();
        }

        $SEC = $_POST["sec"];

        $query1 = "SELECT section Section1, count(*)'NoOfStudents' 
        FROM student
        group by section;";

    // select section, count(*) from student where gender='F' group by section;
    // select section, count(*) from student where gender='M' group by section;

        $query2 = "SELECT section Section2, count(*)'Males' 
        FROM student 
        WHERE gender='M'
        group by section;";

        $query3 = "SELECT section Section3, count(*)'Females'
        FROM student 
        WHERE gender='F'
        group by section;";
        
        $result1 = $mysql->query($query1);
        $result2 = $mysql->query($query2);
        $result3 = $mysql->query($query3);

        $C1 = false;
        $C2 = false;
        $C3 = false;

        if ($result1->num_rows > 0 || $result2->num_rows > 0 || $result3->num_rows > 0)
        {
            // output data of each row
            echo "<table border=2 align=center><tr><th>Section</th><th>NoOfStudents</th><th>Males</th><th>Females</th></tr>";

            // while($row1 = $result1->fetch_assoc() && $row2 = $result2->fetch_assoc() && $row3 = $result3->fetch_assoc())
            // {
            //     echo "<tr><td>" . $row1["section"]. "</td><td>" . $row1["NoOfStudents"]. "</td><td>" . $row2["Males"]. "</td><td>" . $row3["Females"]. "</td></tr>";
            // }

            while ($row1 = $result1->fetch_assoc())
            {
                echo "<tr>";
                $section = $row1["Section1"];
                
                if ($SEC == $section)
                {
                    if ($C1 != true)
                    {
                        echo "<td>" . $row1["Section1"]. "</td><td>" . $row1["NoOfStudents"]. "</td>";
                        $C1 = true;
                    }
                    
                    while ($row2 = $result2->fetch_assoc())
                    {
                        if ($SEC = $row2["Section2"] && $C2 != true)
                        {
                            echo "<td>" . $row2["Males"]. "</td>";
                            $C2 = true;
                        }
                        
                        while ($row3 = $result3->fetch_assoc())
                        {
                            if ($row3["Section3"] && $C3 != true)
                            {
                                echo "<td>" . $row3["Females"]. "</td>";
                                $C3 = true;
                            }
                        }
                    }
                }
                
                echo "</tr>";
            }
            echo "</table>";
        }
        else
            echo "No results";

        echo "<br><br>";        

        $mysql->close();
    ?>
    
    <form action="Report2.html">
        <input type="submit" name="html" value="Back">
    </form>
</html>