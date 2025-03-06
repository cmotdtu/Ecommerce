@extends('products::layouts.app')
@section('content')

    <div class="section"  style="background-color: #15161D; color: white">
        <!-- container -->
        <div class="container">
            <main>
            <div class="container pb50 pt-5">
    <div class="row">
        <div class="col-md-9 mb40">
            <article>
                <img src="{{ url('image/post/'.$post->thumb_image) }}" alt="" class="img-fluid mb30">
                <div class="post-content">
                    <h3 style="color: white">{{ $post->name }}</h3>
                    <p>{{ $post->description }}</p>
                    <p class="lead">{{ $post->content }}</p>
                </div>
            </article>
            <!-- post article-->

        </div>
        <div class="col-md-3 mb40">
            <!--/col-->
            <div class="mb40">
                <h4 class="sidebar-title"  style="color: white">Thể loại</h4>
                <ul class="list-unstyled categories"  style="color: white">
                    @foreach ($categorys as $category)
                    <li ><a  style="color: white"> {{ $category->name }}</a></li>
                    @endforeach
                </ul>
            </div>
            <!--/col-->
            <div style="color: white">
                <h4 class="sidebar-title"  style="color: white">Gần đây</h4>
                <ul class="list-unstyled"  style="color: white">
                    @foreach ($posts as $post)
                    <li class="media"  style="color: white">
                        <img class="d-flex mr-3 img-fluid" width="64" src="{{ url('image/post/'.$post->thumb_image) }}" alt="Generic placeholder image">
                        <div class="media-body">
                            <h5 class="mt-0 mb-1"><a href="{{ route('showpost', ['id' => $post->id]) }}" >{{ $post->name }}</a></h5> {{ $post->created_at }}
                        </div>
                    </li>
                @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
            </main>
        </div>
    </div>
  
    
@endsection
