@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h2 class="text-2xl font-bold mb-4">All Customers</h2>
    <table class="table-auto w-full">
        <thead>
            <tr>
                <th class="px-4 py-2">Name</th>
                <th class="px-4 py-2">Email</th>
                <th class="px-4 py-2">Address</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customers as $customer)
                <tr>
                    <td class="border px-4 py-2">{{ $customer->name }}</td>
                    <td class="border px-4 py-2">{{ $customer->email }}</td>
                    <td class="border px-4 py-2">{{ $customer->address }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
