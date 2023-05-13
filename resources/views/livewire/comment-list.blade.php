<div>
    @isset($comments)
    @foreach ($comments as $comment)
    <div class="bg-white dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg text-sm mt-4">
        <div class="p-6 text-gray-900 dark:text-gray-100">
            <div class="flex flex-row">
                <div class="basis-11/12">
                    <p>{{$comment->content}}</p>
                </div>
                @include('comments.partials.modify')
            </div>
            <div class="flex flex-row justify-start" >
                <div class="basis-11/12">
                    <p class="mt-2"><a class="no-underline hover:underline" href="{{route('users.show', ['id' => $comment->id])}}">{{$comment->user->name}}</a>
                    <p>{{$comment->post_date}}</p>
                </div>
                @auth
                <livewire:comment-like :comment="$comment" :wire:key="$comment->id"/>
                @endauth
            </div>
        </div>
    </div>
    @endforeach
    @endisset
</div>