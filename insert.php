<?php
 include("config.php");
 

if (isset($_POST['submit'])) {

    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
    $fname = $_POST['fname'];
    $cnic = $_POST['cnic'];
    $mobile = $_POST['mobile'];
    $gender = $_POST['gender'];

    // insert into the table
    $sql = "INSERT INTO students (`name`, `father_name`, `cnic`, `mobile`,`gender`) VALUES('$name', '$fname', '$cnic', '$mobile','$gender')";

    $result = mysqli_query($db_con, $sql);
    if ($result) {
        echo "Data inserted successfully";
 
        }
    } else {
        echo "Data is not inseted";
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

        <form method="POST" action="<?= $_SERVER['PHP_SELF'] ?>">

            <label class="form-label">Name</label>

            <input type="text" class="form-control shadow-none border border-danger mb-3" name="name" placeholder="First Name" />

            <label class="form-label">Father Name</label>

            <input type="text" class="form-control shadow-none border border-danger mb-3" name="fname" placeholder="Father name" />

            <label class="form-label">Cnic</label>

<input type="number" class="form-control shadow-none border border-danger mb-3" name="cnic" placeholder="XXXX-XXXXXXX-X" />

<label class="form-label">Mobile Number</label>

<input type="number" class="form-control shadow-none border border-danger mb-3" name="mobile" placeholder="XXXX-XXXXXXX" />


            <label class="form-label d-block">Gender :</label>
            <div class="mb-3">
                Male: <input type="radio" class="form-check-input me-3" name="gender" value="Male" />
                Female: <input type="radio" class="form-check-input" name="gender" value="Female" />
            </div>

            
            </div>

            <div class="w-50 mx-auto">
                <input type="submit" class="btn btn-danger w-100" name="submit" value="Submit" />
            </div>
        </form>
    </div>



    <div class="container mt-5">
        <div class="mb-3 text-end">
            <a href="insert.php" class="btn btn-danger">+ Add Student</a>
        </div>
        <h2 class="text-center text-white bg-danger p-2 mb-3">Show Data</h2>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Father name</th>
                    <th scope="col">CNIC</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Status</th>
                    <th scope="col">Actions</th>

                </tr>
            </thead>
            <tbody>


                <?php
                // database connection
              include("config.php");

                $sql = "SELECT * FROM `students`  ";
                $result = mysqli_query($db_con , $sql);

              if(mysqli_num_rows($result) > 0){

                while($row = mysqli_fetch_assoc($result)){

                $id = $row['id'];
                $name = $row['name'];
                $fname= $row['father_name'];
                $cnic= $row['cnic'];
                $mobile = $row['mobile'];
                $gender = $row['gender'];
                
                

              ?>

                <tr>
                    <th ><?php echo $id;  ?></th>
                    <td><?php echo $name;  ?></td>
                    <td><?php echo $fname;  ?></td>
                    <td><?php echo $cnic;  ?></td>
                    <td><?php echo $mobile;  ?></td>
                    <td><?php echo $gender;  ?></td>
                    <td><span class="badge badge-primary bg-primary">Activated</span></td>

     <td><a href="edit.php?id=<?=$id?>" class="btn btn-warning btn-sm">Edit</a>
                          |  
                    <a href="delete.php?id=<?=$id?>" class="btn btn-danger btn-sm">Delete</a></td>
                </tr>
 
         <?php
                }
              }
            ?>

             

           
            </tbody>
        </table>
    </div>

</body>





</html>