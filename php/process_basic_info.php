<?php 

$person = [
    "name" => htmlspecialchars($_POST['name'], ENT_QUOTES), 
    "surname" => htmlspecialchars($_POST['surname'], ENT_QUOTES),
    "date_of_birth" => date("d/m/Y", strtotime($_POST['date_of_birth'])),
    "address" => htmlspecialchars($_POST['address'], ENT_QUOTES),
    "phone_number" => htmlspecialchars($_POST['phone_number'], ENT_QUOTES),
    "email" => htmlspecialchars($_POST['email'], ENT_QUOTES),
    "foreign_language" => htmlspecialchars($_POST['foreign_language'], ENT_QUOTES),
    "hobby" => htmlspecialchars($_POST['hobby'], ENT_QUOTES)
];

/** photo upload */
$target_dir = "../assets/uploads/";
$target_file = $target_dir.basename($_FILES['photo']['name']);
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
$validImage = getimagesize($_FILES['photo']['tmp_name']);
if(!$validImage){
    die(json_encode("Error - Something went wrong, invalid image type."));
}

$target_file = $target_dir."photo_".$person['name'].".".$imageFileType;
move_uploaded_file($_FILES['photo']['tmp_name'], $target_file);

$person['profile_picture'] = $target_file;

?>


<html>
    <head>
        <title>Step 2 - CVGenerator</title>

        <!-- styles --> 
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
        <link href="../assets/css/index.css" rel="stylesheet" />

        <!-- html2canvas -->
        <script src="../assets/js/canvas2image.js"></script>
        <script src="../assets/js/html2canvas.js"></script>


    </head>

    <body>

        <div class="container-fluid background-main" id="main-cv-content">
            <div class="row p-5">
                <div class="col-xs-12 col-sm-7 mx-auto">
                    <div class="row">
                        <div class="col-xs-12 col-sm-4 left-sidebar">
                            <img src="<?php echo $person['profile_picture'] ?>" alt="CV-photo" width="200px" />

                            <div class="row p-2">
                                <div class="col-xs-12">
                                    <span>Date of Birth: <?php echo $person['date_of_birth']; ?> </span>
                                </div>
                            </div>

                            
                            <div class="row p-2">
                                <div class="col-xs-12">
                                    <span>Address: <?php echo $person['address']; ?> </span>
                                </div>
                            </div>

                            <div class="row p-2">
                                <div class="col-xs-12">
                                    <span>Phone number: <?php echo $person['phone_number']; ?> </span>
                                </div>
                            </div>

                            <div class="row p-2">
                                <div class="col-xs-12">
                                    <span>Email: <?php echo $person['email']; ?> </span>
                                </div>
                            </div>

                            <div class="row p-2">
                                <div class="col-xs-12">
                                    <span>Hobbies: <?php echo $person['hobby']; ?> </span>
                                </div>
                            </div>

                            <div class="row p-2">
                                <div class="col-xs-12">
                                    <span>Foreign languages: <?php echo $person['foreign_language']; ?> </span>
                                </div>
                            </div>

                        </div><!-- end of left sidebar -->

                        <div class="col-xs-12 col-sm-8 right-content">
                            <div class="row mt-2">
                                <div class="col-xs-12 text-left">
                                    <h3>Education </h3>
                                    <div class="row">
                                        <div class="col-xs-12" id="education-rows">
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-6">
                                                    <input type="number" class="form-control" class="study-years" placeholder="Enter study years.." />
                                                </div>
                                                <div class="col-xs-12 col-sm-6">
                                                    <input type="text" class="form-control" class="education" placeholder="Enter school name.." />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 mt-2">
                                            <button type="button" id="add-more-education" class="btn btn-block btn-primary">Add more</button>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end of education row -->

                            <div class="row mt-2">
                                <div class="col-xs-12 text-left">
                                    <h3>Skills</h3>
                                    <div class="row">
                                        <div class="col-xs-12" id="skill-rows">
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-8">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="beginner">
                                                        <label class="form-check-label" for="inlineRadio1">Beginner</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="intermediate">
                                                        <label class="form-check-label" for="inlineRadio2">Intermediate</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="senior">
                                                        <label class="form-check-label" for="inlineRadio3">Senior</label>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-4">
                                                 <input type="text" class="form-control" class="skills" placeholder="Skill name" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 mt-2">
                                            <button type="button" id="add-more-skills" class="btn btn-block btn-primary">Add more</button>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end of skills row -->

                            <div class="row mt-2 mb-2">
                                <div class="col-xs-12 text-left">
                                    <h3>Experience</h3>
                                    <div class="row">
                                        <div class="col-xs-12" id="experience-rows">
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-6">
                                                    <input type="number" class="form-control" class="experience-years" placeholder="Years of exp.." />
                                                </div>
                                                <div class="col-xs-12 col-sm-6">
                                                    <input type="text" class="form-control" class="experience" placeholder="Role name.." />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 mt-2">
                                            <button type="button" id="add-more-experience" class="btn btn-block btn-primary">Add more</button>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end of education row -->

                        </div><!-- end of right sidebar -->

                        <div class="d-grid p-0">
                            <button type="button" id="print-cv" class="btn btn-block btn-success">Print this CV</button>
                        </div>
                    </div><!-- end of content row -->
                </div><!-- end of main col -->
            
            </div><!-- end of main row -->
        </div><!-- end of container -->

        <!-- custom scripts -->
        <script src="../assets/js/main.js"></script>
    </body>
</html>