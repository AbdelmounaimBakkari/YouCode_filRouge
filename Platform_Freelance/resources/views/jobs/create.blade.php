@extends('layouts.app')

@section('content')

<div class="py-12">
    <h3 class="text-2xl text-gray-900 font-semibold mx-16 mb-8">Créer un service</h3>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-gray-300 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="px-6 bg-gray-300 border-gray-200">
                <form action="{{ route('jobs.store') }}" method="POST" class="form bg-gray-100 p-6 my-10 relative">
                    @csrf   
                    <input type="text" name="title" placeholder="Nom de votre service" class="border p-2 w-full mt-3">
                    <textarea name="description" cols="20" rows="9" placeholder="Description .." class="border p-2 mt-3 w-full"></textarea>
                    <input type="number" name="price" placeholder="prix en MAD" class="border p-2 w-full mt-3">
                    <button type="submit" class="w-1/3 rounded-md mt-6 bg-blue-400 hover:bg-gray-800 text:black hover:text-white font-semibold p-3">Créer le service</button>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection