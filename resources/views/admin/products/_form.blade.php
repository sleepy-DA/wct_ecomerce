<div class="form-group">
    <label for="name">Product Name</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" 
           id="name" name="name" value="{{ old('name', $product->name ?? '') }}" required>
    @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group">
    <label for="description">Description</label>
    <textarea class="form-control @error('description') is-invalid @enderror" 
              id="description" name="description" rows="3" required>{{ old('description', $product->description ?? '') }}</textarea>
    @error('description')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-row">
    <div class="form-group col-md-6">
        <label for="price">Price ($)</label>
        <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" 
               id="price" name="price" value="{{ old('price', $product->price ?? '') }}" min="0" required>
        @error('price')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group col-md-6">
        <label for="stock">Stock Quantity</label>
        <input type="number" class="form-control @error('stock') is-invalid @enderror" 
               id="stock" name="stock" value="{{ old('stock', $product->stock ?? 0) }}" min="0" required>
        @error('stock')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-6">
        <label for="category_id">Category</label>
        <select class="form-control @error('category_id') is-invalid @enderror" 
                id="category_id" name="category_id" required>
            <option value="">Select Category</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" 
                    {{ (old('category_id', $product->category_id ?? '') == $category->id ? 'selected' : '') }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
        @error('category_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

<div class="form-group">
    <label for="sku">SKU (Stock Keeping Unit)</label>
    <input type="text" class="form-control @error('sku') is-invalid @enderror" 
           id="sku" name="sku" value="{{ old('sku', $product->sku ?? '') }}">
    @error('sku')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    <small class="form-text text-muted">Leave blank to auto-generate</small>
</div>