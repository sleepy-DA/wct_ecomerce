@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-5">
        <h1 class="h3 mb-0 text-gray-800">Add New Product</h1>
        <a href="{{ route('admin.products.index') }}" class="btn btn-light border shadow-sm">
    <i class="fas fa-arrow-left mr-2"></i>Back to Products
</a>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body p-5">
<form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
                    @include('admin.products._form')
                
                <div class="form-group">
                    <label for="image">Product Image</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input @error('image') is-invalid @enderror" 
                               id="image" name="image">
                        <label class="custom-file-label" for="image">Choose file</label>
                        @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <small class="form-text text-muted">Upload product image (JPG, PNG, GIF - max 2MB)</small>
                </div>
                
                <div class="form-group">
                    <img id="imagePreview" src="#" alt="Image Preview" 
                         class="img-fluid rounded" style="display: none; max-height: 200px;">
                </div>

                <div class="d-flex justify-content-between align-items-center mt-5">
                    <button type="reset" class="btn btn-light border">Reset Form</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save mr-2"></i>Create Product
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
            
            // Preview image
            const reader = new FileReader();
            reader.onload = function(e) {
                output.src = e.target.result;
                output.style.display = 'block';
            }
            reader.readAsDataURL(file);
        } else {
            fileName.textContent = 'Choose file';
            output.style.display = 'none';
        }
    });
</script>
@endsection