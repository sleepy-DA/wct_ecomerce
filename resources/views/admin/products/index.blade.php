@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-5">
        <h1 class="h3 mb-0 text-gray-800">Product Management</h1>
        <a href="{{ route('admin.products.create') }}" class="btn btn-success">
            <i class="fas fa-plus mr-2"></i>Add Product
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="card shadow-sm border-0">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="border-0 py-3 px-4">Image</th>
                            <th class="border-0 py-3">Product</th>
                            <th class="border-0 py-3 text-right">Price</th>
                            <th class="border-0 py-3 text-center">Stock</th>
                            <th class="border-0 py-3 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse($products as $product)
                        <tr>
                            <td class="align-middle px-4">
                                @if($product->image)
                                    <img src="{{ asset('storage/' . $product->image) }}" 
                                         alt="{{ $product->name }}" 
                                         class="img-thumbnail" 
                                         style="width: 60px; height: 60px; object-fit: cover;">
                                @else
                                    <div class="bg-light d-flex align-items-center justify-content-center" 
                                         style="width: 60px; height: 60px;">
                                        <i class="fas fa-image text-muted"></i>
                                    </div>
                                @endif
                            </td>
                            <td class="align-middle">
                                <div class="font-weight-500">{{ $product->name }}</div>
                                <small class="text-muted">{{ $product->sku ?? 'N/A' }}</small>
                            </td>
                            <td class="align-middle text-right font-weight-500">
                                ${{ number_format($product->price, 2) }}
                            </td>
                            <td class="align-middle text-center">
                                <span class="{{ $product->stock > 10 ? 'text-success' : 'text-warning' }}">
                                    {{ $product->stock }}
                                </span>
                            </td>
                            <td class="align-middle text-center">
                                <div class="d-flex justify-content-center">
                                    {{-- REMOVED VIEW BUTTON --}}
                                    <a href="{{ route('admin.products.edit', $product->id) }}" 
                                       class="btn btn-sm btn-light text-primary border-0 rounded-circle mr-2" 
                                       title="Edit">
                                        <i class="fas fa-edit fa-sm"></i>
                                    </a>
                                    <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="btn btn-sm btn-light text-danger border-0 rounded-circle" 
                                                title="Delete"
                                                onclick="return confirm('Are you sure you want to delete this product?')">
                                            <i class="fas fa-trash fa-sm"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-5 text-muted">
                                <i class="fas fa-box-open fa-2x mb-3"></i>
                                <p class="h5">No products found</p>
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <div class="mt-4 d-flex justify-content-center">
        <nav aria-label="Products pagination">
            {{ $products->onEachSide(1)->links('pagination::bootstrap-4') }}
        </nav>
    </div>
</div>
@endsection