<table class="table table-hover">
    <thead align="center">
        <tr>
            <th scope=" col">No</th>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Subject</th>
            <th scope="col">Notes</th>
            <th scope="col">Date</th>
            <th scope="col">Act</th>
        </tr>
    </thead>
    <tbody align="center">
        <?php

        $sql = "SELECT * FROM `message`";
        $result = $connect->query($sql);

        if ($result->num_rows > 0) {
            $its;
            $no = 1;
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $no . "</td>";
                echo "<td>" . $row['id_message'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['subject'] . "</td>";
                echo "<td>" . $row['subText'] . "</td>";
                echo "<td>" . $row['date'] . "</td>";
                $idm = $row['id_message'];
                echo "<td><a href=\"index.php?page=edit_message&id_message=$idm\" class=\"btn btn-info\">Edit</a><span> | </span> <a href=\"../backend/process.php?op=deletemessage&id_message=$idm\" class=\"btn btn-danger\">Delete</a></td>";
                echo "</tr>";
                $no++;
            }
        } else {
            echo "<tr>";
            echo "<td colspan=\"9\"> No more data </td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>