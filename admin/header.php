<style type="text/css">
	
	header{
  color: #fff;
  width: 100%;
  height: 15%;
  background-color: #eee;
  box-sizing:border-box;
  background-image: url("images/headerBackground.jpg");
  background-repeat: no-repeat;
  background-size:cover;
  display: flex;
  position: sticky;
  top: 0;
  z-index: 1;

}
header i{
  margin-left: 10px;
  margin-top: 20px;
  font-size: 30px;
}
header h2{
  font-size: 36px;
  position: absolute;
  margin-top: 15px;
  margin-left: 50px;
}

/* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */

@media screen and (max-width: 1110px) {
header h2{font-size:30px;}
}

@media screen and (max-width: 1000px) {
header h2{font-size:25px;}
}
@media screen and (max-width: 900px) {
header h2{font-size:20px;}
}

</style>

	<header>
    <i class="fas fa-bars" id="openNavbar" onclick="openNav()"></i>
		<h2> CRIME CONTROLLER </h2>
	</header>

