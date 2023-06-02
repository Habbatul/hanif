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

<body x-data="{ 'showModal': false, 'showModalDel' : false, selectedValue: '',selectedValue2: '', todos: [],
	fetchData() {
     fetch('http://localhost/hanif/api/portofolio', {method:'get'})
       .then(response => response.json())
       .then(data => {
         console.log(data);
         this.todos = data.result;
       })
       .catch(error => console.error(error));
   },
   init() {
       this.fetchData();
   }
}" @keydown.escape="showModal = false" x-cloak class="warna-heroSect" >
   <!-- Awal -->

	<!--nav bar -->

	<!--nav bar end -->

	<!-- ini adalah canvas three js sebagai hero section-->
		<canvas id="canvas" class="shadow-[0_4px_10px_0.5px_rgba(0,0,0,0.5)] rounded-3xl" style="margin-top: 6.4rem;scroll-margin-top: 80px"></canvas>
	<!-- End-->

	<!--wis terlanjur dikasih section gaopo biar gampang nata position absolute -->
	<section class="max-w-full relative md:pb-[11rem] lg:pb-0 pb-[4rem]">

	<div class="scrollAnimate2 bg-white md:mt-20 mt-[2rem] 2xl:max-w-xs mb-5 md:max-w-[12rem] md:max-h-[1rem] lg:max-h-20 xl:max-w-[16rem] max-w-[8rem] max-h-[0.8rem]">&nbsp;</div>
		<div class="stackUsed md:ml-10 md:mt-2 lg:mt-8 2xl:max-w-xl 2xl5:text-[6rem] 2xl5:leading-[6.5rem] 2xl5:max-w-2xl
		text-[2rem] leading-[2.4rem] ml-4 max-w-[15rem]
		 2xl:text-[5rem] 2xl:leading-[5.5rem] xl:text-[4rem] xl:leading-[4.3rem] 
		 xl:max-w-lg font-Inter text-white inline-block 2xl:mb-20 xl:mb-0
		 md:text-[3.3rem] md:leading-[3.6rem] md:max-w-[24rem]">
			<span>Web Portofolio ini dibangun menggunakan 

				<div x-data="{ 
					text: ['AlpineJS', 'TailwindCSS', 'ThreeJS', 'Koneksi.php'],
					index: 0,
					charIndex: 0,
					isDeleting: false,
					typingDelay: 100,
					deletingDelay: 50,
				  }">
					<span x-text="text[index].substring(0, charIndex) + ' |' " x-init="
					  setInterval(() => {
						if (isDeleting) {
						  charIndex--;
						  if (charIndex === 0) {
							isDeleting = false;
							index = (index + 1) % text.length;
						  }
						} else {
						  charIndex++;
						  if (charIndex === text[index].length) {
							isDeleting = true;
						  }
						}
					  }, isDeleting ? deletingDelay : typingDelay)
					" class="absolute mt-3 2xl5:mt-[2rem]"></span>
				  </div>

			</span>
		</div>
		

		
		<div class="gambar-han scrollAnimate absolute right-0 flex group hover:cursor-pointer 2xl:mr-[39rem] 2xl:mt-[-15rem] 
		md:mt-[6.7rem] md:mr-[34rem] xl:mr-[30rem] xl:mt-[-9rem] 2xl5:mt-[-21rem] 2xl5:mr-[46rem]
		mt-[5.4rem] mr-[12.3rem]">
			<img class="2xl5:h-[20rem] 2xl:h-[15rem] xl:h-[13rem] md:h-[11rem] h-[8rem]
			
			pointer-events-none translate-y-[0.5rem] translate-x-[0.5rem] opacity-50 transition duration-500 group-hover:translate-x-0 group-hover:translate-y-0" src="asset/hanMid.png"/>
			<img class="pointer-events-none translate-y-[-0.5rem] translate-x-[-0.5rem] absolute transition duration-500 group-hover:translate-x-0 group-hover:translate-y-0" src="asset/hanMid.png" />
		</div>
			

		<img class="max-w-full absolute 2xl:right-[-24rem] xl:right-[-16rem] inline-flex 
		2xl:mt-[-8rem] xl:mt-[-6rem] md:right-[-20rem] md:mt-[-7rem] md:h-[190%] 
		animate-spin-slow pointer-events-none xl:h-[240%] 2xl:h-[200%] 
		right-[-11rem] mt-[-13rem] h-[400%]" src="asset/TextMuter.svg" />
	
		<div class="scrollAnimate absolute biruTua xl:p-14 right-0 inline-block 2xl:mt-[19rem] xl:mt-[15rem] xl:pb-14 2xl5:mt-[20rem]
		md:p-[1.3rem]  md:mt-[23rem] p-4 lg:pr-8 pr-0
		mt-[18rem] 
		shadow-[-6px_-6px_50px_0.05px_rgba(0,0,0,0.3)]">
			<h3 class="text-white font-Inter font-bold 2xl5:text-8xl 2xl:text-7xl xl:text-5xl md:pb-4  
			2xl:max-w-xl xl:max-w-sm 2xl5:mr-[15rem] xl:mr-[7rem] 2xl:mr-[8rem] leading-tight
			text-[1.4rem] max-w-[11rem] mr-[4rem]  pb-0
			md:text-[3rem] md:max-w-[18rem] md:mr-[18rem]">Tech yang dikuasai</h3>

			<div x-data="{ show: true }" x-init="setInterval(() => show = !show, 2800)">
				<p x-transition:enter="ease-out duration-500" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-500" 
				  x-show="show" class="text-white lg:pt-4 md:pt-[0rem]  2xl5:text-[2.6rem] 2xl:text-[2.4rem] 
				  xl:text-[1.5rem] md:text-[1.7rem] mt-5 font-IBM-Plex-Sans
				  pt-[0rem] text-[0.8rem]">AlpineJS, Tailwind, Laravel, Codeigniter</p>
			  
				<p x-transition:enter="ease-out duration-500" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-500"
				  x-show="!show" class="text-white lg:pt-4 md:pt-[0rem] 2xl5:text-[2.6rem] 2xl:text-[2.4rem] xl:text-[1.5rem]
				  md:text-[1.7rem] mt-5 font-IBM-Plex-Sans
				  text-[0.8rem]">Javascript, CSS, HTML, Koneksi.php</p>
			  </div>  
		</div>


	</section>




	<!-- Ini Modal untuk ubah -->
    <section class="flex flex-wrap p-4 h-full items-center mb-32 justify-center">
		<!--Overlay-->
		<div class="overflow-auto" style="background-color: rgba(0,0,0,0.5);backdrop-filter: blur(3px);" x-show="showModal" :class="{ 'fixed backdrop-blur-sm inset-0 z-10 flex items-center justify-center': showModal }">
			<!--Dialog-->
			<div class="bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg py-4 text-left px-6" x-show="showModal" @click.away="showModal = false" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100">

				<!--Title-->
				<div class="flex justify-between items-center pb-3">
					<p class="text-2xl font-bold">Ubah Data</p>
					<div class="cursor-pointer z-50" @click="showModal = false">
						<svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
							<path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
						</svg>
                        
					</div>
				</div>

				<!-- content -->
				<form action="TodolistServiceTest" method="post">
					<input type="hidden" name="id" x-bind:value="selectedValue">
				<div  class="text-center mt-4">
					<ul>
						<li><label class="text-lg font-bold text-blue-500">Todo : </label></li>
						<li><input type="text"name="todo"  x-bind:value="selectedValue2" class="font-mono p-2 border-2 border-blue-500 rounded-lg bg-gray-100 text-base focus:outline-none focus:border-green-500 focus:ring-green-500 "></li>
					</ul>
						
						
					<br><br>
				</div>
				

				<!--Footer-->
				<div class="flex justify-end pt-2">
					<button type="button" class="px-4 bg-transparent p-3 rounded-lg text-indigo-500 hover:bg-gray-100 hover:text-indigo-400 mr-2" @click="alert('Additional Action');">Action</button>
					<button class="modal-close px-4 bg-indigo-500 p-3 rounded-lg text-white hover:bg-indigo-400" name="updateItem" x-bind:value="selectedValue">Ubah</button>
				</div>
			</form>


			</div>
			<!--/Dialog -->
		</div><!-- /Overlay -->

	</section>
