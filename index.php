<?php
require_once "config.php";
require_once "graphical/header.php";

if(isset($_REQUEST['login']))
	{
	$_SESSION['appid'] = $_REQUEST['login'];
	}
if(isset($_REQUEST['code']))
	{
	$_SESSION['appkey'] = $_REQUEST['code'];
	}	
?>

<script type="text/javascript">
  $appid = getUrlVar('login');
  console.log($appid);
  $appkey = getUrlVar('code');
  console.log($appkey);
  if($appid != '' && $appkey != '')
    {
    console.log("setting!");
     Cookies.set('appid', $appid);
     Cookies.set('appkey', $appkey);
     // Set with expiration
     // Cookies.set('token', $oAuthToken, { expires: '01/01/2017' });
    }
</script>


<h2>Authentication</h2>
<p><a href="http://holmes.county.hsda.github.adopta.agency/admin/?action=login"><img src="https://s3.amazonaws.com/kinlane-productions/bw-icons/bw-github-square.png" alt="" width="350" align="right" /></a></p>
<p>This administrative area uses Github as the authentication for managing the human services data it contains. You don't have to understand how to write code, or fully understand how to use Github to use this site. All you need is an account.</p>
<p>It helps if you think of Github as a social network, but for managing code as well as content. <a href="http://holmes.county.hsda.admin.github.adopta.agency/developer/?action=login">All you need to login to this administrative area is have a Github account, and be logged in when you do</a>. Then you just click on the icon on this page to login, and you will be redirected back here, and immediately logged in.</p>
<p>Eventually we will add Google, Twitter, and Facebook authentication to this administrative area, allowing for different types of accounts. All with the goal in preventing you from having to create yet another account.</p>
<p>If you have any questions leave a comment on the Github Issues for this administrative area.</p>
<?php
require_once "graphical/footer.php";
?>