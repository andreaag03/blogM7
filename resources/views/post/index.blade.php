<html>
    <body>
        @foreach($posts as $post)
        <div>
            <p><a href="{{route('post.show',['id'=>$post->id])}}">{{$post->title}}</a></p>
            <p>{{$post->user->name}}</p>
        </div>
        @endforeach
        <div>{{$posts->links()}}</div>
    </body>

</html>