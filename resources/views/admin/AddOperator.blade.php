<x-admin-layout>
    <div class="container bs5-grid-row bg-gray-500 p-4 rounded shadow mt-6">
        <h2 class="text-center mb-5 text-xl">Create Operateur</h2>
        <form  class="container" action="" method="POST">
            @csrf
    
            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" name="name" class="form-control" required>
            </div>
    
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" name="email" class="form-control" required>
            </div>
    
            <div class="mb-3">
                <label for="phone" class="form-label">Phone:</label>
                <input type="text" name="phone" class="form-control">
            </div>
            <button type="submit"  class="btn btn-success  ">Create</button>
        </form>
    </div>
    
   
</x-admin-layout>