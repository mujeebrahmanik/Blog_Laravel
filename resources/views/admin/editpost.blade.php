<x-app-layout>

<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 flex justify-center">
            
           
                    <form class="p-8 rounded-lg  w-full max-w-md space-y-4" action="{{ route('admin.updatepost',$post->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                    <h2 class="text-2xl font-semibold text-white-800 text-center">Edit Post</h2>

                
                    <div>
                    <label for="title" class="block text-white-700 font-medium mb-1">Title</label>
                    <input type="text" id="title" name="title" class="w-full border text-gray-900 border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter Title" required value="{{ old('title',$post->title) }}">
                    </div>

                    <div>
                    <label for="desc" class="block text-white-700 font-medium mb-1">Description</label>
                    <textarea id="desc" name="description" class="w-full border text-gray-900 border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter Description">{{ old('description',$post->description) }}</textarea>
                    </div>

                    <div>
                         @if(isset($post) && $post->image)
                            <div class="mt-2 mb-2">
                                <p class="text-sm text-gray-100">Current Image:</p>
                                <img src="{{ asset('storage/' . $post->image) }}" alt="Uploaded Image" class="w-32 h-32 object-cover rounded-md mt-1">
                            </div>
                        @endif

                        @error('image')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        <label for="image" class="block text-gray-100 font-medium mb-1">Image</label>
                        <input 
                            type="file" 
                            id="image" 
                            name="image" 
                            class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        />

                       
                    </div>
                    

                
                    <!-- Submit Button -->
                    <div class="text-center">
                    <button type="submit"
                        class="bg-blue-600 text-white font-semibold py-2 px-6 rounded-md hover:bg-blue-700 transition w-full">
                        Update
                    </button>
                    </div>

                    {{-- Validation errors--}}
                    @if ($errors->any())
                    <ul class="px-4 py-2 bg-red-100">
                        @foreach ($errors->all() as $error)
                        <li class="my-2 text-red-500">
                            {{ $error }}
                        </li>
                        @endforeach
                    </ul>
                    @endif
                </form>
    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>