<?php
include "dbconfig.php";

$id = $_GET["id"];

$sql = "SELECT * FROM `contact` WHERE `id` = $id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reply Page</title>
</head>

<body>
    <div class="container my-5 p-5">
        <h1 class="text-center">Reply to User</h1>
        <form action="sendreply.php" method="post">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <input type="hidden" name="email" value="<?php echo $row['email']; ?>">

            <div class="mb-3">
                <label for="" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" value="<?php echo $row['name']; ?>" readonly>
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" value="<?php echo $row['email']; ?>" readonly>
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Phone</label>
                <input type="text" class="form-control" name="phone" value="<?php echo $row['phone']; ?>" readonly>
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Message</label>
                <textarea class="form-control" name="message" rows="4" readonly><?php echo $row['message']; ?></textarea>
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Your Reply</label>
                <textarea class="form-control" name="reply" rows="4" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Send Reply</button>
        </form>
    </div>
</body>

</html>
