<?php include "inc/database.php"; ?><!--include database source-->
<?php include "inc/head.php"; ?><!--include head source-->
<!--page body start-->
<div class="">
  <div class="w3-row">
    <div class="w3-col m1 w3-hide-small"><p><br></p></div>
    <div class="w3-col m2 w3-container w3-padding">
      <form action="/search" method="post">
        <input type="text" id="search_note" class="w3-input w3-border w3-round" placeholder="Search note">
      </form>
      <br>
      <p class="rfont w3-small w3-margin-top"><b>CATAGORIES</b></p>
      <a href="note.php" style="text-decoration: none;" > <p class="rfont w3-small w3-bar w3-margin-top w3-text-black"><b>Subjects >></b></p></a>
      <?php
       $name=$_SESSION['subjectname'];
       $userid=$_SESSION['userid'];
      ?>
    </div>
    <div class="w3-col m8 w3-container w3-padding">
      <?php
        if(isset($_POST['uploadnote'])){
          echo $_SESSION['msgnote'];
          unset($_SESSION['msgnote']);
        }
      ?>
      <?php
        if(isset($_POST['signinfile'])){
          echo $_SESSION['msgsignin'];
        }
      ?>
      <div id="signin" class="w3-modal">
         <div class="w3-modal-content w3-card-4 w3-animate-top" style="max-width:600px">
           <div class="w3-center"><br>
             <div class="w3-text-black rfont w3-margin-bottom"><b>SIGN IN</b><button class="w3-btn w3-right w3-hover-red" onclick="document.getElementById('signin').style.display='none'"><i class="fas fa-times"></i></button></div>
           </div>
           <div class="w3-container">
               <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                  <label>USER ID</label>
                  <input type="number" class="w3-input w3-margin-bottom" name="userid" required />
                  <label>PASSWORD</label>
                  <input type="password" class="w3-input w3-margin-bottom" name="password" required />
                  <button class="w3-button w3-green w3-border w3-margin-bottom" name="signinfile">SIGN IN</button>
               </form>
            </div>
         </div>
       </div>
       <div id="signout" class="w3-modal">
          <div class="w3-modal-content w3-card-4 w3-animate-top" style="max-width:600px">
            <div class="w3-center"><br>
              <div class="w3-text-black rfont w3-margin-bottom"><b>ARE YOU SURE YOU WANT TO SIGN OUT NOW??</b><button class="w3-btn w3-right w3-hover-red" onclick="document.getElementById('signout').style.display='none'"><i class="fas fa-times"></i></button></div>
            </div>
            <div class="w3-container">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                   <button class="w3-button w3-red w3-border w3-margin-bottom w3-block" name="signoutfile">SIGN OUT</button>
                </form>
             </div>
          </div>
        </div>
      <div class="w3-border w3-padding-large">
        <p class="rfont" style="text-transform: uppercase; "><b><?php echo $name; ?> notes </b>
          <?php
             if($_SESSION['userid']){
                if($_SESSION['userid']!="" && $_SESSION['password']!=""){
          ?>
                <button class="w3-button w3-hover-green w3-border w3-border-gray w3-hover-border-green w3-right w3-tiny w3-round" onclick="document.getElementById('signout').style.display='block'"><b>SIGN OUT</b></button><button class="w3-margin-right w3-button w3-hover-green w3-border w3-border-gray w3-right w3-tiny w3-round" onclick="document.getElementById('uploadNote').style.display='block'"><b>UPLOAD</b></button>
          <?php   }else{  ?>
                <button class="w3-button w3-hover-green w3-border w3-border-gray w3-right w3-tiny w3-round" onclick="document.getElementById('signin').style.display='block'"><b>SIGN IN</b></button>
          <?php   }}else{ ?>
            <button class="w3-button w3-hover-green w3-border w3-border-gray w3-right w3-tiny w3-round" onclick="document.getElementById('signin').style.display='block'"><b>SIGN IN</b></button>
          <?php }  ?>
        </p>
        <hr>
        <!--extract notice board start-->
        <?php
        	 $sqlsubjectdetails="SELECT * from subjects where name='$name'";
        	 $resultsubjectdetails=mysqli_query($con,$sqlsubjectdetails);
           $rowsubjectdetails = $resultsubjectdetails->fetch_assoc();
        ?>
        <div class="w3-row">
          <div id="result">

          </div>
          <script>
           $(document).ready(function(){

            load_data();

            function load_data(query)
            {
             $.ajax({
              url:"fetchsearchnote.php",
              method:"POST",
              data:{query:query},
              success:function(data)
              {
               $('#result').html(data);
              }
             });
            }
            $('#search_note').keyup(function(){
             var search = $(this).val();
             if(search != '')
             {
              load_data(search);
             }
             else
             {
              load_data();
             }
            });
           });
          </script>
        </div>
      </div>
    </div>
    <div id="uploadNote" class="w3-modal">
       <div class="w3-modal-content w3-card-4 w3-animate-top" style="max-width:600px">
         <div class="w3-center"><br>
           <div class="w3-text-black rfont w3-margin-bottom"><b>UPLOAD FILE</b><button class="w3-btn w3-right w3-hover-red" onclick="document.getElementById('uploadNote').style.display='none'"><i class="fas fa-times"></i></button></div>
         </div>
         <div class="w3-container">
             <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
                <input type="text" class="w3-input w3-margin-bottom" name="userid" value="<?php echo $userid; ?>" required  style="display:none;"/>
                <label>NOTE NAME</label>
                <input type="text" class="w3-input w3-margin-bottom" name="noteName" required />
                <label>ABOUT NOTE</label>
                <textarea class="w3-input w3-margin-bottom" name="aboutNote" cols="5" required></textarea>
                <label>SUBJECT NAME</label>
                <input type="text" class="w3-input w3-margin-bottom" value="<?php echo $rowsubjectdetails['name']; ?>" disabled />
                <input type="text" class="w3-input w3-margin-bottom" name="subjectName" value="<?php echo $rowsubjectdetails['name']; ?>" style="display: none;" />
                <label>UPLOAD FILE</label>
                <input type="file" class="w3-input w3-margin-bottom" name="uploadFile" required />
                <button class="w3-button w3-green w3-border w3-margin-bottom" name="uploadnote">UPLOAD</button>
             </form>
             <script>
               function hide(){
                 document.getElementById('msgnote').style.display="none";
               }
             </script>
          </div>
       </div>
     </div>
    <div class="w3-col m1 w3-hide-small"><p><br></p></div>
  </div>
  <br>
</div>
<!--page body end-->
<?php include "inc/footer.php"; ?><!--include head source-->
