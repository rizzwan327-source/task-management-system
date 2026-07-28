<x-app-layout>



    <div class="py-8">

        <div class="max-w-7xl mx-auto px-6">

            <!-- Hero Section -->

            <div class="bg-gradient-to-r from-indigo-600 via-blue-600 to-cyan-600 rounded-2xl shadow-xl p-8 mb-8">

                <div class="flex flex-col lg:flex-row justify-between items-center gap-6">

                    <div class="text-center lg:text-left">

                        <h1 class="text-3xl md:text-4xl font-bold text-white">
                            Welcome Back 👋
                        </h1>

                        <p class="text-indigo-100 mt-3 text-base md:text-lg">
                            Track your productivity and manage all your tasks from one place.
                        </p>

                    </div>

                    <div class="flex gap-3 flex-wrap justify-center">

                        <a href="{{ route('tasks.index') }}"
                            class="bg-white text-indigo-700 font-semibold px-6 py-3 rounded-xl shadow hover:shadow-lg transition">

                            📋 My Tasks

                        </a>

                        <a href="{{ route('tasks.create') }}"
                            class="bg-green-500 hover:bg-green-600 text-white font-semibold px-6 py-3 rounded-xl shadow transition">

                            ➕ Add Task

                        </a>

                    </div>

                </div>

            </div>

            <!-- Statistics -->

            <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-6">

                <!-- Total -->

                <div class="bg-white rounded-2xl shadow-lg p-6 hover:-translate-y-1 hover:shadow-xl transition duration-300">

                    <div class="flex justify-between items-center">

                        <div>

                            <p class="text-gray-500 text-sm uppercase">
                                Total Tasks
                            </p>

                            <h2 class="text-4xl font-bold mt-3 text-gray-800">
                                {{ $stats['total'] }}
                            </h2>

                        </div>

                        <div class="w-16 h-16 rounded-full bg-indigo-100 flex items-center justify-center text-3xl">

                            📋

                        </div>

                    </div>

                </div>

                <!-- Pending -->

                <div class="bg-yellow-50 rounded-2xl shadow-lg p-6 hover:-translate-y-1 hover:shadow-xl transition duration-300">

                    <div class="flex justify-between items-center">

                        <div>

                            <p class="text-yellow-700 text-sm uppercase">
                                Pending
                            </p>

                            <h2 class="text-4xl font-bold mt-3 text-yellow-700">
                                {{ $stats['pending'] }}
                            </h2>

                        </div>

                        <div class="w-16 h-16 rounded-full bg-yellow-200 flex items-center justify-center text-3xl">

                            ⏳

                        </div>

                    </div>

                </div>

                <!-- Progress -->

                <div class="bg-blue-50 rounded-2xl shadow-lg p-6 hover:-translate-y-1 hover:shadow-xl transition duration-300">

                    <div class="flex justify-between items-center">

                        <div>

                            <p class="text-blue-700 text-sm uppercase">
                                In Progress
                            </p>

                            <h2 class="text-4xl font-bold mt-3 text-blue-700">
                                {{ $stats['progress'] }}
                            </h2>

                        </div>

                        <div class="w-16 h-16 rounded-full bg-blue-200 flex items-center justify-center text-3xl">

                            🚀

                        </div>

                    </div>

                </div>

                <!-- Completed -->

                <div class="bg-green-50 rounded-2xl shadow-lg p-6 hover:-translate-y-1 hover:shadow-xl transition duration-300">

                    <div class="flex justify-between items-center">

                        <div>

                            <p class="text-green-700 text-sm uppercase">
                                Completed
                            </p>

                            <h2 class="text-4xl font-bold mt-3 text-green-700">
                                {{ $stats['completed'] }}
                            </h2>

                        </div>

                        <div class="w-16 h-16 rounded-full bg-green-200 flex items-center justify-center text-3xl">

                            ✅

                        </div>

                    </div>

                </div>

            </div>

            <!-- Quick Actions -->

            <div class="mt-10 bg-white rounded-2xl shadow-lg p-8">

                <h3 class="text-2xl font-bold text-gray-800 mb-6">

                    Quick Actions

                </h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                    <a href="{{ route('tasks.create') }}"
                        class="bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl p-6 transition">

                        <h4 class="text-xl font-semibold">

                            ➕ Create New Task

                        </h4>

                        <p class="mt-2 text-indigo-100">

                            Add a new task and manage your workflow.

                        </p>

                    </a>

                    <a href="{{ route('tasks.index') }}"
                        class="bg-gray-800 hover:bg-black text-white rounded-xl p-6 transition">

                        <h4 class="text-xl font-semibold">

                            📋 View All Tasks

                        </h4>

                        <p class="mt-2 text-gray-300">

                            Browse, update or delete your existing tasks.

                        </p>

                    </a>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>