<!-- Config -->
<?php require("../components/config.php"); 

session_start();

if(isset( $_SESSION['e']) && isset( $_SESSION['p'])){

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - <?php echo $title ?></title>
        <!-- Links -->
        <?php require("links.php") ?>

    </head>
    <body class="sb-nav-fixed">
        <!-- Header -->
        <?php require("header.php") ?>

        <div id="layoutSidenav">
            <!-- Sidebar -->
            <?php require("sidebar.php") ?>
            
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4" style="color: var(--dark); font-size: 32px;">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Admin / <span style="color: var(--primary);">Internships</span></li>
                        </ol>
                        <div class="row my-5">
                            <div class="col-lg-4 text-center">
                                <img src="assets/img/-interneedesign.svg" class="img-fluid" width="350px" alt="">
                            </div>
                            <div class="col-lg-8">
                                <div class="card" style="padding: 15px;">
                                    <h3 style="font-size: 24px;" class="fw-bold">Add Internship Category</h3>
                                    <form method="post" enctype="multipart/form-data" class="form-group">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <label for="Category">Category</label>
                                                <input type="text" id="Category" class="form-control" name="Category">
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="Image">Upload cover image</label>
                                                <input type="file" id="Image" class="form-control" name="Cover">
                                            </div>
                                            <div class="col-lg-6 mt-3">
                                                <label for="time">Duration</label>
                                                <input type="text" id="time" class="form-control" name="duration">
                                            </div>
                                            <div class="col-lg-6 mt-3">
                                                <label for="type">Select type</label>
                                                <select name="type" id="type" class="form-control">
                                                    <option value="Not Mentioned"></option>
                                                    <option value="Remote">Remote</option>
                                                    <option value="OnSite">OnSite</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-12">
                                                <button class="btn button mt-3 fw-bold" name="addCateg">Add</button>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- add internship php -->
                                    <?php
                                    
                                    if(isset($_POST["addCateg"])) {

                                        $categ = $_POST["Category"];
                                        $img = $_FILES["Cover"]["name"];
                                        $temp_name = $_FILES["Cover"]["tmp_name"];
                                        $folder = "../assets/internships/" . $img;
                                        $time = $_POST["duration"];
                                        $type = $_POST["type"];
                                    
                                        try {
                                            $servername = "localhost";
                                            $username = "root";
                                            $password = "";
                                            $dbname = "db_internee.pk";
                                    
                                            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                                            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    
                                            $stmt = $conn->prepare("CALL addInternship(:categ, :img, :time, :type");
                                    
                                            $stmt->bindParam(':categ', $categ);
                                            $stmt->bindParam(':img', $img);
                                            $stmt->bindParam(':time', $time);
                                            $stmt->bindParam(':type', $type);
                                    
                                            $stmt->execute();
                                    
                                            if(move_uploaded_file($temp_name, $folder)) {
                                                echo '<script>alert("Successfully Added ✔")</script>';
                                                header("refresh:2.0,URl=internships.php");
                                            } else {
                                                echo '<script>alert("Error uploading file")</script>';
                                            }
                                        } catch(PDOException $e) {
                                            echo '<script>alert("Added Failed: '.$e->getMessage().'")</script>';
                                        }
                                    }
                                    

                                    ?>
                                    <!-- // add internship php -->
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-table me-1"></i>
                                        Internships List
                                    </div>
                                    <div class="card-body">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Category</th>
                                                    <th>Cover Image</th>
                                                    <th>Duration</th>
                                                    <th>Type</th>
                                                    <th>Status</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                
                                                $query = "CALL FetchInternships()";
                                                $result = mysqli_query($conn, $query);
                                                
                                                if($result)
                                                {
                                                    while($row = mysqli_fetch_assoc($result))
                                                    {?>

                                                <tr>
                                                    <td><?php echo $row["Id"] ?></td>
                                                    <td><?php echo $row["Category"] ?></td>
                                                    <td><img src="../assets/internships/<?php echo $row["CoverImg"] ?>" class="img-fluid" width="80px" alt="CoverImg"></td>
                                                    <td><?php echo $row["Duration"] ?> month</td>
                                                    <td><?php echo $row["Type"] ?></td>
                                                    <td>
                                                        <?php
                                                        
                                                        if($row["Status"] == 0)
                                                        {
                                                            echo '<span class="badge bg-success text-white">Active</span>';
                                                        }
                                                        else {
                                                            echo '<span class="badge bg-danger text-white">Deactive</span>';
                                                        }

                                                        ?>
                                                    </td>
                                                    <td>
                                                        <a href="edit.php/id=<?php echo $row["Id"] ?>"><i class="fa-solid fa-square-pen"></i></a>
                                                        <a href="del-internship.php?id=<?php echo $row["Id"] ?>" class="ms-4"><i class="fa-solid fa-trash"></i></a>
                                                    </td>
                                                </tr>
                                                        
                                                <?php }
                                                }?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>

            </div>
        </div>

    </body>
</html>

<?php 
}
else{
    header("refresh:0.2,url='../login.php'");
}
?>