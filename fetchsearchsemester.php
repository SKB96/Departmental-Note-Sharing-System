<?php include "inc/database.php"; ?><!--include database source-->
<?php
$sessionvalue=$_SESSION['sessionvalue'];
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($con, $_POST["query"]);
 $query="SELECT * from subjects where semistar='$sessionvalue' and name LIKE '%".$search."%' order by name asc";
}
else
{
 $query="SELECT * from subjects where semistar='$sessionvalue' order by name asc";
}
$result = mysqli_query($con, $query);
if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_array($result)){
      $server=htmlspecialchars($_SERVER['PHP_SELF']);
      $name=$row['name'];
      $output .= '<div class="w3-col m6 w3-padding">
        <div class="w3-card w3-hover-deep-purple">
          <form action="'.$server.'" method="post">
            <input type="text" name="subjectname" value="'.$name.'" style="display: none;">
            <button class="w3-btn w3-padding-16 w3-block" name="subjectdetails" style="text-transform: uppercase; ">'.$name.'</button>
          </form>
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
