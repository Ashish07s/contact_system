<?php
require_once("connection.php");
$query = mysqli_query($conn , "SELECT * FROM contacts ORDER BY id DESC");
$total_records = mysqli_num_rows($query);
?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="src/css/bootstrap.min.css">
  <script src="src/js/jquery.js"></script>
  <script src="src/js/bootstrap.min.js"></script>
<style>
body{
	font-family: trebuchet ms;
}
.error{
	margin: 4px 0 8px 0;
	font-size: 10px;
	color: #f71111;
}
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}


</style>
</head>
<body style="padding: 14px">

<center>
<div class="panel panel-primary">
	<div class="panel-heading" style="font-size: 16px">DBMS Project (Group ID 13) Contact Management System</div>
</div>
<center/>

<div class="btn btn-success btn-md" data-toggle="modal" data-target="#addcontact">+ Add Contact</div>

<br>
<br>

<div id="search_area">
    <input type="text" name="contactsearch" id="contactsearch" class="form-control input-md" autocomplete="off" placeholder="Search through your contacts." />
</div>
<br>

<div id="recievedoutput"></div>

<table class="table table-striped" id="mainoutput">
  <tr>
    <td>First Name</td>
    <td>Middle Name</td>
    <td>Last Name</td>
    <td>Email Address</td>
    <td>Phone Number(s)</td>
    <td>Address</td>
    <td>Tasks</td>


  </tr>

  <?php 
	  while ($i = mysqli_fetch_array($query)) {
		$id = $i['id'];
		$fname = $i['firstname'];
		$mname = $i['middlename'];
		$lname = $i['lastname'];
		$email = $i['email'];
		$phone = $i['contacts'];
		$cname = $i['companyname'];
   ?>
  
  <tr>
    <td><?php echo $fname; ?></td>
    <td><?php echo $mname; ?></td>
    <td><?php echo $lname; ?></td>
    <td><?php echo $email; ?></td>
    <td><?php echo $phone; ?></td>
    <td><?php echo $cname; ?></td>
    <td style="font-size: 10px">
    	<span class="btn btn-primary btn-xs" data-toggle="modal" data-target="#edit<?php echo $id; ?>">EDIT</span>
    	<span class="btn btn-danger btn-xs delete" name="<?php echo $id; ?>">DELETE</span>
    </td>
  </tr>


  <div class="modal fade" id="edit<?php echo $id; ?>" role="dialog">
    <div class="modal-dialog">
    
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit: <?php echo "$fname $lname"; ?></h4>
        </div>
        <div class="modal-body">
			<div class="form-group">
				<label class="control-label col-sm-4" for="firstname">First Name:</label>
				<div class="col-sm-8">
					<input type="text" value="<?php echo $fname; ?>" class="form-control" id="e-firstname<?php echo $id; ?>" placeholder="Enter First Name" >
					<div class="error" id="e_errfirstname<?php echo $id; ?>"></div>
				</div>
			</div>
			<br><br>
			<div class="form-group">
				<label class="control-label col-sm-4" for="middlename">Middle Name:</label>
				<div class="col-sm-8">
					<input type="text" value="<?php echo $mname; ?>" class="form-control" id="e-middlename<?php echo $id; ?>" placeholder="Enter Middle Name">
					<div class="error" id="e_errmiddlename<?php echo $id; ?>"></div>
				</div>
			</div>
			<br><br>
			<div class="form-group">
				<label class="control-label col-sm-4" for="lastname">Last Name:</label>
				<div class="col-sm-8">
					<input type="text" value="<?php echo $lname; ?>" class="form-control" id="e-lastname<?php echo $id; ?>" placeholder="Enter Last Name" >
					<div class="error" id="e_errlastname<?php echo $id; ?>"></div>
				</div>
			</div>
			<br><br>
			<div class="form-group">
				<label class="control-label col-sm-4" for="email">Email Address:</label>
				<div class="col-sm-8">
					<input type="email" value="<?php echo $email; ?>" class="form-control" id="e-email<?php echo $id; ?>" placeholder="Enter Email Address" max="5">
					<div class="error" id="e_erremail<?php echo $id; ?>"></div>
				</div>
			</div>
			<br><br>
			<div class="form-group">
				<label class="control-label col-sm-4" for="phonenumber">Phone Number:</label>
				<div class="col-sm-8">
					<input type="text" value="<?php echo $phone; ?>" class="form-control" id="e-phonenumber<?php echo $id; ?>" placeholder="Enter Phone Number">
					<div class="error" id="e_errphonenumber<?php echo $id; ?>"></div>
				</div>
			</div>
			<br><br>
			<div class="form-group">
				<label class="control-label col-sm-4" for="companyname">Address:</label>
				<div class="col-sm-8">
					<input type="text" value="<?php echo $cname; ?>" class="form-control" id="e-companyname<?php echo $id; ?>" placeholder="Enter Address">
					<div class="error" id="e_errcompanyname<?php echo $id; ?>"></div>
				</div>
			</div>
			<br><br>
			<div class="form-group">        
	      		<div class="col-sm-offset-4 col-sm-10">
	        		<button type="submit" data-id="<?php echo $id; ?>" id="edit" class="btn btn-default">Edit</button>
	      		</div>
    		</div>
			</form>
			<br><br>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>


  
  <?php } ?>
  

  <div class="modal fade" id="addcontact" role="dialog">
    <div class="modal-dialog">
    
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add New Contact</h4>
        </div>
        <div class="modal-body">
        	<form id="addnew" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label class="control-label col-sm-4" for="firstname">First Name:</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" id="firstname" placeholder="Enter First Name" >
					<div class="error" id="errfirstname"></div>
				</div>
			</div>
			<br><br>
			<div class="form-group">
				<label class="control-label col-sm-4" for="middlename">Middle Name:</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" id="middlename" placeholder="Enter Middle Name">
					<div class="error" id="errmiddlename"></div>					
				</div>
			</div>
			<br><br>
			<div class="form-group">
				<label class="control-label col-sm-4" for="lastname">Last Name:</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" id="lastname" placeholder="Enter Last Name" >
					<div class="error" id="errlastname"></div>
				</div>
			</div>
			<br><br>
			<div class="form-group">
				<label class="control-label col-sm-4" for="email">Email Address:</label>
				<div class="col-sm-8">
					<input type="email" class="form-control" id="email" placeholder="Enter Email Address" max="5">
					<div class="error" id="erremail"></div>
				</div>
			</div>
			<br><br>
			<div class="form-group">
				<label class="control-label col-sm-4" for="phonenumber">Phone Number:</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" id="phonenumber" placeholder="Enter Phone Number">
					<div class="error" id="errphonenumber"></div>
				</div>
			</div>
			<br><br>
			<div class="form-group">
				<label class="control-label col-sm-4" for="companyname">Address:</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" id="companyname" placeholder="Enter Address">
					<div class="error" id="errcompanyname"></div>
				</div>
			</div>
			<br><br>
			<div class="form-group">        
	      		<div class="col-sm-offset-4 col-sm-10">
	        		<button type="submit" id="add" class="btn btn-default">Submit</button>
	      		</div>
    		</div>
			</form>
			<br><br>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>


