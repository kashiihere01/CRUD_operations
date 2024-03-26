<?php
include("config.php");

$id = $_GET['id'];

$sql = "SELECT * FROM `students`  WHERE id=$id";
$result = mysqli_query($db_con, $sql);

if (mysqli_num_rows($result) > 0) {
    $result = mysqli_fetch_assoc($result);

    // echo "<pre>"; print_r($result); echo "</pre>";
} else {
    die("no record found");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Insert Query</title>
    <!-- bootstrp links -->
    <link rel="stylesheet" href="./Bootstrap/css/bootstrap.min.css">
    <script src="./Bootstrap/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container w-50 shadow mx-auto mt-3 p-3">

        <h2 class="text-center text-white bg-danger p-2 mb-3">Registration Form</h2>

        <form method="POST" action="update.php">
            <input type="hidden" name="id" value="<?= $result['id'] ?>" />
            <label class="form-label">Name</label>

            <input type="text" value="<?= $result['name'] ?>" class="form-control shadow-none border border-danger mb-3" name="name" placeholder="First Name" required />

            <label class="form-label">Father name</label>

            <input type="text" value="<?= $result['father_name'] ?>" class="form-control shadow-none border border-danger mb-3" name="fname" placeholder="father name" />

            <label class="form-label">CNIC</label>

<input type="number" value="<?= $result['cnic'] ?>" class="form-control shadow-none border border-danger mb-3" name="cnic" placeholder="XXXX-XXXXXXX-X" />

<label class="form-label">Mobile</label>

            <input type="number" value="<?= $result['mobile'] ?>" class="form-control shadow-none border border-danger mb-3" name="mobile" placeholder="XXXX-XXXXXXX" />


       


            <label class="form-label d-block">Gender :</label>
            <div class="mb-3">
                Male: <input type="radio" class="form-check-input me-3" name="gender" value="Male" <?php echo ($result['gender'] == 'Male') ? 'checked' : ""  ?> />
                Female: <input type="radio" class="form-check-input" name="gender" value="Female" <?php echo ($result['gender'] == 'Female') ? 'checked' : ""  ?> />
            </div>

            
            <div class="w-50 mx-auto">
                <input type="submit" class="btn btn-danger w-100" name="submit" value="Edit Data" />
            </div>
        </form>
    </div>
</body>

</html>