@extends('layouts.admin-master')

@section('styles')
    <link rel="stylesheet" href="{{ URL::asset('css/modal.css') }}" type="text/css"/>
@endsection

@section('content')
    <div class="container">
        @include('includes.info-box')
        <div class="card">
            <header>
                <nav>
                    <ul>
                        <li><a href=" {{ route('admin.blog.create_post') }} " class="btn">New Post</a></li>
                        <li><a href="{{ route('admin.blog.index') }}" class="btn">All Post</a></li>
                    </ul>
                </nav>
            </header>
            <section class="">
                <ul>
                    @if(count($posts)==0)
                        <li>No Posts</li>
                    @else
                        @foreach($posts as $post)
                            <li>
                                <article>
                                    <div class="post-info">
                                        <h3>{{$post->title}}</h3>
                                        <span class="info">{{$post->author}} | {{$post->created_at}}</span>
                                    </div>
                                    <div>
                                        <nav>
                                            <ul>
                                                <a href="{{ route('admin.blog.post', ['post_id'=> $post->id, 'end'=>'admin']) }}">View Post</a> | 
                                                <a href="">Edit</a> | 
                                                <a href="" class="danger">Delete</a>
                                            </ul>
                                        </nav>
                                    </div>
                                </article>
                            </li>
                        @endforeach
                    @endif
                    
                </ul>
            </section>
        </div>
        
        <div class="card">
            <header>
                <nav>
                    <ul>
                        <li><a href="#" class="btn">All Messages</a></li>
                    </ul>
                </nav>
            </header>
            <section>
                <ul>
                    <!-- if no message -->
                    <li>No Messages</li>
                    <!--if got message -->
                    <li>
                        <article data-message="Body" data-id="ID">
                            <div class="message-info">
                                <h3>Message Subject</h3>
                                <span class="info">Sender : ... | Date</span>
                            </div>
                            <div>
                                <nav>
                                    <ul>
                                        <a href="">View</a> | 
                                        <a href="" class="danger">Delete</a>
                                    </ul>
                                </nav>
                            </div>
                        </article>
                    </li>
                </ul>
            </section>
        </div>
        
    </div>

    <div class="modal" id="contact-message-info">
        <button class="btn" id="modal-close">Button</button>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        var token = "{{ Session::token() }}";
    </script>
    <script type="text/javascript" src="{{ URL::secure('js/modal.js') }}"></script>
    <script type="text/javascript" src="{{ URL::secure('js/contact_messages.js') }}"></script>
@endsection













