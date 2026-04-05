<x-app-layout> 
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="flex justify-end">
    <button
        data-drawer-target="drawer-right-example"
        data-drawer-show="drawer-right-example"
        data-drawer-placement="right"
        type="button"
        class="bg-blue-600 text-white hover:bg-neutral-secondary-medium hover:text-heading focus:ring-4 focus:ring-neutral-tertiary-soft shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none rounded-md">
        Tambah
    </button>
</div>

<div class="relative overflow-x-auto bg-neutral-primary-soft shadow-xs rounded-base border border-default bg-white rounded-lg mt-4">
    <table class="w-full text-sm text-left rtl:text-right text-body">
        <thead class="bg-neutral-100 border-b border-default">
            <tr>
                <th scope="col" class="px-6 py-3 font-medium">
                    Gambar
                </th>
                <th scope="col" class="px-6 py-3 font-medium">
                    Judul
                </th>
                <th scope="col" class="px-6 py-3 font-medium">
                    Deskripsi
                </th>
                <th scope="col" class="px-6 py-3 font-medium">
                    Github
                </th>
                <th scope="col" class="px-6 py-3 font-medium">
                    Link Demo
                </th>
                <th scope="col" class="px-6 py-3 font-medium">
                    Aksi
                </th>
            </tr>
        </thead>
        @foreach ($projects as $item )
        <tbody>
            <tr class="odd:bg-neutral-primary even:bg-neutral-secondary-soft">
                <th scope="row" class="px-2 py-2 font-medium text-heading whitespace-nowrap">
                                 <img src="{{ asset('storage/' . $item->image) }}" class="w-20 h-20 object-cover rounded-lg">
                                </th>
                <td class="px-6 py-4">
                    {{ $item->title }}
                </td>
                <td class="px-6 py-4">
                    {{ $item->description }}
                </td>
               <td class="px-6 py-4">
    <a href="{{ $item->github }}" target="_blank"
       class="text-blue-600 hover:underline">
        {{ $item->github }}
    </a>
</td>

<td class="px-6 py-4">
    <a href="{{ $item->link }}" target="_blank"
       class="text-blue-600 hover:underline">
        {{ $item->link }}
    </a>
</td>
                <td class="px-6 py-4 space-x-3 flex">
                    <button
                        type="button"
                        onclick="openEditDrawer({
                            id: '{{ $item->id }}',
                            title: '{{ $item->title }}',
                            description: '{{ $item->description }}',
                            github: '{{ $item->github }}',
                            link: '{{ $item->link }}',
                            image: '{{ asset('storage/' . $item->image) }}'
                        })"
                        class="font-medium text-fg-brand hover:underline">
                        Edit
                    </button>
                    <button
                        type="button"
                        onclick="openDeleteModal('{{ $item->id }}', '{{ $item->title }}')"
                        class="font-medium text-red-600 hover:underline">
                        Hapus
                    </button>
                </td>
                
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

        </div>
    </div>
<!-- drawer component -->
<div id="drawer-right-example" class="fixed top-0 right-0 z-40 h-screen p-4 overflow-y-auto transition-transform translate-x-full bg-white w-80 dark:bg-gray-800" tabindex="-1" aria-labelledby="drawer-right-label">
    <h5 id="drawer-right-label" class="inline-flex items-center mb-4 text-base font-semibold text-gray-500 dark:text-gray-400"><svg class="w-4 h-4 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
  </svg>Right drawer</h5>
   <button type="button" data-drawer-hide="drawer-right-example" aria-controls="drawer-right-example" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 absolute top-2.5 end-2.5 inline-flex items-center justify-center dark:hover:bg-gray-600 dark:hover:text-white" >
      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
         <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
      </svg>
      <span class="sr-only">Close menu</span>
   </button>
   {{-- form --}}
   <form action="{{ route('project.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
    @csrf

    
    <!-- IMAGE -->
    <div>
        <label class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">
            Unggah Gambar
        </label>
        <input name="image" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file">
       <div class="flex justify-center">
    <div class="mt-4 relative group w-full">

    <img id="image_preview"
        class="hidden w-full aspect-video object-cover rounded-lg border shadow">

    <!-- overlay hapus -->
    <div id="remove_image"
        class="hidden absolute inset-0 bg-black/40 rounded-lg
               flex items-center justify-center
               opacity-0 group-hover:opacity-100
               transition duration-200 cursor-pointer">

        <span class="bg-red-500 text-white px-3 py-1 rounded-md text-sm">
            Hapus
        </span>

    </div>
