<!DOCTYPE html>

<html lang="en" class="scroll-smooth overflow-x-hidden">
<head >
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

	<meta charset="UTF-8" />
	<link rel="icon" type="image/svg+xml" href="asset/assets/favicon.63a26457.svg" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Han's 3D Website</title>

    <script type="module" crossorigin src="asset/assets/index.725a3ebe.js"></script>
    <script src="asset/assets/cdn.js" defer></script>
	<link href="asset/asset/output.css" rel="stylesheet">

	<link rel="stylesheet" href="asset/asset/scroll.css">
	<script defer src= "asset/asset/scroll.js"></script>
	
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@400;500&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

	<style>
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
		
    </style>
</head>
<body>

<div x-if="showModal">
		<!-- Isi dari modal di sini -->
	</div>
	
	<div x-if="!showModal" x-data="{ isSmallScreen: window.innerWidth < 728, showMenu: false }" 
		x-init="() => {
			function updateScreenSize() {
				isSmallScreen = window.innerWidth < 728;
			}
			window.addEventListener('resize', updateScreenSize);
		}">

		<div x-data="{ scrolled: false }" @scroll.window="scrolled = (window.pageYOffset > 0)">
			<nav @click.outside="showMenu=false" x-show="!showModal" :class="{ 'bg-opacity-60 bg-gray-800 backdrop-filter backdrop-blur-lg fixed w-full z-50 pb-6 pt-6 shadow-[0_4px_10px_0.5px_rgba(0,0,0,0.5)] ease-in duration-500': scrolled, 
					'warna-navbar backdrop-filter backdrop-blur-lg fixed w-full z-50 pb-6 pt-6 ease-in duration-500': !scrolled }"
					x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" 
					x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" x-transition:leave="ease-out duration-300">

					<a href="#" class="absolute ml-6 md:ml-[2rem] xl:ml-[3rem] mt-1 font-Inter font-bold text-2xl text-white  hover:text-green-100 hover:cursor-pointer">LOGOUT</a>
				<ul class="flex items-center justify-end mx-10 lg:mx-12 mt-1">
					
						<li x-show="!isSmallScreen" class="ml-4 font-Inter font-medium text-xl text-white"><a href="#canvas">Profile</a></li>
						<li x-show="!isSmallScreen" class="ml-4 font-Inter font-medium text-xl text-white"><a href="#quotes">Quotes</a></li>
						<li x-show="!isSmallScreen" class="ml-4 lg:mr-5 font-Inter font-medium text-xl text-white"><a a href="#project">Portofolio</a></li>

				
					<li>
				<button @click="showMenu = !showMenu" x-show="isSmallScreen" class="text-white focus:outline-none">
					<svg x-show="!showMenu" class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
					  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
					</svg>
				  </button>
				</li>
		
				<ul x-show="showMenu" class="relative top-full right-0 pt-3 pb-2 px-4 max-w-[8rem] bg-opacity-10" x-transition:enter="ease-out duration-500" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" >
					<li class="mb-5 mt-[-0.5rem]"><a href="#canvas" class="block font-Inter font-medium text-xl text-white hover:text-green-100">Profile</a></li>
					<li class="mb-5"><a href="#quotes" class="block font-Inter font-medium text-xl text-white hover:text-green-100">Quotes</a></li>
					<li class="mb-5"><a href="#project" class="block lg:mr-5 font-Inter font-medium text-xl text-white hover:text-green-100">Porto</a></li>
					<li class="mb-[-1.3rem]">
						<button @click="showMenu = !showMenu" x-show="isSmallScreen" class="text-white focus:outline-none right-0">
							<svg x-show="showMenu" class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
							  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
							</svg>
						  </button>
					</li>
				  </ul>
			  
		

			</nav>
		</div>
	</div>

</body>
</html>
