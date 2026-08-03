<div class="grid gap-6 md:grid-cols-2">

    <x-admin.input
        name="name"
        label="Product Name"
        :value="$product->name"
        required
    />

    <x-admin.select
        name="category_id"
        label="Category"
        required
    >

        <option value="">
            Select Category
        </option>

        @foreach($categories as $category)

            <option
                value="{{ $category->id }}"
                @selected(old('category_id', $product->category_id) == $category->id)
            >
                {{ $category->name }}
            </option>

        @endforeach

    </x-admin.select>

    <x-admin.input
        name="sku"
        label="SKU"
        :value="$product->sku"
        required
    />

    <x-admin.input
        name="stock"
        type="number"
        label="Stock"
        :value="$product->stock"
        required
    />

    <x-admin.input
        name="price"
        type="number"
        step="0.01"
        label="Price"
        :value="$product->price"
        required
    />

    <x-admin.input
        name="sale_price"
        type="number"
        step="0.01"
        label="Sale Price"
        :value="$product->sale_price"
    />

</div>

<div class="mt-6">

    <x-admin.textarea
        name="description"
        label="Description"
        rows="6"
        :value="$product->description"
    />

</div>

<div class="mt-6 flex flex-col gap-4 sm:flex-row sm:gap-8">

    <x-admin.checkbox
        name="status"
        label="Active"
        :checked="old('status', $product->status)"
    />

    <x-admin.checkbox
        name="is_featured"
        label="Featured Product"
        :checked="old('is_featured', $product->is_featured)"
    />

</div>

<div class="mt-6">

    <x-admin.image-upload
        name="images"
        label="Product Images"
        multiple
        help="Upload JPG, PNG or WEBP images. Maximum size: 2 MB each."
    />

</div>