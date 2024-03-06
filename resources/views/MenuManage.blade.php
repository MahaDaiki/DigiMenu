<x-app-layout>
    <div class="container">
        <h1 class="h1 text-center">{{ $menu->title }} - Management</h1>
        
        @if(session()->has('success'))
            <div class="alert alert-success mt-4">
                {{ session()->get('success') }}
            </div>
        @endif

        @if(session()->has('error'))
            <div class="alert alert-danger mt-4">
                {{ session()->get('error') }}
            </div>
        @endif

        <div class="mb-4 container card mt-4 p-4 text-center">
            <h2>Add New Article</h2>
            <form action="{{ route('articles.store', ['menu_id' => $menu->id]) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" name="Title" id="title" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="content">Content:</label>
                    <textarea name="Content" id="content" class="form-control" required></textarea>
                </div>
                <div class="d-flex">
                    <div class="form-group">
                        <label for="price">Price:</label>
                        <input type="number" name="Price" id="price" class="form-control" required>
                    </div>
                    <div class="form-group ml-3">
                        <label for="category">Category:</label>
                        <select name="Category_id" id="category" class="form-control" required>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group ml-3 hidden">
                        <label for="category">Category:</label>
                        <select name="cat" id="category" class="form-control" required>
                            <option value="ff">ffff</option>
                            <option value="ff">ffffffffff</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Add Article</button>
            </form>
        </div>

        <!-- Display existing articles -->
        <div class="row">
            @forelse ($articles as $article)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title h4">{{ $article->Title }}</h2>
                            <p>{{ $article->Content }}</p>
                            <p>Price: {{ $article->Price }} DH</p>
                            <h2 class="h6"> {{ $article->Category->name }}</h2>
                            <button type="button" class="" data-toggle="modal" data-target="#editModal" data-article-id="{{ $article->id }}">
                                <i class="fas fa-edit"></i>
                            </button>
                            
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </div>
                    </div>
                </div>
           
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Article</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('articles.update', $article->id) }}">
                        @csrf
                        @method('PUT')
                       
                        <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text" name="Title" id="title" class="form-control" value=" {{ $article->Title }}" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="content">Content:</label>
                            <textarea name="Content" id="content" class="form-control" required>{{ $article->Content}}</textarea>
                        </div>
                        
                        <div class="d-flex">
                            <div class="form-group">
                                <label for="price">Price:</label>
                                <input type="number" name="Price" id="price" class="form-control" value="{{ $article->Price }}" required>
                            </div>
                            
                            <div class="form-group ml-3">
                                <label for="category">Category:</label>
                                <select name="Category_id" id="category" class="form-control" required>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('Category_id') == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            
                        
                            <div class="form-group ml-3 hidden">
                                <!-- The hidden field for old category value (if needed) -->
                                <input type="hidden" name="old_cat" value="{{ old('Category_id') }}">
                                
                                <label for="category">Category:</label>
                                <select name="cat" id="category" class="form-control" required>
                                    <option value="ff">ffff</option>
                                    <option value="ff">ffffffffff</option>
                                </select>
                                
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Article</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Delete Article</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('articles.destroy', $article->id) }}">
                        @csrf
                        @method('DELETE')
                        <p>Are you sure you want to delete this article?</p>
                        <button type="submit" class="btn btn-danger">Delete Article</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @empty
                <div class="col-md-12">
                    <p>No articles available.</p>
                </div>
            @endforelse
</x-app-layout>
