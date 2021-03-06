<?php

// Inialize session
session_start();
if (!isset($_SESSION['username'])) {
header('Location: sign-in.php');
}

?>

<?php
require_once("includes/connection.php");
// Check, if username session is NOT set then this page will jump to login page
?>

<?php include("includes/header.php"); 
?>
    <div class="sidebar-nav">
        <form class="search form-inline">
            <input type="text" placeholder="Search...">
        </form>

        <a href="#dashboard-menu" class="nav-header" data-toggle="collapse"><i class="icon-dashboard"></i>Dashboard</a>
        <ul id="dashboard-menu" class="nav nav-list collapse in">
            <li class="active"><a href="index.php">Home</a></li>
            <li><a href="lesson.php">Lesson</a></li>
            <li><a href="student_assignment.php">Assignment</a></li>
            <li ><a href="student_grade.php">Grade</a></li>
            <li ><a href="calendar.php">Calendar</a></li>      
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
            <div class="stats">
    
</div>

            <h1 class="page-title">Welcome <a href="#"><?php echo $_SESSION["username"]?></a></h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="index.php">Home</a> <span class="divider">/</span></li>
            <li class="active">Dashboard</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">       
        <div class="block">
            <p class="block-heading">Online E-Learning and Viewing of Grades</p>
              <div class="block-body">
                <h3>Announcements</h3>     
                    <div class="alert alert-error">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                            This website is on Beta Version, some of its functionalities are still under development.
                    </div>

                    
                     <?php      
                        // 3. Perform database query
                        $sql="Select announcement_id,visible,DATE_FORMAT(announcement_date,'%b/%d/%y') as ddate,announcement_content from announcement";
                        $result = mysql_query($sql, $connection);
                        if (!$result) {
                            die("Database query failed: " . mysql_error());
                        }
                        // 4. Use returned data
                        while ($row = mysql_fetch_array($result)) {
                        echo "<div class=\"alert alert-info\">";
                        echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>";
                            echo "Message:<br>{$row[3]}";
                            echo "<div class=\"announcement\">Date publish: {$row[2]}</div>";
                        echo "</div>";
                        }
                    
                    ?>
                   
              </div>
        </div>
                    
<?php 
include("includes/footer.php"); 
?>
