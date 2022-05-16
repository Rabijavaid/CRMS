<style type="text/css">
	
.header{
  color: #fff;
  width: 100%;
  height: 80px;
  background-color: rgba(0,0,0,0.8);
  box-sizing:border-box;
  background-repeat: no-repeat;
  background-size:cover;
  display: flex;
  top: 0;
  z-index: 1;
}

.header h2{
  display: block;
  margin: 0px auto;
  font-size: 36px;
  align-items: center;
  margin-top: 15px;
  color: #f8f9fa;
  text-shadow: 0 0 20px white;
}

/* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */

@media screen and (max-width: 1110px) {
.header h2{font-size:30px;}
}

@media screen and (max-width: 1000px) {
.header h2{font-size:25px;}
}
@media screen and (max-width: 900px) {
.header h2{font-size:20px;}
}

</style>

	<div class="header">
		<h2> CRIME CONTROLLER </h2>
    <?php include "sessionConfirm.php" ?>
	</div>

