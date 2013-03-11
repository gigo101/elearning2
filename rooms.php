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
            <li><a href="admin.php">Home</a></li>
            <li ><a href="rooms.php">Rooms</a></li>
            <li ><a href="user.html">Sample Item</a></li>
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

            <h1 class="page-title">Rooms</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="index.html">Home</a> <span class="divider">/</span></li>
            <li class="active">Rooms</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                <div class="btn-toolbar">
                    <a href="addroom.php"><button class="btn btn-primary"><i class="icon-plus"></i>Add Room</button></a>
                    <div class="btn-group">
                    </div>
</div>
        <div class="block">
            <p class="block-heading">Rooms</p>
              <div class="block-body">
              <table class="table">
                <tr>
                    <th>Room ID</th>
                    <th>Room Name</th>
                    <th>Room Description</th>
                    <th>Price</th>
                </tr> 
                <?php
                
                    // 3. Perform database query
                    $sql="Select roomid,roomname,roomtypedesc,format(roomprice,2) as price from rooms,roomtype where rooms.roomtypeid=roomtype.roomtypeid order by roomid";
                    $result = mysql_query($sql, $connection);
                      if (!$result) {
                        die("Database query failed: " . mysql_error());
                    }
                    
                    // 4. Use returned data
                    while ($row = mysql_fetch_array($result)) {
                    echo "<tr>";
                      echo   "<td>{$row[0]}</td>";
                      echo   "<td>".$row[1]."</td>";
                      echo   "<td>".$row[2]."</td>";
                      echo   "<td>".$row[3]."</td>";
                      echo   "<td>
                                <a href=\"user.html\"><i class=\"icon-pencil\"></i></a>
                                <a href=\"delete_room.php?roomid={$row[0]}\" role=\"button\" onclick=\"return confirm('Are you sure delete?');\"><i class=\"icon-remove\"></i></a>
                             </td>";

                      echo "</tr>"; 
                  }
                    
                    ?>

                </table>
                

              </div>
        </div>
        
                    <footer>
                        <hr>
                        <!-- Purchase a site license to remove this link from the footer: http://www.portnine.com/bootstrap-themes -->
                        <p class="pull-right">A <a href="http://www.portnine.com/bootstrap-themes" target="_blank">Free Bootstrap Theme</a> by <a href="http://www.portnine.com" target="_blank">Portnine</a></p>
                        

                        <p>&copy; 2012 <a href="http://www.portnine.com" target="_blank">Portnine</a></p>
                    </footer>
                    
            </div>
        </div>
    </div>

<?php 
include("includes/footer.php"); 
?>