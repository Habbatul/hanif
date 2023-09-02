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

<body x-data="{ 'showModal': false, 'showModalDel' : false, showModalAdd: false, selectedValue: '',selectedValue2: '', todos: [], 
	todos: [],
	async fetchData() {
		try {
			const response = await fetch('http://localhost/hanif/api/portofolio', { method: 'post' });
			const data = await response.json();
			console.log(data);
			this.todos = data.data;
		} catch (error) {
			console.error(error);
		}
	},  itemTitle: '', itemDeskripsi: '', itemLink: '', itemGambar: '', itemTechStack:'', itemKategori:'',
}" @keydown.escape="showModal=false" x-cloak x-init="fetchData()">
	<template x-if="showModal">
		<template x-for="todo in todos.filter(item => item.id.toString() === selectedValue.toString())" :key="todo.id" :key="todo.id">
			<div x-init="itemTitle= todo.title; itemDeskripsi= todo.description; itemLink= todo.link; itemGambar= todo.gambar; itemTechStack = todo.techStack; itemKategori = todo.kategori;">
				<!-- Gunakan itemTitle, itemDeskripsi, itemLink sesuai kebutuhan -->
			</div>
		</template>
	</template>

	<!-- Navbar -->
	<nav class="bg-opacity-40 py-3 bg-gray-800 backdrop-filter backdrop-blur-sm fixed w-full z-50 shadow-[0_4px_10px_0.5px_rgba(0,0,0,0.5)] ease-in duration-500">
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
			 text-slate-50 text-center">Content Management</h1>
		</div>
	</div>


	<div class="overflow-x-auto px-2">
		<table class="border-separate border-spacing-1 w-3/5 m-auto mt-4 mb-4 table-auto rounded-[1rem] transparent-border p-3">
			<thead class="transparent-thead">
				<th class="border-collapse p-3 font-bold uppercase text-white lg:table-cell font-IBM-Plex-Sans">ID</th>
				<th class="border-collapse p-3 font-bold uppercase text-white lg:table-cell font-IBM-Plex-Sans">Gambar</th>
				<th class="border-collapse p-3 font-bold uppercase text-white lg:table-cell font-IBM-Plex-Sans">Nama</th>
				<th class="border-collapse p-3 font-bold uppercase text-white lg:table-cell font-IBM-Plex-Sans">Deskripsi</th>
				<th class="border-collapse p-3 font-bold uppercase text-white lg:table-cell font-IBM-Plex-Sans">Link</th>
				<th class="border-collapse p-3 font-bold uppercase text-white lg:table-cell font-IBM-Plex-Sans">Tech Stack</th>
				<th class="border-collapse p-3 font-bold uppercase text-white lg:table-cell font-IBM-Plex-Sans">Kategori</th>
				<th class="border-collapse p-3 font-bold uppercase text-white lg:table-cell font-IBM-Plex-Sans">Pilihan</th>
				</tr>
			</thead>

			<tbody class=" transparent-body">
				<?php foreach ($items as $item) : ?>
					<tr class="border-collapse ">
						<td x-text="<?= $item->id ?>" class="p-3 lg:table-cell border-collapse text-white"></td>
						<td class="p-3 lg:table-cell border-collapse text-white"><img src="<?php echo "upload/" . $item->gambar ?>" class="rounded-xl w-[10rem] h-[10rem] object-cover mx-auto shadow-xl"> </td>
						<td x-text="'<?= $item->title ?>'" class="p-3 lg:table-cell border-collapse text-white"></td>
						<td x-text="'<?= substr($item->description, 0, 200) . (strlen($item->description) > 200 ? "..." : "") ?>'" class="p-3 lg:table-cell border-collapse text-white"></td>
						<td x-text="'<?= substr($item->link, 0, 20) . (strlen($item->link) > 20 ? "..." : "") ?>'" class="p-3 lg:table-cell border-collapse text-white"></td>
						<td x-text="'<?= substr($item->techStack, 0, 20) . (strlen($item->link) > 20 ? "..." : "") ?>'" class="p-3 lg:table-cell border-collapse text-white"></td>
						<td x-text="'<?= substr($item->kategori, 0, 20) . (strlen($item->link) > 20 ? "..." : "") ?>'" class="p-3 lg:table-cell border-collapse text-white"></td>
						<td class="p-3 lg:table-cell text-center border-collapse">
							<button type="submit" class="border m-2 text-slate-50 hover:text-teal-600 font-bold py-2 px-4 rounded-full" @click="showModalDel = true; selectedValue = <?= $item->id; ?>; selectedValue2 = '<?= $item->gambar; ?>'">Hapus</button>
							<button type="button" class="border m-2 text-slate-50 hover:text-teal-600 font-bold py-2 px-4 rounded-full" @click="showModal = true; selectedValue = <?= $item->id; ?>">Ubah</button>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>

	<!-- tombol Add -->
	<div class="flex items-center justify-center">
		<a @click="showModalAdd=true" class="text-gray-950 hover:text-white no-underline my-10 hover:font-extrabold  text-3xl cursor-pointer  font-bold font-IBM-Plex-Sans">
			<div class="bg-teal-700 px-4 py-2 rounded-3xl hover:bg-black  ">
				Tambah Portofolio
			</div>
		</a>
	</div>


	<script>
		// Dapatkan elemen input yang ada
		function resetFileInput() {
			// Cari elemen input file
			const fileInputz = document.querySelector('#imageInput');

			// Jika ada elemen input file
			if (fileInputz) {
				// Cari elemen dengan class "cropper-bg"
				const cropperContainerz = document.querySelector('.cropper-reset');
				const cropperBgElement = cropperContainerz.querySelector('.cropper-bg');
				// Jika ada elemen "cropper-bg"
				if (cropperContainerz) {
					if (cropperBgElement) {
						cropperBgElement.parentNode.removeChild(cropperBgElement);
						console.log("Elemen cropper-bg telah dihapus.");
					}
				}

				// Buat elemen input file baru dengan atribut yang sama
				const newFileInputz = document.createElement('input');
				newFileInputz.type = 'file';
				newFileInputz.id = 'imageInput';
				newFileInputz.name = 'gambar';
				newFileInputz.accept = 'image/*';
				newFileInputz.className = 'text-lg font-bold text-black';
				newFileInputz.onchange = loadImage;

				// Ganti elemen input file lama dengan yang baru
				fileInputz.parentNode.replaceChild(newFileInputz, fileInputz);

				// Cari elemen dengan class "cropper-container"

				// Jika ada elemen "cropper-container" dan tidak ada "cropper-bg" saat ini
				if (cropperContainerz) {
					// Hapus elemen <img> jika ada
					const image = cropperContainerz.querySelector('#image');
					if (image) {
						image.classList.remove('cropper-hidden');
						image.setAttribute(':src', "'upload/' + itemGambar");
					}
				}

				console.log("Input file telah direset.");
			} else {
				console.log("Elemen input tidak ditemukan.");
			}
		}
	</script>


	<div class="fixed top-0 left-0 w-full h-full flex justify-center md:items-start items-center overflow-y-auto z-50 pt-2 pb-2" style="background-color: rgba(0,0,0,0.5);backdrop-filter: blur(5px);" x-show="showModal">
		<!--Dialog Wrapper-->
		<div class="md:w-11/12 w-[99%] md:max-w-[40rem] max-w-md mx-auto py-4 text-left px-6 my-auto" x-show="showModal" @click.away="resetFileInput;showmodal=false;" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100">
			<!--Dialog-->
			<div class="bg-hqhan w-11/12 md:max-w-md mx-auto rounded shadow-lg py-4 text-left px-3 md:px-6" x-show="showModal" @click.away="resetFileInput;showModal=false;" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100">

				<!--Title-->
				<div class="flex justify-between items-center pb-3">
					<p class="text-2xl font-bold">Ubah Data</p>
					<div class="cursor-pointer z-50" @click="showModal = false">
						<svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
							<path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
						</svg>

					</div>
				</div>

				<script>
					const formUrl = "<?php echo base_url('admin/update_item/'); ?>";
				</script>


				<form id="uploadForm" x-bind:action="formUrl+selectedValue" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
					<div class="text-center mt-4 px-4">


						<!--nama-->
						<ul class="px-0">
							<li><label class="text-lg font-bold text-black">Title :</label></li>
							<li>
								<input :value="itemTitle" type="text" id="titleInput" name="title" class="font-mono p-2 border-2 border-stone-900 rounded-lg bg-gray-100 text-base focus:outline-none focus:border-green-500 focus:ring-green-500">
								<span id="titleError" class=" text-red-600 font-semibold hidden">Field ini tidak boleh kosong</span>
							</li>
						</ul>

						<!--gambar-->
						<ul class="px-0">
							<li><label class="text-lg font-bold text-black">Thumbnail :</label></li>

							<input type="hidden" id="croppedImageData" name="croppedImageData">
							<li>
								<input type="file" id="imageInput" name="gambar" accept="image/*" onchange="loadImage(event)" class="text-lg font-bold text-black">
							</li>
						</ul>

						<ul class="px-0">
							<!-- cropper Canvas -->
							<div class="cropper-container aspect-w-1 aspect-h-1 w-full 
						max-w-[13rem] max-h-[10rem] min-w-[13rem] min-h-[10rem]
						xl:max-w-[300px] xl:max-h-[300px] xl:min-w-[300px] lg:min-h-[300px] 
						mx-auto relative grid cropper-reset">
								<img id="image" class="grid-area-row-1/1" :src="'upload/' + itemGambar">
							</div>
						</ul>

						<!--deskripsi-->
						<ul class="px-0">
							<li><label class="text-lg font-bold text-black">Deskripsi :</label></li>
							<li>
								<textarea :value="itemDeskripsi" id="descriptionInput" name="description" class="lg:w-[20rem] w-[10rem] font-mono p-2 border-2 border-stone-900 rounded-lg bg-gray-100 text-base focus:outline-none focus:border-green-500 focus:ring-green-500"></textarea>
								<span id="descriptionError" class=" text-red-600 font-semibold hidden">Field ini tidak boleh kosong</span>
							</li>
						</ul>

						<!--jenis-->
						<ul class="px-0">
							<li><label class="text-lg font-bold text-black">url:</label></li>
							<li>
								<input :value="itemLink" type="text" id="linkInput" name="link" class="font-mono p-2 border-2 border-stone-900 rounded-lg bg-gray-100 text-base focus:outline-none focus:border-green-500 focus:ring-green-500">
								<span id="linkError" class=" text-red-600 font-semibold hidden">Field ini tidak boleh kosong</span>
							</li>
						</ul>

						<!-- keterangan -->
						<ul class="px-0">
							<br>
							<li><label class=" text-lg font-bold text-black bg-white rounded p-2">Gunakan koma untuk list pada input dibawah</label></li>
							<br>
						</ul>

						<!-- techStack  -->
						<ul class="px-0">
							<li><label class="text-lg font-bold text-black">Tech Stack:</label></li>
							<li>
								<input :value="itemTechStack" type="text" id="techStackInput" name="techStack" class="font-mono p-2 border-2 border-stone-900 rounded-lg bg-gray-100 text-base focus:outline-none focus:border-green-500 focus:ring-green-500">
								<span id="techStackError" class=" text-red-600 font-semibold hidden">Field ini tidak boleh kosong</span>
							</li>
						</ul>

						<!-- kategori -->
						<ul class="px-0">
							<li><label class="text-lg font-bold text-black">Kategori:</label></li>
							<li>
								<input :value="itemKategori" type="text" id="kategoriInput" name="kategori" class="font-mono p-2 border-2 border-stone-900 rounded-lg bg-gray-100 text-base focus:outline-none focus:border-green-500 focus:ring-green-500">
								<span id="kategoriError" class=" text-red-600 font-semibold hidden">Field ini tidak boleh kosong</span>
							</li>
						</ul>

						<input type="hidden" name="id" x-bind:value="selectedValue">
						<br><br>
					</div>

					<!--Footer-->
					<div class="flex justify-end pt-2">
						<button type="button" class="px-4 bg-transparent p-3 rounded-lg text-stone-900 hover:bg-gray-100 hover:text-red-800 mr-2" @click="alert(selectedValue)">Action</button>
						<button class="modal-close px-4 bg-stone-900 p-3 rounded-lg text-white hover:bg-red-800" value="ubahItem" name="ubahItem">Ubah</button>
					</div>
				</form>


			</div>
			<!--/Dialog -->
		</div><!-- /Overlay -->

	</div>




	<!-- show modal tambah -->
	<div class="fixed top-0 left-0 w-full h-full flex justify-center md:items-start items-center overflow-y-auto z-50 pt-2 pb-2" style="background-color: rgba(0,0,0,0.5);backdrop-filter: blur(5px);" x-show="showModalAdd">
		<!--Dialog Wrapper-->
		<div class="md:w-11/12 w-[99%] md:max-w-[40rem] max-w-md mx-auto py-4 text-left px-6 my-auto" x-show="showModalAdd " @click.away="showModalAdd = false" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100">
			<!--Dialog-->
			<div class="bg-hqhan w-11/12 md:max-w-md mx-auto rounded shadow-lg py-4 text-left px-3 md:px-6" x-show="showModalAdd " @click.away="showModalAdd  = false" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100">

				<!--Title-->
				<div class="flex justify-between items-center pb-3">
					<p class="text-2xl font-bold">Tambah Data</p>
					<div class="cursor-pointer z-50" @click="showModalAdd = false">
						<svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
							<path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
						</svg>

					</div>
				</div>

				<script>
					const formUrl2 = "<?php echo base_url('admin/save_item/'); ?>";
				</script>
				<!-- content -->

				<form id="addForm" x-bind:action="formUrl2" method="post" enctype="multipart/form-data" onsubmit="return validateForm2()">
					<div class="text-center mt-4 px-4">


						<!--nama-->
						<ul class="px-0">
							<li><label class="text-lg font-bold text-black">Title :</label></li>
							<li>
								<input type="text" id="titleInput2" name="title" class="font-mono p-2 border-2 border-stone-900 rounded-lg bg-gray-100 text-base focus:outline-none focus:border-green-500 focus:ring-green-500">
								<span id="titleError2" class=" text-red-600 font-semibold hidden">Field ini tidak boleh kosong</span>
							</li>
						</ul>

						<!--gambar-->
						<ul class="px-0">
							<li><label class="text-lg font-bold text-black">Thumbnail :</label></li>

							<input type="hidden" id="croppedImageDataz" name="croppedImageData">
							<li>
								<input type="file" id="imageInputz" name="gambar" accept="image/*" onchange="loadImage2(event)" class="text-lg font-bold text-black">
							</li>
						</ul>

						<ul class="px-0">
							<!-- cropper Canvas -->
							<div class="cropper-containerz aspect-w-1 aspect-h-1 w-full 
						max-w-[13rem] max-h-[10rem] min-w-[13rem] min-h-[10rem]
						xl:max-w-[300px] xl:max-h-[300px] xl:min-w-[300px] lg:min-h-[300px] 
						mx-auto relative grid">
								<img id="imagez" class="grid-area-row-1/1">
							</div>
						</ul>

						<!--deskripsi-->
						<ul class="px-0">
							<li><label class="text-lg font-bold text-black">Deskripsi :</label></li>
							<li>
								<textarea id="descriptionInput2" name="description" class="lg:w-[20rem] w-[10rem] font-mono p-2 border-2 border-stone-900 rounded-lg bg-gray-100 text-base focus:outline-none focus:border-green-500 focus:ring-green-500"></textarea>
								<span id="descriptionError2" class=" text-red-600 font-semibold hidden">Field ini tidak boleh kosong</span>
							</li>
						</ul>

						<!--jenis-->
						<ul class="px-0">
							<li><label class="text-lg font-bold text-black">url:</label></li>
							<li>
								<input type="text" id="linkInput2" name="link" class="font-mono p-2 border-2 border-stone-900 rounded-lg bg-gray-100 text-base focus:outline-none focus:border-green-500 focus:ring-green-500">
								<span id="linkError2" class=" text-red-600 font-semibold hidden">Field ini tidak boleh kosong</span>
							</li>
						</ul>

						<!-- keterangan -->
						<ul class="px-0">
							<br>
							<li><label class=" text-lg font-bold text-black bg-white rounded p-2">Gunakan koma untuk list pada input dibawah</label></li>
							<br>
						</ul>

						<!-- techStack  -->
						<ul class="px-0">
							<li><label class="text-lg font-bold text-black">Tech Stack:</label></li>
							<li>
								<input type="text" id="techStackInput" name="techStack" class="font-mono p-2 border-2 border-stone-900 rounded-lg bg-gray-100 text-base focus:outline-none focus:border-green-500 focus:ring-green-500">
								<span id="techStackError" class=" text-red-600 font-semibold hidden">Field ini tidak boleh kosong</span>
							</li>
						</ul>

						<!-- kategori -->
						<ul class="px-0">
							<li><label class="text-lg font-bold text-black">Kategori:</label></li>
							<li>
								<input type="text" id="kategoriInput" name="kategori" class="font-mono p-2 border-2 border-stone-900 rounded-lg bg-gray-100 text-base focus:outline-none focus:border-green-500 focus:ring-green-500">
								<span id="kategoriError" class=" text-red-600 font-semibold hidden">Field ini tidak boleh kosong</span>
							</li>
						</ul>


						<br><br>
					</div>

					<!--Footer-->
					<div class="flex justify-end pt-2">
						<button type="button" class="px-4 bg-transparent p-3 rounded-lg text-stone-900 hover:bg-gray-100 hover:text-red-800 mr-2" @click="alert(selectedValue)">Action</button>
						<button class="modal-close px-4 bg-stone-900 p-3 rounded-lg text-white hover:bg-red-800" value="tambahItem" name="tambahItem">Tambah</button>
					</div>
				</form>


			</div>
			<!--/Dialog -->
		</div><!-- /Overlay -->

	</div>

	<!-- cropingan -->
	<script>
		// Ambil elemen-elemen yang diperlukan
		const cropperContainer = document.querySelector('.cropper-containerz');
		const fileInput = document.getElementById('imageInputz');

		// Fungsi untuk memeriksa keberadaan file pada input
		function checkFileInput() {
			if (fileInput.files && fileInput.files[0]) {
				// Jika ada file yang dipilih, tampilkan .cropper-container
				cropperContainer.style.display = 'block';
			} else {
				// Jika tidak ada file yang dipilih, sembunyikan .cropper-container
				cropperContainer.style.display = 'none';
			}
		}

		// Panggil fungsi checkFileInput saat halaman dimuat
		checkFileInput();

		// Panggil fungsi checkFileInput saat ada perubahan pada file input
		fileInput.addEventListener('change', checkFileInput);
	</script>




	<script>
		function validateForm() {
			const titleInput = document.getElementById('titleInput');
			const descriptionInput = document.getElementById('descriptionInput');
			const linkInput = document.getElementById('linkInput');

			const titleError = document.getElementById('titleError');
			const descriptionError = document.getElementById('descriptionError');
			const linkError = document.getElementById('linkError');

			let isValid = true;

			if (titleInput.value.trim() === '') {
				titleError.style.display = 'block';
				isValid = false;
			} else {
				titleError.style.display = 'none';
			}

			if (descriptionInput.value.trim() === '') {
				descriptionError.style.display = 'block';
				isValid = false;
			} else {
				descriptionError.style.display = 'none';
			}

			if (linkInput.value.trim() === '') {
				linkError.style.display = 'block';
				isValid = false;
			} else {
				linkError.style.display = 'none';
			}

			if (techStackInput.value.trim() === '') {
				techStackError.style.display = 'block';
				isValid = false;
			} else {
				techStackError.style.display = 'none';
			}
			if (kategoriInput.value.trim() === '') {
				kategoriError.style.display = 'block';
				isValid = false;
			} else {
				kategoriError.style.display = 'none';
			}

			return isValid;
		}

		function validateForm2() {
			const titleInput = document.getElementById('titleInput2');
			const descriptionInput = document.getElementById('descriptionInput2');
			const linkInput = document.getElementById('linkInput2');

			const titleError = document.getElementById('titleError2');
			const descriptionError = document.getElementById('descriptionError2');

			const linkError = document.getElementById('linkError2');

			let isValid = true;

			if (titleInput.value.trim() === '') {
				titleError.style.display = 'block';
				isValid = false;
			} else {
				titleError.style.display = 'none';
			}

			if (descriptionInput.value.trim() === '') {
				descriptionError.style.display = 'block';
				isValid = false;
			} else {
				descriptionError.style.display = 'none';
			}

			if (linkInput.value.trim() === '') {
				linkError.style.display = 'block';
				isValid = false;
			} else {
				linkError.style.display = 'none';
			}
			if (techStackInput.value.trim() === '') {
				techStackError.style.display = 'block';
				isValid = false;
			} else {
				techStackError.style.display = 'none';
			}
			if (kategoriInput.value.trim() === '') {
				kategoriError.style.display = 'block';
				isValid = false;
			} else {
				kategoriError.style.display = 'none';
			}

			return isValid;
		}
	</script>
	<script src="asset/asset/cropping.js" defer></script>
	<script src="asset/asset/croppingAdd.js" defer></script>



	<section class="flex flex-wrap p-4 h-full items-center">
		<!--Overlay-->
		<div class="overflow-auto" style="background-color: rgba(0,0,0,0.5);backdrop-filter: blur(5px);" x-show="showModalDel" :class="{ 'fixed inset-0 z-10 flex items-center justify-center': showModalDel }">
			<!--Dialog-->
			<div class="bg-hqhan w-11/12 md:max-w-md mx-auto rounded shadow-lg py-4 text-left px-6" x-show="showModalDel" @click.away="showModalDel = false" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100">

				<script>
					const formUrl3 = "<?php echo base_url('admin/delete_item/'); ?>";
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
						<p class="font-mono">Apakah anda ingin menghapus data data dengan id = <span x-text="selectedValue"></span>, dengan gambar = <span x-text="selectedValue2"></span></p>
					</li>
				</ul>


				<!--Footer-->
				<div class="flex justify-end pt-2">
					<button class="px-4 bg-transparent p-3 rounded-lg text-stone-900 hover:bg-gray-100 hover:text-red-700 mr-2" @click="alert('id : ' + selectedValue);">Cek id item</button>
					<form :action="formUrl3" method="post">
						<input type="hidden" name="gambar" x-bind:value="selectedValue2">
						<button class="modal-close px-4 bg-stone-900 p-3 rounded-lg text-white hover:bg-red-700" name="deleteItem" x-bind:value="selectedValue">Hapus</button>
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