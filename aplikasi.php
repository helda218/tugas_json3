<?php
	$json_string1 = file_get_contents("http://api.wunderground.com/api/0215dd2f84808f33/conditions/q/IA/mugas.json");
	$json_string2 = file_get_contents("http://api.wunderground.com/api/0215dd2f84808f33/astronomy/q/IA/Mugas.json");
	$json_string3 = file_get_contents("http://api.wunderground.com/api/0215dd2f84808f33/forecast/q/IA/Mugas.json");
	
	$parsed_json1 = json_decode ($json_string1);
	$parsed_json2 = json_decode ($json_string2);
	$parsed_json3 = json_decode ($json_string3);
	
	$location = $parsed_json1->{'current_observation'}->{'display_location'}->{'full'};
	$date = $parsed_json1->{'current_observation'}->{'local_time_rfc822'};
	$suhu = $parsed_json1->{'current_observation'}->{'temp_c'};
	$angin = $parsed_json1->{'current_observation'}->{'wind_mph'};
	
	$sunrise_jam = $parsed_json2->{'moon_phase'}->{'sunrise'}->{'hour'};
	$sunrise_mt = $parsed_json2->{'moon_phase'}->{'sunrise'}->{'minute'};
	$sunset_jam = $parsed_json2->{'moon_phase'}->{'sunset'}->{'hour'};
	$sunset_mt = $parsed_json2->{'moon_phase'}->{'sunrise'}->{'minute'};
	
	$icon = $parsed_json3->{'forecast'}->{'txt_forecast'}->forecastday[0]->{'icon'};
	
	echo "Keadaan cuaca saat ini di ${location}<br>
	${date}";
	
	echo "<br>";
	echo "<br>";
	
	echo"<img src='http://icons.wxug.com/i/c/k/".$icon.".gif'> <br/>";
	
	echo "<br>";
	echo "Suhu : ${suhu} <sup> o </sup>C";
	
	echo "<br>";
	
	echo "Kecepatan Angin : ${angin} meter/jam";
	echo "<br>";
	echo "Sunrise pada pukul ${sunrise_jam}:${sunrise_mt}\n";
	echo "<br>";
	echo "Sunset pada pukul ${sunset_jam}:${sunset_mt}\n";
	echo "<br>";
	echo "<br>";
	echo "Saran : ";
	
	if ($suhu >= 28) {

	echo 'Gunakan sunblock atau jaket untuk melindungi kulit dari paparan sinar matahari.';
} else if ($suhu < 28 && $suhu >= 26) {
	echo 'Udara di luar cerah, waktu yang tepat untuk berpergian';
}  else {
	echo 'Bawalah payung atau jas hujan jika berpergian.';
}
   
?>
