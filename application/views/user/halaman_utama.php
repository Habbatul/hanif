<!DOCTYPE html>
<?php
if (isset($error)) {
	echo "<script>alert('" . $error . "');window.location.href='" . base_url() . "';</script>";
}
?>

<html lang="en" class="scroll-smooth overflow-x-hidden">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<meta charset="UTF-8" />
	<link rel="icon" type="image/svg+xml" href="asset/assets/favicon.63a26457.svg" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Han's 3D Website</title>

	<script type="module" crossorigin src="asset/asset/index.b34f6aec.js"></script>
	<script type="module" crossorigin src="asset/assets/index.e3b0d715.js"></script>
	<script src="asset/assets/cdn.js" defer></script>
	<link href="asset/asset/output.css" rel="stylesheet">

	<link rel="stylesheet" href="asset/asset/scroll.css">
	<script defer src="asset/asset/scroll.js"></script>

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@400;500&family=Inter:wght@300;400;500;600;700&family=Shadows+Into+Light&family=Kaushan+Script&display=swap" rel="stylesheet">
	<!-- penambahan font -->
	<link href="https://fonts.googleapis.com/css2?family=Nova+Flat&family=Nova+Script&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Maven+Pro&family=Prata&display=swap" rel="stylesheet">

	<style>
		#canvas2 {
			position: absolute;
			z-index: -1;
			overflow: hidden;
			margin: 0;
			background-color: #000000;
		}


		#form-container {
			position: relative;


		}

		[x-cloak] {
			display: none;
		}

		.duration-300 {
			transition-duration: 300ms;
		}

		.ease-out {
			transition-timing-function: cubic-bezier(0, 0, 0.2, 1);
		}

		.scale-90 {
			transform: scale(.9);
		}

		.scale-100 {
			transform: scale(1);
		}

		.bg-ini {
			background: black;
			/* atau background-size: 100% 100%; */
		}

		.bg-hero {
			background-color: rgba(0, 58, 60, 1);
			background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 1000'%3E%3Crect fill='%23003A3C' width='100' height='1000'/%3E%3Cg fill-opacity='0.87'%3E%3Ccircle fill='%23003A3C' cx='50' cy='0' r='50'/%3E%3Cg fill='%2300393b' %3E%3Ccircle cx='0' cy='50' r='50'/%3E%3Ccircle cx='100' cy='50' r='50'/%3E%3C/g%3E%3Ccircle fill='%2300383a' cx='50' cy='100' r='50'/%3E%3Cg fill='%23003638' %3E%3Ccircle cx='0' cy='150' r='50'/%3E%3Ccircle cx='100' cy='150' r='50'/%3E%3C/g%3E%3Ccircle fill='%23003537' cx='50' cy='200' r='50'/%3E%3Cg fill='%23003436' %3E%3Ccircle cx='0' cy='250' r='50'/%3E%3Ccircle cx='100' cy='250' r='50'/%3E%3C/g%3E%3Ccircle fill='%23003335' cx='50' cy='300' r='50'/%3E%3Cg fill='%23003233' %3E%3Ccircle cx='0' cy='350' r='50'/%3E%3Ccircle cx='100' cy='350' r='50'/%3E%3C/g%3E%3Ccircle fill='%23003132' cx='50' cy='400' r='50'/%3E%3Cg fill='%23002f31' %3E%3Ccircle cx='0' cy='450' r='50'/%3E%3Ccircle cx='100' cy='450' r='50'/%3E%3C/g%3E%3Ccircle fill='%23002e30' cx='50' cy='500' r='50'/%3E%3Cg fill='%23002d2f' %3E%3Ccircle cx='0' cy='550' r='50'/%3E%3Ccircle cx='100' cy='550' r='50'/%3E%3C/g%3E%3Ccircle fill='%23002c2d' cx='50' cy='600' r='50'/%3E%3Cg fill='%23002b2c' %3E%3Ccircle cx='0' cy='650' r='50'/%3E%3Ccircle cx='100' cy='650' r='50'/%3E%3C/g%3E%3Ccircle fill='%23002a2b' cx='50' cy='700' r='50'/%3E%3Cg fill='%2300292a' %3E%3Ccircle cx='0' cy='750' r='50'/%3E%3Ccircle cx='100' cy='750' r='50'/%3E%3C/g%3E%3Ccircle fill='%23002729' cx='50' cy='800' r='50'/%3E%3Cg fill='%23002627' %3E%3Ccircle cx='0' cy='850' r='50'/%3E%3Ccircle cx='100' cy='850' r='50'/%3E%3C/g%3E%3Ccircle fill='%23002526' cx='50' cy='900' r='50'/%3E%3Cg fill='%23002425' %3E%3Ccircle cx='0' cy='950' r='50'/%3E%3Ccircle cx='100' cy='950' r='50'/%3E%3C/g%3E%3Ccircle fill='%23002324' cx='50' cy='1000' r='50'/%3E%3C/g%3E%3C/svg%3E");
			/* atau background-size: 100% 100%; */

		}
	</style>
</head>

