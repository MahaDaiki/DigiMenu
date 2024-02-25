<x-admin-layout>
    <div class="container bs5-grid-row bg-gray-500 p-4 rounded shadow mt-6">
        <h2 class="text-center mb-5 text-xl">Create Operateur</h2>
        <form  class="container" action="{{ route('Store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" value="{{ old('name') }}" name="name" class="form-control" >
            </div>
    
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" value="{{ old('email') }}" name="email" class="form-control" >
            </div>
    
            <div class="mb-3">
                <label for="password" class="form-label">password:</label>
                <input type="password" name="password" class="form-control">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">confirmation password:</label>
                <input type="password" name="conf_password" class="form-control">
            </div>
            <button type="submit"  class="btn btn-primary">Create</button>
        </form>
    </div>
</x-admin-layout>