<x-app-layout>



    <div class="py-8">

        <div class="max-w-7xl mx-auto px-6">

            <!-- Hero Section -->

            <div class="bg-gradient-to-r from-indigo-600 via-blue-600 to-cyan-600 rounded-2xl shadow-xl p-8 mb-8">

                <div class="flex flex-col lg:flex-row justify-between items-center gap-6 text-center lg:text-left">

                    <div>

                        <h1 class="text-4xl font-bold text-white">
                            Task Management
                        </h1>

                        <p class="text-indigo-100 mt-2 text-lg">
                            Organize your work, manage deadlines and boost your productivity.
                        </p>

                    </div>

                    <a href="{{ route('tasks.create') }}"
                        class="bg-white text-indigo-700 font-semibold px-6 py-3 rounded-xl shadow-lg hover:scale-105 transition duration-300">

                        + Add New Task

                    </a>

                </div>

            </div>

            <!-- Success Message -->

            @if(session('success'))

            <div class="mb-6 bg-green-100 border border-green-300 text-green-700 px-5 py-4 rounded-xl">

                {{ session('success') }}

            </div>

            @endif

            <!-- Search Card -->

            <div class="bg-white rounded-2xl shadow-lg p-6 mb-8">

                <form method="GET"
                    action="{{ route('tasks.index') }}"
                    class="grid grid-cols-1 md:grid-cols-4 gap-4">

                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Search task title..."
                        class="border-gray-300 rounded-xl focus:ring-indigo-500 focus:border-indigo-500">

                    <select
                        name="status"
                        class="border-gray-300 rounded-xl focus:ring-indigo-500 focus:border-indigo-500">

                        <option value="">All Status</option>

                        <option value="Pending"
                            {{ request('status')=='Pending' ? 'selected' : '' }}>
                            Pending
                        </option>

                        <option value="In Progress"
                            {{ request('status')=='In Progress' ? 'selected' : '' }}>
                            In Progress
                        </option>

                        <option value="Completed"
                            {{ request('status')=='Completed' ? 'selected' : '' }}>
                            Completed
                        </option>

                    </select>

                    <button
                        type="submit"
                        class="bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl font-semibold transition">

                        Search

                    </button>

                    <a href="{{ route('tasks.index') }}"
                        class="bg-gray-500 hover:bg-gray-600 text-white rounded-xl font-semibold flex justify-center items-center transition">

                        Reset

                    </a>

                </form>

            </div>

            <!-- Table Card -->

            <div class="bg-white rounded-2xl shadow-lg overflow-hidden">

                <div class="overflow-x-auto">

                    <table class="min-w-full">

                        <thead class="bg-gray-100">

                            <tr>

                                <th class="px-6 py-4 text-left font-semibold">#</th>

                                <th class="px-6 py-4 text-left font-semibold">
                                    Title
                                </th>

                                <th class="px-6 py-4 text-left font-semibold">
                                    Status
                                </th>

                                <th class="px-6 py-4 text-left font-semibold">
                                    Due Date
                                </th>

                                <th class="px-6 py-4 text-center font-semibold">
                                    Actions
                                </th>

                            </tr>

                        </thead>

                        <tbody>

                            @forelse($tasks as $task)

                            <tr class="border-b hover:bg-gray-50 transition">

                                <td class="px-6 py-4">
                                    {{ $loop->iteration }}
                                </td>

                                <td class="px-6 py-4 font-semibold text-gray-700">
                                    {{ $task->title }}
                                </td>

                                <td class="px-6 py-4">

                                    @if($task->status == 'Pending')

                                    <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm font-medium">
                                        Pending
                                    </span>

                                    @elseif($task->status == 'In Progress')

                                    <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm font-medium">
                                        In Progress
                                    </span>

                                    @else

                                    <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-medium">
                                        Completed
                                    </span>

                                    @endif

                                </td>

                                <td class="px-6 py-4">
                                    {{ \Carbon\Carbon::parse($task->due_date)->format('d M Y') }}
                                </td>

                                <td class="px-6 py-4">

                                    <div class="flex flex-wrap justify-center gap-2">

                                        <a href="{{ route('tasks.show',$task->id) }}"
                                            class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg transition">

                                            View

                                        </a>

                                        <a href="{{ route('tasks.edit',$task->id) }}"
                                            class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg transition">

                                            Edit

                                        </a>

                                        <form action="{{ route('tasks.destroy',$task->id) }}"
                                            method="POST">

                                            @csrf
                                            @method('DELETE')

                                            <button
                                                onclick="return confirm('Delete this task?')"
                                                class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg transition">

                                                Delete

                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                            @empty

                            <tr>

                                <td colspan="5" class="py-16 text-center">

                                    <div class="text-6xl mb-4">
                                        📋
                                    </div>

                                    <h2 class="text-2xl font-bold text-gray-700">
                                        No Tasks Found
                                    </h2>

                                    <p class="text-gray-500 mt-2">
                                        Start by creating your first task.
                                    </p>

                                    <a href="{{ route('tasks.create') }}"
                                        class="inline-block mt-6 bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-xl">

                                        Create Task

                                    </a>

                                </td>

                            </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

            <!-- Pagination -->

            <div class="mt-8">

                {{ $tasks->links() }}

            </div>

        </div>

    </div>

</x-app-layout>