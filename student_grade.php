<?php

// Inialize session
session_start();
// Check, if username session is NOT set then this page will jump to login page
if (!isset($_SESSION['username'])) {
header('Location: sign-in.php'); 
}
?>

<?php
require_once("includes/connection.php");

?>


<?php include("includes/header.php"); 
?>    
    <div class="sidebar-nav">
        <form class="search form-inline">
            <input type="text" placeholder="Search...">
        </form>

        <a href="#dashboard-menu" class="nav-header" data-toggle="collapse"><i class="icon-dashboard"></i>Dashboard</a>
        <ul id="dashboard-menu" class="nav nav-list collapse in">
            <li><a href="index.php">Home</a></li>
            <li class="active"><a href="user.html">Grade</a></li>
            <li ><a href="media.html">Media</a></li>
            <li ><a href="calendar.html">Calendar</a></li>
            
        </ul>

        <a href="#accounts-menu" class="nav-header" data-toggle="collapse"><i class="icon-briefcase"></i>Account<span class="label label-info">+3</span></a>
        <ul id="accounts-menu" class="nav nav-list collapse">
            <li ><a href="sign-in.html">Sign In</a></li>
            <li ><a href="sign-up.html">Sign Up</a></li>
            <li ><a href="reset-password.html">Reset Password</a></li>
        </ul>

        <a href="#legal-menu" class="nav-header" data-toggle="collapse"><i class="icon-legal"></i>Legal</a>
        <ul id="legal-menu" class="nav nav-list collapse">
            <li ><a href="privacy-policy.html">Privacy Policy</a></li>
            <li ><a href="terms-and-conditions.html">Terms and Conditions</a></li>
        </ul>

        <a href="help.html" class="nav-header" ><i class="icon-question-sign"></i>Help</a>
        <a href="faq.html" class="nav-header" ><i class="icon-comment"></i>Faq</a>
    </div>
    

    
    <div class="content">
        
        <div class="header">
            
            <h1 class="page-title">View Grade</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="index.php">Home</a> <span class="divider">/</span></li>
            <li class="active">Grade</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    
<div class="well">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#home" data-toggle="tab">Midterm</a></li>
      <li><a href="#profile" data-toggle="tab">Final</a></li>
    </ul>
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane active in" id="home">

        <table class="table">
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Term</th>
                    <th>Grade</th>
                </tr> 
                <?php
                
                        // 3. Perform database query
                    $sql="select student.studid,student.firstname,student.lastname,term.termid,term.gradingterm,grade.grade from student
                            join grade on student.studid=grade.studid and username='{$_SESSION["username"]}'
                                join term on term.termid=grade.termid and term.termid=1";
                    $result = mysql_query($sql, $connection);
                      if (!$result) {
                        die("Database query failed: " . mysql_error());
                    }
                    
                    // 4. Use returned data
                    while ($row = mysql_fetch_array($result)) {
                    echo "<tr>";
                      echo   "<td>{$row[1]}</td>";
                      echo   "<td>".$row[2]."</td>";
                      echo   "<td>".$row[4]."</td>";
                      echo   "<td>".$row[5]."</td>";
                      echo "</tr>"; 
                  }
                    
                    ?>

                </table>
      </div>
      <div class="tab-pane fade" id="profile">
    <form id="tab2">
        <table class="table">
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Term</th>
                    <th>Grade</th>
                </tr> 
                <?php
                
                        // 3. Perform database query
                    $sql="select student.studid,student.firstname,student.lastname,term.termid,term.gradingterm,grade.grade from student
                            join grade on student.studid=grade.studid and username='{$_SESSION["username"]}'
                                join term on term.termid=grade.termid and term.termid=2";
                    $result = mysql_query($sql, $connection);
                      if (!$result) {
                        die("Database query failed: " . mysql_error());
                    }
                    
                    // 4. Use returned data
                    while ($row = mysql_fetch_array($result)) {
                    echo "<tr>";
                      echo   "<td>{$row[1]}</td>";
                      echo   "<td>".$row[2]."</td>";
                      echo   "<td>".$row[4]."</td>";
                      echo   "<td>".$row[5]."</td>";
                      echo "</tr>"; 
                  }
                    
                    ?>

                </table>
    </form>
      </div>
  </div>

</div>

<div class="modal small hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Delete Confirmation</h3>
  </div>
  <div class="modal-body">
    
    <p class="error-text"><i class="icon-warning-sign modal-icon"></i>Are you sure you want to delete the user?</p>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
    <button class="btn btn-danger" data-dismiss="modal">Delete</button>
  </div>
</div>

    
<?php 
include("includes/footer.php"); 
?>