</table>

<script type="text/javascript">

$(document).ready(function(){

	$("#contactsearch").bind('keyup', function(){
	    var val = $("#contactsearch").val();

	    if (val == "" || val == null) {
	    	$("#mainoutput").show();
	    	$("#recievedoutput").hide();
	    }
	    else{
	    	$("#recievedoutput").show();
	    	$.ajax({
		      type: "POST",
		      data: 'query='+ val,
		      url: "search.php",
		      cache: false,
		      success: function(able){
			      var out = JSON.parse(able);
			      $("#mainoutput").hide();
				  $("#recievedoutput").html(out.message);
			  }
		    });
		    return false;
	    }
	});

	$("#contactsearch").focusout(function(){
		var val = $("#contactsearch").val();

		if(val != ""){
	    	$("#mainoutput").hide();
	    	$("#recievedoutput").show();
	    }else{
	    	$("#recievedoutput").hide();
			$("#mainoutput").show();
	    }

	});

	function isEmptyOrSpaces(str){
	    return str === null || str.match(/^ *$/) !== null;
	}

	function isEmail(emem) {
		var aa = $(emem).val();
	    var atpos = aa.indexOf("@");
	    var dotpos = aa.lastIndexOf(".");
	    if (atpos<1 || dotpos<atpos+2 || dotpos+2>=aa.length) {
	        return false;
	    }else{
	    	return true;
	    }
	}



	$('#add').click(function(e){
  		e.preventDefault();

		var firstname = $("#firstname").val();
		var middlename = $("#middlename").val();
		var lastname = $("#lastname").val();
		var email = $("#email").val();
		var phonenumber = $("#phonenumber").val();
		var companyname = $("#companyname").val();

		var errfirstname = "";
		var errmiddlename = "";
		var errlastname = "";
		var erremail = "";
		var errphonenumber = "";
		var errcompanyname = "";

		if (firstname == "") {
			$("#errfirstname").html("This field is required.");
			errfirstname = 1;
		}else{
			$("#errfirstname").html("");
		}


		if (lastname == "") {
			$("#errlastname").html("This field is required.");
			errlastname = 1;
		}else{
			$("#errlastname").html("");
		}


		if (phonenumber.length < 1) {
			$("#errphonenumber").html("");
		}
		else if(phonenumber.length != 10){
			$("#errphonenumber").html("Invalid Phone number.");
			errphonenumber = 1;
		}
		else if(isNaN(phonenumber)){
			$("#errphonenumber").html("Only numbers are allowed.");
			errphonenumber = 1;
		}
		else{
			$("#errphonenumber").html("");
		}

		if (email.length < 1) {
			$("#erremail").html("");
		}else if(email.length > 100){
			$("#erremail").html("Your email should not be more than 100 characters.");
			erremail = 1;
		}else if(!isEmail("#email")){
			$("#erremail").html("Not a valid e-mail address.");
			erremail = 1;
		}else{
			$("#erremail").html("");
		}

		if ((errfirstname!=1) && (errmiddlename!=1) && (errlastname!=1) && (erremail!=1) && (errphonenumber!=1) && (errcompanyname!=1)) {
			$.ajax({
		      type: "POST",
		      data: 'firstname='+ firstname + '&middlename='+ middlename + '&lastname='+ lastname + '&email='+ email + '&phonenumber='+ phonenumber + '&companyname='+ companyname,
		      url: "search.php",
		      cache: false,
		      success: function(able){
			      var out = JSON.parse(able);
				  if (out.success == 1) {
				  	window.top.location = window.top.location;
				  }
			  }
		    });
		    return false;
		}
  	});
});

