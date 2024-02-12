<?php
include("layout.php");
include("connection/connect.php"); 
$iduser = $_GET['iduser'];

$sql = "SELECT * FROM users WHERE id = '$iduser'";

$stmt = $conn->prepare($sql);

$stmt->execute();

$result = $stmt->fetch(PDO::FETCH_ASSOC);

// print_r($result['id']);
// return;


?>

<div class="container mt-5">
<div class="d-flex align-items-center">
<h1>เปลี่ยนรหัสผ่านผู้ใช้งาน <?=$result['fname'];?>  <?=$result['lname'];?></h1>
    <a href="index.php"><button type="button" class="btn btn-success mx-3">กลับ</button>
</a>

</div>
<form action="services/change_password.php?iduser=<?=$result['id'];?>" method="post">


  <div class="mb-3">
    <label for="password" class="form-label">รหัสผ่านเก่า</label>
    <input type="password" class="form-control" name="password" id="password">
  </div>

  <div class="mb-3">
    <label for="Newpassword1" class="form-label">รหัสผ่านใหม่</label>
    <input type="password" class="form-control" name="Newpassword1" id="Newpassword1" placeholder="">
  </div>

  <div class="mb-3">
    <label for="Newpassword2" class="form-label">ยืนยันรหัสผ่านใหม่</label>
    <input type="password" class="form-control" name="Newpassword2" id="Newpassword2" placeholder="">
  </div>


  <button type="submit" class="btn btn-primary form-control">ยืนยัน</button>
</form>
</div>