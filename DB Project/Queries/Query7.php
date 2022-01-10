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

        $query = "SELECT section SECTION, count(studID) CONT
        from student
        Where reg_date between str_to_date('1/1/2015','%d/%m/%Y') AND str_to_date('1/1/2020','%d/%m/%Y');";

        $result = $mysql->query($query);

        if ($result->num_rows > 0)
        {
            // output data of each row
            echo "<table border=2 align=center><tr><th>Class</th><th>No Of Students</th></tr>";

            while($row = $result->fetch_assoc())
            {
                echo "<tr><td>" . $row["SECTION"]. "</td><td>" . $row["CONT"]. "</td></tr>";
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