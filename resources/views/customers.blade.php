@extends('layouts/master')
<?php
use App\Http\Controllers\CustomerController;
?>

@section('content')
    <div>
        <a href="/scan-customers"
            id="submit-button"
            class="float-right relative rounded px-5 py-2.5 mx-4 my-4 overflow-hidden group bg-green-500 hover:bg-gradient-to-r hover:from-green-500 hover:to-green-400 text-white hover:ring-2 hover:ring-offset-2 hover:ring-green-400 transition-all ease-out duration-300">
            
            <span
                class="absolute right-0 w-8 h-32 -mt-12 transition-all duration-1000 transform translate-x-12 bg-white opacity-10 rotate-12 group-hover:-translate-x-40 ease"></span>
            <span class="relative">Scan</span>
        </a>
        <a href="/customers"
            class="float-right relative rounded px-5 py-2.5 mx-4 my-4 overflow-hidden group bg-blue-500 hover:bg-gradient-to-r hover:from-blue-500 hover:to-blue-400 text-white hover:ring-2 hover:ring-offset-2 hover:ring-blue-400 transition-all ease-out duration-300">
            <span
                class="absolute right-0 w-8 h-32 -mt-12 transition-all duration-1000 transform translate-x-12 bg-white opacity-10 rotate-12 group-hover:-translate-x-40 ease"></span>
            <span class="relative">New Customers</span>
        </a>
    </div>
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
                    Date Of Birth
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
            </tr>
        </thead>
        <tbody>
            @foreach ($customers as $row)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
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
                </tr>
            @endforeach

        </tbody>
    </table>
    <script>
    const submitButton = document.getElementById('submit-button');
    submitButton.addEventListener('click', function() {
      const modal = document.createElement('div');
      modal.innerHTML = `
      <div class="fixed top-0 left-0 z-50 w-screen h-screen flex items-center justify-center" style="background: rgba(0, 0, 0, 0.3);">
          <div class="bg-white border py-2 px-5 rounded-lg flex items-center flex-col">
            <div class="loader-dots block relative w-20 h-5 mt-2">
              <div class="absolute top-0 mt-1 w-3 h-3 rounded-full bg-green-500"></div>
              <div class="absolute top-0 mt-1 w-3 h-3 rounded-full bg-green-500"></div>
              <div class="absolute top-0 mt-1 w-3 h-3 rounded-full bg-green-500"></div>
              <div class="absolute top-0 mt-1 w-3 h-3 rounded-full bg-green-500"></div>
            </div>
            <div class="text-gray-500 text-xs font-medium mt-2 text-center">
              Scanning...
            </div>
          </div>
          </div>
      `;
      document.body.appendChild(modal);
    });
  </script> 
  
    <style>

    .loader-dots div {
        animation-timing-function: cubic-bezier(0, 1, 1, 0);
    }
    .loader-dots div:nth-child(1) {
        left: 8px;
        animation: loader-dots1 0.6s infinite;
    }
    .loader-dots div:nth-child(2) {
        left: 8px;
        animation: loader-dots2 0.6s infinite;
    }
    .loader-dots div:nth-child(3) {
        left: 32px;
        animation: loader-dots2 0.6s infinite;
    }
    .loader-dots div:nth-child(4) {
        left: 56px;
        animation: loader-dots3 0.6s infinite;
    }
    @keyframes loader-dots1 {
        0% {
            transform: scale(0);
        }
        100% {
            transform: scale(1);
        }
    }
    @keyframes loader-dots3 {
        0% {
            transform: scale(1);
        }
        100% {
            transform: scale(0);
        }
    }
    @keyframes loader-dots2 {
        0% {
            transform: translate(0, 0);
        }
        100% {
            transform: translate(24px, 0);
        }
    }
    </style>
  @endsection
