<div id="global-loader">
   <img src="../img/tss-logo.png" class="loader-img" alt="Loader" style="width: 210px;">
</div>

<!-- main-sidebar -->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar sidebar-scroll">
   <div class="main-sidebar-header active">
      <a class="desktop-logo logo-light active" href="dashboard.php">
      <img src="../img/tss-logo-white.png" class="main-logo" alt="logo">
      </a>
      <a class="desktop-logo logo-dark active" href="dashboard.php">
      <img src="../img/tss-logo-white.png" class="main-logo dark-theme" alt="logo">
      </a>
      <a class="logo-icon mobile-logo icon-light active" href="dashboard.php">
      <img src="../img/tss-logo-white.png" class="logo-icon" alt="logo">
      </a>
      <a class="logo-icon mobile-logo icon-dark active" href="dashboard.php">
      <img src="../img/tss-logo-white.png" class="logo-icon dark-theme" alt="logo">

      </a>
   </div>
   <div class="main-sidemenu">
      <div class="app-sidebar__user clearfix">
         <div class="dropdown user-pro-body">
            <div class="">
               <img alt="user-img" class="avatar avatar-xl brround" src="assets/img/faces/6.png">
            </div>
            <div class="user-info">
               <span class="mb-0 text-muted">Welcome, Administrator</span>
            </div>
         </div>
      </div>
      <ul class="side-menu">
         <li class="side-item side-item-category"><a href="<?php echo ADMINURL ?>/dashboard.php">Dashboard</a></li>
         <?php if($_SESSION['cubeadmin_sess']['usertype']==1){  ?>
         <!--<li class="side-item side-item-category">CMS Management</li>-->
         <!--<li class="slide">
            <a class="side-menu__item" href="<?php echo ADMINURL ?>/gfabout.php">
               <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                  <path d="M0 0h24v24H0V0z" fill="none"/>
                  <path d="M6.26 9L12 13.47 17.74 9 12 4.53z" opacity=".3"/>
                  <path d="M19.37 12.8l-7.38 5.74-7.37-5.73L3 14.07l9 7 9-7zM12 2L3 9l1.63 1.27L12 16l7.36-5.73L21 9l-9-7zm0 11.47L6.26 9 12 4.53 17.74 9 12 13.47z"/>
               </svg>
               <span class="side-menu__label"> About Us Page</span>
            </a>
         </li>-->
<!--          Groups      --->

        <li class="slide">
            <a class="side-menu__item" href="add_moderator.php">
               <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                  <path d="M0 0h24v24H0V0z" fill="none"/>
                  <path d="M6.26 9L12 13.47 17.74 9 12 4.53z" opacity=".3"/>
                  <path d="M19.37 12.8l-7.38 5.74-7.37-5.73L3 14.07l9 7 9-7zM12 2L3 9l1.63 1.27L12 16l7.36-5.73L21 9l-9-7zm0 11.47L6.26 9 12 4.53 17.74 9 12 13.47z"/>
               </svg>
               <span class="side-menu__label">Add Gellery</span>
            </a>
         </li>
		 
		  <li class="slide">
            <a class="side-menu__item" href="add_event.php">
               <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                  <path d="M0 0h24v24H0V0z" fill="none"/>
                  <path d="M6.26 9L12 13.47 17.74 9 12 4.53z" opacity=".3"/>
                  <path d="M19.37 12.8l-7.38 5.74-7.37-5.73L3 14.07l9 7 9-7zM12 2L3 9l1.63 1.27L12 16l7.36-5.73L21 9l-9-7zm0 11.47L6.26 9 12 4.53 17.74 9 12 13.47z"/>
               </svg>
               <span class="side-menu__label">Add Event</span>
            </a>
         </li>
		 
		 
        <li class="slide">
            <a class="side-menu__item" href="add_awards.php">
               <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                  <path d="M0 0h24v24H0V0z" fill="none"/>
                  <path d="M6.26 9L12 13.47 17.74 9 12 4.53z" opacity=".3"/>
                  <path d="M19.37 12.8l-7.38 5.74-7.37-5.73L3 14.07l9 7 9-7zM12 2L3 9l1.63 1.27L12 16l7.36-5.73L21 9l-9-7zm0 11.47L6.26 9 12 4.53 17.74 9 12 13.47z"/>
               </svg>
               <span class="side-menu__label">Add Awards</span>
            </a>
         </li>
		 
		 <li class="slide">
            <a class="side-menu__item" href="counter.php">
               <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                  <path d="M0 0h24v24H0V0z" fill="none"/>
                  <path d="M6.26 9L12 13.47 17.74 9 12 4.53z" opacity=".3"/>
                  <path d="M19.37 12.8l-7.38 5.74-7.37-5.73L3 14.07l9 7 9-7zM12 2L3 9l1.63 1.27L12 16l7.36-5.73L21 9l-9-7zm0 11.47L6.26 9 12 4.53 17.74 9 12 13.47z"/>
               </svg>
               <span class="side-menu__label">Add Counter</span>
            </a>
         </li>
		 
		 <li class="slide">
            <a class="side-menu__item" href="newsroom.php">
               <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                  <path d="M0 0h24v24H0V0z" fill="none"/>
                  <path d="M6.26 9L12 13.47 17.74 9 12 4.53z" opacity=".3"/>
                  <path d="M19.37 12.8l-7.38 5.74-7.37-5.73L3 14.07l9 7 9-7zM12 2L3 9l1.63 1.27L12 16l7.36-5.73L21 9l-9-7zm0 11.47L6.26 9 12 4.53 17.74 9 12 13.47z"/>
               </svg>
               <span class="side-menu__label">Add NewsRoom</span>
            </a>
         </li>

 <!--    ===================   Close  ====================  -->        
          <!--    ==========   Bible page  ==========  -->
		  
		  <!--<li class="slide">
            <a class="side-menu__item" href="<?php echo ADMINURL ?>/gfbible.php">
               <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                  <path d="M0 0h24v24H0V0z" fill="none"/>
                  <path d="M6.26 9L12 13.47 17.74 9 12 4.53z" opacity=".3"/>
                  <path d="M19.37 12.8l-7.38 5.74-7.37-5.73L3 14.07l9 7 9-7zM12 2L3 9l1.63 1.27L12 16l7.36-5.73L21 9l-9-7zm0 11.47L6.26 9 12 4.53 17.74 9 12 13.47z"/>
               </svg>
               <span class="side-menu__label">Bible Page </span>
            </a>
         </li>-->
		  
		  <!--    ==========   Bible page  ==========  -->
          <!--<li class="slide">
            <a class="side-menu__item" href="<?php echo ADMINURL ?>/gf-carlos-cave-food-bank.php">
               <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                  <path d="M0 0h24v24H0V0z" fill="none"/>
                  <path d="M6.26 9L12 13.47 17.74 9 12 4.53z" opacity=".3"/>
                  <path d="M19.37 12.8l-7.38 5.74-7.37-5.73L3 14.07l9 7 9-7zM12 2L3 9l1.63 1.27L12 16l7.36-5.73L21 9l-9-7zm0 11.47L6.26 9 12 4.53 17.74 9 12 13.47z"/>
               </svg>
               <span class="side-menu__label"> Carlos Cave Food Bank</span>
            </a>
         </li>
         
         <li class="slide">
            <a class="side-menu__item" href="gf-pastor.php">
               <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                  <path d="M0 0h24v24H0V0z" fill="none"/>
                  <path d="M6.26 9L12 13.47 17.74 9 12 4.53z" opacity=".3"/>
                  <path d="M19.37 12.8l-7.38 5.74-7.37-5.73L3 14.07l9 7 9-7zM12 2L3 9l1.63 1.27L12 16l7.36-5.73L21 9l-9-7zm0 11.47L6.26 9 12 4.53 17.74 9 12 13.47z"/>
               </svg>
               <span class="side-menu__label">Our Pastor</span>
            </a>
         </li>
         
         <li class="slide">
            <a class="side-menu__item" href="gf-home-gallery.php">
               <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                  <path d="M0 0h24v24H0V0z" fill="none"/>
                  <path d="M6.26 9L12 13.47 17.74 9 12 4.53z" opacity=".3"/>
                  <path d="M19.37 12.8l-7.38 5.74-7.37-5.73L3 14.07l9 7 9-7zM12 2L3 9l1.63 1.27L12 16l7.36-5.73L21 9l-9-7zm0 11.47L6.26 9 12 4.53 17.74 9 12 13.47z"/>
               </svg>
               <span class="side-menu__label">Home Banner</span>
            </a>
         </li>
         <li class="slide">
            <a class="side-menu__item" href="gf-our-future.php">
               <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                  <path d="M0 0h24v24H0V0z" fill="none"/>
                  <path d="M6.26 9L12 13.47 17.74 9 12 4.53z" opacity=".3"/>
                  <path d="M19.37 12.8l-7.38 5.74-7.37-5.73L3 14.07l9 7 9-7zM12 2L3 9l1.63 1.27L12 16l7.36-5.73L21 9l-9-7zm0 11.47L6.26 9 12 4.53 17.74 9 12 13.47z"/>
               </svg>
               <span class="side-menu__label">Our Future </span>
            </a>
         </li>
         <li class="slide">
            <a class="side-menu__item" href="gf-church-events.php">
               <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                  <path d="M0 0h24v24H0V0z" fill="none"/>
                  <path d="M6.26 9L12 13.47 17.74 9 12 4.53z" opacity=".3"/>
                  <path d="M19.37 12.8l-7.38 5.74-7.37-5.73L3 14.07l9 7 9-7zM12 2L3 9l1.63 1.27L12 16l7.36-5.73L21 9l-9-7zm0 11.47L6.26 9 12 4.53 17.74 9 12 13.47z"/>
               </svg>
               <span class="side-menu__label">Church Events </span>
            </a>
         </li>
          <li class="slide">
            <a class="side-menu__item" href="gf-JEWELS-MINISTRY.php">
               <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                  <path d="M0 0h24v24H0V0z" fill="none"/>
                  <path d="M6.26 9L12 13.47 17.74 9 12 4.53z" opacity=".3"/>
                  <path d="M19.37 12.8l-7.38 5.74-7.37-5.73L3 14.07l9 7 9-7zM12 2L3 9l1.63 1.27L12 16l7.36-5.73L21 9l-9-7zm0 11.47L6.26 9 12 4.53 17.74 9 12 13.47z"/>
               </svg>
               <span class="side-menu__label">JEWELS MINISTRY </span>
            </a>
         </li>
         <li class="slide">
            <a class="side-menu__item" href="gf-garden-of-faith-preschool.php">
               <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                  <path d="M0 0h24v24H0V0z" fill="none"/>
                  <path d="M6.26 9L12 13.47 17.74 9 12 4.53z" opacity=".3"/>
                  <path d="M19.37 12.8l-7.38 5.74-7.37-5.73L3 14.07l9 7 9-7zM12 2L3 9l1.63 1.27L12 16l7.36-5.73L21 9l-9-7zm0 11.47L6.26 9 12 4.53 17.74 9 12 13.47z"/>
               </svg>
               <span class="side-menu__label">Garden Of Faith Preschool </span>
            </a>
         </li>
          <li class="slide">
            <a class="side-menu__item" href="gf-PRAISE-WORSHIP-TEAM.php">
               <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                  <path d="M0 0h24v24H0V0z" fill="none"/>
                  <path d="M6.26 9L12 13.47 17.74 9 12 4.53z" opacity=".3"/>
                  <path d="M19.37 12.8l-7.38 5.74-7.37-5.73L3 14.07l9 7 9-7zM12 2L3 9l1.63 1.27L12 16l7.36-5.73L21 9l-9-7zm0 11.47L6.26 9 12 4.53 17.74 9 12 13.47z"/>
               </svg>
               <span class="side-menu__label">PRAISE & WORSHIP TEAM </span>
            </a>
         </li>
         <li class="slide">
            <a class="side-menu__item" href="gf-revive-leadership.php">
               <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                  <path d="M0 0h24v24H0V0z" fill="none"/>
                  <path d="M6.26 9L12 13.47 17.74 9 12 4.53z" opacity=".3"/>
                  <path d="M19.37 12.8l-7.38 5.74-7.37-5.73L3 14.07l9 7 9-7zM12 2L3 9l1.63 1.27L12 16l7.36-5.73L21 9l-9-7zm0 11.47L6.26 9 12 4.53 17.74 9 12 13.47z"/>
               </svg>
               <span class="side-menu__label">REVIVE LEADERSHIP </span>
            </a>
         </li>
         <li class="slide">
            <a class="side-menu__item" href="gf-god-family-bible-church.php">
               <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                  <path d="M0 0h24v24H0V0z" fill="none"/>
                  <path d="M6.26 9L12 13.47 17.74 9 12 4.53z" opacity=".3"/>
                  <path d="M19.37 12.8l-7.38 5.74-7.37-5.73L3 14.07l9 7 9-7zM12 2L3 9l1.63 1.27L12 16l7.36-5.73L21 9l-9-7zm0 11.47L6.26 9 12 4.53 17.74 9 12 13.47z"/>
               </svg>
               <span class="side-menu__label">God's Family Bible Church </span>
            </a>
         </li>
		  
		  

		  

          <li class="slide">
            <a class="side-menu__item" href="gf-faq.php">
               <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                  <path d="M0 0h24v24H0V0z" fill="none"/>
                  <path d="M6.26 9L12 13.47 17.74 9 12 4.53z" opacity=".3"/>
                  <path d="M19.37 12.8l-7.38 5.74-7.37-5.73L3 14.07l9 7 9-7zM12 2L3 9l1.63 1.27L12 16l7.36-5.73L21 9l-9-7zm0 11.47L6.26 9 12 4.53 17.74 9 12 13.47z"/>
               </svg>
               <span class="side-menu__label">FAQ</span>
            </a>
         </li>
         <li class="side-item side-item-category">Watch Messages</li>
          <li class="slide">
            <a class="side-menu__item" href="gf-sunday-sermons.php">
               <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                  <path d="M0 0h24v24H0V0z" fill="none"/>
                  <path d="M6.26 9L12 13.47 17.74 9 12 4.53z" opacity=".3"/>
                  <path d="M19.37 12.8l-7.38 5.74-7.37-5.73L3 14.07l9 7 9-7zM12 2L3 9l1.63 1.27L12 16l7.36-5.73L21 9l-9-7zm0 11.47L6.26 9 12 4.53 17.74 9 12 13.47z"/>
               </svg>
               <span class="side-menu__label">Sunday Sermons </span>
            </a>
         </li>
           <li class="slide">
            <a class="side-menu__item" href="gf-wednesday-sermons.php">
               <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                  <path d="M0 0h24v24H0V0z" fill="none"/>
                  <path d="M6.26 9L12 13.47 17.74 9 12 4.53z" opacity=".3"/>
                  <path d="M19.37 12.8l-7.38 5.74-7.37-5.73L3 14.07l9 7 9-7zM12 2L3 9l1.63 1.27L12 16l7.36-5.73L21 9l-9-7zm0 11.47L6.26 9 12 4.53 17.74 9 12 13.47z"/>
               </svg>
               <span class="side-menu__label">Wednesday Sermons </span>
            </a>
         </li>
         <li class="slide">
            <a class="side-menu__item" href="gf-previous-messeges.php">
               <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                  <path d="M0 0h24v24H0V0z" fill="none"/>
                  <path d="M6.26 9L12 13.47 17.74 9 12 4.53z" opacity=".3"/>
                  <path d="M19.37 12.8l-7.38 5.74-7.37-5.73L3 14.07l9 7 9-7zM12 2L3 9l1.63 1.27L12 16l7.36-5.73L21 9l-9-7zm0 11.47L6.26 9 12 4.53 17.74 9 12 13.47z"/>
               </svg>
               <span class="side-menu__label">Previous Messeges </span>
            </a>
         </li>
         <li class="slide">
            <a class="side-menu__item" href="gf-nextlive.php">
               <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                  <path d="M0 0h24v24H0V0z" fill="none"/>
                  <path d="M6.26 9L12 13.47 17.74 9 12 4.53z" opacity=".3"/>
                  <path d="M19.37 12.8l-7.38 5.74-7.37-5.73L3 14.07l9 7 9-7zM12 2L3 9l1.63 1.27L12 16l7.36-5.73L21 9l-9-7zm0 11.47L6.26 9 12 4.53 17.74 9 12 13.47z"/>
               </svg>
               <span class="side-menu__label">Next Live Service</span>
            </a>
         </li>
         
         <li class="slide">
            <a class="side-menu__item" href="gf-view-multiple-page-content.php">
               <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                  <path d="M0 0h24v24H0V0z" fill="none"/>
                  <path d="M6.26 9L12 13.47 17.74 9 12 4.53z" opacity=".3"/>
                  <path d="M19.37 12.8l-7.38 5.74-7.37-5.73L3 14.07l9 7 9-7zM12 2L3 9l1.63 1.27L12 16l7.36-5.73L21 9l-9-7zm0 11.47L6.26 9 12 4.53 17.74 9 12 13.47z"/>
               </svg>
               <span class="side-menu__label">Multiple Page Content </span>
            </a>
         </li>
         
         <li class="side-item side-item-category">Contact</li>
         <li class="slide">
            <a class="side-menu__item" href="<?php echo ADMINURL ?>/gfcontactdetails.php">
               <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                  <path d="M0 0h24v24H0V0z" fill="none"/>
                  <path d="M6.26 9L12 13.47 17.74 9 12 4.53z" opacity=".3"/>
                  <path d="M19.37 12.8l-7.38 5.74-7.37-5.73L3 14.07l9 7 9-7zM12 2L3 9l1.63 1.27L12 16l7.36-5.73L21 9l-9-7zm0 11.47L6.26 9 12 4.53 17.74 9 12 13.47z"/>
               </svg>
               <span class="side-menu__label"> Update Contact Details</span>
            </a>
         </li>
         <li class="slide">
            <a class="side-menu__item" href="<?php echo ADMINURL ?>/gfcontactenquiry.php">
               <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                  <path d="M0 0h24v24H0V0z" fill="none"/>
                  <path d="M6.26 9L12 13.47 17.74 9 12 4.53z" opacity=".3"/>
                  <path d="M19.37 12.8l-7.38 5.74-7.37-5.73L3 14.07l9 7 9-7zM12 2L3 9l1.63 1.27L12 16l7.36-5.73L21 9l-9-7zm0 11.47L6.26 9 12 4.53 17.74 9 12 13.47z"/>
               </svg>
               <span class="side-menu__label"> View All Enquiry</span>
            </a>
         </li>-->
        
         <?php
          }
            ?>            
      </ul>
   </div>
</aside>