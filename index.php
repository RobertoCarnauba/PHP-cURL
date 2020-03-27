<?php

$curl = curl_init();

curl_setopt_array($curl, [
	CURLOPT_URL => "https://pokemon-go1.p.rapidapi.com/pokemon_stats.json",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => array(
		"x-rapidapi-host: pokemon-go1.p.rapidapi.com",
		"x-rapidapi-key: e54417d805mshf48e3ec5bcec694p1816bdjsn3b84dec428a6"
	)
]);

$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {
	$json = json_decode($response, false);
	 if(count($json)){
		$i = 0;
		foreach($json as $Json){
			
			$i++;
			echo $i.'-';
			echo 'Nome: '.$Json->pokemon_name;
			echo '<br>';
			echo 'Ataque: '.$Json->base_attack;
			echo '<br>';
			echo 'Defesa: '.$Json->base_defense;
			echo '<br>';
			echo 'Stamina: '.$Json->base_stamina;
			echo '<br>';
			echo '============================';
			echo '<br><br>';
		}
	}
}