<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Category <b></b>
        <!-- {{ __('Dashboard') }} -->
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Edit Category</div>
                        <div class="card-body">
                            <form action="{{ url('category/update/'.$category->id) }}" method="POST">
                                @csrf
                        <div class="mb-1 form-group">
                            <label for="exampleFormControlInput1" class="form-label">Category Name</label>
                            <input type="text" value="{{ old('category_name', $category->category_name) }}" class="form-control" id="exampleFormControlInput1" name="category_name" placeholder="Category Name">
                            @error('category_name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary w-full my-2">Update Category</button>
                        </form>
                        </div>
                    </div>
                </div>
</div>
    </div>
    </div>
</x-app-layout>