$('.delete').click(function(){
	var time_id = $(this).attr('name');
	window.location = 'delete.php?time_id=' + time_id;
});
</script>

<script type="text/javascript">

	$('button#edit').click(function(e){
  		e.preventDefault();

		var cid = $(this).attr("data-id");

		var e_firstname = $("#"+"e-firstname"+cid).val();
		var e_middlename = $("#e-middlename"+cid).val();
		var e_lastname = $("#e-lastname"+cid).val();
		var e_email = $("#e-email"+cid).val();
		var e_phonenumber = $("#e-phonenumber"+cid).val();
		var e_companyname = $("#e-companyname"+cid).val();

		var err_e_firstname = "";
		var err_e_middlename = "";
		var err_e_lastname = "";
		var err_e_email = "";
		var err_e_phonenumber = "";
		var err_e_companyname = "";

		function isEmail2() {
			var aa = $("#e-email"+cid).val();
		    var atpos = aa.indexOf("@");
		    var dotpos = aa.lastIndexOf(".");
		    if (atpos<1 || dotpos<atpos+2 || dotpos+2>=aa.length) {
		        return false;
		    }else{
		    	return true;
		    }
		}

		if (e_firstname == "") {
			$("#e_errfirstname"+cid).html("This field is required.");
			err_e_firstname = 1;
		}else{
			$("#e_errfirstname"+cid).html("");
		}


		if (e_lastname == "") {
			$("#e_errlastname"+cid).html("This field is required.");
			err_e_lastname = 1;
		}else{
			$("#e_errlastname"+cid).html("");
		}


		if (e_phonenumber.length < 1) {
			$("#e_errphonenumber"+cid).html("");
		}
		else if(e_phonenumber.length != 10){
			$("#e_errphonenumber"+cid).html("Invalid Phone number.");
			err_e_phonenumber = 1;
		}
		else if(isNaN(e_phonenumber)){
			$("#e_errphonenumber"+cid).html("Only numbers are allowed.");
			err_e_phonenumber = 1;
		}
		else{
			$("#e_errphonenumber"+cid).html("");
		}

		if (e_email.length < 1) {
			$("#e_erremail"+cid).html("");
		}else if(e_email.length > 100){
			$("#e_erremail"+cid).html("Your email should not be more than 100 characters.");
			err_e_email = 1;
		}else if(!isEmail2()){
			$("#e_erremail"+cid).html("Not a valid e-mail address.");
			err_e_email = 1;
		}else{
			$("#e_erremail"+cid).html("");
		}

		if ((err_e_firstname!=1) && (err_e_middlename!=1) && (err_e_lastname!=1) && (err_e_email!=1) && (err_e_phonenumber!=1) && (err_e_companyname!=1)) {
			$.ajax({
		      type: "POST",
		      data: 'e_firstname='+ e_firstname + '&middlename='+ e_middlename + '&e_lastname='+ e_lastname + '&email='+ e_email + '&phonenumber='+ e_phonenumber + '&companyname='+ e_companyname + '&id='+ cid,
		      url: "search.php",
		      cache: false,
		      success: function(able){
			      var out = JSON.parse(able);
				  if (out.success == 1) {
				  	window.top.location = window.top.location;
				  }
			  }
		    });
		    return false;
		}


	});
</script>

</body>
</html>


<center>
© <?php
    $copyYear = 2020;
    $curYear = date('Y'); 
      echo $copyYear . (($copyYear != $curYear) ? '-' . $curYear : '');
  ?> Copyright <br>
  PES Modern College Of Engineering Pune 05
  <center/>