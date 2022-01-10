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

        $query = "SELECT M.name Mother, F.name Father,C.StudID ID, C.name Student
        From Parent F, Parent M, Student C
        Where m.relation='MOTHER' AND m.partner=f.cnic AND C.M_CNIC=m.cnic;";

        $result = $mysql->query($query);

        if ($result->num_rows > 0)
        {
            // output data of each row
            echo "<table border=2 align=center><tr><th>Student ID</th><th>Name</th><th>Mother</th><th>Father</th></tr>";

            while($row = $result->fetch_assoc())
            {
                echo "<tr><td>" . $row["ID"]. "</td><td>" . $row["Student"]. "</td><td>" . $row["Mother"]. "</td><td>" . $row["Father"]. "</td></tr>";
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