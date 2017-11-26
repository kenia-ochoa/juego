
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>JUEGOS DE CONSERVACIÓN </title>

	<h1> ¿ Cuál de estos vasos tiene mayor cantidad de agua ?</h1>

    <script>
		function elvaso1() {
			alert ("Sigue intentando");
		}
	</script>
</head>
<body>
		<input type="button" 
		value="el vaso 1"
		onclick="elvaso1()" />
</body>

 <script>
		function elvaso2() {
			alert ("Sigue intentando");
		}
	</script>
</head>
<body>
		<input type="button" 
		value="El vaso 2"
		onclick="elvaso2()" />
</body>

 <script>
		function igualcantidad() {
			alert ("Muy Bien");
		}
	</script>
</head>
<body>
		<input type="button" 
		value="igual cantidad"
		onclick="igualcantidad()" />

		<script>
			   function saveFinalScore() {
        localStorage.setItem(getFinalScoreDate(), getTotalScore());
        showBestScores();
        removeNoBestScores();
    }
    
    function showBestScores() {
        var bestScores = getBestScoreKeys();
        var bestScoresList = document.getElementById('puntuaciones');
        if (bestScoresList) {
            clearList(bestScoresList);
            for (var i=0; i < bestScores.length; i++) {
                addListElement(bestScoresList, bestScores[i], i==0?'negrita':null);
                addListElement(bestScoresList, localStorage.getItem(bestScores[i]), i==0?'negrita':null);
            }
        }
    }

    function removeNoBestScores() {
        var scoresToRemove = [];
        var bestScoreKeys = getBestScoreKeys();
        for (var i=0; i < localStorage.length; i++) {
            var key = localStorage.key(i);
            if (!bestScoreKeys.containsElement(key)) {
                scoresToRemove.push(key);
            }
        }
        for (var j = 0; j < scoresToRemove.length; j++) {
            var scoreToRemoveKey = scoresToRemove[j];
            localStorage.removeItem(scoreToRemoveKey);
        }
    }
		</script>
</body>
</html>