</div>
</div>
    </div>
    
    <!-- TITLE -->
    <div>
        <label class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">
            Judul
        </label>
       <input name="title" type="text" id="default-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan judul">
    </div>

    <!-- DESCRIPTION -->
    <div>
        <label class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">
            Deskripsi
        </label>
       <textarea name="description" id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan deskripsi"></textarea>
    </div>

    <!-- GITHUB -->
    <div>
        <label class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">
            Github
        </label>
        <input name="github" type="text" id="default-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan tautan Github">
    </div>

    <!-- LIVE LINK -->
    <div>
        <label class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">
            Tautan Demo
        </label>
        <input name="link" type="text" id="default-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan tautan Demo">
    </div>

    <!-- BUTTON -->
    <button type="submit"
        class="w-full py-2 text-white bg-blue-600 hover:bg-blue-700 rounded-lg transition duration-200 font-medium mt-4">
        Save Project
    </button>

</form>
</div>

<!-- Edit Drawer -->
<div id="drawer-edit-example" class="fixed top-0 right-0 z-40 h-screen p-4 overflow-y-auto transition-transform translate-x-full bg-white w-80 dark:bg-gray-800" tabindex="-1" aria-labelledby="drawer-edit-label">
    <h5 id="drawer-edit-label" class="inline-flex items-center mb-4 text-base font-semibold text-gray-500 dark:text-gray-400">
        <svg class="w-4 h-4 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path>
            <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path>
        </svg>Edit Project
    </h5>
    <button type="button" data-drawer-hide="drawer-edit-example" aria-controls="drawer-edit-example" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 absolute top-2.5 end-2.5 inline-flex items-center justify-center dark:hover:bg-gray-600 dark:hover:text-white">
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
        </svg>
        <span class="sr-only">Close menu</span>
    </button>
    <form id="editForm" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PATCH')

        <!-- IMAGE -->
        <div>
            <label class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">
                Gambar Saat Ini
            </label>
            <img id="edit_image_current" src="" alt="Current image" class="w-full aspect-video object-cover rounded-lg border shadow mb-3">
            
            <label class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">
                Ganti Gambar
            </label>
            <input name="image" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="edit_file_input" type="file">
            <div class="flex justify-center">
                <div class="mt-4 relative group w-full">
                    <img id="edit_image_preview" class="hidden w-full aspect-video object-cover rounded-lg border shadow">
                    <div id="edit_remove_image" class="hidden absolute inset-0 bg-black/40 rounded-lg flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-200 cursor-pointer">
                        <span class="bg-red-500 text-white px-3 py-1 rounded-md text-sm">Hapus</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- TITLE -->
        <div>
            <label class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">Judul</label>
            <input name="title" id="edit_title" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan judul">
        </div>

        <!-- DESCRIPTION -->
        <div>
            <label class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">Deskripsi</label>
            <textarea name="description" id="edit_description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan deskripsi"></textarea>
        </div>

        <!-- GITHUB -->
        <div>
            <label class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">Github</label>
            <input name="github" id="edit_github" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan tautan Github">
        </div>

        <!-- LIVE LINK -->
        <div>
            <label class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">Tautan Demo</label>
            <input name="link" id="edit_link" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan tautan Demo">
        </div>

        <!-- BUTTON -->
        <button type="submit" class="w-full py-2 text-white bg-blue-600 hover:bg-blue-700 rounded-lg transition duration-200 font-medium mt-4">
            Update Project
        </button>
    </form>
