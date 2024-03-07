<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white-800 dark:text-gray-200 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>
    <div class="container mt-5">
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>

                    <th scope="col" class="text-white">Id</th>
                    <th scope="col" class="text-white">Name</th>
                    <th scope="col" class="text-white">Email</th>
                    <th scope="col" class="text-white">verification du email</th>
                    <th scope="col" class="text-white">Provider</th>
                    <th scope="col" class="text-white">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                    <tr>
                        <th scope="row" class="text-white">{{ $user->id }}</th>
                        <td class="text-white">{{ $user->name }}</td>
                        <td class="text-white">{{ $user->email }}</td>
                        <td class="text-white">{{ $user->email_verified_at }}</td>
                        <td class="text-white">
                            @if ($user->provider)
                                {{ $user->provider }}
                            @else
                                No Provider
                            @endif
                        </td>
                        <td class="text-white">
                       
                        <form action="{{ route('user.destroy', ['user' => $user->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Delete user</button>
                        </form>
                    </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-white">No users</td>
                    </tr>
                @endforelse
            </tbody>

        </table>
        {{ $users->links() }}
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
