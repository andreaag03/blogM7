
<h1>{{$post->title}}</h1>

<div>{{$post->content}}</div>
<div>Author: {{$post->user->name}}</div>

<div>
@foreach ($post->comments as $comment)
        <b>{{$comment->user->name}}</b>
        <p>{{$comment->comment}}</p>
        @if(Auth::user()  != null && Auth::user()->isAdmin())
                <form action="{{route('comment.delete')}}" method="POST">
                        @csrf
                        @method('delete')
                        <input type="hidden" name="comment_id" value="{{$comment->id}}">
                        <input type="hidden" name="post_id" value="{{$post->id}}">
                        <input type="submit" value="Borrar">
                </form>
        @endif
@endforeach   
</div>

@if(Auth::user() != null)
<div>
        <form action="{{route('comment.create')}}" method="POST">
                @csrf
                <input type="hidden" name="user_id" value="{{Auth::id()}}">
                <input type="hidden" name="post_id" value="{{$post->id}}">
                <label for="lcomment">Comment:</label><br>
                <textarea name="comment" id="lcomment" cols="30" rows="10"></textarea>
                <input type="submit" value="Enviar">
        </form>
</div>
@endif