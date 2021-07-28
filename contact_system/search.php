<?php

require_once("connection.php");

if(isset($_POST["query"])){

    $request = mysqli_real_escape_string($conn, $_POST["query"]);
    $query = "
              SELECT * FROM contacts 
              WHERE firstname LIKE '%".$request."%' 
              OR lastname LIKE '%".$request."%' 
              OR email LIKE '%".$request."%' 
              OR companyname LIKE '%".$request."%' 
              ORDER BY id DESC;
    ";
    $result = mysqli_query($conn, $query);
    $data =array();
    $html = '';
    $html .= '
    <table class="table table-bordered table-striped">
     <tr>

      <td>First Name</td>
      <td>Middle Name</td>
      <td>Last Name</td>
      <td>Email Address</td>
      <td>Phone Number(s)</td>
      <td>Address</td>
      <td>Tasks</td>

     </tr>
    ';

    if(mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_array($result))
        {
         $data[] = $row["id"];
         $data[] = $row["firstname"];
         $data[] = $row["middlename"];
         $data[] = $row["lastname"];
         $data[] = $row["email"];
         $data[] = $row["contacts"];
         $data[] = $row["companyname"];
         $html .= '
         <tr>
          <td>'.$row["firstname"].'</td>
          <td>'.$row["middlename"].'</td>
          <td>'.$row["lastname"].'</td>
          <td>'.$row["email"].'</td>
          <td>'.$row["contacts"].'</td>
          <td>'.$row["companyname"].'</td>
          <td style="font-size: 10px">
            <span class="btn btn-primary btn-xs" data-toggle="modal" data-target="#edit'.$row["id"].'">EDIT</span>
            <span class="btn btn-danger btn-xs delete" name="'.$row["id"].'">DELETE</span>

          </td>
         </tr>
         ';
        }
      }
    else
    {
    $data = 'No Data Found';
    $html .= '
     <tr>
      <td colspan="7">No Data Found</td>
     </tr>
     ';
    }

    $html .= '</table>';


    $data = array('message' => $html);
    echo json_encode($data);

  }


  if (isset($_POST['firstname']) AND isset($_POST['lastname'])) {
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phonenumber = $_POST['phonenumber'];
    $companyname = $_POST['companyname'];

    $sql = "INSERT INTO contacts (firstname, middlename, lastname, email, contacts, companyname)
            VALUES ('$firstname',' $middlename', '$lastname', '$email', '$phonenumber', '$companyname') ";

    $result = mysqli_query($conn,$sql);
    $success = 1;

    $data = array('success' => $success);
    echo json_encode($data);

  }


  if (isset($_POST['e_firstname']) AND isset($_POST['e_lastname'])) {
    $firstname = $_POST['e_firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['e_lastname'];
    $email = $_POST['email'];
    $phonenumber = $_POST['phonenumber'];
    $companyname = $_POST['companyname'];
    $id = $_POST['id'];

    $sql = "UPDATE contacts SET firstname='$firstname', middlename='$middlename', lastname='$lastname', email='$email', contacts='$phonenumber', companyname='$companyname' WHERE id='$id' ";

    $result = mysqli_query($conn,$sql);
    $success = 1;

    $data = array('success' => $success);
    echo json_encode($data);

  }

?>