<?php include_once './header.php'; ?>
<?php




/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if(isset($confirm)){
    $user = new User();
    //var_dump($confirm);
    ?>

<table>
    <tr><td>Username :</td><td><?php echo $user->getUserName($confirm['id_user']); ?></td></tr>
    <tr><td>First name :</td><td><?php echo $confirm['firstname'];?></td></tr>
    <tr><td>Last name :</td><td><?php echo $confirm['lastname'];?></td></tr>
    <tr><td>Email :</td><td><?php echo $confirm['email'];?></td></tr>
    <tr><td>Education :</td><td><?php echo $confirm['education'];?></td></tr>
    <tr><td>Experience :</td><td><?php echo $confirm['experience'];?></td></tr>
    <tr><td>GPA :</td><td><?php echo $confirm['gpa'];?></td></tr>
    <tr><td>Skills :</td><td><?php echo $confirm['skills'];?></td></tr>
    <?php if($_SESSION['role']==2){ ?>
    <tr><td><a href="further.php" >Edit Profile</a></td><td></td></tr>
    <?php } ?>
</table>
    
    
   




<?php 
}
include_once './footer.php'; ?>