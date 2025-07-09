@extends('backend.layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<div class="bg-white rounded shadow p-6">
    <h2 class="text-2xl font-semibold mb-4">Welcome to the Admin Dashboard</h2>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="bg-blue-100 p-4 rounded shadow">
            <h3 class="text-lg font-bold">Total Users</h3>
            <p class="text-2xl">120</p>
        </div>
        <div class="bg-green-100 p-4 rounded shadow">
            <h3 class="text-lg font-bold">New Orders</h3>
            <p class="text-2xl">15</p>
        </div>
        <div class="bg-yellow-100 p-4 rounded shadow">
            <h3 class="text-lg font-bold">Pending Tasks</h3>
            <p class="text-2xl">3</p>
        </div>
    </div>
</div>
@endsection
