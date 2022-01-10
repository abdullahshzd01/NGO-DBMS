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
        // else {
        //     echo "Connection Successful";
        // }

        $ID = $_POST["ID"];

        $query = "SELECT sh.StudID C1, sh.Changee C2, sh.Prev_Section C3, sh.Reason C4, sh.ch_date C5
        from sec_history 
        where studID=$ID";

        $result = $mysql->query($query);

        if ($result->num_rows > 0)
        {
            // output data of each row
            echo "<table border=2 align=center><tr><th>ID</th><th>New Section</th><th>Previous Section</th><th>Reason for Change</th><th>Date Change</th></tr>";

            while($row = $result->fetch_assoc())
            {
                echo "<tr><td>" . $row["C1"]. "</td><td>" . $row["C2"]. "</td><td>" . $row["C3"]. "</td><td>" . $row["C4"]. "</td><td>" . $row["C5"]. "</td></tr>";
            }
            echo "</table>";
        }
        else
            echo "No results";

        echo "<br><br>";

        $mysql->close();
    ?>

    <form action="Query10.html">
        <input type="submit" name="html" value="Back">
    </form>

</html>