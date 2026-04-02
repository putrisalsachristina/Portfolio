<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
<div class="relative overflow-x-auto bg-neutral-primary-soft shadow-xs rounded-base border border-default bg-white rounded-lg mt-4">
    <table class="w-full text-sm text-left rtl:text-right text-body">
        <thead class="bg-neutral-secondary-soft border-b border-default">
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
</x-app-layout>
