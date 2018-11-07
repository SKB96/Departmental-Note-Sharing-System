<?php include "inc/database.php"; ?><!--include database source-->
<?php include "inc/head.php"; ?><!--include head source-->
<!--page body start-->
<div class="">
  <div class="w3-row">
    <div class="w3-col m1 w3-hide-small"><p><br></p></div>
    <div class="w3-col m2 w3-container w3-padding">
      <form action="/search" method="GET">
        <input type="text" class="w3-input w3-border w3-round" placeholder="Search">
      </form>
      <br>
      <p class="rfont w3-small w3-margin-top"><b>CATAGORIES</b></p>
      <a href="information.php" style="text-decoration: none;" > <p class="rfont w3-small w3-bar w3-margin-top  w3-text-gray w3-hover-text-black"><b>Student Information</b></p></a>
      <a href="teacherinfo.php" style="text-decoration: none;" > <p class="rfont w3-small w3-bar w3-margin-top w3-text-black"><b>Teacher Information >></b></p></a>
    </div>
    <div class="w3-col m8 w3-container w3-padding">
      <div class="w3-border w3-padding-large">
        <?php
          if(isset($_POST['signinteacher'])){
            echo $_SESSION['msgsigninteacher'];
            unset($_SESSION['msgsigninteacher']);
          }
        ?>
        <?php
          if(isset($_POST['addpublication'])){
            echo $_SESSION['msgaddpublications'];
            unset($_SESSION['msgaddpublications']);
          }
        ?>
        <?php
          if(isset($_POST['updatetprofile'])){
            echo $_SESSION['msgupdateprofile'];
            unset($_SESSION['msgupdateprofile']);
          }
        ?>
        <p class="rfont"><b>TEACHER INFORMATION</b></p>
        <hr>
        <div class="w3-row">
          <?php
             $temail=$_SESSION['teachermail'];
          	 $sqlTeacherDetails="SELECT * from teacher where email='$temail'";
          	 $resultTeacherDetails=mysqli_query($con,$sqlTeacherDetails);
             $rowTeacherDetails = $resultTeacherDetails->fetch_array();
          ?>
          <div class="w3-col m4 w3-padding-16 w3-container w3-light-grey w3-margin-bottom">
              <div class="w3-card-4">
                <img src="gallery/teacher/<?php echo $rowTeacherDetails['image']; ?>" width="100%" alt="Norway">
              </div>
           </div>
           <div class="w3-container">
             <h3><b><?php echo $rowTeacherDetails['name']; ?></b></h3>
             <hr>
           </div>
           <div class="w3-container w3-row" style="font-size: 14px;">
             <div class="w3-col m1 w3-hide-small w3-hide-medium"><p></p></div>
             <div class="w3-col m10">
               <label class="rfont"><b>Qualification</b></label>
               <p class="w3-text-gray"><?php echo $rowTeacherDetails['qualification']; ?></b></p>
               <hr>
               <label class="rfont"><b>Designation</b></label>
               <p class="w3-text-gray"><?php echo $rowTeacherDetails['designation']; ?></b></p>
               <hr>
               <label class="rfont"><b>Department</b></label>
               <p class="w3-text-gray"><?php echo $rowTeacherDetails['department']; ?></b></p>
               <hr>
               <label class="rfont"><b>Contact no.</b></label>
               <p class="w3-text-gray">+88<?php echo $rowTeacherDetails['contact']; ?></b></p>
               <hr>
               <label class="rfont"><b>E-mail address</b></label>
               <p class="w3-text-orange"><?php echo $rowTeacherDetails['email']; ?></b></p>
               <hr>
               <label class="rfont"><b>Publications</b></label>
               <?php
                  $sqlPublications="SELECT * from publications where email='$temail' order by n asc";
                  $resultPublications=mysqli_query($con,$sqlPublications);
                  $i=0;
                  while($rowPublications = $resultPublications->fetch_assoc()){
                    $i++;
               ?>
               <p class="w3-text-gray" style=" text-align : justify;" ><?php echo $i; ?>. <?php echo $rowPublications['text']; ?></b></p>
               <?php
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
                           <input type="email" class="w3-input w3-margin-bottom" name="email" value="<?php echo $temail; ?>"  required />
                           <label>PASSWORD</label>
                           <input type="password" class="w3-input w3-margin-bottom" name="password" required />
                           <button class="w3-button w3-green w3-border w3-margin-bottom" name="signinteacher">SIGN IN</button>
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
                            <button class="w3-button w3-red w3-border w3-margin-bottom w3-block" name="signoutteacher">SIGN OUT</button>
                         </form>
                      </div>
                   </div>
               </div>
               <div id="addpublication" class="w3-modal">
                  <div class="w3-modal-content w3-card-4 w3-animate-top" style="max-width:600px">
                    <div class="w3-center"><br>
                      <div class="w3-text-black rfont w3-margin-bottom"><b>ADD PUBLICATION</b><button class="w3-btn w3-right w3-hover-red" onclick="document.getElementById('addpublication').style.display='none'"><i class="fas fa-times"></i></button></div>
                    </div>
                    <div class="w3-container">
                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                           <label>USER ID</label>
                           <input type="email" class="w3-input w3-margin-bottom" name="email" value="<?php echo $temail; ?>"  required />
                           <label>TEXT</label>
                           <textarea class="w3-input w3-margin-bottom" name="ptext" rows="10" placeholder="Text..."></textarea>
                           <label>PASSWORD</label>
                           <input type="password" class="w3-input w3-margin-bottom" name="password" required />
                           <button class="w3-button w3-green w3-border w3-margin-bottom" name="addpublication">ADD</button>
                        </form>
                     </div>
                  </div>
                </div>
                <div id="edit" class="w3-modal">
                   <div class="w3-modal-content w3-card-4 w3-animate-top" style="max-width:600px">
                     <div class="w3-center"><br>
                       <div class="w3-text-black rfont w3-margin-bottom"><b>EDIT PROFILE</b><button class="w3-btn w3-right w3-hover-red" onclick="document.getElementById('edit').style.display='none'"><i class="fas fa-times"></i></button></div>
                     </div>
                     <div class="w3-container">
                         <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                            <label>QUALIFICATION</label>
                            <input type="text" class="w3-input w3-margin-bottom" name="qualification" value="<?php echo $rowTeacherDetails['qualification']; ?>"  required />
                            <label>DESIGNATION</label>
                            <input type="text" class="w3-input w3-margin-bottom" name="designation" value="<?php echo $rowTeacherDetails['designation']; ?>"  required />
                            <label>DEPARTMENT</label>
                            <input type="text" class="w3-input w3-margin-bottom" name="department" value="<?php echo $rowTeacherDetails['department']; ?>"  required />
                            <label>CONTACT NO</label>
                            <input type="number" class="w3-input w3-margin-bottom" name="contact" value="<?php echo $rowTeacherDetails['contact']; ?>"  required />
                            <label>EMAIL ADDRESS</label>
                            <input type="text" class="w3-input w3-margin-bottom" name="email" value="<?php echo $rowTeacherDetails['email']; ?>"  required />
                            <label>PASSWORD</label>
                            <input type="password" class="w3-input w3-margin-bottom" name="password"  required />
                            <button class="w3-button w3-green w3-border w3-margin-bottom" name="updatetprofile">UPDATE</button>
                         </form>
                      </div>
                   </div>
                 </div>
               <?php
                  if($_SESSION['userid']){
                     if($_SESSION['userid']!="" && $_SESSION['password']!=""){
               ?>
                     <button class="w3-margin-top w3-button w3-green w3-hover-green w3-margin-right w3-round" onclick="document.getElementById('edit').style.display='block'"><b>EDIT</b></button> <button class="w3-margin-top w3-button w3-blue w3-hover-blue w3-margin-right w3-round" onclick="document.getElementById('addpublication').style.display='block'"><b>ADD PUBLICATION</b></button><button class="w3-margin-top w3-button w3-red w3-hover-red rfont w3-text-white w3-round" onclick="document.getElementById('signout').style.display='block'"><b>SIGN OUT</b></button>
               <?php   }else{  ?>
                     <span class="w3-text-gray">Edit Your Profile ? Please Login. </span><button class="w3-button w3-orange w3-hover-orange rfont w3-text-white w3-round" onclick="document.getElementById('signin').style.display='block'"><b><i class="fas fa-chevron-circle-right"></i> SIGN IN</b></button>
               <?php   }}else{ ?>
                 <span class="w3-text-gray">Edit Your Profile ? Please Login. </span><button class="w3-button w3-orange w3-hover-orange rfont w3-text-white w3-round" onclick="document.getElementById('signin').style.display='block'"><b><i class="fas fa-chevron-circle-right"></i> SIGN IN</b></button>
               <?php }  ?>
               <br><br>
             </div>
           </div>
        </div>
      </div>
    </div>
    <div class="w3-col m1 w3-hide-small"><p><br></p></div>
  </div>
  <br>
</div>
<!--page body end-->
<?php include "inc/footer.php"; ?><!--include head source-->
