@extends('layouts.app')


@section('content')

<!-- component -->
<div class="text-gray-900 bg-gray-200">
    <div class="p-4 flex flex-col">
        <h1 class="text-3xl mb-5">
            Missions
        </h1>
        <a href="/jobs/create" class="w-32 mr-3 text-center text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Create</a>
    </div>
    <div class="px-3 py-4 flex justify-center">
        <table class="w-full text-md bg-white shadow-md rounded mb-4">
            <tbody>
                <tr class="border-b">
                    <th class="text-left p-3 px-5">Title</th>
                    <th class="text-left p-3 px-5">created_at</th>
                    <th class="text-left p-3 px-5">updated_at</th>
                    <th class="text-left p-3 px-5">Price</th>
                    <th></th>
                </tr>
                @foreach ($jobs as $job)
                <tr class="border-b hover:bg-orange-100 bg-gray-100">
                    <td class="p-3 px-5">{{ $job->title }}</td>
                    <td class="p-3 px-5">{{ $job->created_at }}</td>
                    <td class="p-3 px-5">{{ $job->updated_at }}</td>
                    <td class="p-3 px-5">{{ number_format($job->price / 100, 2, ',',' ') }} MAD</td>
                    <td class="p-3 px-5 flex justify-end">
                        <a href="/jobs/edit/{{ $job->id}}" class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Edit</a>
                        <span class="float-right">
                            <form action="/jobs/destroy/{{ $job->id }}" method="POST">
                                @csrf 
                                @method('delete')
                                <button type="submit" class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Delete</button>
                            </form>
                        </span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection