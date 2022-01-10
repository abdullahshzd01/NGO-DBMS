<?php
    // Create connection
    $mysql = new mysqli("localhost", "root", "", "hamaray_bachchay");

    // Check connection
    if ($mysql->connect_error)
    {
        echo "Failed to connect to MySQL: " . $mysql -> connect_error;
        exit();
    }

    // $j = echo $_POST["Query 1"];

    if ($_POST["Query 1"]) 
    {
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
    }
    else if ($_POST["Query 2"]) 
    {
        $query = "SELECT M.name Mother, F.name Father
        From Parent F, Parent M
        Where m.relation= 'MOTHER' and f.partner=m.cnic;";

        $result = $mysql->query($query);

        if ($result->num_rows > 0)
        {
            // output data of each row
            echo "<table border=2 align=center><tr><th>Mother</th><th>ID</th><th>Father</th></tr>";

            while($row = $result->fetch_assoc())
            {
                echo "<tr><td>" . $row["Mother"]. "</td><td>" . $row["Father"]. "</td></tr>";
            }
            echo "</table>";
        }
        else
            echo "No results";

        echo "<br><br>";
    }
    else if ($_POST["Query 3"]) 
    {
        $query = "SELECT g.relation,count(s.studID)
        from guardian g,student s
        where s.g_cnic=g.cnic
        group by g.relation;";

        $result = $mysql->query($query);

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
    else if ($_POST["Query 4"]) 
    {
        $query = "SELECT M.name Mother, F.name Father,C.StudID, C.name
        From Parent F, Parent M, Student C
        Where m.relation=’MOTHER’ AND m.partner=f.cnic AND C.M_CNIC=m.cnic;";

        $result = $mysql->query($query);

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
    else if ($_POST["Query 5"]) 
    {
        $query = "SELECT s1.section,count(DISTINCT(s1.M_Cnic)) Sibling_Count from student s1, student s2
        where s1.M_Cnic=s2.M_cnic AND s1.section=s2.section AND s1.studID<>s2.studID
        group by s1.section;";

        $result = $mysql->query($query);

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
    else if ($_POST["Query 6"]) 
    {
        $query = "SELECT studID,name,gender 
        from student 
        where studID in(select studID 
                        from sec_history 
                        where ch_date between str_to_date('1/1/2018','%d/%m/%Y') AND str_to_date('1/1/2020','%d/%m/%Y'));";

        $result = $mysql->query($query);

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
    else if ($_POST["Query 7"]) 
    {
        $query = "SELECT section,count(studID) from student
        Where reg_date between str_to_date('1/1/2015','%d/%m/%Y') AND str_to_date('1/1/2020','%d/%m/%Y');";

        $result = $mysql->query($query);

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
    else if ($_POST["Query 8"]) 
    {
        $query = "SELECT M_CNIC, MIN(reg_Date) from student group by M_CNIC;";

        $result = $mysql->query($query);

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
    else if ($_POST["Query 9"]) 
    {
        $query = "SELECT m.name,f.name,s.studID,s.name from student s, parent f,parent m
        Where (reg_date-dob)/365 <=4 AND s.M_Cnic=M.cnic AND s.F_cnic=f.cnic;";

        $result = $mysql->query($query);

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
    else if ($_POST["Query 10"]) 
    {
        $query = "SELECT * from sec_history where studID=6;";

        $result = $mysql->query($query);

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

        // $query = "SELECT c.ClassID, s.Name, s.StudID, s.Gender, DATE_FORMAT(FROM_DAYS(DATEDIFF(CURRENT_DATE, s.DOB)), '%Y')+0 'age'
        // FROM student AS s LEFT JOIN class AS c
        // ON  DATE_FORMAT(FROM_DAYS(DATEDIFF(CURRENT_DATE, s.DOB)), '%Y')+0 BETWEEN c.L_AgeLimit AND c.U_AgeLimit
        // WHERE c.ClassID = $i;";

        // $result = $mysql->query($query);

        // if ($result->num_rows > 0)
        // {
        //     // output data of each row
        //     echo "<table border=2 align=center><tr><th>Name</th><th>ID</th><th>Gender</th><th>Age</th></tr>";

        //     while($row = $result->fetch_assoc())
        //     {
        //         echo "<tr><td>" . $row["Name"]. "</td><td>" . $row["StudID"]. "</td><td>" . $row["Gender"]. "</td><td>" . $row["age"]. "</td></tr>";
        //     }
        //     echo "</table>";
        // }
        // else
        //     echo "No results";

        // echo "<br><br>";

    $mysql->close();
?>