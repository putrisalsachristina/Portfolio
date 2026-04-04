<x-app-layout> 
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <button data-drawer-target="drawer-right-example" data-drawer-show="drawer-right-example" data-drawer-placement="right" type="button" class="text-body bg-white border border-default hover:bg-neutral-secondary-medium hover:text-heading focus:ring-4 focus:ring-neutral-tertiary-soft shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">Tambah</button>
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
                <th scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                    {{ $item->image }}
                </th>
                <td class="px-6 py-4">
                    {{ $item->title }}
                </td>
                <td class="px-6 py-4">
                    {{ $item->description }}
                </td>
                <td class="px-6 py-4">
                    {{ $item->github }}
                </td>
                <td class="px-6 py-4">
                    {{ $item->link }}
                </td>
                <td class="px-6 py-4">
                    <a href="#" class="font-medium text-fg-brand hover:underline">Edit</a>
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
   <form action="#" method="POST" class="space-y-4">

    <!-- TITLE -->
    <div>
        <label class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">
            Title
        </label>
        <input type="text" name="title"
            class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:text-white"
            placeholder="Project title">
    </div>

    <!-- DESCRIPTION -->
    <div>
        <label class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">
            Description
        </label>
        <textarea name="description" rows="3"
            class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:text-white"
            placeholder="Project description"></textarea>
    </div>

    <!-- IMAGE -->
    <div>
        <label class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">
            Image URL
        </label>
        <input type="file" name="image"
            class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:text-white">
    </div>

    <!-- GITHUB -->
    <div>
        <label class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">
            Github Link
        </label>
        <input type="text" name="github"
            class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:text-white"
            placeholder="Github">
    </div>

    <!-- LIVE LINK -->
    <div>
        <label class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">
            Live Demo Link
        </label>
        <input type="text" name="link"
            class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:text-white"
            placeholder="Link">
    </div>

    <!-- BUTTON -->
    <button type="submit"
        class="w-full py-2 text-white bg-blue-600 hover:bg-blue-700 rounded-lg transition duration-200 font-medium">
        Save Project
    </button>

</form>
</div>

</x-app-layout>