<body x-data="{ showCard:false, showFilter:false, filterKategori:'', 'showModal': false, 'showModalDel' : true, 'showModalDetail' : false, selectedValue: '',selectedValue2: '', todos: [],
	async fetchData() {
		try {
			const response = await fetch('http://localhost/hanif/api/portofolio', { method: 'post' });
			const data = await response.json();
			console.log(data);
			this.todos = data.data;
		} catch (error) {
			console.error(error);
		}
	},
	async init() {
		await this.fetchData();
   }, todoGambar:'', todoTitle:'',todoDescription:'',todoLink:'', todoTechStack:'', todoKategori:''
}" @keydown.escape="showModal = false" x-cloak style="overflow-x:hidden;" x-init="fetchData()">

	<div class="bg-hero">
		<!-- Awal -->
		<template x-if="showModalDetail">
			<template x-for="todo in todos.filter(item => item.id.toString() === selectedValue.toString())" :key="todo.id">
				<div x-init="todoGambar=todo.gambar;todoTitle=todo.title;todoDescription=todo.description;todoLink=todo.link;todoTechStack=todo.techStack,todoKategori=todo.kategori">
				</div>
			</template>
		</template>

		<!--nav bar -->
		<!-- <div x-show="showModal || showModalDel || showModalDetail">
		</div> -->

		<div x-data="{ isSmallScreen: window.innerWidth < 728, showMenu: false }" x-init="() => {
			function updateScreenSize() {
				isSmallScreen = window.innerWidth < 728;
			}
			window.addEventListener('resize', updateScreenSize);
		}">

			<div x-data="{ scrolled: false }" @scroll.window="scrolled = (window.pageYOffset > 0)">
				<nav @click.outside="showMenu=false" x-show="!(showModal || showModalDel || showModalDetail)" :class="{ 'bg-opacity-60 bg-gray-800 backdrop-filter backdrop-blur-lg fixed w-full z-50 pb-3 pt-3 md:pb-6 md:pt-6 shadow-[0_4px_10px_0.5px_rgba(0,0,0,0.5)] ease-in duration-500': scrolled, 
					'warna-navbar backdrop-filter backdrop-blur-lg fixed w-full z-50 pb-3 pt-3 md:pb-6 md:pt-6 ease-in duration-500': !scrolled }" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" x-transition:leave="ease-out duration-300">

					<a href="#" class="absolute ml-6 md:ml-[2rem] xl:ml-[3rem] mt-2 md:mt-1 font-Inter font-bold text-xl md:text-2xl text-white  hover:text-green-100 hover:cursor-pointer">HQHAN</a>
					<ul class="flex items-center justify-end mx-10 lg:mx-12 mt-1">

						<li x-show="!isSmallScreen" class="ml-4 font-Inter font-medium text-xl text-white"><a href="#hero">Profile</a></li>
						<li x-show="!isSmallScreen" class="ml-4 font-Inter font-medium text-xl text-white"><a href="#quotes">About</a></li>
						<li x-show="!isSmallScreen" class="ml-4 lg:mr-5 font-Inter font-medium text-xl text-white"><a a href="#project">Portofolio</a></li>


						<li>
							<button @click="showMenu = !showMenu" x-show="isSmallScreen" class="text-white focus:outline-none">
								<svg x-show="!showMenu" class="mt-[0.15rem] h-7 w-7 md:mt-0 md:w-8 md:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
								</svg>
							</button>
						</li>

						<ul x-show="showMenu" class="relative top-full right-0 pt-3 pb-2 px-4 max-w-[8rem] bg-opacity-10" x-transition:enter="ease-out duration-500" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100">
							<li class="mb-5 mt-[-0.5rem]"><a href="#hero" class="block font-Inter font-medium text-xl text-white hover:text-green-100">Profile</a></li>
							<li class="mb-5"><a href="#quotes" class="block font-Inter font-medium text-xl text-white hover:text-green-100">About</a></li>
							<li class="mb-5"><a href="#project" class="block lg:mr-5 font-Inter font-medium text-xl text-white hover:text-green-100">Porto</a></li>
							<li class="mb-[-1.3rem]">
								<button @click="showMenu = !showMenu" x-show="isSmallScreen" class="text-white focus:outline-none right-0">
									<svg x-show="showMenu" class="mb-3 mt-[0.15rem] h-7 w-7 md:mt-0 md:w-8 md:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
									</svg>
								</button>
							</li>
						</ul>



				</nav>
			</div>
		</div>
		<!--nav bar end -->

		<!-- ini adalah canvas three js sebagai hero section-->
		<canvas id="canvas" class="shadow-[0_4px_10px_0.5px_rgba(0,0,0,0.5)] rounded-3xl mt-[4.9rem] md:mt-[6.4rem]"></canvas>
		<!-- End-->


		<!-- ini adalah untuk halaman section terbaru untuk pengenalan dan sosmed -->
		<div class="md:mt-[4%] mt-[6%] flex flex-wrap justify-center w-full" id="hero" style="scroll-margin-top: 80px">
			<!-- ini adalah untuk pengenalan -->
			<div class="flex flex-col md:w-[50%] text-center xl:mr-16 w-[100%] relative">

				<div class="absolute inset-0 flex justify-center items-center">
					<img src="asset/astrotanganhanFinal2.webp" class="opacity-gradient h-auto max-h-full pointer-events-none">
				</div>

				<style>
					.opacity-gradient {
						mask-image: linear-gradientlinear-gradient(to bottom, rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.35), rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.25), rgba(0, 0, 0, 0.25), rgba(0, 0, 0, 0.25), rgba(0, 0, 0, 0.25), rgba(0, 0, 0, 0.1), transparent);
						-webkit-mask-image: linear-gradient(to bottom, rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.35), rgba(0, 0, 0, 0.35), rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.25), rgba(0, 0, 0, 0.25), rgba(0, 0, 0, 0.25), rgba(0, 0, 0, 0.25), rgba(0, 0, 0, 0.1), transparent);
					}
				</style>
				<p id="tulisan atas" class="xl:px-20 2xl5:px-28 px-14 star
				mt-5 
				md:text-[2.45rem] lg:leading-[5rem] lg:text-[3rem]  xl:text-[4.5rem] xl:leading-[5.6rem] 2xl:leading-[6.8rem] 2xl:text-[5.4rem] 2xl5:leading-[8rem] 2xl5:text-[6.7rem] text-[1.75rem]
				mx-[-3rem] md:mx-[-1.5rem] 2xl:mx-[-0.8rem]
				text-white"> <span class="font-Prata">Welcome </span><span class="font-Maven-Pro">to My </span><span class="font-Prata">Unique </span><span class="font-Maven-Pro">Porto </span><span class="font-Prata">Website</span> </p>

				<p class="font-Nova-Flat star
				2xl5:text-[1.3rem] 2xl5:leading-[1.7rem] 2xl:text-[1.05rem] xl:text-[0.9rem] lg:text-sm text-[0.6rem]
				md:px-14 2xl5:px-20 px-5
				text-white 
				2xl5:mt-36 2xl:mt-[6.6rem] xl:mt-20 md:mt-[10%] mt-10">
					My name is Han, and I enjoy exploring the world of 3D/2D visuals also i love about programming a software (website, desktop, mobile, games). I have been diving into 3D visuals and applying it to my web designs using Three.js, Tween.js, and Three Post Processing. I also have an interest in exploring game technologies, such as using Unity and Making random art with Blender. Additionally, I delve into Software and website creation (website is my main priority, especially BackEnd).
				</p>

				<p class="font-Nova-Flat star
				2xl5:text-[1.3rem] 2xl5:leading-[1.7rem] 2xl:text-[1.05rem] xl:text-[0.9rem] lg:text-sm text-[0.6rem]
				md:px-14 2xl5:px-20 px-4
				text-white 
				2xl5:mt-36 2xl:mt-[6.6rem] xl:mt-20 md:mt-[15%] mt-10">
					This website was created by me personally, and most of the photos here are the result of my own captures. Please help spread this URL to your friends who need website creation services. BTW, you can use the website asset in here because it's partial and can clone at my github repo's. This website is not support for the display more than 1440p aspect ratio.
				</p>



			</div>
			<!-- pengenalan selesai -->

			<!-- ini adalah untuk social card -->
			<div class="scrollAnimate flex flex-col justify-items-end items-end md:w-[42%] mt-[4.3rem] md:mt-1">
				<div class="my-auto">
					<img class=" w-[100%] lg:mr-[-1%] hover:cursor-pointer hover:blur-sm transition-all duration-300" src="SocialCard/github-card.php" alt="" @click="window.location.href ='https://github.com/Habbatul'">
					<img class=" w-[100%]  lg:mr-[-1%] hover:cursor-pointer hover:blur-sm transition-all duration-300 xl:my-[-2.4rem] 2xl:my-[-2.8rem] my-[-1.5rem]" src="SocialCard/linkedin-card.php" alt="" @click="window.location.href ='https://www.linkedin.com/in/habbatul/'">
					<img class=" w-[100%] lg:mr-[-1%] hover:cursor-pointer hover:blur-sm transition-all duration-300" src="SocialCard/instagram-card.php" alt="" @click="window.location.href ='https://www.instagram.com/hq.han/'">
				</div>
			</div>
			<!-- social card selesai -->
		</div>
		<!-- akhir untuk halaman section terbaru untuk pengenalan dan sosmed -->

		<!-- transisi antar pengenalan -->
		<div>
			<div class="bg-black w-full md:mt-[7%] mt-[16%] lg:mb-[9%] md:mb-[11%] mb-[16%] 2xl:py-20 lg:py-14 py-9 text-center">
				<p class="2xl5:text-[1.3rem] 2xl5:leading-[1.7rem] 2xl:text-[1.05rem] xl:text-[0.9rem] lg:text-sm md:leading-[1rem] text-[0.65rem] leading-[0.7rem]
				md:px-14 2xl5:px-20 px-6
				font-Nova-Script text-white">
					"Loneliness is the essential thing. One must be lonely, profoundly lonely, to develop all the idiosyncrasies, to understand oneself as well as others."</p>
			</div>
		</div>
		<!-- Pengenalan selesai -->


		<!--wis terlanjur dikasih section gaopo biar gampang nata position absolute -->
		<section class="max-w-full relative md:pb-[11rem] lg:pb-0 pb-[4rem]">

			<div class="scrollAnimate2 bg-white md:mt-20 mt-[2rem] 2xl:max-w-xs mb-5 md:max-w-[12rem] md:max-h-[1rem] lg:max-h-20 xl:max-w-[16rem] max-w-[8rem] max-h-[0.8rem]">&nbsp;</div>
			<div class="stackUsed md:ml-10 md:mt-2 lg:mt-8 2xl:max-w-xl 2xl5:text-[6rem] 2xl5:leading-[6.8rem] 2xl5:max-w-2xl
			text-[2rem] leading-[2.4rem] ml-4 max-w-[15rem] xl:font-thin font-thin
			2xl:text-[5rem] 2xl:leading-[6rem] xl:text-[4rem] xl:leading-[4.7rem] 
			xl:max-w-lg font-Inter text-white inline-block 2xl:mb-10 xl:mb-0
			md:text-[3.3rem] md:leading-[3.6rem] md:max-w-[24rem]">
				<span>I Have Many <br> Skill Including Developing

					<div id="animationContainer">
						<span id="animationText" class="absolute font-Inter"></span>
					</div>

					<script>
						const animationContainer = document.getElementById('animationContainer');
						const animationText = document.getElementById('animationText');

						const animationData = {
							text: ['Website', 'DesktopApp', 'Android', 'Game 3D/2D'],
							index: 0,
							charIndex: 0,
							isDeleting: false,
							typingDelay: 100,
							deletingDelay: 100,
							delayAfterString: 500,
							timer: null, // Menyimpan referensi timer
						};

						const clearTimer = () => {
							if (animationData.timer) {
								clearTimeout(animationData.timer);
								animationData.timer = null;
							}
						};

						const startTyping = () => {

							const currentText = animationData.text[animationData.index];
							const totalLength = currentText.length;

							if (animationData.isDeleting) {
								animationData.charIndex--;
							} else {
								animationData.charIndex++;
							}

							if (animationData.charIndex <= totalLength) {
								animationText.innerHTML = currentText.substring(0, animationData.charIndex) + (animationData.charIndex < totalLength ? '<span class=\'2xl:text-[4rem] xl:text-[3.2rem] 2xl5:text-[4.8rem] md:text-[2.6rem] text-[1.7rem] font-normal\'>|</span>' : '');
							} else {
								animationText.innerHTML = currentText.substring(0, totalLength);
							}

							if (animationData.charIndex === totalLength && !animationData.isDeleting) {
								animationData.isDeleting = true;
								animationData.timer = setTimeout(() => {
									animationData.status = true;
									startTyping();
								}, animationData.delayAfterString);
							} else if (animationData.charIndex === 0 && animationData.isDeleting) {
								animationData.isDeleting = false;
								animationData.index = (animationData.index + 1) % animationData.text.length;
								animationData.timer = setTimeout(() => {
									startTyping();
								}, animationData.typingDelay);
							} else {
								animationData.timer = setTimeout(() => {
									startTyping();
								}, animationData.isDeleting ? animationData.deletingDelay : animationData.typingDelay);
							}
						};

						const observerg = new IntersectionObserver(entries => {
							if (entries[0].isIntersecting) {
								clearTimer(); // Hentikan timer saat elemen terlihat
								startTyping();
							} else {
								clearTimer(); // Hentikan timer saat elemen tidak terlihat
								animationText.innerHTML = '';
							}
						});

						observerg.observe(animationContainer);
					</script>



				</span>
			</div>


			<!-- Button Login -->
			<div @click="showModal=true" class="gambar-han scrollAnimate absolute right-0 flex group hover:cursor-pointer 2xl:mr-[36.5rem] 2xl:mt-[-16.7rem] 
			md:mt-[6.7rem] md:mr-[34rem] xl:mr-[30rem] xl:mt-[-9rem] 2xl5:mt-[-21rem] 2xl5:mr-[46rem] lg:mt-[-6rem] lg:mr-[30rem]
			mt-[5.4rem] mr-[12.3rem]">
				<img class="2xl5:h-[20rem] 2xl:h-[16.5rem] xl:h-[13rem] md:h-[11rem] h-[8rem]
				pointer-events-none translate-y-[0.5rem] translate-x-[0.5rem] opacity-50 transition duration-500 group-hover:translate-x-0 group-hover:translate-y-0" src="asset/hanMid.png" />
				<img class="pointer-events-none translate-y-[-0.5rem] translate-x-[-0.5rem] absolute transition duration-500 group-hover:translate-x-0 group-hover:translate-y-0" src="asset/hanMid.png" />
			</div>


			<img class="max-w-full absolute 2xl:right-[-24rem] xl:right-[-16rem] inline-flex 
			2xl:mt-[-8rem] xl:mt-[-6rem] md:right-[-20rem] md:mt-[-7rem] md:h-[190%] 
			animate-spin-slow pointer-events-none xl:h-[240%] 2xl:h-[200%] 
			right-[-11rem] mt-[-13rem] h-[400%]" src="asset/TextMuter.svg" />

			<div class="scrollAnimate absolute biruTua xl:p-14 right-0 inline-block 2xl:pr-[3rem] 2xl:mt-[19rem] xl:mt-[15.8rem] xl:pb-14 2xl5:mt-[20rem]
			md:p-[1.3rem]  md:mt-[23rem] p-4 2xl5:pr-8 xl:pr-8 lg:pr-0 lg:mt-[14rem] pr-0 
			mt-[18rem] 
			shadow-[-6px_-6px_50px_0.05px_rgba(0,0,0,0.3)]">
				<h3 class="text-white font-Inter font-bold 2xl5:text-7xl 2xl:text-[3.8rem] xl:text-5xl md:pb-4  
				2xl5:max-w-xl 2xl:max-w-lg xl:max-w-sm 2xl5:mr-[15rem] xl:mr-[7rem] 2xl:mr-[8rem] leading-tight
				text-[1.4rem] max-w-[11rem] mr-[4rem]  pb-0
				md:text-[3rem] md:max-w-[18rem] md:mr-[18rem]">Stack yang dikuasai</h3>

				<div x-data="{ show: 1 }" x-init="setInterval(() => { show = show === 4 ? 1 : show + 1 }, 2800)">
					<p x-transition:enter="ease-out duration-500" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-show="show === 1" class="text-white lg:pt-4 md:pt-[0rem]  2xl5:text-[2.5rem] 2xl:text-[2rem] 
					xl:text-[1.5rem] md:text-[1.7rem] mt-5 font-IBM-Plex-Sans text-[0.8rem]">SpringBoot, Java, JavaFX, Android</p>

					<p x-transition:enter="ease-out duration-500" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-show="show === 2" class="text-white lg:pt-4 md:pt-[0rem]  2xl5:text-[2.5rem] 2xl:text-[2rem] 
					xl:text-[1.5rem] md:text-[1.7rem] mt-5 font-IBM-Plex-Sans text-[0.8rem]">AlpineJS, Tailwind, Laravel, Livewire</p>

					<p x-transition:enter="ease-out duration-500" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-show="show === 3" class="text-white lg:pt-4 md:pt-[0rem]  2xl5:text-[2.5rem] 2xl:text-[2rem] 
					xl:text-[1.5rem] md:text-[1.7rem] mt-5 font-IBM-Plex-Sans text-[0.8rem]">Unity 3D, Blender, ThreeJS, TweenJS</p>

					<p x-transition:enter="ease-out duration-500" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-show="show === 4" class="text-white lg:pt-4 md:pt-[0rem] 2xl5:text-[2.5rem] 2xl:text-[2rem] xl:text-[1.5rem]
					md:text-[1.7rem] mt-5 font-IBM-Plex-Sans text-[0.8rem]">Javascript, CSS, HTML, PHP, Codeigniter</p>
				</div>

			</div>


		</section>




		<!-- Ini Modal untuk Login -->
		<section class="flex flex-wrap p-4 h-full items-center mb-32 justify-center">
			<!--Overlay-->
			<div class="overflow-auto" style="background-color: rgba(0,0,0,0.5);backdrop-filter: blur(3px);" x-show="showModal" :class="{ 'fixed backdrop-blur-sm inset-0 z-10 flex items-center justify-center': showModal }">
				<!--Dialog-->
				<div class="border-black border-solid border-8 bg-hqhan w-11/12 md:max-w-md mx-auto rounded shadow-lg py-4 text-left px-6" x-show="showModal" @click.away="showModal = false" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100">

					<!--Title-->
					<div class="flex justify-between items-center pb-3">
						<p class="text-2xl font-bold">Login</p>
						<div class="cursor-pointer z-50" @click="showModal = false">
							<svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
								<path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
							</svg>

						</div>
					</div>

					<!-- content -->
					<form action="admin/process_login" method="post">
						<div class="text-center mt-4">
							<ul class="pb-5">
								<li><label class="text-xl font-bold text-gray-950 font-Inter">Username : </label></li>
								<li><input type="text" name="username" class="font-Inter font-medium p-2 border-2 border-white rounded-lg bg-gray-100 text-md focus:outline-none focus:border-black focus:ring-black "></li>
							</ul>
							<ul class="pb-5">
								<li><label class="text-xl font-bold text-gray-950 font-Inter">Password : </label></li>
								<li><input type="password" name="password" class="font-Inter font-semibold p-2 border-2 border-white rounded-lg bg-gray-100 text-md focus:outline-none focus:border-black focus:ring-black "></li>
							</ul>
						</div>


						<!--Footer-->
						<div class="flex justify-center pt-2 pb-5">
							<button class="modal-close px-4 bg-black p-3 rounded-lg text-white hover:bg-emerald-950" name="updateItem">Login</button>
						</div>
					</form>


				</div>
				<!--/Dialog -->
			</div><!-- /Overlay -->

		</section>
		<!--  Modal untuk login selesai -->


		<!-- Untuk dihapus nanti -->
		<!-- Ini Modal untuk hapus -->
		<section class="flex flex-wrap p-4 h-full items-center">
			<!--Overlay-->
			<div class="overflow-auto" style="background-color: rgba(0,0,0,0.5);backdrop-filter: blur(3px);" x-show="showModalDel" :class="{ 'fixed inset-0 z-10 flex items-center justify-center': showModalDel }">
				<!--Dialog-->
				<div class="bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg py-4 text-left px-6" x-show="showModalDel" @click.away="showModalDel = false" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100">
					<!--Title-->
					<h1 class="text-center text-2xl mb-5 font-bold">Pesan Maintenance</h1>
					<div>
						<p class="text-justify text-xl">Tekan Ctrl+Shift+R atau hapus cache halaman ini secara manual !!! Hapus Cache secara berkala pada website ini untuk mendapatkan tampilan terupdate.
							Peringatan ini akan muncul selama masa Maintenance, silahkan menikmati website saya.<br><br>Tekan Tombol dibawah ini bila sudah. hard reset website (hapus cache)
						</p>
					</div>
					<div class="flex justify-center items-center">
						<button @click="showModalDel=false" class="bg-black mt-8 text-white p-3 px-5 rounded-lg hover:bg-red-600">Siap</button>
					</div>
				</div>
				<!--/Dialog -->
			</div><!-- /Overlay -->

		</section>

		<!-- Modal untuk hapus Selesai -->
		


		<!-- modal detail -->
		<!-- Letakkan modal di luar konten utama -->
		<div class="fixed top-0 left-0 w-full h-full flex justify-center md:items-start items-center overflow-y-auto z-50 pt-5 pb-5" style="background-color: rgba(0,0,0,0.5);backdrop-filter: blur(5px);" x-show="showModalDetail">
			<!--Dialog Wrapper-->
			<div class="bg-hqhan w-11/12 md:max-w-[40rem] max-w-md mx-auto rounded shadow-lg py-4 text-left px-6 my-auto" x-show="showModalDetail" @click.away="showModalDetail = false" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100">
				<!--Title-->
				<div class="flex justify-between items-center pb-5">
					<p class="text-2xl font-bold" x-text="'Detail'"></p>
					<div class="cursor-pointer" @click="showModalDetail = false">
						<svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
							<path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
						</svg>
					</div>
				</div>

				<!-- content -->
				<div class="flex flex-col justify-center items-center">
					<div class="flex">
						<a :href="todoLink" target="_blank">
							<img :src="'upload/' + todoGambar" :alt="todoGambar" class="transition-all duration-125 hover:cursor-pointer hover:brightness-50 w-full max-w-lg h-[28rem] md:max-h-full max-h-[18.5rem] object-cover shadow-[0_4px_10px_0.5px_rgba(0,0,0,0.5)] rounded-md">
						</a>
					</div>
					<div class="flex justify-center pt-1">
						<a :href="todoLink" target="_blank">
							<h3 class="transition-all duration-125 pt-5 text-2xl pb-4 md:text-5xl md:pb-6 md:pt-7 font-Shadows-Into-Light font-extrabold hover:text-red-600 cursor-pointer" x-text="todoTitle"></h3>
						</a>
					</div>
					<div class="flex flex-wrap">
						<div class="hijauTua rounded-lg p-5 pt-4 md:pt-5">
							<!-- <p class="text-base md:text-2xl text-white font-Inter font-bold mb-2 md:mb-3 w-full text-center">Deskripsi</p> -->
							<p class=" text-white text-justify text-xs md:text-xl" x-text="todoDescription"></p>
						</div>
						<div class="bg-black rounded-lg w-full p-3 md:p-5 mt-3">
							<div class="flex flex-wrap justify-center leading-3 text-justify">
								<div><span class="text-xs md:text-lg text-red-600 font-Inter font-bold">Tech Stack :&NonBreakingSpace;</span><span class=" text-white text-justify text-xs md:text-lg" x-text="todoTechStack"></span></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>


	</div>

	<!-- Quotes dan tombol di section ini -->

	<!--
	<img src="asset/NTesla.svg" width="400" class="pointer-events-none ml-20">
	<img src="asset/TeslaQuotes.svg" class="pointer-events-none ml-32 mt-20" width="900">

	<img src="asset/WWhite.svg" width="400" class="pointer-events-none ml-20">
	<img src="asset/WaltQuotes.svg" class="pointer-events-none ml-32 mt-20" width="900">-->

	<div id="quotes" class="flex justify-center bg-ini 2xl5:pt-40 2xl5:pb-[26rem] 2xl:pt-32 2xl:pb-60 lg:pt-32 lg:pb-40 md:pt-[10rem] md:pb-[1.2rem] pt-28 pb-14">

		<div class="flex flex-wrap justify-center">
			<div class="absolute">
				<div class="flex flex-wrap justify-center items-center">
					<img src="asset/astrohan2.webp" class="scrollAstro 2xl5:h-[46rem] 2xl:h-[37rem] xl:h-[27rem] lg:h-[25rem] h-64 md:h-[24rem] pointer-events-none">
					<div class="lg:w-[40%] md:w-[50%] lg:mt-[-6rem]">
						<p class="font-Inter star md:text-justify text-center
							2xl5:text-[1.3rem] 2xl5:leading-[1.7rem] 2xl:text-[1.05rem] xl:text-[0.9rem] lg:text-sm md:text-[0.8rem] text-[0.6rem]
							md:ml-5 lg:px-14 2xl5:px-20 px-5
							text-white 
							2xl5:mt-36 2xl:mt-[6.6rem] xl:mt-20 md:mt-[10%] mt-5">
							Tech stack yang digunakan dalam pembuatan portofolio ini mencakup lingkungan MVC dengan framework CodeIgniter untuk bagian backend; menggunakan Tailwind CSS dan Alpine.js sebagai framework frontend; Three.js dan Three-post-processing (pmndr), serta Tween.js digunakan untuk implementasi elemen 3D pada kanvas; Cropper.js digunakan untuk fitur pemotongan gambar; beberapa fitur juga mengandalkan pengembangan menggunakan PHP, JavaScript, dan CSS native.

						</p>
					</div>
				</div>

				<!-- <div class="flex flex-wrap justify-center">
                    <img  x-show="show1" src="asset/NTesla.svg" class="pointer-events-none 2xl:h-[27rem] lg:h-80 h-48 md:h-[20rem]" 
                        x-transition:enter="ease-out duration-500" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                        x-transition:leave="ease-out duration-500" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">

                    <img x-show="show1" src="asset/TeslaQuotes.svg" class="pointer-events-none 2xl:ml-[6rem] 2xl:mt-48 2xl:h-[7.3rem] xl:h-[6rem] h-[1.8rem] mt-5 lg:mt-32 ml-5 lg:ml-10 md:h-[4rem] md:mt-[3rem] w-full lg:w-6/12"
                        x-transition:enter="ease-out duration-500" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                        x-transition:leave="ease-out duration-500" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">


                    <img x-show="show2" src="asset/WWhite.svg" class=" pointer-events-none 2xl:h-[27rem] lg:h-80 h-48 md:h-[20rem]"
                        x-transition:enter="ease-out duration-500" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                        x-transition:leave="ease-out duration-500" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">

                    <img x-show="show2" src="asset/WaltQuotes.svg" class="pointer-events-none 2xl:ml-[6rem] 2xl:mt-48 2xl:h-[6rem] xl:h-[4rem] h-[1.8rem] mt-5 lg:mt-32 ml-5 lg:ml-10 md:h-[4rem] md:mt-[3rem] w-full lg:w-6/12"
                        x-transition:enter="ease-out duration-500" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                        x-transition:leave="ease-out duration-500" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"> 
                    </div> -->
			</div>
		</div>
		<div class="flex -z-40 relative 2xl:h-[27rem] lg:h-80 md:h-[27rem] md:mt mx-w-[0px] h-[25rem] mt-5 ">&nbsp;</div>
	</div>




	<!-- Quotes end-->


	<!-- kelompok card -->
	<div id="project" style="scroll-margin-top: 80px" class="latarSVG shadow-[0px_-30px_30px_-10px_rgba(0,0,0,0.8)_inset] shadow-black">
		<div class="flex flex-wrap justify-center lg:pt-24 pt-12 md:pt-20 xl:pb-32 pb-20 " style="background-size:100% 100%; background-repeat: no-repeat;">
			<div class="star flex  md:mb-16 xl:mb-20 h-14 lg:mb-20 mb-16">
				<h1 class="font-Kaushan-Script font-extrabold 2xl:text-6xl xl:text-6xl md:text-6xl text-[2.7rem] text-4xl bg-gradient-to-r from-[rgba(0,247,255,0.71)] to-[#007067] text-transparent bg-clip-text
			w-[19rem] h-[98px] md:w-[33.5rem] md:h-[80px] text-center">My Portofolio Project</h1>
			</div>
			<div class="w-full"></div>

			<!-- Filter bar -->

			<div class="md:mb-16 xl:mb-20 lg:mb-20 mb-10 flex flex-col justify-center items-center w-full star">
				<!-- tombol filter -->
				<button @click="showFilter = !showFilter;showCard= !showCard;" class="transition-all duration-300 text-base hover:bg-emerald-300 hover:shadow-[0_0px_30px_0.1px_rgba(0,0,0,0.2)]  hover:shadow-emerald-400 hover:text-white mb-5 md:text-xl font-Nova-Flat font-semibold bg-teal-400 bg-opacity-30 text-white px-4 py-2 rounded-md">
					<span x-show="showFilter">Tutup Filter Project</span>
					<span x-show="!showFilter">Tampilkan Filter Project</span>
				</button>


				<!-- filter data agar kategori unique (hanya satu kategori yang sama) -->
				<div x-show="showFilter" class="w-full flex flex-wrap items-center justify-center" x-data="{ filterKategory:'',
			getUniqueCategories() {
				const categories = this.todos.flatMap(todo => todo.kategori.split(','));
				const uniqueCategories = [...new Set(categories.map(category => category.trim()))];
				const nonEmptyCategories = uniqueCategories.filter(category => category !== ''); // disini filter jangan sampe ada yang bernilai array kosong
				return nonEmptyCategories;
			}
			}" x-transition:enter="ease-out duration-500" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100">
					<!-- x-transition:leave="ease-out duration-500" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"> -->

					<div class=" mx-7 bg-teal-400 bg-opacity-10 shadow-[0_4px_10px_0.5px_rgba(0,0,0,0.5)] p-6 rounded-lg flex flex-wrap items-center justify-center w-[30rem]"> <!--@click.away=""-->
						<a class="text-sm md:text-base rounded-lg mx-1 my-1 p-3 cursor-pointer hijauTua text-white hover:bg-emerald-600 hover:brightness-150 hover:shadow-[0_0px_35px_0.1px_rgba(0,0,0,0.2)]  hover:shadow-emerald-400" :class="{ 'bg-emerald-600': filterKategori === '' }" @click="filterKategori = ''; selectedCategory = '';">
							<span x-text="'All Categories'" class="font-Inter pointer-events-none"></span>
						</a>
						<template x-for="(category, index) in getUniqueCategories()" :key="index">
							<a class="text-sm md:text-base rounded-lg mx-1 my-1 p-3 cursor-pointer hijauTua text-white hover:bg-emerald-600 hover:brightness-150 hover:shadow-[0_0px_35px_0.1px_rgba(0,0,0,0.2)]  hover:shadow-emerald-400" :class="{ 'bg-emerald-600': filterKategori === category }" @click="filterKategori = category; selectedCategory = category;">
								<span x-text="category" class="  font-Inter pointer-events-none "></span>
							</a>
						</template>

					</div>
				</div>

			</div>




			<!-- card container -->
			<div x-init="init()" class="star lg:mx-36 3xl:mx-72 2xl:mx-10 md:mx-10 flex flex-wrap justify-center">

				<template x-for="(todo, index) in todos.filter(item => item.kategori.includes(filterKategori))" :key="index">

					<div @click="showModalDetail= true" x-on:click="selectedValue = todo.id" class="2xl5:w-[24.5rem] 2xl:w-[21.5rem] xl:w-[24.5rem] lg:mb-24 mb-10 mx-10 2xl:mx-10 xl:mx-10 overflow-hidden rounded-xl bg-hqhan w-[18rem] md:w-[24rem] max-h-sm shadow-[0_2px_10px_1px_rgba(0,0,0,0.5)] hover:opacity-80 hover:cursor-pointer">
						<img :src="'upload/' + todo.gambar" :alt="todo.gambar" class="pointer-events-none mx-auto mt-8  md:rounded-xl w-[320px] h-[240px] 2xl:w-[280px] 2xl:h-[240px] 2xl5:w-[320px] 2xl5:h-[240px] object-cover" />
						<div class="py-5 md:px-7 px-4 ">
							<h3 x-text="todo.title" class="text-center mb-3 text-green-950 font-bold text-xl"></h3>
							<div class="hijauTua rounded-lg">
								<p x-html="(todo.description.length > 140) ? todo.description.slice(0, 140) + '<span class=\'font-bold\'>... Klik Selengkapnya</span>' : todo.description" class="md:min-h-[6rem] min-h-[5rem] text-white py-3 px-4 leading-tight font-normal text-xs md:text-sm text-secondary text-justify">
								</p>
							</div>
						</div>
					</div>

				</template>

			</div>
		</div>
	</div>

	<!-- akhir kelompok card -->

	<!-- Nanti dulu ini
