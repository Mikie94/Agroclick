<?php
include('connection.php');
$title = "User Registration";
include('header.php');
include('sidebar.php');


$posted = false;
if(isset($_POST["submit"])){
    $posted = true;
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $gender = $_POST["options"];
    $age = $_POST["age"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $dob = $_POST["dob"];
    $address = $_POST["address"];

    $query = "INSERT INTO user (fname, lname, username, password, gender, age, email, phone, dateofbirth, address) VALUES ('".$fname."', '".$lname."', '".$username."', '".$password."', '".$gender."', '".$age."', '".$email."', '".$phone."', '".$dob."', '".$address."')";
    $res = mysqli_query($conn, $query);

    if(!$res){
        die('Error: ' . mysqli_error($conn));
    }
}

?>

<?php
    if( $posted ) {
      if( $fname &&  $lname && $username && $password && $gender && $age && $email && $phone &&  $dob && $address) 
        echo "<script type='text/javascript'>alert('Submitted Successfully!')</script>";
      else
        echo "<script type='text/javascript'>alert('failed!')</script>";
    }
  ?>
            <div class="app-main__outer">
                <div class="app-main__inner">
                    <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
                        <li class="nav-item">
                            <a role="tab" class="nav-link active" id="tab-0" data-toggle="tab" href="#tab-content-0">
                                <span>Basic Information</span>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="main-card mb-3 card">
                                        <div class="card-body">
                                            <h5 class="card-title">User Registration Form</h5>
                                            <form class="needs-validation" method="POST" novalidate>
                                            <div class="position-relative form-group col-md-12"><label class="font-weight-bold" for="validationCustom01">First Name</label><input name="fname" id="validationCustom01" placeholder="Enter First Name" type="text" class="form-control" required>
                                                </div>
                                                <div class="position-relative form-group col-md-12"><label class="font-weight-bold" for="validationCustom03">Last Name</label><input name="lname" id="validationCustom03" placeholder="Enter Last Name" type="text" class="form-control" required>
                                                </div>
                                                <div class="position-relative form-group col-md-12"><label class="font-weight-bold" for="validationCustom02">Username</label><input name="username" id="validationCustom02" placeholder="Enter Username" type="text" class="form-control" required>
                                                </div>
                                                <div class="position-relative form-group col-md-12"><label class="font-weight-bold" for="validationCustom04">Password</label><input name="password" id="validationCustom04" placeholder="Enter Password" type="password" class="form-control" required>
                                                </div>
                                                <div class="position-relative form-group col-md-6"><label class="font-weight-bold" for="validationCustom05">Gender</label><br />
                                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                        <label class="btn btn-light active">
                                                          <input type="radio" name="options" id="option1" value="Male" checked> Male
                                                        </label>
                                                        <label class="btn btn btn-light">
                                                          <input type="radio" name="options" id="option2" value="Female"> Female
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="position-relative form-group col-md-12"><label class="font-weight-bold" for="validationCustom06">Age</label><input name="age" id="validationCustom06" placeholder="Enter Age" type="number" class="form-control" required>
                                                </div>
                                                <div class="position-relative form-group col-md-12"><label class="font-weight-bold" for="validationCustom07">Email</label><input name="email" id="validationCustom07" placeholder="Enter Email Address" type="email" class="form-control" required>
                                                </div>
                                                <div class="position-relative form-group col-md-12"><label class="font-weight-bold" for="validationCustom08">Phone</label><input name="phone" id="validationCustom08" placeholder="Enter Phone Number" type="number" class="form-control" required>
                                                </div>
                                                <div class="position-relative form-group col-md-12"><label class="font-weight-bold" for="validationCustom09">Date of Birth</label><input name="dob" id="validationCustom09" type="date" class="form-control" required>
                                                </div>
                                                <div class="position-relative form-group col-md-12"><label class="font-weight-bold" for="validationCustom10">Address</label><textarea name="address" id="validationCustom010" class="form-control" required></textarea>
                                                </div>


                                                <input class="mt-1 btn btn-primary ml-3" type="submit" name="submit" value="Submit">
                                            </form>
                                            <script>
                                                // Example starter JavaScript for disabling form submissions if there are invalid fields
                                                (function() {
                                                    'use strict';
                                                    window.addEventListener('load', function() {
                                                        // Fetch all the forms we want to apply custom Bootstrap validation styles to
                                                        var forms = document.getElementsByClassName('needs-validation');
                                                        // Loop over them and prevent submission
                                                        var validation = Array.prototype.filter.call(forms, function(form) {
                                                            form.addEventListener('submit', function(event) {
                                                                if (form.checkValidity() === false) {
                                                                    event.preventDefault();
                                                                    event.stopPropagation();
                                                                }
                                                                form.classList.add('was-validated');
                                                            }, false);
                                                        });
                                                    }, false);
                                                })();
                                            </script>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>


                    </div>
                </div>
                <?php
include('footer.php');

?>