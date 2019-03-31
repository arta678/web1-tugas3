<!DOCTYPE html>
<html lang="en">
<head>
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="animations.css">
	<script src="JQuery-3.3.1.min.js"></script>
</head>
<body >
	
	<div class="kulit-luar">
		<div class="kulit-seg-ling-bal">
			<dir class="animated zoomIn">
				<h1>SILAHKAN PILIH RUMUS</h1>
			</dir>
			
			<!-- Konten atau pilihan rumus -->
			<div class="bungkus-konten">

				<!-- pilihan lingkaran -->
				<div id="pilih-lingkaran">
					<p>Luas Lingkaran</p>
					<dir id="ling"></dir>
					<button id="tmbl-ling" onclick="gantiWarnaLingkaran()">PILIH</button>
				</div>

				<!-- pilihan segitiga -->
				<div id="pilih-segitiga">
					<p>Luas Segitiga SK</p>
					<div id="segi"></div>
					<button id="tmbl-seg" onclick="gantiWarnaSegitiga()">PILIH</button>
				</div>

				<!-- pilihan balok -->
				<div id="pilih-balok">
					<p>Luas Balok</p>
					<div id="balok"></div>
					<button id="tmbl-bal" onclick="gantiWarnaBalok()">PILIH</button>
				</div>
			</div>

			<!-- PERHITUNGAN -->
			<div class="bungkus-konten-perhitungan">

	<!-- ====================PERHITUNGAN LINGKARAN================== -->			
				<div class="bungkus-perhitungan-ling <?=isset($_POST['btn-lingkaran']) ? "lihat-data" : "" ?>">
					<div class="konten-perhitungan-ling">
						<form action="index.php" method="post">
							<div class="group">
							
								<input type="text" name="jari2" placeholder="Masukkan jari-jari">
							</div>
							<button id="btn-lingkaran" class="btn-lingkaran" name="btn-lingkaran">HITUNG</button>
						</form>
					</div>
					<div class="output-ling">
						<?php
							if(isset($_POST['btn-lingkaran'])){
								$jari2 = $_POST['jari2'];
								$phi = 3.14;
								$luas_lingkaran = $phi * $jari2 * $jari2;
								$keliling_lingkraran = $phi*($jari2 + $jari2);
								echo "<h2>RUMUS LUAS LINGKARAN : <br></h2> ";
								echo "<h2 style='color:red'> π x r x r <br></h2> ";
								echo "<h3>$phi x $jari2 x $jari2 <br></h3> ";
								echo "<h2>Luas : $luas_lingkaran <br></h2>";
								echo "<h2>Keliling : $keliling_lingkraran</h2>";
							}
						?>
					</div>
				</div>

<!-- =======================PERHITUNGAN SEGITIGA=================== -->			

				<div class="bungkus-perhitungan-seg <?=isset($_POST['btn-segitiga']) ? "lihat-data" : "" ?>">
					<div class="konten-perhitungan-seg">
						<form action="index.php" method="post">
							<div class="group">
								
								<input type="text" name="alas" placeholder="Masukkan alas">
								
								<input type="text" name="tinggi" placeholder="Masukkan tinggi">
							</div>
							<button id="btn-segitiga" class="btn-segitiga" name="btn-segitiga">HITUNG</button>
						</form>
					</div>
					<div class="output-seg">
						<?php
							if(isset($_POST['btn-segitiga'])){
							$alas= $_POST['alas'];
							$tinggi = $_POST['tinggi'];
							$luassegitiga = round(1/2*$alas*$tinggi,2);
							echo "<h2>RUMUS LUAS SEGITIGA SAMA KAKI : <br></h2> ";
							echo "<h2 style='color:red'> 1/2 x alas x tinggi <br></h2> ";
							echo"<h3>1/2 x $alas x $tinggi";
							echo"<h2>Luas Segitiga SK = ".$luassegitiga."<h2>";
							};
						?>
					</div>
				</div>

<!-- =======================PERHITUNGAN BALOK=================== -->	

				<div class="bungkus-perhitungan-bal <?=isset($_POST['btn-balok']) ? "lihat-data" : "" ?>">
					<div class="konten-perhitungan-bal">
						<form action="index.php" method="post">
							<div class="group">
								<input type="text" name="panjang" placeholder="Masukkan Panjang">
								<input type="text" name="lebar" placeholder="Masukkan Lebar">
								<input type="text" name="tinggi-balok" placeholder="Masukkan Tinggi">
							</div>
							<button id="btn-balok" class="btn-balok" name="btn-balok">HITUNG</button>
						</form>
					</div>
					<div class="output-bal">
						<?php
							if(isset($_POST['btn-balok'])){
							$panjang= $_POST['panjang'];
							$lebar = $_POST['lebar'];
							$tinggi = $_POST['tinggi-balok'];
							$luasb = round(2*(($panjang*$lebar)+($panjang*$tinggi)+($lebar*$tinggi)),2);
							
							
							echo "<h2>RUMUS LUAS BALOK : <br></h2> ";
							echo "<h2 style='color:red'> 2 (p.l + p.t + l.t)<br></h2> ";
							echo"<h3>2 ( $panjang * $lebar + $panjang * $tinggi + $lebar * $tinggi )";
					
							echo"<h2>LUAS BALOK = ".$luasb."<h2>";
							};
						?>
					</div>
				</div>

				<!-- ============================================================================= -->
			</div>
		</div>
	</div>
	<script>
		// JQuery
		$(document).ready(function() {
	        $('#tmbl-ling').click(function(){
	        	$('.bungkus-perhitungan-ling').toggleClass('lihat-data animated bounceInLeft');
	        	$('.bungkus-perhitungan-seg').removeClass('lihat-data');
	        	$('.bungkus-perhitungan-bal').removeClass('lihat-data');

	        });
	        $('#tmbl-seg').click(function(){
	        	$('.bungkus-perhitungan-seg').toggleClass('lihat-data animated zoomIn ');
	        	$('.bungkus-perhitungan-ling').removeClass('lihat-data');
	        	$('.bungkus-perhitungan-bal').removeClass('lihat-data');
	        });

	        $('#tmbl-bal').click(function(){
	        	$('.bungkus-perhitungan-bal').toggleClass('lihat-data animated bounceInRight');
	        	$('.bungkus-perhitungan-ling').removeClass('lihat-data');
	        	$('.bungkus-perhitungan-seg').removeClass('lihat-data');
	        	
	        });
	       
		});
		// JavaScript

		function gantiWarnaLingkaran(){
			document.getElementById("ling").style.background = "red";
			document.getElementById("segi").style.borderBottom = "150px solid black";
			document.getElementById("segi").style.borderLeft = "75px solid transparent";
			document.getElementById("segi").style.borderRIght = "75px solid transparent";
			document.getElementById("balok").style.background = "black";
		}
		function gantiWarnaSegitiga(){
			document.getElementById("ling").style.background = "black";
			document.getElementById("segi").style.borderBottom = "150px solid red";
			document.getElementById("segi").style.borderLeft = "75px solid transparent";
			document.getElementById("segi").style.borderRIght = "75px solid transparent";

			document.getElementById("balok").style.background = "black";
		}

		function gantiWarnaBalok(){
			document.getElementById("ling").style.background = "black";
			document.getElementById("segi").style.borderBottom = "150px solid black";
			document.getElementById("segi").style.borderLeft = "75px solid transparent";
			document.getElementById("segi").style.borderRIght = "75px solid transparent";
			document.getElementById("balok").style.background = "red";
		}


	</script>
</body>
</html>