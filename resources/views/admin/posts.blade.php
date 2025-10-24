<x-app-layout>

<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="p-4 text-center bg-green-50 text-green-900 font-bold mb-3 rounded">
                    {{ session('success') }}
                </div>
            @endif
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 flex justify-between">
                    {{ __("All Posts") }}

                    <a href="{{ route('admin.createpost') }}" class="btn bg-green-800 p-2 rounded">Create Post</a>

                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full border border-gray-800 text-sm text-left">
                        <thead class="bg-blue-600 text-gray-100 uppercase">
                        <tr>
                            <th class="px-6 py-3 border-b">#</th>
                            <th class="px-6 py-3 border-b">Title</th>
                            <th class="px-6 py-3 border-b">Description</th>
                            <th class="px-6 py-3 border-b">Image</th>
                            <th class="px-6 py-3 border-b">Published Date</th>
                            <th class="px-6 py-3 border-b text-center">Actions</th>
                        </tr>
                        </thead>
                        <tbody class="divide-y">
                            @foreach ($posts as $post )
                                <tr class="hover:bg-green-100 bg-gray-100">
                                    <td class="px-6 py-3">{{ $loop->iteration }}</td>
                                    <td class="px-6 py-3">{{ ucfirst($post->title) }}</td>
                                    <td class="px-6 py-3">{{ ucfirst($post->description) }}</td>
                                    <td class="px-6 py-3">
                                    @if($post->image)
                                    <img src="{{ asset('storage/' . $post->image) }}" alt="image" height="50" width="50">
                                    @endif
                                    </td>
                                    <td class="px-6 py-3">{{ $post->created_at }}</td>
                                    <td class="px-6 py-3 text-center">
                                    <button class="bg-green-900 text-white px-3 py-1 rounded hover:bg-blue-600" ><a href="{{ route('admin.editpost',$post->id) }}">Edit</a></button>
                                    <button class="bg-red-900 text-white px-3 py-1 rounded hover:bg-blue-600" command="show-modal" commandfor="dialog">Delete</button>
                                    </td>
                                </tr>
                                <el-dialog>
                                <dialog id="dialog" aria-labelledby="dialog-title" class="fixed inset-0 size-auto max-h-none max-w-none overflow-y-auto bg-transparent backdrop:bg-transparent">
                                    <el-dialog-backdrop class="fixed inset-0 bg-gray-900/50 transition-opacity data-closed:opacity-0 data-enter:duration-300 data-enter:ease-out data-leave:duration-200 data-leave:ease-in"></el-dialog-backdrop>

                                    <div tabindex="0" class="flex min-h-full items-end justify-center p-4 text-center focus:outline-none sm:items-center sm:p-0">
                                    <el-dialog-panel class="relative transform overflow-hidden rounded-lg bg-gray-800 text-left shadow-xl outline -outline-offset-1 outline-white/10 transition-all data-closed:translate-y-4 data-closed:opacity-0 data-enter:duration-300 data-enter:ease-out data-leave:duration-200 data-leave:ease-in sm:my-8 sm:w-full sm:max-w-lg data-closed:sm:translate-y-0 data-closed:sm:scale-95">
                                        <div class="bg-gray-800 px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                        <div class="sm:flex sm:items-start">
                                            <div class="mx-auto flex size-12 shrink-0 items-center justify-center rounded-full bg-red-500/10 sm:mx-0 sm:size-10">
                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" data-slot="icon" aria-hidden="true" class="size-6 text-red-400">
                                                <path d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                            </div>
                                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                            <h3 id="dialog-title" class="text-base font-semibold text-white">Delete Post</h3>
                                            <div class="mt-2">
                                                <p class="text-sm text-gray-400">Are you sure you want to delete the post ?</p>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="bg-gray-700/25 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                                            <form action="{{ route('admin.deletepost',$post->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" command="close" commandfor="dialog" class="inline-flex w-full justify-center rounded-md bg-red-500 px-3 py-2 text-sm font-semibold text-white hover:bg-red-400 sm:ml-3 sm:w-auto">Delete</button>
                                            </form>
                                        <button type="button" command="close" commandfor="dialog" class="mt-3 inline-flex w-full justify-center rounded-md bg-white/10 px-3 py-2 text-sm font-semibold text-white inset-ring inset-ring-white/5 hover:bg-white/20 sm:mt-0 sm:w-auto">Cancel</button>
                                        </div>
                                    </el-dialog-panel>
                                    </div>
                                </dialog>
                                </el-dialog>
                            @endforeach
                        
                        </tbody>
                    </table>
                    </div>

            </div>
        </div>
    </div>
</x-app-layout>