<!--  Modal untuk ubah selesai -->


<!-- Ini Modal untuk hapus -->
    <section class="flex flex-wrap p-4 h-full items-center">
		<!--Overlay-->
		<div class="overflow-auto" style="background-color: rgba(0,0,0,0.5);backdrop-filter: blur(3px);" x-show="showModalDel" :class="{ 'fixed inset-0 z-10 flex items-center justify-center': showModalDel }">
			<!--Dialog-->
			<div class="bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg py-4 text-left px-6" x-show="showModalDel" @click.away="showModalDel = false" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100">

				<!--Title-->
				<div class="flex justify-between items-center pb-3">
					<p class="text-2xl font-bold">Tambah Data</p>
					<div class="cursor-pointer z-50" @click="showModalDel = false">
						<svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
							<path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
						</svg>
                        
					</div>
				</div>

				<!-- content -->
				<ul class="my-5 bg-blue-200 border-2 border-teal-500 rounded-lg p-5">
					<li><p class="font-mono">Apakah anda ingin menghapus data data dengan id = <span x-text="selectedValue"></span></p></li>
				</ul>
				

				<!--Footer-->
				<div class="flex justify-end pt-2">
                     <button class="px-4 bg-transparent p-3 rounded-lg text-indigo-500 hover:bg-gray-100 hover:text-indigo-400 mr-2" @click="alert('id : ' + selectedValue);">Cek id item</button>
                     <form action="TodolistServiceTest" method="post"><button class="modal-close px-4 bg-indigo-500 p-3 rounded-lg text-white hover:bg-indigo-400" name="deleteItem" x-bind:value="selectedValue">Hapus</button></form>
					
					
				</div>


			</div>
			<!--/Dialog -->
		</div><!-- /Overlay -->

	</section>

