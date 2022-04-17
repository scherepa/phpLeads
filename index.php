<?php
include './connect.php';
include './util.php';
if (isset($_POST["send"])) {
    if (isset($_POST["name"])) {
        $name = $_POST["name"];
        $name = filter_post("name", $conn);
        #echo $name;
    }
    if (isset($_POST["last"])) {
        $last = $_POST["last"];
        $last = filter_post("last", $conn);
        #echo $last;
    }
    if (isset($_POST["email"])) {
        $email = $_POST["email"];
        $email = trim(filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL));

        #echo $email;
    }
    if (isset($_POST["phone"])) {
        $phone = $_POST["phone"];
        $phone = filter_post("phone", $conn);
        #echo $phone;
    }
    if (isset($_POST["content"])) {
        $content = $_POST["content"];
        $content = filter_post("content", $conn);
        #echo $content;
    }
    if (isset($_POST["theme"])) {
        $theme = $_POST["theme"] == "1" ? "Illustrations" : "Classical Scetches";
        #echo $theme;
    }
    $query = "INSERT INTO leads (name, last, email, phone, content, theme) VALUES('{$name}','{$last}','{$email}','{$phone}','{$content}','{$theme}')";
    $result = $conn->query($query);
    if ($conn->insert_id > 0) header("Location: index.php?msg=ok");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>My</title>
</head>

<body>
    <div class="container d-flex flex-column justify-content-center align-items-center">
        <div class="py-3 text center">
            <h1>Create New Lead</h1>
        </div>
        <form method="POST" class="col-lg-6 shadow p-3">
            <label for="name">First Name</label>
            <input type="text" name="name" class="form-control">
            <label for="last">Last Name</label>
            <input type="text" name="last" class="form-control">
            <label for="email">Email</label>
            <input type="email" name="email" placeholder="example@walla.com" class="form-control">
            <label for="phone">Phone</label>
            <input type="text" name="phone" class="form-control">
            <label for="theme">Theme</label>
            <select name="theme" class="form-select my-1">
                <option value="0" selected disabled>(plese choose)</option>
                <option value="1">Illustrations</option>
                <option value="2">Classical Scetches</option>
            </select>
            <label for="content"></label>
            <textarea name="content" cols="30" maxlength="500" class="form-control"></textarea>
            <button type="submit" name="send" class="btn btn-outline-success  rounded my-3 w-50">Send</button>
        </form>
    </div>
</body>

</html>