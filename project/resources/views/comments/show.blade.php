<x-guest-layout>
    <h1 class="text-center font-semibold mb-6">{{ $comment->title }}</h1>
    <div class="flex justify-center text-gray-600">
        @markdown($comment->text)
    </div>
</x-guest-layout>
