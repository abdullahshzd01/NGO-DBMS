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

        $query = "SELECT g.relation 'Relation',count(s.studID) 'Students'
        from guardian g,student s
        where s.g_cnic=g.cnic
        group by g.relation;";

        $result = $mysql->query($query);

        if ($result->num_rows > 0)
        {
            // output data of each row
            echo "<table border=2 align=center><tr><th>Relation</th><th>No Of Students</th></tr>";

            while($row = $result->fetch_assoc())
            {
                echo "<tr><td>" . $row["Relation"]. "</td><td>" . $row["Students"]. "</td></tr>";
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