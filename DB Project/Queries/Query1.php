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

        $query = "SELECT StudID 'StudentID', name 'Name', gender 'G', dob 'Date', photoID 'PID'
        FROM student;";

        $result = $mysql->query($query);

        if ($result->num_rows > 0)
        {
            // output data of each row
            echo "<table border=2 align=center><tr><th>ID</th><th>Name</th><th>Gender</th><th>DOB</th><th>PhotoID</th></tr>";

            while($row = $result->fetch_assoc())
            {
                echo "<tr><td>" . $row["StudentID"]. "</td><td>" . $row["Name"]. "</td><td>" . $row["G"]. "</td><td>" . $row["Date"]. "</td><td>" . $row["PID"]. "</td></tr>";
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