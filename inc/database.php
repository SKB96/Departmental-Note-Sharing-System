<?php
	 session_start();
	 //connect to database
	 $con=mysqli_connect('127.0.0.1','root','','myproject');
   // Check connection
   if (mysqli_connect_errno()){
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
   }else{
       //test data
       function test($data){
         $data=htmlspecialchars($data);
         $data=stripcslashes($data);
         $data=trim($data);
         return $data;
       }
       //start code
			 //admin sign include
				 if(isset($_POST['signinadmin'])){
				 	$email=test($_POST['email']);
				 	$password=test($_POST['password']);
				 	$sql="SELECT * FROM signup where email='$email'";
				 	$result=mysqli_query($con,$sql);

				 	if(mysqli_num_rows($result)== 1){
				 		$row = $result->fetch_assoc();
				 		$dpassword=$row['password'];
				 		if($password==$dpassword){
				 			//set cookie
							if(!empty($_POST["remember"])) {
								setcookie ("email",$_POST["email"],time()+ (10 * 365 * 24 * 60 * 60));
								setcookie ("password",$_POST["password"],time()+ (10 * 365 * 24 * 60 * 60));
							} else {
								if(isset($_COOKIE["email"])) {
									setcookie ("email","");
								}
								if(isset($_COOKIE["password"])) {
									setcookie ("password","");
								}
							}
				 			header("location:admin.php");
				 			$_SESSION['switch']=1;
				 		}else{
				 	    	$_SESSION['msglog']="Wrong Password!";
				 		}
				 }else{
				 	$_SESSION['msglog']="Wrong Information!";

				 }
			}
			 //create new post
       if(isset($_POST['new_post'])){
       $permited  = array('jpg', 'jpeg', 'png', 'gif',);
       $file_name = $_FILES['image']['name'];
       $file_size = $_FILES['image']['size'];
       $file_temp = $_FILES['image']['tmp_name'];
       if($file_name==""){
         $unique_image="";
       }else{
         $div = explode('.', $file_name);
         $file_ext = strtolower(end($div));
         $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
         $uploaded_image = "uploads/posts/".$unique_image;
         move_uploaded_file($file_temp, $uploaded_image);
       }
       //$text = mysqli_real_escape_string($_POST["text"]);
   	   $text = mysqli_real_escape_string($con,$_POST["text"]);
       date_default_timezone_set("Asia/Dhaka");
       $postDate = date("l, M d Y");
   		 $postTime = date("h:i:sa");
       $sqlPost="INSERT INTO newpost(text,image, date,time) values('$text','$unique_image','$postDate','$postTime')";
       mysqli_query($con,$sqlPost);
          $_SESSION['msgPost']="<a href='admin.php' style='text-decoration:unset;'><div id='msgPost' class='w3-card w3-green w3-padding w3-center w3-margin-top' onclick=hide()>Success!<span class='w3-right w3-white w3-hover-red' style='padding:0px 5px;'>&times</span></div></a>";
       }else{
          $_SESSION['msgPost']="<a href='admin.php' style='text-decoration:unset;'><div id='msgPost' class='w3-card w3-red w3-padding w3-center w3-margin-top' onclick=hide()>Failed!<span class='w3-right w3-white w3-hover-red' style='padding:0px 5px;'>&times</span></div></a>";
       }

			 //create new gallery
       if(isset($_POST['newGallery'])){
       $permited  = array('jpg', 'jpeg', 'png', 'gif',);
       $file_name = $_FILES['image']['name'];
       $file_size = $_FILES['image']['size'];
       $file_temp = $_FILES['image']['tmp_name'];
       if($file_name==""){
         $unique_image="";
       }else{
         $div = explode('.', $file_name);
         $file_ext = strtolower(end($div));
         $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
         $uploaded_image = "uploads/gallery/".$unique_image;
         move_uploaded_file($file_temp, $uploaded_image);
       }
       //$text = mysqli_real_escape_string($_POST["text"]);
   	   $text = mysqli_real_escape_string($con,$_POST["gtext"]);
       date_default_timezone_set("Asia/Dhaka");
       $postDate = date("l, M d Y");
   		 $postTime = date("h:i:sa");
       $sqlPost="INSERT INTO newgallery(text,image, date,time) values('$text','$unique_image','$postDate','$postTime')";
       mysqli_query($con,$sqlPost);
          $_SESSION['msgGallery']="<a href='admingallery.php' style='text-decoration:unset;'><div id='msgGallery' class='w3-card w3-green w3-padding w3-center w3-margin-top' onclick=hide()>Success!<span class='w3-right w3-white w3-hover-red' style='padding:0px 5px;'>&times</span></div></a>";
       }else{
          $_SESSION['msgGallery']="<a href='admingallery.php' style='text-decoration:unset;'><div id='msgGallery' class='w3-card w3-red w3-padding w3-center w3-margin-top' onclick=hide()>Failed!<span class='w3-right w3-white w3-hover-red' style='padding:0px 5px;'>&times</span></div></a>";
       }

			 //create new events
       if(isset($_POST['new_event'])){
       $permited  = array('jpg', 'jpeg', 'png', 'gif',);
       $file_name = $_FILES['image']['name'];
       $file_size = $_FILES['image']['size'];
       $file_temp = $_FILES['image']['tmp_name'];
       if($file_name==""){
         $unique_image="";
       }else{
         $div = explode('.', $file_name);
         $file_ext = strtolower(end($div));
         $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
         $uploaded_image = "uploads/event/".$unique_image;
         move_uploaded_file($file_temp, $uploaded_image);
       }
       //$text = mysqli_real_escape_string($_POST["text"]);
   	   $text = mysqli_real_escape_string($con,$_POST["etext"]);
			 $type = mysqli_real_escape_string($con,$_POST["posttype"]);
       date_default_timezone_set("Asia/Dhaka");
       $postDate = date("l, M d Y");
   		 $postTime = date("h:i:sa");
       $sqlPost="INSERT INTO newevent(text,image, date,time, type) values('$text','$unique_image','$postDate','$postTime','$type')";
       mysqli_query($con,$sqlPost);
          $_SESSION['msgEvent']="<a href='adminevent.php' style='text-decoration:unset;'><div id='msgEvent' class='w3-card w3-green w3-padding w3-center w3-margin-top' onclick=hide()>Success!<span class='w3-right w3-white w3-hover-red' style='padding:0px 5px;'>&times</span></div></a>";
       }else{
          $_SESSION['msgEvent']="<a href='adminevent.php' style='text-decoration:unset;'><div id='msgEvent' class='w3-card w3-red w3-padding w3-center w3-margin-top' onclick=hide()>Failed!<span class='w3-right w3-white w3-hover-red' style='padding:0px 5px;'>&times</span></div></a>";
       }

			 //upload note
       if(isset($_POST['uploadnote'])){
       //$permited  = array('pdf', 'txt', 'pptx', 'docx',);
       $file_name = $_FILES['uploadFile']['name'];
       $file_size = $_FILES['uploadFile']['size'];
       $file_temp = $_FILES['uploadFile']['tmp_name'];
       $div = explode('.', $file_name);
       $file_ext = strtolower(end($div));
       $unique_file = substr(md5(time()), 0, 10).'.'.$file_ext;
       $uploaded_file = "uploads/file/".$unique_file;
       move_uploaded_file($file_temp, $uploaded_file);
       //$text = mysqli_real_escape_string($_POST["text"]);
   	   $noteName = mysqli_real_escape_string($con,$_POST["noteName"]);
			 $aboutNote = mysqli_real_escape_string($con,$_POST["aboutNote"]);
			 //$aboutNote = $_POST['aboutNote'];
			 $subjectName = $_POST['subjectName'];
			 $userid = $_POST['userid'];
       date_default_timezone_set("Asia/Dhaka");
       $postDate = date("l, M d Y");
   		 $postTime = date("h:i:sa");
       $sqlPost="INSERT INTO note(notename,notedesc,subjectname,link, date,time, username) values('$noteName','$aboutNote','$subjectName','$unique_file','$postDate','$postTime','$userid')";
       mysqli_query($con,$sqlPost);
          $_SESSION['msgnote']="<a href='subjectdetails.php' style='text-decoration:unset;'><div id='msgnote' class='w3-card w3-green w3-padding w3-center w3-margin-bottom' onclick=hide()>File Upload Success!<span class='w3-right w3-white w3-hover-red' style='padding:0px 5px;'>&times</span></div></a>";
       }else{
          $_SESSION['msgnote']="<a href='subjectdetails.php' style='text-decoration:unset;'><div id='msgnote' class='w3-card w3-red w3-padding w3-center w3-margin-bottom' onclick=hide()>Failed!<span class='w3-right w3-white w3-hover-red' style='padding:0px 5px;'>&times</span></div></a>";
       }

			 //upload note
       if(isset($_POST['uploadcv'])){
       //$permited  = array('pdf', 'txt', 'pptx', 'docx',);
       $file_name = $_FILES['usercv']['name'];
       $file_size = $_FILES['usercv']['size'];
       $file_temp = $_FILES['usercv']['tmp_name'];
       $div = explode('.', $file_name);
       $file_ext = strtolower(end($div));
       $unique_file = substr(md5(time()), 0, 10).'.'.$file_ext;
       $uploaded_file = "uploads/cv/".$unique_file;
       move_uploaded_file($file_temp, $uploaded_file);
       //$text = mysqli_real_escape_string($_POST["text"]);
			 //$aboutNote = $_POST['aboutNote'];
			 $userid = $_POST['userid'];
       $sqlPost="UPDATE signin set cv='$unique_file' where userid='$userid'";
       mysqli_query($con,$sqlPost);
          $_SESSION['msgcv']="<a href='alumnaidetails.php' style='text-decoration:unset;'><div id='msgnote' class='w3-card w3-green w3-padding w3-center w3-margin-bottom' onclick=hide()>File Upload Success!<span class='w3-right w3-white w3-hover-red' style='padding:0px 5px;'>&times</span></div></a>";
       }else{
          $_SESSION['msgcv']="<a href='alumnaidetails.php' style='text-decoration:unset;'><div id='msgnote' class='w3-card w3-red w3-padding w3-center w3-margin-bottom' onclick=hide()>Failed!<span class='w3-right w3-white w3-hover-red' style='padding:0px 5px;'>&times</span></div></a>";
       }

			 //upload note
       if(isset($_POST['updatecareer'])){
			 $userid = $_POST['userid'];
			 $objective = $_POST['objective'];
       $sqlPost="UPDATE signin set about='$objective' where userid='$userid'";
       mysqli_query($con,$sqlPost);
          $_SESSION['msgobjective']="<a href='alumnaidetails.php' style='text-decoration:unset;'><div id='msgnote' class='w3-card w3-green w3-padding w3-center w3-margin-bottom' onclick=hide()>Success!<span class='w3-right w3-white w3-hover-red' style='padding:0px 5px;'>&times</span></div></a>";
       }else{
          $_SESSION['msgobjective']="<a href='alumnaidetails.php' style='text-decoration:unset;'><div id='msgnote' class='w3-card w3-red w3-padding w3-center w3-margin-bottom' onclick=hide()>Failed!<span class='w3-right w3-white w3-hover-red' style='padding:0px 5px;'>&times</span></div></a>";
       }

			 //enter a batch
       if(isset($_POST['batch'])){
       //$text = mysqli_real_escape_string($_POST["text"]);
   	   $_SESSION['batchname'] = nl2br(htmlspecialchars($_POST['batchName']));
			 header("location: batchinfo.php");
		 	 }

			 //enter academic batch
       if(isset($_POST['academicbatch'])){
       //$text = mysqli_real_escape_string($_POST["text"]);
   	   $_SESSION['academicbatch'] = nl2br(htmlspecialchars($_POST['batchName']));
			 header("location: semester.php");
		 	 }

			 //enter academic semester
       if(isset($_POST['semestersession'])){
       //$text = mysqli_real_escape_string($_POST["text"]);
   	   $_SESSION['semestersession'] = nl2br(htmlspecialchars($_POST['session']));
			 $_SESSION['sessionvalue'] = nl2br(htmlspecialchars($_POST['sessionvalue']));
			 header("location: semestersubject.php");
		 	 }

			 //enter a alumnai batch
       if(isset($_POST['albatch'])){
       //$text = mysqli_real_escape_string($_POST["text"]);
   	   $_SESSION['batchname'] = nl2br(htmlspecialchars($_POST['batchName']));
			 header("location: alumnaiinfo.php");
		 	 }

			 //enter student details
       if(isset($_POST['studentdetails'])){
       //$text = mysqli_real_escape_string($_POST["text"]);
   	   $_SESSION['studentroll'] =$_POST['studentroll'];
			 $_SESSION['userid']="";
			 $_SESSION['password']="";
			 header("location: studentdetails.php");
		 	 }

			 //enter student details
       if(isset($_POST['alumnaidetails'])){
       //$text = mysqli_real_escape_string($_POST["text"]);
   	   $_SESSION['studentroll'] =$_POST['studentroll'];
			 $_SESSION['userid']="";
			 $_SESSION['password']="";
			 header("location: alumnaidetails.php");
		 	 }

			 //sign in
       if(isset($_POST['signin'])){
       //$text = mysqli_real_escape_string($_POST["text"]);
			 $userid=$_POST['userid'];
			 $password=$_POST['password'];
			 $sqlsignin="SELECT * from signin where userid='$userid'";
			 $result=mysqli_query($con,$sqlsignin);
				 if(mysqli_num_rows($result) > 0){
					 $row = mysqli_fetch_array($result);
					 $idpass=$row['password'];
						 if($password==$idpass){
							 $_SESSION['userid'] =$_POST['userid'];
							 $_SESSION['password'] =$_POST['password'];
							 $_SESSION['msgsignin']="<a href='studentdetails.php' style='text-decoration:unset;'><div id='msgsignin' class='w3-card w3-green w3-padding w3-center w3-margin-bottom' onclick=hide()>Sign in success<span class='w3-right w3-white w3-hover-red' style='padding:0px 5px;'>&times</span></div></a>";
						 }else{
							 $_SESSION['msgsignin']="<a href='studentdetails.php' style='text-decoration:unset;'><div id='msgsignin' class='w3-card w3-red w3-padding w3-center w3-margin-bottom' onclick=hide()>Wrong Password!<span class='w3-right w3-white w3-hover-red' style='padding:0px 5px;'>&times</span></div></a>";
						 }
				 }else{
					 $_SESSION['msgsignin']="<a href='studentdetails.php' style='text-decoration:unset;'><div id='msgsignin' class='w3-card w3-orange w3-padding w3-center w3-margin-bottom' onclick=hide()>User id not found!<span class='w3-right w3-white w3-hover-red' style='padding:0px 5px;'>&times</span></div></a>";
				 }
		 	 }

			 //sign out
       if(isset($_POST['signout'])){
       //$text = mysqli_real_escape_string($_POST["text"]);
   	   unset($_SESSION['userid']);
			 unset($_SESSION['password']);
			 $_SESSION['userid']="";
			 $_SESSION['password']="";
			 header("location: studentdetails.php");
		 	 }

			 //alumnai sign in
       if(isset($_POST['alsignin'])){
       //$text = mysqli_real_escape_string($_POST["text"]);
			 $userid=$_POST['userid'];
			 $password=$_POST['password'];
			 $sqlsignin="SELECT * from signin where userid='$userid'";
			 $result=mysqli_query($con,$sqlsignin);
				 if(mysqli_num_rows($result) > 0){
					 $row = mysqli_fetch_array($result);
					 $idpass=$row['password'];
						 if($password==$idpass){
							 $_SESSION['userid'] =$_POST['userid'];
							 $_SESSION['password'] =$_POST['password'];
							 header("location: alumnaidetails.php");
						 }else{
							 $_SESSION['msgsignin']="<a href='alumnaidetails.php' style='text-decoration:unset;'><div id='msgsignin' class='w3-card w3-red w3-padding w3-center w3-margin-bottom' onclick=hide()>Wrong Password!<span class='w3-right w3-white w3-hover-red' style='padding:0px 5px;'>&times</span></div></a>";
						 }
				 }else{
					 $_SESSION['msgsignin']="<a href='alumnaidetails.php' style='text-decoration:unset;'><div id='msgsignin' class='w3-card w3-orange w3-padding w3-center w3-margin-bottom' onclick=hide()>User id not found!<span class='w3-right w3-white w3-hover-red' style='padding:0px 5px;'>&times</span></div></a>";
				 }
		 	 }

			 //alumnai sign out
       if(isset($_POST['alsignout'])){
       //$text = mysqli_real_escape_string($_POST["text"]);
   	   unset($_SESSION['userid']);
			 unset($_SESSION['password']);
			 $_SESSION['userid']="";
			 $_SESSION['password']="";
			 header("location: alumnaidetails.php");
		 	 }

			 //sign in file
			 if(isset($_POST['signinfile'])){
       //$text = mysqli_real_escape_string($_POST["text"]);
			 $userid=$_POST['userid'];
			 $password=$_POST['password'];
			 $sqlsignin="SELECT * from signin where userid='$userid'";
			 $result=mysqli_query($con,$sqlsignin);
				 if(mysqli_num_rows($result) > 0){
					 $row = mysqli_fetch_array($result);
					 $idpass=$row['password'];
						 if($password==$idpass){
							 $_SESSION['userid'] =$_POST['userid'];
							 $_SESSION['password'] =$_POST['password'];
							 $_SESSION['msgsignin']="<a href='subjectdetails.php' style='text-decoration:unset;'><div id='msgsignin' class='w3-card w3-green w3-padding w3-center w3-margin-bottom' onclick=hide()>Sign in successful<span class='w3-right w3-white w3-hover-red' style='padding:0px 5px;'>&times</span></div></a>";
						 }else{
							 $_SESSION['msgsignin']="<a href='subjectdetails.php' style='text-decoration:unset;'><div id='msgsignin' class='w3-card w3-red w3-padding w3-center w3-margin-bottom' onclick=hide()>Wrong Password!<span class='w3-right w3-white w3-hover-red' style='padding:0px 5px;'>&times</span></div></a>";
						 }
				 }else{
					 $_SESSION['msgsignin']="<a href='subjectdetails.php' style='text-decoration:unset;'><div id='msgsignin' class='w3-card w3-orange w3-padding w3-center w3-margin-bottom' onclick=hide()>User id not found!<span class='w3-right w3-white w3-hover-red' style='padding:0px 5px;'>&times</span></div></a>";
				 }
		 	 }

			 //sign in teacher
			 if(isset($_POST['signinteacher'])){
       //$text = mysqli_real_escape_string($_POST["text"]);
			 $email=$_POST['email'];
			 $password=$_POST['password'];
			 $sqlsigninteacher="SELECT * from teacher where email='$email'";
			 $result=mysqli_query($con,$sqlsigninteacher);
				 if(mysqli_num_rows($result) > 0){
					 $row = mysqli_fetch_array($result);
					 $idpass=$row['password'];
						 if($password==$idpass){
							 $_SESSION['userid'] =$_POST['email'];
							 $_SESSION['password'] =$_POST['password'];
							 header("location: teacherdetails.php");
						 }else{
							 $_SESSION['msgsigninteacher']="<a href='teacherdetails.php' style='text-decoration:unset;'><div id='msgsigninteacher' class='w3-card w3-red w3-padding w3-center w3-margin-bottom' onclick=hide()>Wrong Password!<span class='w3-right w3-white w3-hover-red' style='padding:0px 5px;'>&times</span></div></a>";
						 }
				 }else{
					 $_SESSION['msgsigninteacher']="<a href='teacherdetails.php' style='text-decoration:unset;'><div id='msgsigninteacher' class='w3-card w3-orange w3-padding w3-center w3-margin-bottom' onclick=hide()>User id not found!<span class='w3-right w3-white w3-hover-red' style='padding:0px 5px;'>&times</span></div></a>";
				 }
		 	 }

			 //sign out teacher
       if(isset($_POST['signoutteacher'])){
       //$text = mysqli_real_escape_string($_POST["text"]);
   	   unset($_SESSION['userid']);
			 unset($_SESSION['password']);
			 $_SESSION['userid']="";
			 $_SESSION['password']="";
			 header("location: teacherdetails.php");
		 	 }

			 //sign out file
       if(isset($_POST['signoutfile'])){
       //$text = mysqli_real_escape_string($_POST["text"]);
   	   unset($_SESSION['userid']);
			 unset($_SESSION['password']);
			 $_SESSION['userid']="";
			 $_SESSION['password']="";
			 header("location: subjectdetails.php");
		 	 }

			 //enter subject details
       if(isset($_POST['subjectdetails'])){
       //$text = mysqli_real_escape_string($_POST["text"]);
   	   $_SESSION['subjectname'] =$_POST['subjectname'];
			 $_SESSION['userid']="";
			 $_SESSION['password']="";
			 header("location: subjectdetails.php");
		 	 }

			 //update information
			 if(isset($_POST['updateinfo'])){
				 $userid=$_POST['userid'];
				 $working=mysqli_real_escape_string($con,$_POST["working"]);
				 $designation=mysqli_real_escape_string($con,$_POST["designation"]);
				 $expertin=mysqli_real_escape_string($con,$_POST["expertin"]);
				 $location=mysqli_real_escape_string($con,$_POST["location"]);
				 $password=mysqli_real_escape_string($con,$_POST["password"]);
				 $sqltest="SELECT * from signin where userid='$userid'";
				 $resulttest=mysqli_query($con,$sqltest);
				 $testid = $resulttest->fetch_array();
				 $realpass=$testid['password'];
				 if($realpass==$password){
					 $sqlUpdate="UPDATE signin set working='$working', designation='$designation', expert='$expertin', location='$location' where userid='$userid'";
					 mysqli_query($con,$sqlUpdate);
					 $_SESSION['msgupdate']="<a href='studentdetails.php' style='text-decoration:unset;'><div id='msgupdate' class='w3-card w3-green w3-padding w3-center w3-margin-bottom' onclick=hide()>Update Success!<span class='w3-right w3-white w3-hover-red' style='padding:0px 5px;'>&times</span></div></a>";
				 }else{
					 $_SESSION['msgupdate']="<a href='studentdetails.php' style='text-decoration:unset;'><div id='msgupdate' class='w3-card w3-red w3-padding w3-center w3-margin-bottom' onclick=hide()>Wrong Password!<span class='w3-right w3-white w3-hover-red' style='padding:0px 5px;'>&times</span></div></a>";
				 }
			 }

			 //alumnai update information
			 if(isset($_POST['updateinfo'])){
				 $userid=$_POST['userid'];
				 $working=mysqli_real_escape_string($con,$_POST["working"]);
				 $designation=mysqli_real_escape_string($con,$_POST["designation"]);
				 $expertin=mysqli_real_escape_string($con,$_POST["expertin"]);
				 $location=mysqli_real_escape_string($con,$_POST["location"]);
				 $password=mysqli_real_escape_string($con,$_POST["password"]);
				 $sqltest="SELECT * from signin where userid='$userid'";
				 $resulttest=mysqli_query($con,$sqltest);
				 $testid = $resulttest->fetch_array();
				 $realpass=$testid['password'];
				 if($realpass==$password){
					 $sqlUpdate="UPDATE signin set working='$working', designation='$designation', expert='$expertin', location='$location' where userid='$userid'";
					 mysqli_query($con,$sqlUpdate);
					 $_SESSION['msgupdate']="<a href='alumnaidetails.php' style='text-decoration:unset;'><div id='msgupdate' class='w3-card w3-green w3-padding w3-center w3-margin-bottom' onclick=hide()>Update Success!<span class='w3-right w3-white w3-hover-red' style='padding:0px 5px;'>&times</span></div></a>";
				 }else{
					 $_SESSION['msgupdate']="<a href='alumnaidetails.php' style='text-decoration:unset;'><div id='msgupdate' class='w3-card w3-red w3-padding w3-center w3-margin-bottom' onclick=hide()>Wrong Password!<span class='w3-right w3-white w3-hover-red' style='padding:0px 5px;'>&times</span></div></a>";
				 }
			 }

			 //enter subject details
       if(isset($_POST['teacherdetails'])){
       //$text = mysqli_real_escape_string($_POST["text"]);
			 $_SESSION['userid']="";
			 $_SESSION['password']="";
   	   $_SESSION['teachermail']=mysqli_real_escape_string($con,$_POST["teacheremail"]);
			 header("location: teacherdetails.php");
		 	 }

			 //add publications
       if(isset($_POST['addpublication'])){
			 $email = $_POST['email'];
			 $password=$_POST['password'];
			 $ptext = mysqli_real_escape_string($con,$_POST['ptext']);
			 $sqltest="SELECT * from teacher where email='$email'";
			 $resulttest=mysqli_query($con,$sqltest);
			 $testid = $resulttest->fetch_array();
			 $realpass=$testid['password'];
			 if($realpass==$password){
	       $sqlPost="INSERT INTO publications(text, email) values('$ptext','$email')";
	       mysqli_query($con,$sqlPost);
	          $_SESSION['msgaddpublications']="<a href='teacherdetails.php' style='text-decoration:unset;'><div id='msgaddpublications' class='w3-card w3-green w3-padding w3-center w3-margin-bottom' onclick=hide()>Success!<span class='w3-right w3-white w3-hover-red' style='padding:0px 5px;'>&times</span></div></a>";
	       }else{
	          $_SESSION['msgaddpublications']="<a href='teacherdetails.php' style='text-decoration:unset;'><div id='msgaddpublications' class='w3-card w3-red w3-padding w3-center w3-margin-bottom' onclick=hide()>Wrong Password!<span class='w3-right w3-white w3-hover-red' style='padding:0px 5px;'>&times</span></div></a>";
	       }
			 }

			 //update teacher profile information
			 if(isset($_POST['updatetprofile'])){
				 $email=mysqli_real_escape_string($con,$_POST["email"]);
				 $designation=mysqli_real_escape_string($con,$_POST["designation"]);
				 $qualification=mysqli_real_escape_string($con,$_POST["qualification"]);
				 $department=mysqli_real_escape_string($con,$_POST["department"]);
				 $contact=mysqli_real_escape_string($con,$_POST["contact"]);
				 $password=$_POST['password'];
				 $sqltest="SELECT * from teacher where email='$email'";
				 $resulttest=mysqli_query($con,$sqltest);
				 $testid = $resulttest->fetch_array();
				 $realpass=$testid['password'];
				 if($realpass==$password){
					 $sqlUpdate="UPDATE teacher set qualification='$qualification', designation='$designation', department='$department', contact='$contact' where email='$email'";
					 mysqli_query($con,$sqlUpdate);
					 $_SESSION['msgupdateprofile']="<a href='teacherdetails.php' style='text-decoration:unset;'><div id='msgupdateprofile' class='w3-card w3-green w3-padding w3-center w3-margin-bottom' onclick=hide()>Update Success!<span class='w3-right w3-white w3-hover-red' style='padding:0px 5px;'>&times</span></div></a>";
				 }else{
					 $_SESSION['msgupdateprofile']="<a href='teacherdetails.php' style='text-decoration:unset;'><div id='msgupdateprofile' class='w3-card w3-red w3-padding w3-center w3-margin-bottom' onclick=hide()>Wrong Password!<span class='w3-right w3-white w3-hover-red' style='padding:0px 5px;'>&times</span></div></a>";
				 }
			 }

			 //alumnai sign in job
       if(isset($_POST['signinjob'])){
       //$text = mysqli_real_escape_string($_POST["text"]);
			 $userid=$_POST['userid'];
			 $password=$_POST['password'];
			 $sqlsignin="SELECT * from signin where userid='$userid'";
			 $result=mysqli_query($con,$sqlsignin);
				 if(mysqli_num_rows($result) > 0){
					 $row = mysqli_fetch_array($result);
					 $idpass=$row['password'];
						 if($password==$idpass){
							 $_SESSION['userid'] =$_POST['userid'];
							 $_SESSION['password'] =$_POST['password'];
							 $_SESSION['msgsigninjob']="<a href='jobandfairs.php' style='text-decoration:unset;'><div id='msgsignin' class='w3-card w3-green w3-padding w3-center w3-margin-bottom' onclick=hide()>Login Success!<span class='w3-right w3-white w3-hover-red' style='padding:0px 5px;'>&times</span></div></a>";
						 }else{
							 $_SESSION['msgsigninjob']="<a href='jobandfairs.php' style='text-decoration:unset;'><div id='msgsignin' class='w3-card w3-red w3-padding w3-center w3-margin-bottom' onclick=hide()>Wrong Password!<span class='w3-right w3-white w3-hover-red' style='padding:0px 5px;'>&times</span></div></a>";
						 }
				 }else{
					 $_SESSION['msgsigninjob']="<a href='jobandfairs.php' style='text-decoration:unset;'><div id='msgsignin' class='w3-card w3-orange w3-padding w3-center w3-margin-bottom' onclick=hide()>User id not found!<span class='w3-right w3-white w3-hover-red' style='padding:0px 5px;'>&times</span></div></a>";
				 }
		 	 }

			 //create new job post
       if(isset($_POST['new_job_post'])){
       $permited  = array('jpg', 'jpeg', 'png', 'gif',);
       $file_name = $_FILES['image']['name'];
       $file_size = $_FILES['image']['size'];
       $file_temp = $_FILES['image']['tmp_name'];
       if($file_name==""){
         $unique_image="";
       }else{
         $div = explode('.', $file_name);
         $file_ext = strtolower(end($div));
         $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
         $uploaded_image = "uploads/job/".$unique_image;
         move_uploaded_file($file_temp, $uploaded_image);
       }
       //$text = mysqli_real_escape_string($_POST["text"]);
   	   $text = mysqli_real_escape_string($con,$_POST["text"]);
			 $userid = mysqli_real_escape_string($con,$_POST["userid"]);
       date_default_timezone_set("Asia/Dhaka");
       $postDate = date("l, M d Y");
   		 $postTime = date("h:i:sa");
       $sqlPost="INSERT INTO jobandfairs(text,image, date,time, userid) values('$text','$unique_image','$postDate','$postTime', '$userid')";
       mysqli_query($con,$sqlPost);
          $_SESSION['msgjobpost']="<a href='jobandfairs.php' style='text-decoration:unset;'><div id='msgjobpost' class='w3-card w3-green w3-padding w3-center w3-margin-top' onclick=hide()>Success!<span class='w3-right w3-white w3-hover-red' style='padding:0px 5px;'>&times</span></div></a>";
       }else{
          $_SESSION['msgjobpost']="<a href='jobandfairs.php' style='text-decoration:unset;'><div id='msgjobpost' class='w3-card w3-red w3-padding w3-center w3-margin-top' onclick=hide()>Failed!<span class='w3-right w3-white w3-hover-red' style='padding:0px 5px;'>&times</span></div></a>";
       }

			 //add new student
       if(isset($_POST['add_new_student'])){
       $permited  = array('jpg', 'jpeg', 'png', 'gif',);
       $file_name = $_FILES['image']['name'];
       $file_size = $_FILES['image']['size'];
       $file_temp = $_FILES['image']['tmp_name'];
       if($file_name==""){
         $unique_image="";
       }else{
         $div = explode('.', $file_name);
         $file_ext = strtolower(end($div));
         $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
         $uploaded_image = "uploads/image/".$unique_image;
         move_uploaded_file($file_temp, $uploaded_image);
       }
       //$text = mysqli_real_escape_string($_POST["text"]);
   	   $roll = mysqli_real_escape_string($con,$_POST["roll"]);
			 $name = mysqli_real_escape_string($con,$_POST["name"]);
			 $session = mysqli_real_escape_string($con,$_POST["session"]);
			 $present = mysqli_real_escape_string($con,$_POST["present"]);
			 $permanent = mysqli_real_escape_string($con,$_POST["permanent"]);
			 $blood = mysqli_real_escape_string($con,$_POST["blood"]);
			 $mobile = mysqli_real_escape_string($con,$_POST["mobile"]);
			 $email = mysqli_real_escape_string($con,$_POST["email"]);
			 $password = mysqli_real_escape_string($con,$_POST["password"]);
       $sqlPost="INSERT INTO signin(userid, password, session, name, image, blood, email, present, permanent, mobile) values('$roll','$password','$session','$name','$unique_image','$blood','$email','$present','$permanent','$mobile')";
       mysqli_query($con,$sqlPost);
          $_SESSION['msgaddnewstudent']="<a href='adminstudent.php' style='text-decoration:unset;'><div id='msgPost' class='w3-card w3-green w3-padding w3-center w3-margin-top' onclick=hide()>Success!<span class='w3-right w3-white w3-hover-red' style='padding:0px 5px;'>&times</span></div></a>";
       }else{
          $_SESSION['msgaddnewstudent']="<a href='adminstudent.php' style='text-decoration:unset;'><div id='msgPost' class='w3-card w3-red w3-padding w3-center w3-margin-top' onclick=hide()>Failed!<span class='w3-right w3-white w3-hover-red' style='padding:0px 5px;'>&times</span></div></a>";
       }

			 //add new teacher
       if(isset($_POST['add_new_teacher'])){
       $permited  = array('jpg', 'jpeg', 'png', 'gif',);
       $file_name = $_FILES['image']['name'];
       $file_size = $_FILES['image']['size'];
       $file_temp = $_FILES['image']['tmp_name'];
       if($file_name==""){
         $unique_image="";
       }else{
         $div = explode('.', $file_name);
         $file_ext = strtolower(end($div));
         $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
         $uploaded_image = "gallery/teacher/".$unique_image;
         move_uploaded_file($file_temp, $uploaded_image);
       }
       //$text = mysqli_real_escape_string($_POST["text"]);
			 $name = mysqli_real_escape_string($con,$_POST["name"]);
			 $qualification = mysqli_real_escape_string($con,$_POST["qualification"]);
			 $designation = mysqli_real_escape_string($con,$_POST["designation"]);
			 $department = mysqli_real_escape_string($con,$_POST["department"]);
			 $contact = mysqli_real_escape_string($con,$_POST["contact"]);
			 $email = mysqli_real_escape_string($con,$_POST["email"]);
			 $password = mysqli_real_escape_string($con,$_POST["password"]);
       $sqlPost="INSERT INTO teacher(name, qualification, designation, department, contact, email, image, password) values('$name','$qualification','$designation','$department','$contact','$email','$unique_image','$password')";
       mysqli_query($con,$sqlPost);
          $_SESSION['msgaddnewteacher']="<a href='adminteacher.php' style='text-decoration:unset;'><div id='msgPost' class='w3-card w3-green w3-padding w3-center w3-margin-top' onclick=hide()>Success!<span class='w3-right w3-white w3-hover-red' style='padding:0px 5px;'>&times</span></div></a>";
       }else{
          $_SESSION['msgaddnewteacher']="<a href='adminteacher.php' style='text-decoration:unset;'><div id='msgPost' class='w3-card w3-red w3-padding w3-center w3-margin-top' onclick=hide()>Failed!<span class='w3-right w3-white w3-hover-red' style='padding:0px 5px;'>&times</span></div></a>";
       }
      //end code
   }
?>
