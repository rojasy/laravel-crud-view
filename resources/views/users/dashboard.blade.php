<x-layout>

    <h1 class="title">Hello {{ auth()->user()->username }}</h1>



{{--    Session Messages--}}
    @if(session('success'))
        <div class="mb-2">
            <x-flashMessage msg="{{ session('success') }}" bg="bg-yellow-500" />
        </div>
    @endif



    <div class="card mb-4">
        <h2 class="font-bold mb-4">Create a new post</h2>

        <form action="{{ route('posts.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="title">Post Title</label>
                <input type="text" name="title" value="{{ old('title') }}" class="input
                @error('title') ring-red-500 @enderror">
                @error('title')
                <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="body">Post Body</label>

                <textarea name="body" rows="5" class="input
                @error('body') ring-red-500 @enderror">{{ old('body') }}</textarea>
                @error('body')
                <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <button class="primary-btn">Create</button>

        </form>

    </div>

</x-layout>
