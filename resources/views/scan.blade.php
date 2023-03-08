@extends('layouts/master')

@section('content')
    <div class="flex">
        <div class="w-11/12 p-4 my-4 mr-2 text-sm text-red-800 rounded-lg border bg-white dark:bg-gray-800 dark:text-red-400"
            role="alert">
            <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                    clip-rule="evenodd">
                </path>
            </svg>
            <span class="font-bold">{{ $total }}</span> fraudulent customers detected.
        </div>
        <div class="w-1/12">
            <a href="/customers"
                class="float-right relative rounded px-5 py-4 my-4 overflow-hidden group bg-blue-500 hover:bg-gradient-to-r hover:from-blue-500 hover:to-blue-400 text-white hover:ring-2 hover:ring-offset-2 hover:ring-blue-400 transition-all ease-out duration-300">
                <span
                    class="absolute right-0 w-8 h-32 -mt-12 transition-all duration-1000 transform translate-x-12 bg-white opacity-10 rotate-12 group-hover:-translate-x-40 ease"></span>
                <span class="relative">New</span>
            </a>
        </div>
    </div>
    <div class="container mx-auto">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-2 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-2 py-3">
                        Last Name
                    </th>
                    <th scope="col" class="px-2 py-3">
                        Adress
                    </th>
                    <th scope="col" class="px-2 py-3">
                        City
                    </th>
                    <th scope="col" class="px-2 py-3">
                        Bsn
                    </th>
                    <th scope="col" class="px-4 py-3">
                        Date of Birth
                    </th>
                    <th scope="col" class="px-2 py-3">
                        Phone
                    </th>
                    <th scope="col" class="px-2 py-3">
                        Ip Adress
                    </th>
                    <th scope="col" class="px-2 py-3">
                        Iban
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customers as $row)
                    <tr @if ($row->isFraudulent == 1) class="bg-red-100 border-b hover:bg-red-200" @endif
                        class="bg-white border-b hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="px-2 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $row->firstName }}
                        </th>
                        <td class="px-2 py-4">
                            {{ $row->lastName }}
                        </td>
                        <td class="px-2 py-4">
                            {{ $row->address }}
                        </td>
                        <td class="px-2 py-4">
                            {{ $row->city }}
                        </td>
                        <td class="px-2 py-4">
                            {{ $row->bsn }}
                        </td>
                        <td class="px-6 py-4" style="width: 7.5rem">
                            {{ $row->dateOfBirth }}
                        </td>
                        <td class="px-2 py-4">
                            {{ $row->phoneNumber }}
                        </td>
                        <td class="px-2 py-4">
                            {{ $row->ipAddress }}
                        </td>
                        <td class="px-2 py-4">
                            {{ $row->iban }}
                        </td>
                        @if ($row->isFraudulent == 1)
                            <td class="px-2 py-4">
                                <a href="/scan-customers/{{ $row->id }}"
                                    class="float-right relative rounded px-5 py-2.5 mx-4 my-4 overflow-hidden group bg-red-500 hover:bg-gradient-to-r hover:from-red-500 hover:to-red-400 text-white hover:ring-2 hover:ring-offset-2 hover:ring-red-400 transition-all ease-out duration-300">
                                    <span
                                        class="absolute right-0 w-8 h-32 -mt-12 transition-all duration-1000 transform translate-x-12 bg-white opacity-10 rotate-12 group-hover:-translate-x-40 ease"></span>
                                    <span class="relative">Detail</span>
                                </a>
                            </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
