<?php
include './connect.php';
$query = "SELECT * FROM leads";
$result = $conn->query($query);
$ar = [];
while ($row = mysqli_fetch_assoc($result)) {
    array_push($ar, $row);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Admin</title>
</head>

<body>
    <div class="container">
        <table class="table table-success table-striped table-hover table-responsive mt-2">
            <thead>
                <tr>
                    <th colspan="7" class="text-center">Leads</th>
                </tr>
                <tr>
                    <th>id</th>
                    <th>user</th>
                    <th>email</th>
                    <th>phone</th>
                    <th>theme</th>
                    <th>content</th>
                    <th>delete</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($ar as $user) : ?>
                    <tr>
                        <td><?= $user["id"] ?></td>
                        <td><?= $user["name"] . " " . $user["last"] ?></td>
                        <td><?= $user["email"] ?></td>
                        <td><?= $user["phone"] ?></td>
                        <td><?= $user["theme"] ?></td>
                        <td><?= $user["content"] ?></td>
                        <td><button onclick="delUser(<?= $user['id'] ?>)" class="btn btn-outline-danger rounded">delete</button></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>

        </table>
        <script>
            const delUser = (_id) => {
                if (confirm("Sure you want to delete ")) {
                    window.location.href = `deleteUser.php?delId= ${_id}`;
                }
            }
        </script>
    </div>
</body>

</html>