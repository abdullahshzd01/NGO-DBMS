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

        $query = "SELECT studID ID, name SNAME, gender G
        from student 
        where studID in(select studID 
                        from sec_history 
                        where ch_date between str_to_date('1/1/2018','%d/%m/%Y') AND str_to_date('1/1/2020','%d/%m/%Y'));";

        $result = $mysql->query($query);

        if ($result->num_rows > 0)
        {
            // output data of each row
            echo "<table border=2 align=center><tr><th>ID</th><th>Name</th><th>Gender</th></tr>";

            while($row = $result->fetch_assoc())
            {
                echo "<tr><td>" . $row["ID"]. "</td><td>" . $row["SNAME"]. "</td><td>" . $row["G"]. "</td></tr>";
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