<x-app-layout>



    <div class="py-8">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Hero -->

            <div class="bg-gradient-to-r from-amber-500 via-orange-500 to-red-500 rounded-3xl shadow-xl p-6 md:p-10 mb-8">

                <div class="flex flex-col lg:flex-row justify-between items-center gap-6">

                    <div>

                        <h1 class="text-3xl md:text-4xl font-bold text-white">
                            Edit Task
                        </h1>

                        <p class="text-orange-100 mt-2">
                            Update your task information and keep everything organized.
                        </p>

                    </div>

                    <div class="text-6xl">
                        ✏️
                    </div>

                </div>

            </div>

            <!-- Form -->

            <div class="bg-white rounded-3xl shadow-xl overflow-hidden">

                <div class="p-6 md:p-10">

                    <form action="{{ route('tasks.update',$task->id) }}" method="POST">

                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

                            <!-- Title -->

                            <div>

                                <label class="block font-semibold text-gray-700 mb-2">
                                    Task Title
                                </label>

                                <input
                                    type="text"
                                    name="title"
                                    value="{{ old('title',$task->title) }}"
                                    placeholder="Enter task title"
                                    class="w-full rounded-xl border-gray-300 focus:border-orange-500 focus:ring-orange-500">

                                @error('title')
                                <p class="text-red-500 text-sm mt-2">
                                    {{ $message }}
                                </p>
                                @enderror

                            </div>

                            <!-- Status -->

                            <div>

                                <label class="block font-semibold text-gray-700 mb-2">
                                    Status
                                </label>

                                <select
                                    name="status"
                                    class="w-full rounded-xl border-gray-300 focus:border-orange-500 focus:ring-orange-500">

                                    <option value="">
                                        Select Status
                                    </option>

                                    <option value="Pending"
                                        {{ old('status',$task->status)=='Pending' ? 'selected' : '' }}>
                                        Pending
                                    </option>

                                    <option value="In Progress"
                                        {{ old('status',$task->status)=='In Progress' ? 'selected' : '' }}>
                                        In Progress
                                    </option>

                                    <option value="Completed"
                                        {{ old('status',$task->status)=='Completed' ? 'selected' : '' }}>
                                        Completed
                                    </option>

                                </select>

                                @error('status')
                                <p class="text-red-500 text-sm mt-2">
                                    {{ $message }}
                                </p>
                                @enderror

                            </div>

                        </div>

                        <!-- Description -->

                        <div class="mt-6">

                            <label class="block font-semibold text-gray-700 mb-2">
                                Description
                            </label>

                            <textarea
                                rows="6"
                                name="description"
                                placeholder="Write task description..."
                                class="w-full rounded-xl border-gray-300 focus:border-orange-500 focus:ring-orange-500">{{ old('description',$task->description) }}</textarea>

                            @error('description')
                            <p class="text-red-500 text-sm mt-2">
                                {{ $message }}
                            </p>
                            @enderror

                        </div>

                        <!-- Due Date -->

                        <div class="mt-6">

                            <label class="block font-semibold text-gray-700 mb-2">
                                Due Date
                            </label>

                            <input
                                type="date"
                                name="due_date"
                                value="{{ old('due_date',$task->due_date) }}"
                                class="w-full rounded-xl border-gray-300 focus:border-orange-500 focus:ring-orange-500">

                            @error('due_date')
                            <p class="text-red-500 text-sm mt-2">
                                {{ $message }}
                            </p>
                            @enderror

                        </div>

                        <!-- Buttons -->

                        <div class="mt-10 flex flex-col sm:flex-row gap-4 sm:justify-end">

                            <a
                                href="{{ route('tasks.index') }}"
                                class="w-full sm:w-auto text-center bg-gray-600 hover:bg-gray-700 text-white px-8 py-3 rounded-xl font-semibold transition">

                                ← Cancel

                            </a>

                            <button
                                type="submit"
                                class="w-full sm:w-auto bg-gradient-to-r from-orange-500 to-red-500 hover:from-orange-600 hover:to-red-600 text-white px-8 py-3 rounded-xl font-semibold shadow-lg transition duration-300">

                                ✓ Update Task

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>