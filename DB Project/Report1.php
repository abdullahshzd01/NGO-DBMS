<!DOCTYPE html>

<html>
    <style>
        h2{
            padding-left: 100px;
        };

        /* table{
            padding-left:   200px;
            align:          center;
        }; */
    </style>

    <h1>Report 1</h1>

    <?php
        // Create connection
        $mysql = new mysqli("localhost", "root", "", "hamaray_bachchay");

        // Check connection
        if ($mysql->connect_error)
        {
            echo "Failed to connect to MySQL: " . $mysql -> connect_error;
            exit();
        }

        for ($i=1; $i <= 7; $i++)
        {
            $query = "SELECT c.ClassID, s.Name, s.StudID, s.Gender, DATE_FORMAT(FROM_DAYS(DATEDIFF(CURRENT_DATE, s.DOB)), '%Y')+0 'age'
            FROM student AS s LEFT JOIN class AS c
            ON  DATE_FORMAT(FROM_DAYS(DATEDIFF(CURRENT_DATE, s.DOB)), '%Y')+0 BETWEEN c.L_AgeLimit AND c.U_AgeLimit
            WHERE c.ClassID = $i;";
            
            $result = $mysql->query($query);

            echo "<h2>Class " . $i . "</h2>";

            if ($result->num_rows > 0)
            {
                // output data of each row
                echo "<table border=2 align=center><tr><th>Name</th><th>ID</th><th>Gender</th><th>Age</th></tr>";

                while($row = $result->fetch_assoc())
                {
                    echo "<tr><td>" . $row["Name"]. "</td><td>" . $row["StudID"]. "</td><td>" . $row["Gender"]. "</td><td>" . $row["age"]. "</td></tr>";
                }
                echo "</table>";
            }
            else
                echo "No results";

            echo "<br><br>";
        }

        $mysql->close();
    ?>

    <form action="Report.html">
        <input type="submit" name="html" value="Back">
    </form>
</html>