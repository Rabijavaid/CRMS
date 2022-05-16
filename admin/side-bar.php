<style type="text/css">
  
  /* The side navigation menu */
.sidenav {
  height: 100%; /* 100% Full-height */
  width: 20%; /* 0 width - change this with JavaScript */
  position: fixed; /* Stay in place */
  z-index: 100; /* Stay on top */
  top: 0; /* Stay at the top */
  left: 0;
  background-image: url("images/background.jpg");
  background-size: cover;
  background-repeat: no-repeat;
  background-color:rgba(0,0,0,0.7); /* Black*/
  background-blend-mode:overlay;
  overflow-x: hidden; /* Disable horizontal scroll */
  padding-top: 30px; /* Place content 60px from the top */
  transition: 0.5s; /* 0.5 second transition effect to slide in the sidenav */
}

/* The navigation menu links */

.sidenav ul{
  padding: 0px;
  margin: 0px;
  width: 100%;
}
.sidenav ul li{
  list-style: none; 
  border-bottom: 2px solid  #818181;
  transition: 0.5s;
  position: relative;
}

.sidenav ul li .parentList{
  display: flex;
  padding: 0px;
  margin:0px;
}
.sidenav ul li .parentList i{
  padding: 8px 0px 8px 8px;
  color: #818181;
  transition: 0.5s;
}

.sidenav ul li .parentList i:last-child{
  padding-right: 10px;
}


.sidenav ul li .parentList a {
  padding: 8px 8px 8px 16px;
  text-decoration: none;
  font-size: 20px;
  color: #818181;
  display: block;
  transition: 0.5s;
  width: 100%;
}

/* When you mouse over the navigation links, change their color */
.sidenav ul li:hover {
  color: #f1f1f1;
  border-bottom: 2px solid  #f1f1f1;
}
.sidenav ul li:hover > .parentList a{
  color: #f1f1f1;
}

.sidenav ul li:hover > .parentList i{
  color: #f1f1f1;
}

/*drop down list item  */
.sidenav ul li button{
  transform:rotate(0deg);
}


.sidenav ul li #dropDown{
  display:none;
  height: auto;
  overflow: hidden;
  transform:rotate(0deg);
}
.sidenav ul li #dropDown a{
  box-sizing:border-box;
    padding: 8px 20px 8px 16px;
  text-decoration: none;
  font-size: 16px;
  color: #818181;
  display: block;
  transition: 0.5s;
  width: 100%;
  text-align: right;
}

.sidenav ul li #dropDown a:hover{
  color: #f1f1f1; 
}




/* Position and style the close button (top right corner) */
.sidenav .closebtn {
  color: #ffffff;
  margin-left: 85%;
  margin-top: 15px;
  font-size: 26px;
  position: absolute;
  visibility: hidden;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

#openNavbar{
  visibility: hidden;
  position:absolute;
}


#sidenavMain{
  z-index: 1;
}

@media screen and (max-width: 800px) {
.sidenav { width: 0px;}
#openNavbar     {visibility:visible;}
.sidenav .closebtn {visibility: visible;}
#main {margin-left: 0px;}

}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>


<!-- side bar   !-->

<div style="width:250px;" >
<div id="mySidenav" class="sidenav" >
  <i class="fas fa-times closebtn " onclick="closeNav()"></i>
  <img src="images/logo.jpg" style="width:100%;">
  <ul>
      <li><div class="parentList"> <i class="fas fa-home"></i>      <a href="index.php" >Home</a> </div>  </li>

<!--  officer drop down  !-->
      <li><div class="parentList"><i class="fas fa-users"></i>     <a href="officers.php">officers</a>  <i class="fas fa-caret-down" onClick="dropDownOpen(this)" ></i> </div>  
        <ul id="dropDown">
          <li><a href="changePassword.php">Change Password</a></li>
          <li><a href="changeEmail.php">Change Email</a></li>
        </ul>

         </li>

<!--  police station drop down  !-->         
      <li><div class="parentList"><i class="fas fa-building"></i>  <a href="policeStation.php">police stations</a> </div>
       </li>

<!--  criminal drop down  !-->       
      <li><div class="parentList"><i class="fas fa-crosshairs"></i>  <a href="criminals.php">criminals</a> </div>
       </li>

<!--  complains drop down  !-->
      <li><div class="parentList"><i class="fas fa-users"></i>     <a href="complains.php">Complains</a>  <i class="fas fa-caret-down" onClick="dropDownOpen(this)" ></i> </div>  
        <ul id="dropDown">
          <li><a href="solvedComplains.php">Solved</a></li>
        </ul>

         </li>

<!--  details drop down  !-->

      <li><div class="parentList"><i class="fas fa-info-circle"></i>  <a href="logout.php">LogOut</a>      </div> </li>
  </ul>
</div>
<div id="sidenavMain" onclick="closeNav()"></div>
</div>

<!-- side bar end -->

<script type="text/javascript">
  
  

/* Set the width of the side navigation to 250px and the left margin of the page content to 250px */
function openNav() {
  document.getElementById("mySidenav").style.width = "70%";
  document.getElementById("sidenavMain").style.width = "100%";
  document.getElementById("sidenavMain").style.height = "100%";
  document.getElementById("sidenavMain").style.position = 'absolute';
  document.getElementById("sidenavMain").style.backgroundColor = "rgba(0,0,0,0.7)";
}

/* Set the width of the side navigation to 0 and the left margin of the page content to 0 */
function closeNav() {
  document.getElementById("mySidenav").style.width = "0px";
  document.getElementById("sidenavMain").style.width = "0px";
}

function dropDownOpen(element){

var menuContent =element.style.transform;


if(menuContent===''){

 $(element).closest("li").find("#dropDown").css({"height":"auto"});
 $(element).closest("li").find("#dropDown").css({"display":"block"});
 $(element).closest("li").css({"backgroundColor":"#010101"});
 $(element).closest("li").css({"border":"1px solid #ffffff"});
 $(element).closest("li").find(".parentList").find("a").css({"color":"#fff"});
 $(element).closest("li").find(".parentList").find("i").css({"color":"#fff"});
 element.style.transform = 'rotate(180deg)';
 element.style.transformOrigin = 'center center';

   } 
  else {
  $(element).closest("li").find("#dropDown").css({"display":"none"});
  var element1 = $(element).closest("li").find("#dropDown").css({"height":"0px"});
  element.style.transform = '';
  $(element).closest("li").css({"border":"1px solid #818181"});
  $(element).closest("li").find(".parentList").find("a").css({"color":"#818181"});
  $(element).closest("li").find(".parentList").find("i").css({"color":"#818181"});
  $(element).closest("li").css({"backgroundColor":"transparent"});
   
   }

}
function DropDownclose(element){
  $(element).closest("li").find("#dropDown").css({"display":"none"});
  var element1 = $(element).closest("li").find("#dropDown").css({"height":"auto"});
  element.style.transform = '';
  $(element).closest("li").css({"border":"1px solid #818181"});
  $(element).closest("li").find(".parentList").find("a").css({"color":"#818181"});
  $(element).closest("li").find(".parentList").find("i").css({"color":"#818181"});
}





</script>