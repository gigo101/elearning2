<?php
  require_once("includes/connection.php");
?>
<?php require_once("includes/functions.php"); ?>
<?php
    
    $id=$_POST['studid'];
    $term=$_POST['term'];
    $grade=$_POST['grade'];
    $errors = array();

         
            $query = "UPDATE grade SET 
                        grade = {$grade}
                        WHERE studid = {$id} and termid = {$term}" ;
            $result = mysql_query($query, $connection);
                if (mysql_affected_rows() == 1) {
                    // Success
                    $message = "The chapter was successfully updated.";
                    redirect_to("grade.php");
                } else {
                    // Failed
                    $message = "The subject update failed.";
                    $message .= "<br />". mysql_error();
                }
                
        
            
?>