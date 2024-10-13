<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">

    <title>Register</title>
    <?php include __DIR__ . '/head.php'; ?>

    <style>
        /* Adjust spacing and form layout */
        .form-horizontal .form-group {
            margin-bottom: 1.5rem;
        }

        .form-horizontal .form-group label {
            text-align: left;
            font-weight: bold;
        }

        .form-horizontal .form-control {
            padding: 10px;
            font-size: 1rem;
        }

        .form-horizontal .col-sm-1, .form-horizontal .col-sm-5 {
            padding: 0 15px;
        }

        .form-horizontal .col-sm-5 {
            width: 45%;
        }

        .form-content {
            margin-top: 50px;
        }

        .form-content .btn {
            width: 100%;
            padding: 10px;
            font-size: 1.2rem;
            margin-top: 15px;
        }

        .form-content p {
            margin-top: 20px;
        }

        @media (max-width: 768px) {
            .form-horizontal .col-sm-5 {
                width: 100%;
            }

            .form-horizontal .form-group {
                margin-bottom: 1rem;
            }
        }
    </style>

    <script>
        function validate() {
            var extensions = ["jpg", "jpeg"];
            var image_file = document.regform.image.value;
            var pos = image_file.lastIndexOf('.') + 1;
            var ext = image_file.substring(pos).toLowerCase();

            if (extensions.indexOf(ext) === -1) {
                alert("Image Extension Not Valid (Use Jpg,jpeg)");
                return false;
            }
            return true;
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
                    <span>Register</span>
                </div>

<!--                <div class="container d-flex justify-content-center align-items-center vh-100">-->
<!--                    <div class="card shadow-lg w-100" style="max-width: 800px;">-->
<!--                        <div class="card-body p-5">-->
                            <h1 class="text-center mb-4">Register</h1>
                            <div class="mb-4">
                                <form method="post" enctype="multipart/form-data" name="regform" onSubmit="return validate();">
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                                            <input type="text" name="name" class="form-control" id="name" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                            <input type="email" name="email" class="form-control" id="email" required>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                                            <input type="password" name="password" class="form-control" id="password" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="designation" class="form-label">Designation <span class="text-danger">*</span></label>
                                            <input type="text" name="designation" class="form-control" id="designation" required>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="gender" class="form-label">Gender <span class="text-danger">*</span></label>
                                            <select name="gender" class="form-select" id="gender" required>
                                                <option value="" selected>Select</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="mobileno" class="form-label">Phone <span class="text-danger">*</span></label>
                                            <input type="number" name="mobileno" class="form-control" id="mobileno" required>
                                        </div>
                                    </div>

                                    <div class="row mb-4">
                                        <div class="col-md-6">
                                            <label for="image" class="form-label">Avatar <span class="text-danger">*</span></label>
                                            <input type="file" name="image" class="form-control" id="image">
                                        </div>
                                    </div>

                                    <button type="submit" name="submit" class="btn btn-warning w-100">Register</button>
                                </form>
                            </div>
                            <p class="text-center">Already have an account? <a href="login.php">Sign in</a></p>
                        <!--</div>
                    </div>
                </div>-->

            </div>
        </div> <!-- .container -->
    </main>
    <?php include __DIR__ . '/footer.php'; ?>
</div>

<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/plugins.js"></script>
<script src="js/app.js"></script>
</body>

</html>