<!-- Modal untuk hapus Selesai -->

<!-- Quotes dan tombol di section ini -->

<!--
	<img src="asset/NTesla.svg" width="400" class="pointer-events-none ml-20">
	<img src="asset/TeslaQuotes.svg" class="pointer-events-none ml-32 mt-20" width="900">

	<img src="asset/WWhite.svg" width="400" class="pointer-events-none ml-20">
	<img src="asset/WaltQuotes.svg" class="pointer-events-none ml-32 mt-20" width="900">-->

	<div style="scroll-margin-top: 50px" id="quotes" x-data="{ show1: true, show2: false}" class="flex justify-center bg-black 2xl:py-36 xl:py-24 md:py-[7rem]  py-20"
		x-init="
		setInterval(function(){
			setTimeout(function() {
				if (show1) {		  
					show1 = false;
					setTimeout(function() {
					show2 = true;
					}, 600);  
				} else if(show2) {
					show2 = false;
					setTimeout(function() {
					show1 = true;
					}, 600);
				}
		}, 3000);},3600);
		  
		">
		<div class="flex flex-wrap justify-center">
			<img  x-show="show1" src="asset/NTesla.svg" class="pointer-events-none 2xl:h-[27rem] lg:h-80 h-48 md:h-[20rem]" 
				x-transition:enter="ease-out duration-500" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
				x-transition:leave="ease-out duration-500" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
				
			<img x-show="show1" src="asset/TeslaQuotes.svg" class="pointer-events-none 2xl:ml-[6rem] 2xl:mt-48 2xl:h-[7.3rem] xl:h-[6rem] h-[1.8rem] mt-5 lg:mt-32 ml-5 lg:ml-10 md:h-[4rem] md:mt-[3rem] w-full lg:w-6/12"
				x-transition:enter="ease-out duration-500" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
				x-transition:leave="ease-out duration-500" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">


			<img x-show="show2" src="asset/WWhite.svg" class="pointer-events-none 2xl:h-[27rem] lg:h-80 h-48 md:h-[20rem]"
				x-transition:enter="ease-out duration-500" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
				x-transition:leave="ease-out duration-500" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
				
			<img x-show="show2" src="asset/WaltQuotes.svg" class="pointer-events-none 2xl:ml-[6rem] 2xl:mt-48 2xl:h-[6rem] xl:h-[4rem] h-[1.8rem] mt-5 lg:mt-32 ml-5 lg:ml-10 md:h-[4rem] md:mt-[3rem] w-full lg:w-6/12"
				x-transition:enter="ease-out duration-500" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
				x-transition:leave="ease-out duration-500" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"> 
		</div>
				<div class="flex -z-40 relative 2xl:h-[27rem] lg:h-80 md:h-[27rem] md:mt mx-w-[0px] h-[13.8rem] mt-5 ">&nbsp;</div>
	  </div>  


	  

