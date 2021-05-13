<?php
ob_start();
echo "<!DOCTYPE html>
<html>
<head>
<style>
@import url('https://fonts.googleapis.com/css2?family=Russo+One&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap');
.text_main{
font-family: 'Russo One', sans-serif;
 color: white;
}
.text_roboto{
font-family: 'Roboto', sans-serif;
color: #ffc800;
}
</style>
<script>
var $$ = document.querySelectorAll('.progress-bar span');
var prgressBars= document.querySelectorAll('.progress-bar');

var p = 0;

setInterval(function(){
    p++;
    if(p>100){p=0;}
    for(var i = 0;i< $$.length;i++){
        $$[i].innerHTML = 'progress '+p+' %';
    }
    for(var i = 0;i< prgressBars.length;i++){
        prgressBars[i].lastChild.style.clip = 'rect(0 '+p*2+'px 40px 0)';
    }
},100);
</script>

<meta http-equiv='content-type' content='text/html; charset=UTF-8'/>
<meta name='viewport' content='width=device-width; initial-scale=1'>
<meta name='author' content='Splash'/>
<title>Ремонтно-строительное общество</title>
<link rel='icon' type='image/png' href='/favicon.ico'/>";
?>
<script>
$(document).ready(function(){
$("ul").hide();
$("h3 span").click(function(){
$(this).parent().next().slideToggle();
});
}); 
</script>
<link rel='stylesheet' type='text/css' href='/tmp/inco.css?t=<?php echo(microtime(true).rand()); ?>' type='text/css'/>
<link rel='stylesheet' type='text/css' href='/tmp/klick.css?t=<?php echo(microtime(true).rand()); ?>' type='text/css'/>
<link rel='stylesheet' type='text/css' href='/tmp/style.css?t=<?php echo(microtime(true).rand()); ?>' type='text/css'/>
<?php
echo '<body>';
if(!isset($_SESSION['uid']) 
and $_SERVER['PHP_SELF'] !== '/index.php' 
and $_SERVER['PHP_SELF'] !== '/check-doc-autoriz.php' 
and $_SERVER['PHP_SELF'] !== '/check.php' 
and $_SERVER['PHP_SELF'] !== '/autorize.php'){
    header('Location: index.php');
    exit;
}

?>