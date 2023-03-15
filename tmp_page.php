<?php

$limit = 5;
if (isset($_GET["page"])) {
    $pn  = $_GET["page"];
} else {
    $pn = 1;
};

$start_from = ($pn - 1) * $limit;

$sql = "SELECT * FROM user LIMIT $start_from, $limit";
$rs_result = mysqli_query($conn, $sql);
// print_r($rs_result);

?>
<?php while ($row = mysqli_fetch_assoc($rs_result)) : ?>
    <tr>
        <td><?= $row['id'] ?></td>
        <td><?= $row['first_name'] ?></td>
        <td><?= $row['last_name'] ?></td>
        <td><?= $row['email'] ?></td>
        <td><?= $row['birthdate'] ?></td>
        <td> <img style="width: 50px; height: 50px;" src="<?php echo $row['image']; ?>" alt="Not Found"> </td>
        <td><?= $row['gender'] ?></td>
        <td><?= $row['mobile'] ?></td>
        <td><button class="btn btn-sm btn-outline-success" onclick="editData('<?= $row['id'] ?>')">Edit</button></td>
        <td><button name="btnDel" class="btn btn-sm btn-outline-danger" onclick="deleteData('<?= $row['id'] ?>')">Delete</button></td>
    </tr>
<?php endwhile ?>
<ul class="pagination">
    <?php

    $sql = "SELECT COUNT(*) FROM user";
    $rs_result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_row($rs_result);
    $total_records = $row[0];

    $total_pages = ceil($total_records / $limit);
    $pagLink = "";
    for ($i = 1; $i <= $total_pages; $i++) {
        if ($i == $pn) {
            $pagLink .= "<li class='active'><a href='?page=" . $i . "'>" . $i . "</a></li>";
        } else {
            $pagLink .= "<li><a href='?page=" . $i . "'>" . $i . "</a></li>";
        }
    };
    echo $pagLink;
    ?>
</ul>


<?= $_GET['catId'] == $category['id'] ? 'catActive' : '' ?>