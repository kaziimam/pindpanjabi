<?php 
	if ($this->session->userdata('user') == "Admin") {
		$is_admin = true;
	}elseif($this->session->userdata('user') == "User"){
		$is_admin = false;
	}
 ?>

	<!DOCTYPE html>
	<html>
	<meta name="robots" content="noindex,nofollow" />
    <link rel="shortcut icon" href="<?php echo base_url().'assest/images/favicon.png'?>" type="image/x-icon" />

	<meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PindPunjabiDhaba | Home</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Norican&family=Questrial&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo base_url('/assest/vendor/bootstrap-4.6.1-dist/css/bootstrap.min.css');?>" />
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
    <link rel="stylesheet" href="<?php echo base_url('/assest/css/style.css')?>" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<head>
			<style>
		#loader {
			transition: all .3s ease-in-out;
			opacity: 1;
			visibility: visible;
			position: fixed;
			height: 100vh;
			width: 100%;
			background: #fff;
			z-index: 90000
		}

		#loader.fadeOut {
			opacity: 0;
			visibility: hidden

		}
		.spinner {
			width: 40px;
			height: 40px;
			position: absolute;
			top: calc(50% - 20px);
			left: calc(50% - 20px);
			background-color: #333;
			border-radius: 100%;
			-webkit-animation: sk-scaleout 1s infinite ease-in-out;
			animation: sk-scaleout 1s infinite ease-in-out
		}

		@-webkit-keyframes sk-scaleout {
			0% {
				-webkit-transform: scale(0)
			}

			100% {
				-webkit-transform: scale(1);
				opacity: 0
			}
		}

		@keyframes sk-scaleout {
			0% {
				-webkit-transform: scale(0);
				transform: scale(0)
			}

			100% {
				-webkit-transform: scale(1);
				transform: scale(1);
				opacity: 0
			}
		}

	</style>
</head>

<body class="app">
	<div id="loader">
		<div class="spinner"></div>
	</div>
	<script type="text/javascript">
		window.addEventListener('load', () => {
			const loader = document.getElementById('loader');
			setTimeout(() => {
				loader.classList.add('fadeOut');
			}, 300);
		});

	</script>