</div>
<script>
const input = document.getElementById('file_input');
const preview = document.getElementById('image_preview');
const removeBtn = document.getElementById('remove_image');

input.addEventListener('change', function () {
    const file = this.files[0];

    if (file) {
        preview.src = URL.createObjectURL(file);
        preview.classList.remove('hidden');
        removeBtn.classList.remove('hidden');
    }
});

removeBtn.addEventListener('click', function () {
    input.value = "";
    preview.src = "";
    preview.classList.add('hidden');
    removeBtn.classList.add('hidden');
});

// Delete Modal Handler
function openDeleteModal(projectId, projectTitle) {
    const modal = document.getElementById('deleteModal');
    document.getElementById('projectTitle').textContent = projectTitle;
    document.getElementById('deleteForm').action = `/dashboard/project/${projectId}`;
    modal.classList.remove('hidden');
}

// Edit Drawer Handler
function openEditDrawer(project) {
    // Set form action
    document.getElementById('editForm').action = `/dashboard/project/${project.id}`;
    
    // Fill form data
    document.getElementById('edit_title').value = project.title;
    document.getElementById('edit_description').value = project.description;
    document.getElementById('edit_github').value = project.github || '';
    document.getElementById('edit_link').value = project.link || '';
    
    // Set current image
    document.getElementById('edit_image_current').src = project.image;
    
    // Reset image preview
    document.getElementById('edit_file_input').value = '';
    document.getElementById('edit_image_preview').classList.add('hidden');
    document.getElementById('edit_remove_image').classList.add('hidden');
    
    // Show edit drawer using Flowbite
    const drawer = document.getElementById('drawer-edit-example');
    drawer.classList.remove('translate-x-full');
}

// Edit image preview handler
const editFileInput = document.getElementById('edit_file_input');
const editImagePreview = document.getElementById('edit_image_preview');
const editRemoveBtn = document.getElementById('edit_remove_image');

editFileInput.addEventListener('change', function () {
    const file = this.files[0];
    if (file) {
        editImagePreview.src = URL.createObjectURL(file);
        editImagePreview.classList.remove('hidden');
        editRemoveBtn.classList.remove('hidden');
    }
});

editRemoveBtn.addEventListener('click', function () {
    editFileInput.value = "";
    editImagePreview.src = "";
    editImagePreview.classList.add('hidden');
    editRemoveBtn.classList.add('hidden');
});

function closeDeleteModal() {
    const modal = document.getElementById('deleteModal');
    modal.classList.add('hidden');
}

function confirmDelete() {
    document.getElementById('deleteForm').submit();
}

// Close modal when clicking outside
document.addEventListener('click', function(event) {
    const modal = document.getElementById('deleteModal');
    const modalContent = modal.querySelector('[role="dialog"]');
    if (event.target === modal && !modalContent.contains(event.target)) {
        closeDeleteModal();
    }
});
</script>

<!-- Delete Confirmation Modal -->
<div id="deleteModal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/50">
    <div role="dialog" class="relative w-full max-w-md px-4 h-auto md:h-auto">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button 
                type="button" 
                onclick="closeDeleteModal()"
                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-6 text-center">
                <svg class="mx-auto mb-4 w-14 h-14 text-gray-400 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4v.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                    Apakah Anda yakin ingin menghapus project
                    <span class="font-semibold text-gray-900 dark:text-white" id="projectTitle"></span>?
                </h3>
                <form id="deleteForm" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button 
                        type="button"
                        onclick="confirmDelete()"
                        class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                        Hapus
                    </button>
                </form>
                <button 
                    type="button" 
                    onclick="closeDeleteModal()"
                    class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                    Batal
                </button>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
