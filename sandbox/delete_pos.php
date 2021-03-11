<?php

//Include authentication
require("process/auth.php");

//Include database connection
require("../config/db.php");

//Include class Position
require("classes/Position.php");

?>
    <!DOCTYPE HTML>
    <html lang="en-US">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Administrator Login</title>
        <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/css/style_admin.css">
    </head>
    <body>

    <!-- Header -->
    <nav class="navbar navbar-inverse navbar-fixed-top navbarcolor" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Voting Sytem</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="admin_page.php"><span class="glyphicon glyphicon-home"></span></a></li>
                    <li><a href="add_org.php"><span class="glyphicon glyphicon-plus-sign"></span>Add Electionn</a></li>
                    <li class="activemodal"><a href="add_pos.php"><span class="glyphicon glyphicon-plus-sign"></span>Add Position</a></li>
                    <li><a href="add_nominees.php"><span class="glyphicon glyphicon-plus-sign"></span>Add Nominees</a></li>
                    <li><a href="viewsastud.php"><span class="glyphicon glyphicon-eye-open"></span>View Voters</a></li>
                    <li><a href="vote_result.php"><span class="glyphicon glyphicon-plus-sign"></span>Vote Result</a></li>
                    <li><a href="vote_report.php"><span class="glyphicon glyphicon-plus-sign"></span>Reports </a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-plus-sign"> C / O Election</span></a>
                    <ul class="dropdown-menu">
                        <li><a href="close_vote.php">Close Voting</a></li>
                        <li><a href="reopen.php">Re-Open Voting</a></li>
                        <li><a href="partylist.php">Add Partylist</a></li>
                        <li><a href="party.php">Partylist</a></li>
                        <li><a href="close_party.php">Closed Partylist</a></li>
                        <li><a href="reopen_party.php">Re-Open Partylist</a></li>
                        <li><a href="viewallvoter.php">All Student Record</a></li>
                  </ul>
                </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="process/logout.php">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->

        </div><!-- /.container-fluid -->
    </nav>
    <!-- End Header -->



    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <?php
                
                if(isset($_GET['pos'])){
                    $nom_pos = trim($_GET['pos']);
                }
                if(isset($_GET['org'])){
                    $nom_org = trim($_GET['org']);
                }
                if(isset($_GET['id'])){
                    $posId = trim($_GET['id']);
                }
                if(isset($_POST['delete'])) {
                    $delPos = new Position();
                    $rtnDelPos = $delPos->DELETE_POS($nom_org, $nom_pos, $posId);
                }
                if(isset($_POST['cancel'])) {
                   header("location: add_pos.php");
                }


                ?>
                 <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" role="form">
                 <div class='alert alert-warning'>Are you sure you want to delete position <b><?php echo $nom_pos?></b>?</div>
                 <input type="submit" name="delete" value="Delete" class="btn btn-info">
                 <input type="submit" name="cancel" value="Cancel" class="btn btn-info">
                 </form>
            </div>
        </div>
    </div>

    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>

    </body>
    </html>


<?php
//Close database connection
$db->close();