<!DOCTYPE html>

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

        $query = "SELECT m.name Mother,f.name Father,s.studID StID, s.name Student
        from student s, parent f,parent m
        Where (reg_date-dob)/365 <=4 AND s.M_Cnic=M.cnic AND s.F_cnic=f.cnic;";

        $result = $mysql->query($query);

        if ($result->num_rows > 0)
        {
            // output data of each row
            echo "<table border=2 align=center><tr><th>Mother</th><th>Father</th><th>Student ID</th><th>Name</th></tr>";

            while($row = $result->fetch_assoc())
            {
                echo "<tr><td>" . $row["Mother"]. "</td><td>" . $row["Father"]. "</td><td>" . $row["StID"]. "</td><td>" . $row["Student"]. "</td></tr>";
            }
            echo "</table>";
        }
        else
            echo "No results";

        echo "<br><br>";

        $mysql->close();
    ?>

    <form action="../Queries.html">
        <input type="submit" name="html" value="Back">
    </form>

</html>