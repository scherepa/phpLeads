<?php
include './connect.php';
include './util.php';
if (isset($_GET['delId'])) {
    $delId = filter_get('delId', $conn);
    echo $delId;
    $query = "DELETE FROM leads WHERE id = {$delId}";
    $result = $conn->query($query);
    if ($result && mysqli_affected_rows($conn) == 1) {
        echo "Success";
        header("Location:admin.php?msg=user deleted");
    } else {
        echo "smth went wrong";
    }
}