<!-- Quotes end-->


<!-- kelompok card -->
<div id="project" style="scroll-margin-top: 80px" class="latarSVG">
	<div class="flex flex-wrap justify-center lg:pt-24 pt-10 md:pt-20 xl:pb-32 pb-10 bg-[url('/metaball.svg')] " style="background-size:100% 100%; background-repeat: no-repeat;">
		<img src="asset/ProjecttSaya .png" class="star flex 2xl:h-28 xl:h-[5rem] md:h-[5rem] md:mb-16 xl:mb-24 h-14 lg:mb-20 mb-10">
	  

	<div x-init="init()" class="lg:mx-36 3xl:mx-80 2xl:mx-40 md:mx-10 flex flex-wrap justify-center">
	
			<template x-for="(todo, index) in todos" :key="index">
				
				<div class=" xl:min-w-[24.5rem] lg:mb-24 mb-10 mx-10 2xl:mx-10 xl:mx-10 overflow-hidden rounded-xl bg-hqhan max-w-sm max-h-sm shadow-[0_2px_10px_1px_rgba(0,0,0,0.5)] hover:opacity-80 hover:cursor-pointer">	
					<img src="https://source.unsplash.com/320x250?programming" alt="Programming" class="pointer-events-none mx-auto mt-8  md:rounded-xl"/>
					<div class="py-5 md:px-7 px-4 ">
						<h3 x-text="todo.title" class="text-center mb-3 text-white font-bold text-lg"></h3>
						<div class="hijauTua rounded-lg">
							<p x-text="todo.description" class=" min-h-[6rem] text-white py-3 px-4 leading-tight font-normal text-sm text-secondary text-justify">
								...
								<span class="font-bold"> Klik Selengkapnya</span>
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

<footer class="bg-gray-800 lg:pb-24 lg:pt-24 md:pb-20 md:pt-14 pb-20 pt-10">
	  <div class="lg:flex justify-center mx-5 lg:ml-1 ml-16 md:ml-20">


		<div class="flex-wrap justify-center lg:mr-20 mb-7 lg:mb-1 md:mb-5 pb-2 ">
			<h2 class="text-xl font-bold text-white mb-3">Habbatul Qolbi H</h2>
			<p class="text-base text-gray-400">&copy; 2023 Habbatul Qolbi H. All rights reserved.</p>
			<p class="text-base text-gray-400">Kalinegoro, Mertoyudan, Magelang, Jawa Tengah, Indonesia.</p>
		  </div>

	<!-- Kontak -->
	<div class="flex-wrap lg:mr-20 lg:mb-1 md:mb-5 mb-8 md:mr-10">
		<h3 class="text-lg font-medium text-white">MyProject</h3>
		<ul >
			<li><a href="#" class="text-gray-300 hover:text-white">GitHub</a></li>
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
		  <ul >
			<li><a href="#" class="text-gray-300 hover:text-white">Instagram</a></li>
			<li><a href="#" class="text-gray-300 hover:text-white">Facebook</a></li>
		  </ul>
		</div>

	  </div>
	  </footer>
  

</body>
</html>