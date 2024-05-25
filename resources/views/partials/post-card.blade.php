 <div class="col">
     <div class="card h-100">
         <a href="{{route('posts.show', $post)}}">
             @if (Str::startsWith($post->cover_image, 'https://'))
             <img class="card-img-top" src="{{$post->cover_image}}" alt="">
             @else
             <img class="card-img-top" src="{{ asset('storage/' . $post->cover_image) }}">
             @endif
         </a>

         <div class="card-body">
             <h3>{{$post->title}}</h3>
         </div>
     </div>
 </div>