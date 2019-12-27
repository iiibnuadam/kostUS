<table class="table table-hover">
    <thead align="center">
        <tr>
            <th scope=" col">No</th>
            <th scope="col">ID Books</th>
            <th scope="col">Name</th>
            <th scope="col">Packet</th>
            <th scope="col">Qty</th>
            <th scope="col">Date</th>
            <th scope="col">Duration</th>
            <th scope="col">Price</th>
            <th scope="col">Notes</th>
            <th scope="col">State</th>
            <th scope="col">Act</th>
        </tr>
    </thead>
    <tbody align="center">
        <?php

        $sql = "SELECT * FROM `books`";
        $result = $connect->query($sql);

        if ($result->num_rows > 0) {
            $its;
            $no = 1;
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $no . "</td>";
                echo "<td>" . $row['id_book'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['packet'] . "</td>";
                echo "<td>" . $row['qty'] . "</td>";
                echo "<td>" . $row['date'] . "</td>";
                echo "<td>" . $row['duration'] . "</td>";
                echo "<td>" . $row['price'] . "</td>";
                echo "<td>" . $row['notes'] . "</td>";
                echo "<td>" . $row['status'] . "</td>";
                $idbook = $row['id_book'];
                echo "<td><a href=\"index.php?page=edit_quickb&id_book=$idbook\" class=\"btn btn-info\">Edit</a><span> | </span> <a href=\"../backend/process.php?op=deletequickb&id_book=$idbook\" class=\"btn btn-danger\">Delete</a></td>";
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