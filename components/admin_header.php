<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>
<style>
.dropdown{
   position: relative;
}

.dropdown-content{
   position: absolute;
   margin-top:10px;
   background-color: white;
   border: solid thin #aaa;
   padding: 10px;
}

.hide{
   display: none;
}


</style>
<header class="header">

   <section class="flex">

      <a href="dashboard.php" class="logo">Admin.</a>

      <form action="search_page.php" method="post" class="search-form">
         <input type="text" name="search" placeholder="search here..." required maxlength="100">
         <button type="submit" class="fas fa-search" name="search_btn"></button>
      </form>

      <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>
         <div id="search-btn" class="fas fa-search"></div>
         <div id="user-btn" class="fas fa-user"></div>
         <div id="dropdown-btn" class="fa fa-language" aria-hidden="true">
            <div class="dropdown-content hide">
            <div><a href="dashboard.php?lang=ru">Русский</a></div>
				<div><a href="dashboard.php?lang=kz">Қазақша</a></div>
            </div>
         </div>
         <div id="toggle-btn" class="fas fa-sun"></div>
                  
      </div>

      <div class="profile">
         <?php
            $select_profile = $conn->prepare("SELECT * FROM `tutors` WHERE id = ?");
            $select_profile->execute([$tutor_id]);
            if($select_profile->rowCount() > 0){
            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
         ?>
         <img src="../uploaded_files/<?= $fetch_profile['image']; ?>" alt="">
         <h3><?= $fetch_profile['name']; ?></h3>
         <span><?= $fetch_profile['profession']; ?></span>
         <a href="profile.php" class="btn"><?= __('view profile')?></a>
         <div class="flex-btn">
            <a href="login.php" class="option-btn"><?= __('login')?></a>
            <a href="register.php" class="option-btn"><?= __('register')?></a>
         </div>
         <a href="../components/admin_logout.php" onclick="return confirm('logout from this website?');" class="delete-btn"><?= __('logout')?></a>
         <?php
            }else{
         ?>
         <h3><?= __('please login or register')?></h3>
          <div class="flex-btn">
            <a href="login.php" class="option-btn"><?= __('login')?></a>
            <a href="register.php" class="option-btn"><?= __('register')?></a>
         </div>
         <?php
            }
         ?>
      </div>

      <script>
	
         var dropdowns = document.querySelectorAll("#dropdown-btn");

         for (var i = 0; i < dropdowns.length; i++) {
            
            dropdowns[i].addEventListener('click',function(e){

               for (var x = 0; x < dropdowns.length; x++) {
                  dropdowns[x].querySelector(".dropdown-content").classList.add("hide");
               }

               e.currentTarget.querySelector(".dropdown-content").classList.toggle("hide");
            });
         }

      </script>

   </section>

</header>
<div class="side-bar">

   <div class="close-side-bar">
      <i class="fas fa-times"></i>
   </div>

   <div class="profile">
         <?php
            $select_profile = $conn->prepare("SELECT * FROM `tutors` WHERE id = ?");
            $select_profile->execute([$tutor_id]);
            if($select_profile->rowCount() > 0){
            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
         ?>
         <img src="../uploaded_files/<?= $fetch_profile['image']; ?>" alt="">
         <h3><?= $fetch_profile['name']; ?></h3>
         <span><?= $fetch_profile['profession']; ?></span>
         <a href="profile.php" class="btn"><?= __('view profile')?></a>
         <?php
            }else{
         ?>
         <h3><?= __('please login or register')?></h3>
          <div class="flex-btn">
            <a href="login.php" class="option-btn"><?= __('login')?></a>
            <a href="register.php" class="option-btn"><?= __('register')?></a>
         </div>
         <?php
            }
         ?>
      </div>

   <nav class="navbar">
      <a href="dashboard.php"><i class="fas fa-home"></i><span><?= __('home')?></span></a>
      <a href="playlists.php"><i class="fa-solid fa-bars-staggered"></i><span><?= __('playlists')?></span></a>
      <a href="contents.php"><i class="fas fa-graduation-cap"></i><span><?= __('contents')?></span></a>
      <a href="comments.php"><i class="fas fa-comment"></i><span><?= __('comments')?></span></a>
      <a href="../components/admin_logout.php" onclick="return confirm('logout from this website?');"><i class="fas fa-right-from-bracket"></i><span><?= __('logout')?></span></a>
   </nav>

</div>