<div x-init="init()">
<table class="border-collapse border border-teal-500 w-3/5 m-auto mt-4 mb-4 rounded">
        <thead>
            <tr class="border-collapse border-4 border-teal-500">
                <th class="border-collapse border-4 border-teal-500 p-3 font-bold uppercase bg-blue-200 text-gray-600 lg:table-cell">ID</th>
                <th class="border-collapse border-4 border-teal-500 p-3 font-bold uppercase bg-blue-200 text-gray-600 lg:table-cell">Todolist</th>
                <th class="border-collapse border-4 border-teal-500 p-3 font-bold uppercase bg-blue-200 text-gray-600 lg:table-cell">pilihan</th>
            </tr>
        </thead>

        <tbody>

		<template x-for="(todo, index) in todos" :key="index">
				<tr>
					<td x-text="todo.id" class="p-3 border-collapse border-2 border-teal-200 lg:table-cell"></td>
            		<td   x-text="todo.title" class="p-3 border-collapse border-2 border-teal-200 lg:table-cell"></td>
					<td class="p-3 border-collapse border-2 border-teal-200 lg:table-cell text-center"> 
                   		<button type="submit" class="m-2 mb-2 bg-transparent border border-gray-500 hover:border-indigo-500 text-gray-500 hover:text-indigo-500 font-bold py-2 px-4 rounded-full" @click="showModalDel= true" x-on:click="selectedValue = todo.id">Hapus</button>
                    	<button type="button" class="m-2 bg-transparent border border-gray-500 hover:border-indigo-500 text-gray-500 hover:text-indigo-500 font-bold py-2 px-4 rounded-full" @click="showModal = true" x-on:click="selectedValue = todo.ID, selectedValue2 = todo.judul">Ubah</button>
                	</td>
				</tr>
			</template>

		</tbody>

    </table>
	</div>

