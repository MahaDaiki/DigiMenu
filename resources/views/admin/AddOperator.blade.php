<x-admin-layout>
    <div class="container mx-auto bg-gray-500 p-4 rounded shadow mt-6">
        <h2 class="text-center mb-5 text-xl text-white">Create Operator</h2>
        <form class="max-w-md mx-auto" action="{{ route('Store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-white">Name:</label>
                <input type="text" value="{{ old('name') }}" name="name" class="w-full px-3 py-2 border rounded" >
            </div>
    
            <div class="mb-4">
                <label for="email" class="block text-white">Email:</label>
                <input type="email" value="{{ old('email') }}" name="email" class="w-full px-3 py-2 border rounded" >
            </div>
    
            <div class="mb-4">
                <label for="password" class="block text-white">Password:</label>
                <input type="password" name="password" class="w-full px-3 py-2 border rounded">
            </div>

            <div class="mb-4">
                <label for="conf_password" class="block text-white">Confirmation Password:</label>
                <input type="password" name="conf_password" class="w-full px-3 py-2 border rounded">
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Create</button>
        </form>
    </div>
</x-admin-layout>
