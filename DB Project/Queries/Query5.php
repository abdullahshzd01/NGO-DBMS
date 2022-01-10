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

        $query = "SELECT s1.StudID ID, s1.Name StudentName, count(DISTINCT(s1.M_Cnic)) Sibling_Count 
        from student s1, student s2
        where s1.M_Cnic=s2.M_cnic AND s1.section=s2.section AND s1.studID<>s2.studID
        group by s1.section;";

        $result = $mysql->query($query);

        if ($result->num_rows > 0)
        {
            // output data of each row
            echo "<table border=2 align=center><tr><th>ID</th><th>Name</th><th>No Of Siblings in Class</th></tr>";

            while($row = $result->fetch_assoc())
            {
                echo "<tr><td>" . $row["ID"]. "</td><td>" . $row["StudentName"]. "</td><td>" . $row["Sibling_Count"]. "</td></tr>";
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