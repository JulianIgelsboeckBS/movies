<?php
include('DbConn.php');
$instance = new DbConn;
$dbh = $instance->connect();
if(isset($_POST['submit']))
{

    $file = $_FILES['image']['name'];
    $file_loc = $_FILES['image']['tmp_name'];
    $folder="images/";
    $new_file_name = strtolower($file);
    $final_file=str_replace(' ','-',$new_file_name);

    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $gender=$_POST['gender'];
    $mobileno=$_POST['mobileno'];
    $designation=$_POST['designation'];

    if(move_uploaded_file($file_loc,$folder.$final_file))
    {
        $image=$final_file;
    }
    $notitype='Create Account';
    $reciver='Admin';
    $sender=$email;

    $sqlnoti="insert into notification (notiuser,notireciver,notitype) values (:notiuser,:notireciver,:notitype)";
    $querynoti = $dbh->prepare($sqlnoti);
    $querynoti-> bindParam(':notiuser', $sender, PDO::PARAM_STR);
    $querynoti-> bindParam(':notireciver',$reciver, PDO::PARAM_STR);
    $querynoti-> bindParam(':notitype', $notitype, PDO::PARAM_STR);
    $querynoti->execute();

    $sql ="INSERT INTO users(name,email, password, gender, mobile, designation, image, status) VALUES(:name, :email, :password, :gender, :mobileno, :designation, :image, 1)";
    $query= $dbh -> prepare($sql);
    $query-> bindParam(':name', $name, PDO::PARAM_STR);
    $query-> bindParam(':email', $email, PDO::PARAM_STR);
    $query-> bindParam(':password', $password, PDO::PARAM_STR);
    $query-> bindParam(':gender', $gender, PDO::PARAM_STR);
    $query-> bindParam(':mobileno', $mobileno, PDO::PARAM_STR);
    $query-> bindParam(':designation', $designation, PDO::PARAM_STR);
    $query-> bindParam(':image', $image, PDO::PARAM_STR);
    $query->execute();
    $lastInsertId = $dbh->lastInsertId();
    if($lastInsertId)
    {
        echo "<script type='text/javascript'>alert('Registration Sucessfull!');</script>";
        echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
    }
    else
    {
        $error="Something went wrong. Please try again";
    }

}
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">

        <title>Login</title>
        <?php include __DIR__ . '/head.php'; ?>
        <script>
            function validate()
            {
                var extensions = new Array("jpg","jpeg");
                var image_file = document.regform.image.value;
                var image_length = document.regform.image.value.length;
                var pos = image_file.lastIndexOf('.') + 1;
                var ext = image_file.substring(pos, image_length);
                var final_ext = ext.toLowerCase();
                for (i = 0; i < extensions.length; i++)
                {
                    if(extensions[i] == final_ext)
                    {
                        return true;

                    }
                }
                alert("Image Extension Not Valid (Use Jpg,jpeg)");
                return false;
            }

        </script>
    </head>

    <body>
    <div id="site-content">
        <?php include __DIR__ . '/nav.php'; ?>
        <main class="main-content">
            <div class="page">
                <div class="container">
                    <div class="breadcrumbs">
                        <a href="index.php">Home</a>
                        <span>Login</span>
                    </div>

                    <div class="login-page bk-img">
                        <div class="form-content">
                            <div class="">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h1 class="text-center text-bold mt-2x">Register</h1>
                                        <div class="hr-dashed"></div>
                                        <div class="well row pt-2x pb-3x bk-light text-center">
                                            <form method="post" class="form-horizontal" enctype="multipart/form-data" name="regform" onSubmit="return validate();">
                                                <div class="form-group">
                                                    <label class="col-sm-1 control-label">Name<span style="color:red">*</span></label>
                                                    <div class="col-sm-5">
                                                        <input type="text" name="name" class="form-control" required>
                                                    </div>
                                                    <label class="col-sm-1 control-label">Email<span style="color:red">*</span></label>
                                                    <div class="col-sm-5">
                                                        <input type="text" name="email" class="form-control" required>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-1 control-label">Password<span style="color:red">*</span></label>
                                                    <div class="col-sm-5">
                                                        <input type="password" name="password" class="form-control" id="password" required >
                                                    </div>

                                                    <label class="col-sm-1 control-label">Designation<span style="color:red">*</span></label>
                                                    <div class="col-sm-5">
                                                        <input type="text" name="designation" class="form-control" required>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-1 control-label">Gender<span style="color:red">*</span></label>
                                                    <div class="col-sm-5">
                                                        <select name="gender" class="form-control" required>
                                                            <option value="">Select</option>
                                                            <option value="Male">Male</option>
                                                            <option value="Female">Female</option>
                                                        </select>
                                                    </div>

                                                    <label class="col-sm-1 control-label">Phone<span style="color:red">*</span></label>
                                                    <div class="col-sm-5">
                                                        <input type="number" name="mobileno" class="form-control" required>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-1 control-label">Avtar<span style="color:red">*</span></label>
                                                    <div class="col-sm-5">
                                                        <div><input type="file" name="image" class="form-control"></div>
                                                    </div>
                                                </div>

                                                <br>
                                                <button class="btn btn-primary" name="submit" type="submit">Register</button>
                                            </form>
                                            <br>
                                            <br>
                                            <p>Already Have Account? <a href="login.php" >Signin</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div> <!-- .container -->
        </main>
        <?php include __DIR__ . '/footer.php'; ?>
    </div>
    <!-- Default snippet for navigation -->



    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/app.js"></script>

    </body>

    </html>
<?php