untuk akhir seluruh section  -->

	</div>
	<!-- form animasi  -->
	<form id="form-container" action="Welcome/submitForm" method="post" class="flex md:justify-center justify-end md:items-start items-center flex-col">
		<canvas id="canvas2"></canvas>
		<div class="2xl:min-h-[30rem] 2xl:max-h-[30rem] 2xl:min-w-[28rem] 2xl:max-w-[28rem]
				xl:min-h-[27rem] xl:max-h-[27rem] xl:min-w-[25rem] xl:max-w-[25rem]
				lg:min-h-[21rem] lg:max-h-[21rem] lg:min-w-[23rem] lg:max-w-[23rem]
				md:min-h-[21rem] md:max-h-[21rem] md:min-w-[19rem] md:max-w-[19rem]
				min-h-[23rem] max-h-[23rem] min-w-[18rem] max-w-[18rem]
		 bg-blue-500 p-4 sm:p-8 rounded-xl md:ml-14 lg:ml-36 xl:ml-44 2xl:ml-72 md:mb-0 sm:mb-20 mb-14" style="background-color: rgba(3, 101, 130, 0.5);backdrop-filter: blur(4px);">
			<h1 class="text-white text-center font-Shadows-Into-Light text-xl md:text-xl lg:text-2xl xl:text-4xl font-bold">Send Me a Message</h1>
			<div class="mt-6">

				<ul class="text-center">
					<li><input id="inputNama" name="nama" type="text" class="w-full rounded-2xl p-2 md:p-1 lg:p-1 xl:p-3 text-center font-IBM-Plex-Sans text-white 
			2xl:text-3xl xl:text-xl mt-2 xl:mt-4 lg:mt-2 lg:text-xl text-xl
			focus:shadow-[0_0_30px_-3px_rgba(0,0,0,0.3)] focus:shadow-teal-400 border-blue-500 border-opacity-0 border-2 focus:border-teal-400 focus:border-2 focus:outline-none" style="background-color: rgba(0, 0, 0, 0.5);backdrop-filter: blur(2px);" placeholder="Nama" /></li>

					<li><input id="inputEmail" name="email" type="text" class="w-full rounded-2xl p-2 md:p-1 lg:p-1 xl:p-3 text-center text-white 
			2xl:text-3xl xl:text-xl mt-2 xl:mt-4 lg:mt-2 lg:text-xl text-xl
			focus:shadow-[0_0_30px_-3px_rgba(0,0,0,0.3)] focus:shadow-teal-400 border-blue-500 border-opacity-0 border-2 focus:border-teal-400 focus:border-2 focus:outline-none" style="background-color: rgba(0, 0, 0, 0.5);backdrop-filter: blur(2px);" placeholder="Email" /></li>

					<li><textarea id="inputPesan" name="message" class="resize-none w-full rounded-2xl p-2 md:p-1 lg:p-1 xl:p-3 text-center text-white 
			2xl:text-3xl xl:text-xl mt-2 xl:mt-4 lg:mt-2 lg:text-xl text-xl
			focus:shadow-[0_0_30px_-3px_rgba(0,0,0,0.3)] focus:shadow-teal-400 border-blue-500 border-opacity-0 border-2 focus:border-teal-400 focus:border-2 focus:outline-none" style="background-color: rgba(0, 0, 0, 0.5);backdrop-filter: blur(2px);" placeholder="Pesan"></textarea></li>
				</ul>

				<div class="text-center mt-2 xl:mt-4 lg:mt-2">
					<button class="modal-close px-8 bg-black p-3 pb-4 rounded-lg text-white hover:bg-white hover:text-black 2xl:text-3xl xl:text-xl lg:text-lg text-lg
		hover:shadow-[0_0_30px_-3px_rgba(0,0,0,0.3)] hover:shadow-teal-400 hover:border-teal-400 hover:border-2 hover:outline-none"" name=" kirim">Send</button>
				</div>
			</div>
		</div>

	</form>


	<footer class="bg-black lg:pb-24 lg:pt-24 md:pb-20 md:pt-14 pb-20 pt-10">
		<div class="lg:flex justify-center mx-5 lg:ml-1 ml-16 md:ml-20">


			<div class="flex-wrap justify-center lg:mr-20 mb-7 lg:mb-1 md:mb-5 pb-2 ">
				<h2 class="text-xl font-bold text-white mb-3">Habbatul Qolbi H</h2>
				<p class="text-base text-gray-400">&copy; 2023 Habbatul Qolbi H. All rights reserved.</p>
				<p class="text-base text-gray-400">Kalinegoro, Mertoyudan, Magelang, Jawa Tengah, Indonesia.</p>
			</div>

			<!-- Kontak -->
			<div class="flex-wrap lg:mr-20 lg:mb-1 md:mb-5 mb-8 md:mr-10">
				<h3 class="text-lg font-medium text-white">MyProject</h3>
				<ul>
					<li><a href="https://github.com/Habbatul" class="text-gray-300 hover:text-white">GitHub</a></li>
				</ul>
			</div>

			<!-- Kontak -->
			<div class="flex-wrap lg:mr-20 lg:mb-1 md:mb-5 mb-8 md:mr-10">
				<h3 class="text-lg font-medium text-white">Kontak</h3>
				<ul>
					<li><a href="#" class="text-gray-300 hover:text-white">Email</a></li>
					<li><a href="#" class="text-gray-300 hover:text-white">Telepon</a></li>
					<li><a href="#" class="text-gray-300 hover:text-white">Alamat</a></li>
				</ul>
			</div>

			<!-- Sosial Media -->
			<div class="flex-wrap">
				<h3 class="text-lg font-medium text-white">Sosial Media</h3>
				<ul>
					<li><a href="https://instagram.com/hq.han?igshid=ZGUzMzM3NWJiOQ==" class="text-gray-300 hover:text-white">Instagram</a></li>
					<li><a href="https://instagram.com/hq.han?igshid=ZGUzMzM3NWJiOQ==" class="text-gray-300 hover:text-white">Facebook</a></li>
				</ul>
			</div>

		</div>
	</footer>


</body>

</html>