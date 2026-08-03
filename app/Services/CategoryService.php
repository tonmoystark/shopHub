<?php

namespace App\Services;

use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CategoryService
{

    public function __construct(
        protected SlugService $slugService
    ) {}
    public function store(array $data): Category
    {
        if (isset($data['image'])) {
            $data['image'] = $data['image']->store('categories', 'public');
        }

        $data['slug'] = $this->slugService->generate(
            $data['name'],
            Category::class
        );

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

        $data['slug'] = $this->slugService->generate(
            $data['name'],
            \App\Models\Category::class,
            $category->id
        );

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
