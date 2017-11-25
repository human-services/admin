<?php
require_once "config.php";
require_once "graphical/header.php";
?>

<h4>Holmes County Human Services Administration</h4>
<center>
<form method="post" action="/">
	<div class="row uniform">
		<div align="center" style="width: 80%">
			<center><input type="text" name="user" id="user" value="" placeholder="User Name" style="width: 100%; margin-left: 100px; margin-right: 100px;" /></center>
		</div>d
		<div align="center" style="width: 80%">
			<center><input type="password" name="password" id="password" value="" placeholder="Password" style="width: 100%; margin-left: 100px; margin-right: 100px;" /></center>
		</div>		
		<div class="12u$">
			<ul class="actions">
				<li><input type="submit" value="Login" class="special" /></li>
				<li><input type="reset" value="Reset" /></li>
			</ul>
		</div>
	</div>
</form>
</center>
<?php
require_once "graphical/footer.php";
?>