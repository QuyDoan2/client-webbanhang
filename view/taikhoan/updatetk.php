<?php
     if (isset($_SESSION['user'])) {
         extract($_SESSION['user']);
     }
 ?>
<div class="edit-profile-container">
    <div class="left-box">
        <div class="avatar-box">
            <img src="avatar.png" alt="Avatar">
            <input type="file" id="avatar-upload" name="avatar-upload" accept="image/*">
        </div>
        <div class="username-box">
            <h2><?=$name?></h2>
        </div>
        <div class="underline"></div>
        <div class="navigation-box">
            <ul>
                <li><a href="#"class="active"><i class="fas fa-user-circle"></i>Profile</a></li>
                <li><a href="#"><i class="fas fa-cog"></i>Setting</a></li>
                <li><a href="index.php?act=mybill"><i class="fas fa-shopping-cart"></i>Giỏ hàng</a></li>
                <?php if ($role == 1) {  ?>
                <li><a href="admin/index.php"><i class="fas fa-user-cog"></i>Đăng nhập Amin</a></li>
                <?php } ?>
                <li><a href="index.php?act=thoat"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
            </ul>
        </div>
    </div>
    <div class="right-box">
        <h2>Edit Profile</h2>
        <form action="index.php?act=updatetk" method="post">
            <div class="form-edit-profile">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" value="<?=$name?>">
            </div>
            <div class="form-edit-profile">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" value="<?=$password?>">
            </div>
            <div class="form-edit-profile">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="<?=$email?>">
            </div>
            <div class="form-edit-profile">
                <label for="address">Address</label>
                <input type="text" id="address" name="address" value="<?=$address?>">
            </div>
            <div class="form-edit-profile">
                <label for="phone">Phone</label>
                <input type="text" id="phone" name="telephone" value="<?=$telephone?>">
            </div>
            <div class="form-edit-profile">
                <input type="hidden" name="id" value="<?=$id?>">
                <button name="capnhat" type="submit">Save Changes</button>
            </div>
        </form>
    </div>
</div>