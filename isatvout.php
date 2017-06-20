<!DOCTYPE html>

<html>
<head>
<title>Is ATV out?</title>
<meta charset="UTF-8">
<link rel="icon" href=".\SClogo.jpeg" type="image/jpeg" />
<style type="text/css">

</style>
<script type="text/javascript">

	var timer;
	var count = 30;

	window.onload = function(){
		checkATV();
	}

	function checkATV(){
		var atv = document.getElementById("atv").innerHTML;
		if(atv == "yes"){
			var title = document.getElementById("title").innerHTML;
			var url = document.getElementById("url").innerHTML;
			document.write("<div id='container' style='text-align:center; color:lightblue; background-color:black; width:100vw; height:100vh; position:absolute; top:0px; left:0px; font-family:arial; font-weight:bold;'><div id='header'><p id='question' style='font-size:6vw; line-height:0.4em;'>IS ATV OUT?</p></div><div id='main'><p id='answer' style='font-size:18vw; line-height:0.2em; color:lime;'>YES IT IS!</p></div><div id='lower'><p id='counter' style='font-size:4vw; line-height:0.2em;'><a id='gibatv' href='"+url+"' style='text-decoration:none; background-color:darkblue; padding:0.5em; border:0.3vw solid darkblue; border-radius:1vw; padding-top:0.2em; color:#6060FF; box-shadow:#000000 0vw -0.5vw 1.5vw inset;' onmouseover='hoverButton()' onmouseout='outButton()'>༼ つ ◕_◕ ༽つ GIB ATV ༼ つ ◕_◕ ༽つ</a></p></div></div>");
		}
		if(atv == "no"){
			document.write("<div id='container' style='text-align:center; color:lightblue; background-color:black; width:100vw; height:100vh; position:absolute; top:0px; left:0px; font-family:arial; font-weight:bold;'><div id='header'><p id='question' style='font-size:6vw; line-height:0.4em;'>IS ATV OUT?</p></div><div id='main'><p id='answer' style='font-size:18vw; line-height:0.2em; color:red;'>NOT YET.</p></div><div id='lower'><p id='counter' style='font-size:6vw; line-height:0.2em;'>CHECKING AGAIN IN 30</p></div></div>");
			timer = setInterval(updateCounter, 1000);
		}
	}

	function updateCounter(){
		var counter = document.getElementById("counter");
		count--;
		counter.innerHTML = "CHECKING AGAIN IN " + count;
		if (count == 0){
			reCheck();
		}
	}

	function reCheck(){
		counter.innerHTML = "CHECKING NOW...";
		window.location.reload();
	}

	function hoverButton(){
		var button = document.getElementById("gibatv");
		button.style.backgroundColor = "blue";
		button.style.color = "lightblue";
	}

	function outButton(){
		var button = document.getElementById("gibatv");
		button.style.backgroundColor = "darkblue";
		button.style.color = "#6060FF";
	}

	


</script>
</head>
<body>
<?php	
	include "./simple_html_dom.php";
	function checkAtv(){
		$html = file_get_html('https://www.youtube.com/user/RobertsSpaceInd/videos');
		$elements = $html->find('h3[class=yt-lockup-title]');
		$latestvid = $elements[0]->find('a');
		$title = $latestvid[0]->plaintext;
		if (stristr($title,"Star Citizen: Around the Verse")){
			print "<p id='atv'>yes</p>\n";
			print "<p id='title'>".$latestvid[0]->plaintext."</p>\n";
			print "<p id='url'>http://www.youtube.com".$latestvid[0]->href."</p>\n";

		} else {
			print "<p id='atv'>no</p>\n";
			print "<p id='title'>".$latestvid[0]->plaintext."</p>\n";
			print "<p id='url'>http://www.youtube.com".$latestvid[0]->href."</p>\n";
		}
		$html->clear();
	}	
	checkAtv();
?>

</body>
</html>




