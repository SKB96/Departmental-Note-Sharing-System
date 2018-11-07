<?php include "inc/database.php"; ?><!--include database source-->
<?php
$subjectname=$_SESSION['subjectname'];
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($con, $_POST["query"]);
 $query="SELECT * from note where subjectname='$subjectname' and notename LIKE '%".$search."%' order by notename asc";
}
else
{
 $query="SELECT * from note where subjectname='$subjectname' order by notename asc limit 20";
}
$result = mysqli_query($con, $query);
if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_array($result)){
      $notename=$row['notename'];
      $notedesc=$row['notedesc'];
      $link=$row['link'];
      $date=$row['date'];
      $time=$row['time'];
      $username=$row['username'];
      $output .= '<div class="w3-col m6 w3-padding">
        <div class="w3-card-4">
          <header class="w3-container w3-light-grey">
          <p class="rfont" style="text-transform:uppercase "><b>'.$notename.'</b><span class="w3-right"><a href="uploads/file/'.$link.'"><i class="fas fa-download"></i></a></span></p>
          </header>

          <div class="w3-container">
          <p>'.$notedesc.'</p>
          </div>

          <footer class="w3-container w3-border-top">
          <p class="w3-text-gray w3-tiny" >'.$date.', '.$time.'<span class="w3-right"><i class="far fa-user"></i> '.$username.'</span></p>
          </footer>

        </div>
      </div>';
    }
    echo $output;
}else{
    echo '<div class="w3-container w3-center">
              <p>No content found!</p>
            </div>';
}
?>
