<div class="box user-info m-bottom15">
    <div class="box-content">
        <a href="#">
            <?php
            $imgPathBig = $this->webroot . "img/no_user.jpg";
            if (isset($LoggedinUser["image"]) && !empty($LoggedinUser["image"])) {
                $imgPathBig = $this->webroot . "files/profile/" . $LoggedinUser["image"] . "?t=" . time();
            }
            ?>

            <img src="<?php echo $imgPathBig; ?>" alt="Responsive image" class="img-thumbnail profile" >
            <div class="profile-name"><?php echo $LoggedinUser['name']; ?> </div>
            <div class="profile-role">( <?php 
            if($LoggedinUser['role'] == 2){
                echo "Student";
            }elseif($LoggedinUser['role'] == 3){
                echo "Instructor";
            }elseif($LoggedinUser['role'] == 4){
                echo "Admin User";
            }
             ?> )</div>
        </a>

    </div>
</div>