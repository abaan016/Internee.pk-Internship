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
                            <li class="breadcrumb-item active">Admin / <span style="color: var(--primary);">Messages</span></li>
                        </ol>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-table me-1"></i>
                                        Messages List
                                    </div>
                                    <div class="card-body">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                    <th>Messages</th>
                                                    <th>Recieve Date</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                
                                                $query = "CALL messages()";
                                                $result = mysqli_query($conn, $query);
                                                
                                                if($result)
                                                {
                                                    while($row = mysqli_fetch_assoc($result))
                                                    {?>

                                                <tr>
                                                    <td><?php echo $row["Id"] ?></td>
                                                    <td><?php echo $row["Name"] ?></td>
                                                    <td><?php echo $row["Email"] ?></td>
                                                    <td><?php echo $row["Phone"] ?></td>
                                                    <td><textarea name="" id="" cols="30" rows="1"><?php echo $row["Message"] ?></textarea></td>
                                                    <td><?php echo $row["Recieve_date"] ?></td>
                                                    <td>
                                                        <a href="./actions/del-msg.php?id=<?php echo $row["Id"] ?>" class="ms-4"><i class="fa-solid fa-trash"></i></a>
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