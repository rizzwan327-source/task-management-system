<x-app-layout>



    <div class="py-8">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Hero -->

            <div class="bg-gradient-to-r from-indigo-600 via-blue-600 to-cyan-600 rounded-3xl shadow-xl p-6 md:p-10 mb-8">

                <div class="flex flex-col lg:flex-row justify-between items-center gap-6">

                    <div>

                        <h1 class="text-3xl md:text-4xl font-bold text-white">
                            {{ $task->title }}
                        </h1>

                        <p class="text-indigo-100 mt-2">
                            View complete information about this task.
                        </p>

                    </div>

                    @if($task->status == 'Pending')

                    <span class="bg-yellow-400 text-yellow-900 px-5 py-2 rounded-full font-semibold">
                        Pending
                    </span>

                    @elseif($task->status == 'In Progress')

                    <span class="bg-blue-200 text-blue-900 px-5 py-2 rounded-full font-semibold">
                        In Progress
                    </span>

                    @else

                    <span class="bg-green-300 text-green-900 px-5 py-2 rounded-full font-semibold">
                        Completed
                    </span>

                    @endif

                </div>

            </div>


            <!-- Details Card -->

            <div class="bg-white rounded-3xl shadow-xl overflow-hidden">

                <div class="p-6 md:p-10">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <!-- Title -->

                        <div class="bg-gray-50 rounded-2xl p-6">

                            <h4 class="text-sm uppercase text-gray-500 font-semibold mb-2">
                                Task Title
                            </h4>

                            <p class="text-xl font-bold text-gray-800">
                                {{ $task->title }}
                            </p>

                        </div>

                        <!-- Status -->

                        <div class="bg-gray-50 rounded-2xl p-6">

                            <h4 class="text-sm uppercase text-gray-500 font-semibold mb-2">
                                Status
                            </h4>

                            @if($task->status == 'Pending')

                            <span class="bg-yellow-100 text-yellow-700 px-4 py-2 rounded-full text-sm font-semibold">
                                Pending
                            </span>

                            @elseif($task->status == 'In Progress')

                            <span class="bg-blue-100 text-blue-700 px-4 py-2 rounded-full text-sm font-semibold">
                                In Progress
                            </span>

                            @else

                            <span class="bg-green-100 text-green-700 px-4 py-2 rounded-full text-sm font-semibold">
                                Completed
                            </span>

                            @endif

                        </div>


                        <!-- Due Date -->

                        <div class="bg-gray-50 rounded-2xl p-6">

                            <h4 class="text-sm uppercase text-gray-500 font-semibold mb-2">
                                Due Date
                            </h4>

                            <p class="text-lg font-semibold text-gray-800">
                                {{ \Carbon\Carbon::parse($task->due_date)->format('d M Y') }}
                            </p>

                        </div>


                        <!-- Created -->

                        <div class="bg-gray-50 rounded-2xl p-6">

                            <h4 class="text-sm uppercase text-gray-500 font-semibold mb-2">
                                Created At
                            </h4>

                            <p class="text-lg font-semibold text-gray-800">
                                {{ $task->created_at->format('d M Y h:i A') }}
                            </p>

                        </div>

                    </div>


                    <!-- Description -->

                    <div class="mt-8">

                        <h4 class="text-sm uppercase text-gray-500 font-semibold mb-3">
                            Description
                        </h4>

                        <div class="bg-gray-50 border rounded-2xl p-6">

                            <p class="text-gray-700 leading-8">

                                {{ $task->description ?: 'No description available.' }}

                            </p>

                        </div>

                    </div>


                    <!-- Buttons -->

                    <div class="mt-10 flex flex-col sm:flex-row gap-4 sm:justify-end">

                        <a href="{{ route('tasks.index') }}"
                            class="w-full sm:w-auto text-center bg-gray-600 hover:bg-gray-700 text-white px-6 py-3 rounded-xl font-semibold transition duration-300">

                            ← Back

                        </a>

                        <a href="{{ route('tasks.edit',$task->id) }}"
                            class="w-full sm:w-auto text-center bg-yellow-500 hover:bg-yellow-600 text-white px-6 py-3 rounded-xl font-semibold transition duration-300">

                            ✏ Edit Task

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>