@props(['post'])

<div class="card mt-5">
    <h2 class="font-bold text-xl">{{ $post->title }}</h2>
    <div class="text-xs font-light mb-4">
        <span>Posted {{ $post->created_at->diffForHumans() }} By</span>
        <a href="#" class="text-blue-500 font-medium">USERNAME</a>
    </div>
    <div class="text-sm">
        <p>{{ Str::words($post->body, 15) }}</p>
    </div>
</div>
