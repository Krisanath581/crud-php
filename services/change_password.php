<?php 

include("../connection/connect.php");

$iduser = $_GET['iduser'];

$password = $_POST['password'];

$NewPassword = $_POST['Newpassword1'];

$Confirm_Password = $_POST['Newpassword2'];


$sql = "SELECT * FROM users WHERE id = '$iduser'";

$stmt = $conn->prepare($sql);

$stmt->execute();

$result = $stmt->fetch(PDO::FETCH_ASSOC);

$checkPassword = $result['password'];



if(password_verify($password, $checkPassword)) {
    if($NewPassword == $Confirm_Password){
        $hash_newPassword = password_hash($NewPassword, PASSWORD_DEFAULT); //เข้ารหัสผ่านใหม่
        $update_password = "UPDATE `users` SET `password`=:password WHERE id = :id";

        $stmt1 = $conn->prepare($update_password);

        $stmt1->bindParam(':password', $hash_newPassword, PDO::PARAM_STR);
        $stmt1->bindParam(':id', $iduser, PDO::PARAM_STR);

        if($stmt1->execute()){
            echo "เปลี่ยนรหัสผ่านเรียบร้อยแล้ว";
            header("refresh: 2; url = http://localhost/CRI-Download/");
        }else{
            echo "เปลี่ยนรหัสผ่านไม่สำเร็จห";
            header("refresh: 2; url = http://localhost/CRI-Download/");
        }

    }else{
        echo "รหัสผ่านใหม่ไม่ตรงกัน";
        header("refresh: 2; url = http://localhost/CRI-Download/");
    }
}else{
    echo "รหัสผ่านไม่ถูกต้อง";
    header("refresh: 2; url = http://localhost/CRI-Download/");
}

        






?>
