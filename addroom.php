<?php
  require_once("includes/connection.php");
?>

<?php include("includes/header.php"); 
?>

  <body class=""> 
  <!--<![endif]-->
     
    <div class="sidebar-nav">
        <form class="search form-inline">
            <input type="text" placeholder="Search...">
        </form>

        <a href="#dashboard-menu" class="nav-header" data-toggle="collapse"><i class="icon-dashboard"></i>Dashboard</a>
        <ul id="dashboard-menu" class="nav nav-list collapse in">
            <li><a href="index.php">Home</a></li>
            <li ><a href="rooms.php">Rooms</a></li>
            <li ><a href="user.php">Sample Item</a></li>
            <li ><a href="media.html">Media</a></li>
            <li ><a href="calendar.html">Calendar</a></li>
            
        </ul>

        <a href="#accounts-menu" class="nav-header" data-toggle="collapse"><i class="icon-briefcase"></i>Account<span class="label label-info">+3</span></a>
        <ul id="accounts-menu" class="nav nav-list collapse">
            <li ><a href="sign-in.html">Sign In</a></li>
            <li ><a href="sign-up.html">Sign Up</a></li>
            <li ><a href="reset-password.html">Reset Password</a></li>
        </ul>

        <a href="#error-menu" class="nav-header collapsed" data-toggle="collapse"><i class="icon-exclamation-sign"></i>Error Pages <i class="icon-chevron-up"></i></a>
        <ul id="error-menu" class="nav nav-list collapse">
            <li ><a href="403.html">403 page</a></li>
            <li ><a href="404.html">404 page</a></li>
            <li ><a href="500.html">500 page</a></li>
            <li ><a href="503.html">503 page</a></li>
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

            <h1 class="page-title">Add Rooms</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="index.html">Home</a> <span class="divider">/</span></li>
            <li class="active">Add Rooms</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">       
        <div class="block">
            <p class="block-heading">Room Information</p>
              <div class="block-body">
                <form id="tab" action="create_room.php" method="post">
                    <label>Room Name</label>
                    <input type="text"  name="room_name" value="" class="input-xlarge">
                    <input type="text" name="available" value="" class="hidden">
                    <label>Room Tye</label>
                    <select class="input-xlarge" name="roomtype">
                        <?php
                            $sql="Select roomtypeid,roomtypedesc from roomtype";
                            $result=mysql_query($sql,$connection);
                                if(!$result){
                                    die("Database query failed: " . mysql_error());
                                }

                            while ($row=mysql_fetch_array($result)) {
                                echo "<option value=\"{$row[0]}\">{$row[1]}</option>";   
                            }

                        ?>      
                    </select>   

                    <div class="btn-toolbar">
                        <button class="btn btn-primary" type="submit"><i class="icon-save"></i> Save</button>
                        <a href="rooms.php" class="btn">Cancel</a>
                        <div class="btn-group">
                        </div>
                    </div>
                </form>  

     

              </div>
        </div>
                    
                    <footer>
                        <hr>
            
                        <p class="pull-right">Powered by <a href="#" target="_blank">Bootstrap</a> by <a href="http://www.portnine.com" target="_blank">Portnine</a></p>
                        

                        <p>&copy; 2012 <a href="#" target="_blank">Padie</a></p>
                    </footer>
                    
            </div>
        </div>
    </div>
<?php 
include("includes/footer.php"); 
?>

