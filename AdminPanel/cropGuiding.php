<?php
include('connection.php');
$title = "Crop Guiding";
include('header.php');
include('sidebar.php');


$posted = false;
if(isset($_POST['submit'])){
    $posted = true;
    $comment = $_POST['comments'];
    $file = $_FILES['file'];

    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('pdf', 'docx', 'xlsx', 'jpg', 'jpeg', 'png');

    if(in_array($fileActualExt, $allowed)){
        if($fileError === 0){
            if($fileSize < 5000000){
                $fileNameNew = uniqid('', true).".".$fileActualExt;
                $fileDestination = "assets/uploads/".$fileName;
                if(move_uploaded_file($fileTmpName, $fileDestination)){
                    $sql = "INSERT INTO cropguiding (comments, files) VALUES ('".$comment."', '".$fileName."')";
                    $result = mysqli_query($conn, $sql);
                    if(!$result){
                        echo "Failed";
                    }
                }
                
            }
            else{
                echo "Your file is too big!";
            }
        }
        else{
            echo "There was an error uploading your file!";
        }

    }
    else{
        echo "You cannot upload files of this type!";
    }
}

?>

<?php
    if( $posted ) {
      if( $comment &&  $fileName) 
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
                                <span>Crop Guiding Information</span>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="main-card mb-3 card">
                                        <div class="card-body">
                                            <h5 class="card-title">Crop Guiding</h5>
                                            <form class="needs-validation" method="POST" enctype="multipart/form-data" novalidate>
                                                <div class="position-relative form-group col-md-12 "><label class="font-weight-bold" for="validationCustom03">Comments</label>
                                                    <textarea name="comments" id="validationCustom03" cols="5" rows="5" class="form-control" required></textarea>
                                                </div>
                                                <div class="position-relative form-group col-md-12"><label class="font-weight-bold" for="validationCustom06">Attach File</label><input id="validationCustom06" name="file" type="file" class="form-control" required>
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