<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<script src="asset/assets/cdn.js" defer></script>
	<link href="asset/asset/output.css" rel="stylesheet">
	<!-- bootstrap -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	<!-- cropper.js -->
	<link rel="stylesheet" href="asset/src/cropper.css">
	<script src="asset/src/cropper.js"></script>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@400;500&family=Inter:wght@300;400;500;600;700&family=Shadows+Into+Light&family=Kaushan+Script&display=swap" rel="stylesheet">

	<style>
		/* .cropper-container {
        width: 100%;
        max-width: 300px;
        max-height: 300px;
        min-width:300px;
        min-height:300px;
        margin: 0 auto;
        position: relative;
        display: grid;
        }

        .cropper-container img {
        grid-area: 1/1;

        } */

		body {
			background-image: url('asset/endless-constellation.svg');
			/* atau background-size: 100% 100%; */
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
	</style>
</head>

<body x-data="{ 'showModal': <?php echo (form_error('username') || form_error('password')) ? 'true' : 'false'; ?>, 'showModalDel' : false, showModalAdd: false, selectedValue: '',selectedValue2: '', todos: [], 

	
}" @keydown.escape="showModal=false" x-cloak x-init="fetchData()">

	<!-- Navbar -->
	<nav x-show="showModal===false" x-cloak class="bg-opacity-40 py-3 bg-gray-800 backdrop-filter backdrop-blur-sm fixed w-full z-50 shadow-[0_4px_10px_0.5px_rgba(0,0,0,0.5)] ease-in duration-500" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" x-transition:leave="ease-out duration-300">
		<div class="md:my-2 flex justify-between items-center">
			<a href="admin/logout" class="ml-6 md:ml-[2rem] xl:ml-[2rem] font-Inter font-bold text-md md:text-xl text-white hover:text-green-100 hover:cursor-pointer no-underline">LOGOUT</a>
			<div>
				<a href="admin" class="mr-4 lg:mr-6 md:mr-[2rem] xl:mr-[2rem] font-Inter font-bold text-md md:text-xl text-white hover:text-green-100 hover:cursor-pointer no-underline">Content</a>
				<a href="register" class="mr-4 lg:mr-9 font-Inter font-bold text-md md:text-xl text-white hover:text-green-100 hover:cursor-pointer no-underline">Other</a>
			</div>
		</div>
	</nav>


	<!-- your content goes here -->
	<div class="flex flex-wrap justify-center pt-8 mb-10 md:pt-16  ">
		<div class="star flex">
			<h1 class="md:pt-10 pt-12 px-5 font-Kaushan-Script w-full font-extrabold 2xl:text-6xl xl:text-6xl md:text-6xl text-[2.7rem] text-4xl 
			 text-slate-50 text-center">Other</h1>
		</div>
	</div>

	<!-- perubahan disini -->

	<div class="p-16 my-16 md:w-96 w-80 block mx-auto rounded-xl" style="background-color: rgba(0,0,0,0.2);backdrop-filter: blur(5px);">
		<?php echo form_open('register'); ?>
		<h3 class="mb-6 text-white text-center">Ubah Akun</h3>
		<input type="hidden" name="id" value="<?= $data[0]->id ?>">
		<div class="mb-4">
			<input type="text" value="<?= $data[0]->username ?>" name="username" class="w-full p-2 border border-white rounded" placeholder="Masukkan username">
		</div>
		<div class="mb-4">
			<input type="password" name="password" class="w-full p-2 border border-white rounded" placeholder="Masukkan password">
		</div>
		<button type="submit" name="register" class="bg-teal-700 px-4 py-2 rounded-3xl hover:text-white hover:bg-black font-bold mx-auto block">Submit</button>
		<?php echo form_close(); ?>
	</div>


	<!--validasi -->
	<?php if (form_error('username') || form_error('password')) : ?>
		<section class="flex flex-wrap h-full items-center justify-center">
			<!--Overlay-->
			<div class="overflow-auto" style="background-color: rgba(0,0,0,0.5);backdrop-filter: blur(3px);" x-show="showModal" :class="{ 'fixed backdrop-blur-sm inset-0 z-10 flex items-center justify-center': showModal }">
				<!--Dialog-->
				<div style="background-color: rgba(0, 0, 0, 0.4);backdrop-filter: blur(10px);" class="w-11/12 md:max-w-md mx-auto rounded shadow-lg py-4 text-left px-6" x-show="showModal" @click.away="showModal = false" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100">

					<!--Title-->
					<div class="flex justify-between items-center pb-3">
						<p x-text="' '"></p>
						<div class="cursor-pointer z-50" @click="showModal = false">
							<svg class="inline-block w-8 h-8 mr-2 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
							</svg>
						</div>
					</div>

					<p class="text-3xl font-bold text-red-600 text-center">Tidak Valid</p>

					<!-- content -->
					<?php if (form_error('username')) : ?>
						<div class="text-red-500 mb-10 font-bold font-Inter text-center p-4 rounded-lg" style="background-color: rgba(125, 0, 0, 0.4);backdrop-filter: blur(10px);">
							<svg class="inline-block w-6 h-6 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
							</svg>
							<?php echo form_error('username'); ?>
						</div>
					<?php endif; ?>

					<?php if (form_error('password')) : ?>
						<div class="text-red-500 mb-10 font-bold font-Inter text-center p-4 rounded-lg" style="background-color: rgba(125, 0, 0, 0.4);backdrop-filter: blur(10px);">
							<svg class="inline-block w-6 h-6 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
							</svg>
							<?php echo form_error('password'); ?>
						</div>
					<?php endif; ?>

				</div>
				<!--/Dialog -->
			</div><!-- /Overlay -->

		</section>
	<?php endif; ?>






	<div class="flex flex-wrap justify-center  ">
		<div class="star flex">
			<h1 class="md:pt-10 pt-12 px-5 font-Kaushan-Script w-full font-extrabold 2xl:text-6xl xl:text-6xl md:text-6xl text-[2.7rem] text-4xl 
			 text-slate-50 text-center">List Pesan Pengunjung</h1>
		</div>
	</div>

	<div class="overflow-x-auto px-2">
		<table class="lg:text-xl text-sm border-separate border-spacing-1 w-3/5 m-auto mt-4 mb-4 rounded-[1rem] transparent-border p-3">
			<thead class="transparent-thead">
				<th class="border-collapse p-3 font-bold uppercase text-white font-IBM-Plex-Sans text-center">Nama</th>
				<th class="border-collapse p-3 font-bold uppercase text-white font-IBM-Plex-Sans text-center">Email</th>
				<th class="border-collapse p-3 font-bold uppercase text-white font-IBM-Plex-Sans text-center">Pesan</th>
				<th class="border-collapse p-3 font-bold uppercase text-white font-IBM-Plex-Sans text-center">Pilihan</th>
			</thead>

			<tbody class="transparent-body">
				<?php foreach ($message as $item) : ?>
					<tr class="border-collapse">
						<td x-text="'<?= $item->nama ?>'" class="p-3 border-collapse text-white whitespace-normal w-1/5"></td>
						<td x-text="'<?= $item->email ?>'" class="p-3 border-collapse text-white whitespace-normal w-1/5"></td>
						<td x-text="'<?= $item->pesan ?>'" class="p-3 border-collapse text-white whitespace-normal w-4/5"></td>
						<td class="w-3/5 text-center">
							<button type="submit" class="border m-4 text-slate-50 hover:text-teal-600 font-bold py-2 px-4 rounded-full" @click="showModalDel = true; selectedValue = <?= $item->id; ?>;">Hapus</button>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>

	</div>



	<section class="flex flex-wrap p-4 h-full items-center">
		<!--Overlay-->
		<div class="overflow-auto" style="background-color: rgba(0,0,0,0.5);backdrop-filter: blur(5px);" x-show="showModalDel" :class="{ 'fixed inset-0 z-10 flex items-center justify-center': showModalDel }">
			<!--Dialog-->
			<div class="bg-hqhan w-11/12 md:max-w-md mx-auto rounded shadow-lg py-4 text-left px-6" x-show="showModalDel" @click.away="showModalDel = false" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100">

				<script>
					const formUrl3 = "<?php echo base_url('admin/deleteMessage/'); ?>";
				</script>
				<!--Title-->
				<div class="flex justify-between items-center pb-3">
					<p class="text-2xl font-bold">Hapus Data</p>
					<div class="cursor-pointer z-50" @click="showModalDel = false">
						<svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
							<path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
						</svg>

					</div>
				</div>

				<!-- content -->
				<ul class="my-5 bg-white border-2 border-teal-500 rounded-lg p-5">
					<li>
						<p class="font-mono">Apakah anda ingin menghapus data dengan id = <span x-text="selectedValue"></span></p>
					</li>
				</ul>


				<!--Footer-->
				<div class="flex justify-end pt-2">
					<button class="px-4 bg-transparent p-3 rounded-lg text-stone-900 hover:bg-gray-100 hover:text-red-700 mr-2" @click="alert('id : ' + selectedValue);">Cek id item</button>
					<form :action="formUrl3" method="post">
						<button class="modal-close px-4 bg-stone-900 p-3 rounded-lg text-white hover:bg-red-700" name="id" x-bind:value="selectedValue">Hapus</button>
					</form>


				</div>


			</div>
			<!--/Dialog -->
		</div><!-- /Overlay -->

	</section>

	<div class="flex flex-col">
		<h2 class="mx-auto text-xl font-bold text-white mb-2 opacity-80">Habbatul Qolbi H</h2>
		<h6 class="mx-auto text-base text-gray-400 opacity-80">&copy; 2023 Habbatul Qolbi H. All rights reserved.</h6>
		<h6 class="mx-auto text-base text-gray-400 mb-10 opacity-80">Magelang, Jawa Tengah, Indonesia.</h6>
	</div>
</body>

</html>