<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-4 card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Total Students</h5>
                    <p class="card-text">0</p>
                    <a href="#" class="btn btn-primary">Go Stident List</a>
                </div>
            </div>
            <div class="col-md-4 card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Total Marksheet</h5>
                    <p class="card-text">0</p>
                    <a href="#" class="btn btn-primary">Go Marksheet List</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
