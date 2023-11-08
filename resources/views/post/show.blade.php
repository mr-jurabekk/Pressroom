<x-layouts.main>


    <div class="page">
        <div class="page_layout page_margin_top clearfix">
            <div class="row page_margin_top">
                <div class="column column_1_1">
                    <div class="horizontal_carousel_container small">
                        <ul class="blog horizontal_carousel autoplay-1 scroll-1 visible-3 navigation-1 easing-easeInOutQuint duration-750">
                            @foreach($posts as $post1)
                                <li class="post">
                                    <a href="#" title="New Painkiller Rekindles Addiction Concerns">
                                        <img class="post_inner_top" src='{{ asset('storage/'.$post1->file_url) }}'
                                             alt='img'>
                                    </a>
                                    <h5><a href="#"
                                           title="New Painkiller Rekindles Addiction Concerns">{{ $post1->title }}</a>
                                    </h5>
                                    <ul class="post_details simple">
                                        <li class="category"><a href="#" title="HEALTH">{{ $post1->category->name }}</a>
                                        </li>
                                        <li class="date">
                                            {{ $post1->created_at->format('H:i d-M  Y') }}
                                        </li>
                                    </ul>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <hr class="divider page_margin_top">
            <div class="row page_margin_top">
                <div class="column column_2_3">
                    <div class="row">
                        <div class="post single">
                            @if(auth()->user())
                                @if(auth()->user()->role->name == 'admin')
                                    <div class="post_buttons">
                                        <a class="post_edit_btn" href="{{route('post.edit', ['post' => $id])}}">Edit</a>
                                        <form action="{{ route('post.destroy', ['post' => $id]) }}" method="Post">
                                            @csrf
                                            @method('delete')
                                            <button class="post_delete_btn" type="submit">Delete</button>
                                        </form>
                                    </div>
                                @endif
                            @endif
                            <h1 class="post_title">
                                {{ $title }}
                            </h1>
                            <ul class="post_details clearfix">
                                <li class="detail category">In <a href="#" title="HEALTH">{{$category}}</a></li>
                                <li class="detail date">{{ $time }}</li>
                                <li class="detail author">By <a href="#" title="Anna Shubina">{{ $user }}</a></li>
                                <li class="detail">
                                    <i class="fas fa-eye"></i>
                                    {{$seen_count}}
                                </li>
                                <li class="detail comments"><a href="#comments_list" class="scroll_to_comments"
                                                               title="6 Comments">{{$post->comment->count()}}
                                        Comments</a></li>
                            </ul>
                            <a href="#" class="post_image page_margin_top prettyPhoto"
                               title="Britons are never more comfortable than when talking about the weather.">
                                <img src='{{asset('storage/'.$url)}}' alt='img'>
                            </a>
                            <div class="sentence">
                                <span class="text">Britons are never more comfortable than when talking about the weather.</span>
                                <span class="author">John Smith, Flickr</span>
                            </div>
                            <div class="post_content page_margin_top_section clearfix">
                                <div class="content_box">
                                    <h3 class="excerpt">
                                        {{ $short_content }}
                                    </h3>
                                    <div class="text">
                                        <p>
                                            {{ $body }}
                                        </p>
                                        <blockquote class="inside_text page_margin_top">
                                            Politicians have looked weak in the face of such natural disaster, with many
                                            facing criticism from local residents.
                                            <span class="author">&#8212;&nbsp;&nbsp;Julia Slingo, ETF</span>
                                        </blockquote>
                                        <p>For those affected by flooding however, their immediate concerns are not
                                            necessarily about the manmade changes to the earth’s atmosphere. A YouGov
                                            poll from February found that while 84% of those surveyed believed Britain
                                            was likely to experience similar extreme weather events in the next few
                                            years, only 30% thought it was connected to man-made climate change.</p>
                                        <p>There is no evidence to counter the basic premise that a warmer world will
                                            lead to more intense daily and hourly rain events. When heavy rain in 2000
                                            devastated parts of Britain, a later study found the climate change had
                                            doubled the chances of the flood occurring, said Julia Slingo.</p>
                                    </div>
                                </div>
                                <div class="author_box animated_element">
                                    <div class="author">
                                        <a title="Anna Shubina" href="#"
                                           class="thumb thumb_user">
                                            <img class="user_image" alt="img" src="{{asset('storage/files/user.jpg')}}">
                                        </a>
                                        <div class="details">
                                            <h5><a title="Anna Shubina"
                                                   href="#">{{$post->user->name}}</a></h5>
                                            <h6>EDITOR</h6>
                                            <a href="#" class="more highlight margin_top_15">PROFILE</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row page_margin_top_section">
                        <h4 class="box_header">Leave a Comment</h4>
                        @if(auth()->user())
                            <form class="comment_form margin_top_15" id="comment_form" method="post"
                                  action="{{route('comment.store', ['post' => $id])}}">
                                @csrf
                                <fieldset>
                                    <textarea name="body" placeholder="Comment *">Comment *</textarea>
                                </fieldset>
                                <fieldset>
                                    <input type="submit" value="POST COMMENT" class="more active">
                                </fieldset>
                            </form>
                        @else
                            <h5 class="box_header">Please <a href="{{route('login')}}">Log In</a></h5>
                        @endif

                    </div>
                    <div class="row page_margin_top_section">
                        <h4 class="box_header">{{$post->comment->count()}} Comments</h4>
                        <ul id="comments_list">
                            @foreach($comments as $comment)
                                @if($comment->post_id == $id)
                                    <li class="comment clearfix" id="comment-1">
                                        <div class="comment_author_avatar">
                                            &nbsp;
                                        </div>
                                        <div class="comment_details">
                                            <div class="posted_by clearfix">
                                                <h5><a class="author" href="#"
                                                       title="Kevin Nomad">{{$comment->user->name}}</a></h5>
                                                <abbr title=""
                                                      class="timeago">{{ $comment->created_at->format('d-M Y H:i') }}</abbr>
                                            </div>
                                            <p>
                                                {{ $comment->body }}
                                            </p>
                                        </div>
                                        @if(auth()->user())
                                            @if(auth()->user()->role->name == 'admin')
                                                <div class="commit_delete_btn">
                                                    <form
                                                        action="{{ route('comment.destroy', ['comment' => $comment->id]) }}"
                                                        method="Post">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="post_delete_btn" type="submit">Delete</button>
                                                    </form>
                                                </div>
                                            @endif
                                        @endif
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="column column_1_3">
                    <div class="tabs no_scroll clearfix">
                        <ul class="tabs_navigation clearfix">
                            <li>
                                <a href="#sidebar-most-read" title="Most Read">
                                    Most Read
                                </a>
                                <span></span>
                            </li>
                            <li>
                                <a href="#sidebar-most-commented" title="Commented">
                                    Commented
                                </a>
                                <span></span>
                            </li>
                        </ul>
                        <div id="sidebar-most-read">
                            <ul class="blog rating page_margin_top clearfix">
                                <li class="post">
                                    <a href="indexb878.html?page=post"
                                       title="Nuclear Fusion Closer to Becoming a Reality">
                                        <img src='/images/samples/510x187/image_12.jpg' alt='img'>
                                    </a>
                                    <div class="post_content">
                                        <span class="number animated_element" data-value="6 257"></span>
                                        <h5><a href="indexb878.html?page=post"
                                               title="New Painkiller Rekindles Addiction Concerns">New Painkiller
                                                Rekindles Addiction Concerns</a></h5>
                                        <ul class="post_details simple">
                                            <li class="category"><a href="indexdced.html?page=category&amp;cat=health"
                                                                    title="HEALTH">HEALTH</a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="post">
                                    <div class="post_content">
                                        <span class="number animated_element" data-value="5 062"></span>
                                        <h5><a href="index224d.html?page=post_soundcloud"
                                               title="New Painkiller Rekindles Addiction Concerns">New Painkiller
                                                Rekindles Addiction Concerns</a></h5>
                                        <ul class="post_details simple">
                                            <li class="category"><a href="index7855.html?page=category&amp;cat=world"
                                                                    title="WORLD">WORLD</a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="post">
                                    <div class="post_content">
                                        <span class="number animated_element" data-value="4 778"></span>
                                        <h5><a href="index4b64.html?page=post_quote"
                                               title="Seeking the Right Chemistry, Drug Makers Hunt for Mergers">Seeking
                                                the Right Chemistry, Drug Makers Hunt for Mergers</a></h5>
                                        <ul class="post_details simple">
                                            <li class="category"><a href="index5d3d.html?page=category&amp;cat=sports"
                                                                    title="SPORTS">SPORTS</a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="post">
                                    <div class="post_content">
                                        <span class="number animated_element" data-value="754"></span>
                                        <h5><a href="index4e1c.html?page=post_small_image"
                                               title="Study Linking Illnes and Salt Leaves Researchers Doubtful">Study
                                                Linking Illnes and Salt Leaves Researchers Doubtful</a></h5>
                                        <ul class="post_details simple">
                                            <li class="category"><a href="indexdd47.html?page=category&amp;cat=science"
                                                                    title="SCIENCE">SCIENCE</a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="post">
                                    <div class="post_content">
                                        <span class="number animated_element" data-value="52"></span>
                                        <h5><a href="indexb878.html?page=post"
                                               title="Syrian Civilians Trapped for Months Continue to be Evacuated">Syrian
                                                Civilians Trapped for Months Continue to be Evacuated</a></h5>
                                        <ul class="post_details simple">
                                            <li class="category"><a href="indexdd47.html?page=category&amp;cat=science"
                                                                    title="SCIENCE">SCIENCE</a></li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                            <a class="more page_margin_top" href="#">SHOW MORE</a>
                        </div>
                        <div id="sidebar-most-commented">
                            <ul class="blog rating page_margin_top clearfix">
                                <li class="post">
                                    <a href="indexb878.html?page=post"
                                       title="Nuclear Fusion Closer to Becoming a Reality">
                                        <img src='/images/samples/510x187/image_02.jpg' alt='img'>
                                    </a>
                                    <div class="post_content">
                                        <span class="number animated_element" data-value="70"></span>
                                        <h5><a href="indexb878.html?page=post"
                                               title="New Painkiller Rekindles Addiction Concerns">New Painkiller
                                                Rekindles Addiction Concerns</a></h5>
                                        <ul class="post_details simple">
                                            <li class="category"><a href="indexdced.html?page=category&amp;cat=health"
                                                                    title="HEALTH">HEALTH</a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="post">
                                    <div class="post_content">
                                        <span class="number animated_element" data-value="62"></span>
                                        <h5><a href="indexb878.html?page=post"
                                               title="New Painkiller Rekindles Addiction Concerns">New Painkiller
                                                Rekindles Addiction Concerns</a></h5>
                                        <ul class="post_details simple">
                                            <li class="category"><a href="index7855.html?page=category&amp;cat=world"
                                                                    title="WORLD">WORLD</a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="post">
                                    <div class="post_content">
                                        <span class="number animated_element" data-value="30"></span>
                                        <h5><a href="indexb878.html?page=post"
                                               title="Seeking the Right Chemistry, Drug Makers Hunt for Mergers">Seeking
                                                the Right Chemistry, Drug Makers Hunt for Mergers</a></h5>
                                        <ul class="post_details simple">
                                            <li class="category"><a href="index5d3d.html?page=category&amp;cat=sports"
                                                                    title="SPORTS">SPORTS</a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="post">
                                    <div class="post_content">
                                        <span class="number animated_element" data-value="25"></span>
                                        <h5><a href="index205e.html?page=post_quote_2"
                                               title="Study Linking Illnes and Salt Leaves Researchers Doubtful">Study
                                                Linking Illnes and Salt Leaves Researchers Doubtful</a></h5>
                                        <ul class="post_details simple">
                                            <li class="category"><a href="indexdd47.html?page=category&amp;cat=science"
                                                                    title="SCIENCE">SCIENCE</a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="post">
                                    <div class="post_content">
                                        <span class="number animated_element" data-value="4"></span>
                                        <h5><a href="indexb878.html?page=post"
                                               title="Syrian Civilians Trapped for Months Continue to be Evacuated">Syrian
                                                Civilians Trapped for Months Continue to be Evacuated</a></h5>
                                        <ul class="post_details simple">
                                            <li class="category"><a href="indexdd47.html?page=category&amp;cat=science"
                                                                    title="SCIENCE">SCIENCE</a></li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                            <a class="more page_margin_top" href="#">SHOW MORE</a>
                        </div>
                    </div>
                    <h4 class="box_header page_margin_top_section">Latest Posts</h4>
                    <div class="vertical_carousel_container clearfix">
                        <ul class="blog small vertical_carousel autoplay-1 scroll-1 navigation-1 easing-easeInOutQuint duration-750">
                            <li class="post">
                                <a href="indexba02.html?page=post_gallery"
                                   title="Study Linking Illnes and Salt Leaves Researchers Doubtful">
                                    <span class="icon small gallery"></span>
                                    <img src='/images/samples/100x100/image_06.jpg' alt='img'>
                                </a>
                                <div class="post_content">
                                    <h5>
                                        <a href="indexba02.html?page=post_gallery"
                                           title="Study Linking Illnes and Salt Leaves Researchers Doubtful">Study
                                            Linking Illnes and Salt Leaves Researchers Doubtful</a>
                                    </h5>
                                    <ul class="post_details simple">
                                        <li class="category"><a href="indexdced.html?page=category&amp;cat=health"
                                                                title="HEALTH">HEALTH</a></li>
                                        <li class="date">
                                            10:11 PM, Feb 02
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="post">
                                <a href="indexb878.html?page=post"
                                   title="Syrian Civilians Trapped For Months Continue To Be Evacuated">
                                    <img src='/images/samples/100x100/image_12.jpg' alt='img'>
                                </a>
                                <div class="post_content">
                                    <h5>
                                        <a href="indexb878.html?page=post"
                                           title="Syrian Civilians Trapped For Months Continue To Be Evacuated">Syrian
                                            Civilians Trapped For Months Continue To Be Evacuated</a>
                                    </h5>
                                    <ul class="post_details simple">
                                        <li class="category"><a href="index7855.html?page=category&amp;cat=world"
                                                                title="WORLD">WORLD</a></li>
                                        <li class="date">
                                            10:11 PM, Feb 02
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="post">
                                <a href="indexb878.html?page=post" title="Built on Brotherhood, Club Lives Up to Name">
                                    <img src='/images/samples/100x100/image_02.jpg' alt='img'>
                                </a>
                                <div class="post_content">
                                    <h5>
                                        <a href="indexb878.html?page=post"
                                           title="Built on Brotherhood, Club Lives Up to Name">Built on Brotherhood,
                                            Club Lives Up to Name</a>
                                    </h5>
                                    <ul class="post_details simple">
                                        <li class="category"><a href="index5d3d.html?page=category&amp;cat=sports"
                                                                title="SPORTS">SPORTS</a></li>
                                        <li class="date">
                                            10:11 PM, Feb 02
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="post">
                                <a href="index224d.html?page=post_soundcloud"
                                   title="Nuclear Fusion Closer to Becoming a Reality">
                                    <img src='/images/samples/100x100/image_13.jpg' alt='img'>
                                </a>
                                <div class="post_content">
                                    <h5>
                                        <a href="index224d.html?page=post_soundcloud"
                                           title="Nuclear Fusion Closer to Becoming a Reality">Nuclear Fusion Closer to
                                            Becoming a Reality</a>
                                    </h5>
                                    <ul class="post_details simple">
                                        <li class="category"><a href="indexdd47.html?page=category&amp;cat=science"
                                                                title="SCIENCE">SCIENCE</a></li>
                                        <li class="date">
                                            10:11 PM, Feb 02
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <h4 class="box_header page_margin_top_section">Top Authors</h4>
                    <ul class="authors rating clearfix">
                        <li class="author">
                            <a class="thumb" href="index27b5.html?page=author" title="Debora Hilton">
                                <img src='/images/samples/Team_100x100/image_01.jpg' alt='img'>
                                <span class="number animated_element" data-value="34"></span>
                            </a>
                            <div class="details">
                                <h5><a href="index27b5.html?page=author" title="Debora Hilton">Debora Hilton</a></h5>
                                <h6>EDITOR</h6>
                            </div>
                        </li>
                        <li class="author">
                            <a class="thumb" href="index27b5.html?page=author" title="Anna Shubina">
                                <img src='/images/samples/Team_100x100/image_02.jpg' alt='img'>
                                <span class="number animated_element" data-value="25"></span>
                            </a>
                            <div class="details">
                                <h5><a href="index27b5.html?page=author" title="Anna Shubina">Anna Shubina</a></h5>
                                <h6>EDITOR</h6>
                            </div>
                        </li>
                        <li class="author">
                            <a class="thumb" href="index27b5.html?page=author" title="Liam Holden">
                                <img src='/images/samples/Team_100x100/image_03.jpg' alt='img'>
                                <span class="number animated_element" data-value="9"></span>
                            </a>
                            <div class="details">
                                <h5><a href="index27b5.html?page=author" title="Liam Holden">Liam Holden</a></h5>
                                <h6>PUBLISHER</h6>
                            </div>
                        </li>
                        <li class="author">
                            <a class="thumb" href="index27b5.html?page=author" title="Heather Dale">
                                <img src='/images/samples/Team_100x100/image_04.jpg' alt='img'>
                                <span class="number animated_element" data-value="2"></span>
                            </a>
                            <div class="details">
                                <h5><a href="index27b5.html?page=author" title="Heather Dale">Heather Dale</a></h5>
                                <h6>ILLUSTRATOR</h6>
                            </div>
                        </li>
                    </ul>
                    <h4 class="box_header page_margin_top_section">Most Commented</h4>
                    <div class="vertical_carousel_container clearfix">
                        <ul class="blog small vertical_carousel autoplay-1 scroll-1 navigation-1 easing-easeInOutQuint duration-750">
                            <li class="post">
                                <a href="indexba02.html?page=post_gallery"
                                   title="Study Linking Illnes and Salt Leaves Researchers Doubtful">
                                    <span class="icon small gallery"></span>
                                    <img src='/images/samples/100x100/image_06.jpg' alt='img'>
                                </a>
                                <div class="post_content">
                                    <h5>
                                        <a href="indexba02.html?page=post_gallery"
                                           title="Study Linking Illnes and Salt Leaves Researchers Doubtful">Study
                                            Linking Illnes and Salt Leaves Researchers Doubtful</a>
                                    </h5>
                                    <ul class="post_details simple">
                                        <li class="category"><a href="indexdced.html?page=category&amp;cat=health"
                                                                title="HEALTH">HEALTH</a></li>
                                        <li class="date">
                                            10:11 PM, Feb 02
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="post">
                                <a href="index4b64.html?page=post_quote"
                                   title="Syrian Civilians Trapped For Months Continue To Be Evacuated">
                                    <img src='/images/samples/100x100/image_12.jpg' alt='img'>
                                </a>
                                <div class="post_content">
                                    <h5>
                                        <a href="index4b64.html?page=post_quote"
                                           title="Syrian Civilians Trapped For Months Continue To Be Evacuated">Syrian
                                            Civilians Trapped For Months Continue To Be Evacuated</a>
                                    </h5>
                                    <ul class="post_details simple">
                                        <li class="category"><a href="index7855.html?page=category&amp;cat=world"
                                                                title="WORLD">WORLD</a></li>
                                        <li class="date">
                                            10:11 PM, Feb 02
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="post">
                                <a href="index4e1c.html?page=post_small_image"
                                   title="Built on Brotherhood, Club Lives Up to Name">
                                    <img src='/images/samples/100x100/image_02.jpg' alt='img'>
                                </a>
                                <div class="post_content">
                                    <h5>
                                        <a href="index4e1c.html?page=post_small_image"
                                           title="Built on Brotherhood, Club Lives Up to Name">Built on Brotherhood,
                                            Club Lives Up to Name</a>
                                    </h5>
                                    <ul class="post_details simple">
                                        <li class="category"><a href="index5d3d.html?page=category&amp;cat=sports"
                                                                title="SPORTS">SPORTS</a></li>
                                        <li class="date">
                                            10:11 PM, Feb 02
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="post">
                                <a href="indexb878.html?page=post" title="Nuclear Fusion Closer to Becoming a Reality">
                                    <img src='/images/samples/100x100/image_13.jpg' alt='img'>
                                </a>
                                <div class="post_content">
                                    <h5>
                                        <a href="indexb878.html?page=post"
                                           title="Nuclear Fusion Closer to Becoming a Reality">Nuclear Fusion Closer to
                                            Becoming a Reality</a>
                                    </h5>
                                    <ul class="post_details simple">
                                        <li class="category"><a href="indexdd47.html?page=category&amp;cat=science"
                                                                title="SCIENCE">SCIENCE</a></li>
                                        <li class="date">
                                            10:11 PM, Feb 02
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>

</x-layouts.main>
