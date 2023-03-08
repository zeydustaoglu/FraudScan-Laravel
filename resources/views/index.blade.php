@extends('layouts/master')

@section('content')
    <div class="mx-auto max-w-2xl mb-12">
        <div class="text-center">
            <img src="{{ asset('images/index.png')}}" class="h-72 w-full object-cover object-center" alt="description of myimage">
            <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-5xl">Uncover Hidden Fraudsters Within Your Data </h1>
            <p class="mt-6 text-lg leading-8 text-gray-600">Anim aute id magna aliqua ad ad non deserunt sunt. Qui irure qui lorem cupidatat commodo. Elit sunt amet fugiat veniam occaecat fugiat aliqua.</p>
            <div class="mt-10 flex items-center justify-center gap-x-6">
                <a href="/customers" class="float-right relative rounded px-5 py-4 my-4 overflow-hidden group bg-blue-500 hover:bg-gradient-to-r hover:from-blue-500 hover:to-blue-400 text-white hover:ring-2 hover:ring-offset-2 hover:ring-blue-400 transition-all ease-out duration-300">
                    <span class="absolute right-0 w-8 h-32 -mt-12 transition-all duration-1000 transform translate-x-12 bg-white opacity-10 rotate-12 group-hover:-translate-x-40 ease"></span>
                    <span class="relative">Get Started</span>
                </a>         
                <a href="#" class="text-sm font-semibold leading-6 text-gray-900">Learn more <span aria-hidden="true">→</span></a>
            </div>
        </div>
    </div>
@endsection


