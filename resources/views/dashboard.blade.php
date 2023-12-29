<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 text-center" style="font-size: 1.5rem">
                    @if($myPosts ->isEmpty())
                        <h2>No my posts</h2>
                    @else
                        <h2>My posts count: {{$myPosts->count()}}</h2>
                    @endif

                    @foreach($myPosts as $post)
                        <div class="post"
                             style="justify-content: @if( Auth::check()) space-between @else center @endif;
                             margin: 50px auto; background: #314157; padding: 25px; border-radius: 10px;
                             box-shadow: #000000 0 0 5px -2px; display: flex; flex-direction: column; gap: 50px">
                            <p>Post ID: {{ $post->id }}. User ID: {{ $post->user_id }}. Created
                                by: {{ $post->user->name }}</p>
                            <h2>{{$post->title}}</h2>
                            <p>{{$post->text}}</p>

                            @if (Auth::check() && $post->haveAccessPost())
                                <div style="display: flex; gap: 25px; flex-wrap: wrap; justify-content: center">
                                    <a href="{{route('posts.show', $post->id)}}" class="link"
                                       style="background: #153272; padding: 0 50px; border-radius: 25px;">More</a>
                                    <a class="link" href="{{route('posts.edit', $post->id)}}"
                                       style="background: #ffae00; padding: 0 50px; border-radius: 25px;">Edit</a>
                                    <form action="{{route('posts.destroy', $post->id)}}" method="post" class="link"
                                          style="background: #962020; padding: 0 50px; border-radius: 25px;">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" value="Delete" onclick="return confirm('Are you sure?')"
                                               style="background: #962020; width: 100%;  font-size: 1.25rem; border: none; color: white;"/>
                                    </form>
                                </div>
                            @endif

                        </div>
                    @endforeach

                    @if ($posts->isEmpty())
                        <h2>No posts</h2>
                    @else
                        <h2>Else posts count: {{$posts->count()}}</h2>
                    @endif

                    @foreach($posts as $post)
                        <div class="post"
                             style="justify-content: @if( Auth::check()) space-between @else center @endif;
                margin: 50px auto; background: #314157; padding: 25px; border-radius: 10px;
                box-shadow: #000000 0 0 5px -2px; display: flex; flex-direction: column; gap: 50px">
                            <p>Post ID: {{ $post->id }}. User ID: {{ $post->user_id }}. Created
                                by: {{ $post->user->name }}</p>
                            <h2>{{$post->title}}</h2>
                            <p>{{$post->text}}</p>

                            @if (Auth::check() && $post->haveAccessPost())
                                <div style="display: flex; gap: 25px; flex-wrap: wrap; justify-content: center">
                                    <a href="{{route('posts.show', $post->id)}}" class="link"
                                       style="background: #153272; padding: 0 50px; border-radius: 25px;">More</a>
                                    <a class="link" href="{{route('posts.edit', $post->id)}}"
                                       style="background: #ffae00; padding: 0 50px; border-radius: 25px;">Edit</a>
                                    <form action="{{route('posts.destroy', $post->id)}}" method="post" class="link"
                                          style="background: #962020; padding: 0 50px; border-radius: 25px;">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" value="Delete" onclick="return confirm('Are you sure?')"
                                               style="background: #962020; width: 100%;  font-size: 1.25rem; border: none; color: white;"/>
                                    </form>
                                </div>
                            @endif

                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
