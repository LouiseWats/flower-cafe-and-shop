<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Contact</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/flowercafeandshop.css" rel="stylesheet">

    <!-- Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">

    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- JavaScript -->
    <script type="text/javascript">
        $(document).ready(function () {

            $("#send").click(function () {

                fname = $("#fname").val();
                email = $("#email").val();
                subject = $("#subject").val();
                message = $("#message").val();

                $.ajax({
                    type: "POST",
                    url: "sendmessage.php",
                    data: "fname=" + fname + "&email=" + email + "&subject=" + subject + "&message=" + message,
                    success: function (html) {
                        if (html == 'true') {
                            $("#add_err2").html('<div class="alert alert-success"><strong>Message Sent!</strong></div>');

                        } else if (html == 'fname_long') {
                            $("#add_err2").html('<div class="alert alert-danger"><strong>First Name must cannot exceed 50 characters.</strong></div>');
						
						} else if (html == 'fname_short') {
                            $("#add_err2").html('<div class="alert alert-danger"><strong>First Name must exceed 2 characters.</strong></div>');
												 
						} else if (html == 'email_long') {
                            $("#add_err2").html('<div class="alert alert-danger"><strong>Email must cannot exceed 50 characters.</strong></div>');
						
						} else if (html == 'email_short') {
                            $("#add_err2").html('<div class="alert alert-danger"><strong>Email must exceed 2 characters.</strong></div>');
												 
						} else if (html == 'eformat') {
                            $("#add_err2").html('<div class="alert alert-danger"><strong>Email format incorrect.</strong></div>');
												 
						} else if (html == 'subject_long'){
                            $("#add_err2").html('<div class="alert alert-danger"><strong>Subject field is too long.</strong></div>');
                            
                        } else if (html == 'message_long') {
                            $("#add_err2").html('<div class="alert alert-danger"><strong>Message must cannot exceed 50 characters.</strong></div>');
						
						} else if (html == 'message_short') {
                            $("#add_err2").html('<div class="alert alert-danger"><strong>Message</strong></div>');

                        } else {
                            $("#add_err2").html('<div class="alert alert-danger"><strong>Error processing request. Please try again.</strong></div>');
                        }
                    },
                    beforeSend: function () {
                        $("#add_err2").html("loading...");
                    }
                });
                return false;
            });
        });
    </script>

</head>

<body>

    <!-- Header -->
    <?php require_once 'header.php';?>

    <!-- Navigation -->
    <?php require_once 'nav.php';?>

    <div class="container">
        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">
                        <strong>Contact Us</strong>
                    </h2>
                    <hr>
                </div>
                <div class="col-md-8">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2222.1548637964993!2d10.202436615908217!3d56.15442698066274!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x464c3f9230438187%3A0x91e52551432da8b7!2sHans%20Hartvig%20Seedorffs%20Str%C3%A6de%202%2C%208000%20Aarhus!5e0!3m2!1sda!2sdk!4v1629331921476!5m2!1sda!2sdk" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
                <div class="col-md-4">
                    <p>Phone:
                        <strong>+45 XXXXXXXX</strong>
                    </p>
                    <p>Email:
                        <strong><a href="mailto:name@example.com">name@example.com</a></strong>
                    </p>
                    <p>Address:
                        <strong>Hans Hartvig Seedorffs Str. 2
                            <br>8000 Aarhus C, Denmark</strong>
                    </p>
                    <div>
                        <a href="https://wwww.facebook.com" class="social-icons"><i class="fab fa-facebook-square fa-3x" ></i></a>
                        <a href="https://wwww.instagram.com" class="social-icons"><i class="fab fa-instagram-square fa-3x"></i></a>
                        <a href="https://wwww.linkedin.com" class="social-icons"><i class="fab fa-linkedin fa-3x"></i></a>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">
                        <strong>Contact Form</strong>
                    </h2>
                    <hr>
                    <div id="add_err2"></div>
                    <form role="form">
                        <div class="row">
                            <div class="form-group col-lg-12">
                                <label>Name</label>
                                <input type="text" id="fname" name="fname" maxlength="25" class="form-control">
                            </div>
                            <div class="form-group col-lg-12">
                                <label>Email Address</label>
                                <input type="email" id="email" name="email" maxlength="25" class="form-control">
                            </div>
                            <div class="form-group col-lg-12">
                                <label>Subject</label>
                                <input type="text" id="subject" name="subject" maxlength="25" class="form-control">
                            </div>
                            <div class="clearfix"></div>
                            <div class="form-group col-lg-12">
                                <label>Message</label>
                                <textarea class="form-control" id="message" name="message" maxlength="300" rows="6"></textarea>
                            </div>
                            <div class="form-group col-lg-12">                           
                                <button type="submit"  id="send" class="btn btn-default">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        

    </div>

    <!-- Footer -->
    <?php require_once 'footer.php';?>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>
</html>
