@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-5">
        <h1 class="h3 mb-0 text-gray-800">Edit Product</h1>
        {{-- FIXED ROUTE HERE --}}
        <a href="{{ route('admin.products.index') }}" class="btn btn-light border shadow-sm">
            <i class="fas fa-arrow-left mr-2"></i>Back to Products
        </a>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body p-5">
            <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                @include('admin.products._form')
                
                <div class="form-group">
                    <label for="image">Product Image</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input @error('image') is-invalid @enderror" 
                               id="image" name="image">
                        <label class="custom-file-label" for="image">
                            {{ $product->image ? basename($product->image) : 'Choose file' }}
                        </label>
                        @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <small class="form-text text-muted">Upload product image (JPG, PNG, GIF - max 2MB)</small>
                </div>
                
                @if($product->image)
                <div class="form-group">
                    <label>Current Image</label>
                    <div>
                        <img src="{{ asset('storage/' . $product->image) }}" 
                             alt="Current Product Image" 
                             class="img-fluid rounded" 
                             style="max-height: 200px;">
                    </div>
                </div>
                @endif

                <div class="d-flex justify-content-between align-items-center mt-5">
                    <button type="reset" class="btn btn-light border">Reset Form</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save mr-2"></i>Update Product
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.getElementById('image').addEventListener('change', function(e) {
        const output = document.getElementById('imagePreview');
        const fileName = document.querySelector('.custom-file-label');
        const file = e.target.files[0];
        
        if (file) {
            // Update file name
            fileName.textContent = file.name;
            
            // Preview image (if there's a preview element, otherwise we can create one)
            if (output) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    output.src = e.target.result;
                    output.style.display = 'block';
                }
                reader.readAsDataURL(file);
            }
        } else {
            fileName.textContent = "{{ $product->image ? addslashes(basename($product->image)) : 'Choose file' }}";
            if (output) output.style.display = 'none';
        }
    });
</script>
@endsection