<?php

namespace App\Services;

use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CategoryService
{
    public function store(array $data): Category
    {
        if (isset($data['image'])) {
            $data['image'] = $data['image']->store('categories', 'public');
        }

        $data['slug'] = Str::slug($data['name']);

        $data['status'] = $data['status'] ?? false;

        return Category::create($data);
    }

    public function update(Category $category, array $data): Category
    {
        if (isset($data['image'])) {

            if ($category->image) {
                Storage::disk('public')->delete($category->image);
            }

            $data['image'] = $data['image']->store('categories', 'public');
        }

        $data['slug'] = Str::slug($data['name']);

        $data['status'] = $data['status'] ?? false;

        $category->update($data);

        return $category;
    }
    public function delete(Category $category): void
    {
        if ($category->image) {
            Storage::disk('public')->delete($category->image);
        }

        $category->delete();
    }
}
