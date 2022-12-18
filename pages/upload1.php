<?php
// 3a) Check if valid lecturer is logged in.
// 3b) Check if session is expired.
if(isset($_SESSION['userID']) && ($_SESSION['userID']) == '435')
{
?>
<div class="container">
   <div class="row">
      <div class="col-sm">
         <a href="index.php?menu=download"><img class="imgcenter" src="./res/img/download.png" alt="Download image"></a>
      </div>
      <div class="col-9 assignments">
         <?php
            function dir_is_empty($dir) {
               $handle = opendir($dir);
               while ($entry = readdir($handle)) {
                  if ($entry != "." && $entry != "..") {
                     closedir($handle);
                     return false;
                  }
               }
               closedir($handle);
               return true;
            }
      
            $test = dir_is_empty("uploads/");
           
            if ($test) {
            // If no files have been uploaded yet, display "No files uploaded yet." in red font
            echo "<div class='red'>No files uploaded yet.</div>";
           
         }else{
            // 3c) Open the uploads directory using an appropriate function, and read its contents
            $dir = opendir('uploads/');
            echo '<ul>';
            while ($read = readdir($dir)){
               if ($read!='.' && $read!='..'){
                  // Link each uploaded file. Hint: keep in mind to use the correct path!
                  echo '<li><a href="uploads/'.$read.'" download>'.$read.'</a></li>';
               }
            }
            echo '</ul>';
            closedir($dir); 
           }
}
         ?>
      </div>
   </div>
</div>