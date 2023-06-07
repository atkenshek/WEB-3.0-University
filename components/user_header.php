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

      <a href="home.php" class="logo">WEB 3.0</a>

      <form action="search_course.php" method="post" class="search-form">
         <input type="text" name="search_course" placeholder="search courses..." required maxlength="100">
         <button type="submit" class="fas fa-search" name="search_course_btn"></button>
      </form>

      <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>
         <div id="search-btn" class="fas fa-search"></div>
         <div id="user-btn" class="fas fa-user"></div>
         <div id="dropdown-btn" class="fa fa-language" aria-hidden="true">
            <div class="dropdown-content hide">
            <div><a href="home.php?lang=ru">Русский</a></div>
				<div><a href="home.php?lang=kz">Қазақша</a></div>
            </div>
         </div>
         <div id="toggle-btn" class="fas fa-sun"></div>
                  
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

      <!-- <div class="dropdown">
         <a href="#"> Languages</a>
         <div class="dropdown-content">
            <div><a href="#">English</a></div>
            <div><a href="#">Russian</a></div>
            <div><a href="#">Kazakh</a></div>
         </div>
      </div> -->


      <div class="profile">
         <?php
            $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
            $select_profile->execute([$user_id]);
            if($select_profile->rowCount() > 0){
            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
         ?>
         <img src="uploaded_files/<?= $fetch_profile['image']; ?>" alt="">
         <h3><?= $fetch_profile['name']; ?></h3>
         <span><?= __('student')?></span>
         <a href="profile.php" class="btn"><?= __('view profile')?></a>
         <div class="flex-btn">
            <a href="login.php" class="option-btn"><?= __('login')?></a>
            <a href="register.php" class="option-btn"><?= __('register')?></a>
         </div>
         <a href="components/user_logout.php" onclick="return confirm('logout from this website?');" class="delete-btn"><?= __('logout')?></a>
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

   </section>

</header>

<div class="side-bar">

   <div class="close-side-bar">
      <i class="fas fa-times"></i>
   </div>

   <div class="profile">
         <?php
            $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
            $select_profile->execute([$user_id]);
            if($select_profile->rowCount() > 0){
            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
         ?>
         <img src="uploaded_files/<?= $fetch_profile['image']; ?>" alt="">
         <h3><?= $fetch_profile['name']; ?></h3>
         <span><?= __('student')?></span>
         <a href="profile.php" class="btn"><?= __('view profile')?></a>
         <?php
            }else{
         ?>
         <h3><?= __('please login or register')?></h3>
          <div class="flex-btn" style="padding-top: .5rem;">
            <a href="login.php" class="option-btn"><?= __('login')?></a>
            <a href="register.php" class="option-btn"><?= __('register')?></a>
         </div>
         <?php
            }
         ?>
      </div>

   <nav class="navbar">
      <a href="home.php"><i class="fas fa-home"></i><span><?= __('home')?></span></a>
      <a href="about.php"><i class="fas fa-question"></i><span><?= __('about us')?></span></a>
      <a href="courses.php"><i class="fas fa-graduation-cap"></i><span><?= __('courses')?></span></a>
      <a href="teachers.php"><i class="fas fa-chalkboard-user"></i><span><?= __('teachers')?></span></a>
      <a href="contact.php"><i class="fas fa-headset"></i><span><?= __('contact us')?></span></a>
   </nav>

</div>
