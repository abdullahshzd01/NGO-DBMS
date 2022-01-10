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

        $query = "SELECT s.Name Student, p.name Parent, MIN(reg_Date) 'Date Registered'
        from student s, parent p
        WHERE s.M_CNIC = p.cnic
        group by M_CNIC;";

        $result = $mysql->query($query);

        if ($result->num_rows > 0)
        {
            // output data of each row
            echo "<table border=2 align=center><tr><th>Student</th><th>Parent</th><th>Date Registered</th></tr>";

            while($row = $result->fetch_assoc())
            {
                echo "<tr><td>" . $row["Student"]. "</td><td>" . $row["Parent"]. "</td><td>" . $row["Date Registered"]. "</td></tr>";
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