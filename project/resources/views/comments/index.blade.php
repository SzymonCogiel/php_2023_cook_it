<x-guest-layout>
    <h1 class="text-center font-semibold mb-6">Comments</h1>
    <div class="flex justify-center">
        <ul class="list-disc">
            @foreach($comments as $comment)
                <li>
                    <a class="underline text-blue-600" href="{{ route('comments.show', $comment) }}">{{ $comment->title }}</a>
                </li>
            @endforeach
        </ul>
    </div>
</x-guest-layout>>
