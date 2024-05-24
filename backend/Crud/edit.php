<?php include('db.php'); ?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $address = $_POST['address'];

    $sql = "INSERT INTO users (firstname, lastname, address) VALUES ('$firstname', '$lastname', '$address')";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create User</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2 class="text-center">Create User</h2>
        <form method="POST" action="">
            <div class="form-group">
                <label>Firstname</label>
                <input type="text" name="firstname" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Lastname</label>
                <input type="text" name="lastname" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Address</label>
                <input type="text" name="address" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>
