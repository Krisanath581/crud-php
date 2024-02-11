<?php 
include("layout.php"); 
include("connection/connect.php"); 



$sql = "SELECT * FROM users";
$stmt = $conn->prepare($sql); //เรียกข้อมูลทั้งหมด
$stmt->execute();

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>

<div class="container mt-3">
<div class="d-flex align-items-center">
<h1>แสดงข้อมูลผู้ใช้งาน</h1>
    <a href="form_add_user.php"><button type="button" class="btn btn-success mx-3">เพิ่ม</button>
</a>

</div>
   
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">อีเมล</th>
      <th scope="col">ชื่อจริง</th>
      <th scope="col">นามสกุล</th>
      <th scope="col">สถานะ</th>
      <th scope="col">เครื่องมือ</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($result as $user) { ?>
    <tr>
      <th scope="row"><?=$user['id'];?></th>
      <td><?=$user['email'];?></td>
      <td><?=$user['fname'];?></td>
      <td><?=$user['lname'];?></td>
      <td><?=$user['role'];?></td>
      <td>
      <a href="form_edit_user.php?iduser=<?=$user['id'];?>"><button type="button" class="btn btn-primary">แก้ไข</button></a>
      <a href="form_change_password.php?iduser=<?=$user['id'];?>"><button type="button" class="btn btn-secondary">เปลี่ยนรหัสผ่าน</button></a>
      <button type="button" class="btn btn-danger">ลบ</button>
      </td>
    </tr>
    <?php } ?>
  </tbody>
</table>
</div>