@extends('admin.layouts.app')

@section('content')

<x-admin.page
    title="Categories"
    description="Manage all product categories."
>

    <x-slot:actions>

    <div class="flex flex-col gap-3 sm:flex-row sm:items-center">

        <x-admin.search
            placeholder="Search categories..."
        />

        <x-admin.button
            href="{{ route('categories.create') }}"
        >
            + Add Category
        </x-admin.button>

    </div>

</x-slot:actions>

    <x-admin.card>

        <x-admin.table>

            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">
                        Image
                    </th>

                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">
                        Name
                    </th>

                    <th class="hidden md:table-cell px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">
    Slug
</th>

                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">
                        Status
                    </th>

                    <th class="px-6 py-3 text-center text-xs font-semibold uppercase tracking-wider text-gray-600">
                        Actions
                    </th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-200 bg-white">

                @forelse($categories as $category)

                    <tr class="hover:bg-gray-50 transition">

                        <td class="px-6 py-4">
                            <img
                                src="{{ asset('storage/' . $category->image) }}"
                                alt="{{ $category->name }}"
                                class="h-14 w-14 rounded-lg object-cover"
                            >
                        </td>

                        <td class="px-6 py-4 font-medium">
                            {{ $category->name }}
                        </td>

                        <td class="hidden md:table-cell px-6 py-4 text-gray-500">
    {{ $category->slug }}
</td>

                        <td class="px-6 py-4">
                            @if($category->status)
                                <x-admin.badge variant="success">
                                    Active
                                </x-admin.badge>
                            @else
                                <x-admin.badge variant="danger">
                                    Inactive
                                </x-admin.badge>
                            @endif
                        </td>

                        <td class="px-6 py-4">
                            <div class="flex justify-center gap-2">

                                <x-admin.button
                                    href="{{ route('categories.edit', $category) }}"
                                    variant="secondary"
                                >
                                    Edit
                                </x-admin.button>

                                <form
                                    action="{{ route('categories.destroy', $category) }}"
                                    method="POST"
                                    class="delete-form inline"
                                >
                                    @csrf
                                    @method('DELETE')

                                    <x-admin.button
                                        type="submit"
                                        variant="danger"
                                    >
                                        Delete
                                    </x-admin.button>
                                </form>

                            </div>
                        </td>

                    </tr>

                @empty

<tr>
    <td colspan="5" class="p-8">

        <x-admin.empty-state
            title="No Categories Found"
            description="Create your first category to get started."
        >
        <x-slot:icon>
        <!-- Any SVG -->
    </x-slot:icon>

            <x-slot:action>

                <x-admin.button
                    href="{{ route('categories.create') }}"
                >
                    + Add Category
                </x-admin.button>

            </x-slot:action>

        </x-admin.empty-state>

    </td>
</tr>

@endforelse

            </tbody>

        </x-admin.table>
        <div class="border-t border-gray-200 px-6 py-4">
        {{ $categories->links() }}
    </div>

    </x-admin.card>

</x-admin.page>

@endsection