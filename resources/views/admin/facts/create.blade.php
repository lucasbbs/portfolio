@extends('admin.admin_master')
@section('admin')
    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-border-bottom">
                            <h2>
                                @if (isset($fact))
                                    Edit Fact
                                @else
                                    Create Fact
                                @endif
                            </h2>
                        </div>
                        <div class="card-body">
                            <form action="{{ $route }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="icon_id">
                                <div class="mb-1 form-group">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text"
                                        value="{{ old('fact_name', isset($fact) ? $fact->name : '') }}"
                                        class="form-control" id="name" name="name" placeholder="Fact Name">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-1 form-group">
                                    <label for="description" class="form-label">Description</label>
                                    <input type="text" placeholder="Fact Description" class="form-control" id="description" name="description" rows="3" value="{{ old('description', isset($fact) ? $fact->description : '') }}" />
                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-1 form-group">
                                    <label for="number" class="form-label">Number</label>
                                    <input type="number" placeholder="Fact Number" class="form-control" id="number" name="number" value="{{ old('number', isset($fact) ? $fact->number : '') }}" />
                                    @error('number')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-1 form-group">
                                    <div class="row justify-content-between">
                                        <select id="category-select">
                                            <option value="0">Select Category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->category }}">{{ ucfirst($category->category) }}</option>
                                            @endforeach
                                        </select>
                                        <div><input type="text" id="search" placeholder="Search"></div>
                                    </div>
                                    <div id='icon-container' style="height: 300px; overflow-y: auto; width: 100%">
                                        @foreach ($icons as $icon)
                                            <button type="button" class="btn btn-info m-2" data-id="{{ $icon->id }}"
                                                data-value="{{ $icon->category }}" data-name="{{ $icon->name }}"><i
                                                    class="{{ $icon->classes }} h1"></i></button>
                                        @endforeach
                                    </div>
                                    @error('icon_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary w-full my-2">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<script>
    window.onload = function() {
        const searchInput = document.getElementById('search');
        const categorySelect = document.getElementById('category-select');

        searchInput.addEventListener('keydown', () => {
            const searchValue = searchInput.value.toLowerCase();
            const buttons = document.querySelectorAll('[data-name]');
            categorySelect.value = '0';
            buttons.forEach(function(button) {
                if (button.dataset.name.toLowerCase().includes(searchValue)) {
                    button.style.display = 'inline-block';
                } else {
                    button.style.display = 'none';
                }
            });
        });


        categorySelect.addEventListener('change', () => {
            const categoryButtons = document.querySelectorAll('[data-value]');
            categoryButtons.forEach(function(button) {
                searchInput.value = '';
                if (categorySelect.value === '0') {
                    button.style.display = 'inline-block';
                } else if (categorySelect.value === button.dataset.value) {
                    button.style.display = 'inline-block';
                } else {
                    button.style.display = 'none';
                }
            });
        });

        const buttons = document.querySelectorAll('[data-value]');
        buttons.forEach(function(button) {
            button.addEventListener('click', function() {
                const input = document.querySelector('input[name="icon_id"]');
                buttons.forEach(function(btn) {
                        btn.style.removeProperty('background-color');
                        btn.style.removeProperty('color');
                });
                button.style.backgroundColor = '#ffffff';
                button.style.color = '#13cae1';
                input.value = button.dataset.id;
            });
        });
    };
</script>
