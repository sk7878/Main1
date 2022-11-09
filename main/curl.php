<html>

<h2> Curl </h2>

<body>
<section class="main-section alabaster" id="tops">
	<div class="container fullsize">
<?php

$curl_handle = curl_init();
curl_setopt($curl_handle, CURLOPT_URL, "http://www.esp.sujith.live/main/expose.php");
curl_setopt($curl_handle, CURLOPT_HEADER, 0);
curl_setopt($curl_handle,CURLOPT_RETURNTRANSFER,true);
$contents = curl_exec($curl_handle);

#echo "<br/>";
curl_close($curl_handle);

foreach (explode(",",$contents) as $content) {
    echo $content."<br/>";
}

?>
        
    </div>
</section>
</body>
</html>