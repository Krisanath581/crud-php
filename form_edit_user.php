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
<h1>แก้ไขผู้ใช้งาน</h1>
    <a href="index.php"><button type="button" class="btn btn-success mx-3">กลับ</button>
</a>

</div>
<form action="services/edit_user.php?iduser=<?=$result['id'];?>" method="post">
  <div class="mb-3">
    <label for="email" class="form-label">อีเมล</label>
    <input type="email" class="form-control" name="email" id="email"  placeholder="name@example.com" value="<?=$result['email'];?>"disabled>
  </div>

  <!-- <div class="mb-3">
    <label for="password" class="form-label">รหัสผ่าน</label>
    <input type="password" class="form-control" name="password" id="password" placeholder="">
  </div> -->

  <div class="mb-3">
    <label for="fname" class="form-label">ชื่อจริง</label>
    <input type="text" class="form-control" name="fname" id="fname" placeholder="" value="<?=$result['fname'];?>" >
  </div>

  <div class="mb-3">
    <label for="lname" class="form-label">นามสกุล</label>
    <input type="text" class="form-control" name="lname" id="lname" placeholder="" value="<?=$result['lname'];?>" >
  </div>


  <input type="hidden" class="form-control" name="email" placeholder="" value="<?=$result['email'];?>">
  
  <div class="mb-3">
    <!-- <label for="role" class="form-label">สถานะ</label> -->
    <input type="hidden" class="form-control" name="role" placeholder="" value="member">
  </div>

  <button type="submit" class="btn btn-primary form-control">ยืนยัน</button>
</form>
</div>