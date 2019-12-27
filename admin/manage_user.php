<table class="table table-hover">
    <thead align="center">
        <tr>
            <th scope=" col">No</th>
            <th scope="col">Name</th>
            <th scope="col">Username</th>
            <th scope="col">Email</th>
            <th scope="col">Address</th>
            <th scope="col">City</th>
            <th scope="col">Postcode</th>
            <th scope="col">Phone</th>
            <th scope="col">Password</th>
            <th scope="col">Date</th>
            <th scope="col">Act</th>
        </tr>
    </thead>
    <tbody align="center">
        <?php

        $sql = "SELECT * FROM `user`";
        $result = $connect->query($sql);

        if ($result->num_rows > 0) {
            $its;
            $no = 1;
            while ($row = $result->fetch_assoc()) {
                $search = trim(strval($row['level']));
                if ($search == 2) {
                    $its = true;
                    echo "<tr>";
                    echo "<td>" . $no . "</td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['username'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>" . $row['address'] . "</td>";
                    echo "<td>" . $row['city'] . "</td>";
                    echo "<td>" . $row['postcode'] . "</td>";
                    echo "<td>" . $row['phone'] . "</td>";
                    echo "<td>" . $row['password'] . "</td>";
                    echo "<td>" . $row['date'] . "</td>";
                    $usrname = $row['username'];
                    echo "<td><a href=\"index.php?page=edit_user&username=$usrname\" class=\"btn btn-info\">Edit</a><span> | </span> <a href=\"../backend/process.php?op=deleteuser&username=$usrname\" class=\"btn btn-danger\">Delete</a></td>";
                    echo "</tr>";
                    $no++;
                } else {
                    $its = false;
                }
            }

            if ($its) { } else {
                echo "<tr>";
                echo "<td colspan=\"9\"> No more data <a href=\"index.php#cusReservations\" class=\"btn btn-info\">Add more!</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr>";
            echo "<td colspan=\"9\"> No more data </td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>