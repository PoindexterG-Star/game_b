<html>
	<head>
		<title>Baseball game</title>
	</head>
	
	<body>
		<h1>Baseball Simulation</h1>
	</body>
</html>




<?php

$bases = array(0, 0, 0, 0);
$puntos_a = 0;
$actual_batter = 17;
// Mover jugadores posicionados en la tercera base
function base_3_move($bases){
	if($bases[2] != 0){
		echo "Jugador {$bases[2]} en tercera base avanza a home! <br>";
		$bases[3] ++;
		$bases[2] = 0;
		return $bases;
	}
}
// Mover jugadores posicionados en la segunda base
function base_2_move($batter){
	if($bases[1] != 0){
		$bases[2] = $bases[1];
		$bases[1] = 0;
		echo "Jugador {$batter} en segunda avanza a tercera";
	}
}
// Mover jugadores posicionados en la primera base
function base_1_move($batter){
	if($bases[0] != 0){
		$bases[1] = $bases[0];
		$bases[0] = 0;
		echo "Jugador {$batter} en primera avanza a tercera";
	}
}
// SINGLE
function single($batter){
	base_3_move($batter);
	base_2_move($batter);
	base_1_move($batter);
	$bases[0] = $batter;
}
// WALK
function walk($batter){
	if($bases[2] != 0 && $bases[1] != 0 && $bases[2] != 0){
		single($batter);
	}
	elseif($bases[1] != 0 && $bases[0] != 0){
		single($batter);
	}
	elseif($bases[0] != 0){
		single($batter);
	}
	else{
		$bases[0] = $batter;
	}
}
// DOUBLE
function play_double($batter){
	// move player in third base
	base_3_move($batter);
	// move player in second base
	base_2_move($batter);
	base_3_move($batter);
	// move player in first base
	base_1_move($batter);
	base_2_move($batter);
	// move batter to second base
	$bases[0] = $batter;
	base_1_move($batter);
}
$bases[2] = $actual_batter;
$bases = base_3_move($bases);
echo "Primera base ";
echo $bases[0] . "<br>";
echo "Segunda base ";
echo $bases[1] . "<br>";
echo "Tercera base ";
echo $bases[2] . "<br>";
echo "Puntos: " . $bases[3];


?>
