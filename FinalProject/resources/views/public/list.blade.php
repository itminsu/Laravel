<script type="text/javascript" src="http://johannburkard.de/resources/Johann/jquery.highlight-5.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<style>
    @foreach($templates as $template)
        {!! $template->css_content !!}
    @endforeach

        .text-yellow {
        color: yellow;
        background-color: black;
    }
</style>
@if(isset($pages))
    <div class="navbar-inverse collapse navbar-collapse">

        <ul class="nav navbar-nav">
            @foreach($pages as $page)
                <li><a href="/public/{{ $page->id }}">{{ $page->name }}</a></li>
            @endforeach
        </ul>
    </div>
    <div align="right">
        <div class="input-group">
            <input id="search" type="text" placeholder="Search for...">
        </div>
    </div>
    @if($currPage != null)
        <h1>{{ $currPage->name }}</h1>

        @foreach($contents as $content)
            <div id="{{ $content->alias }}">
                @foreach($articles as $article)
                    @if( ($article->is_all_page == true  && $content->id == $article->content_area_id ) || ($currPage->id == $article->page_id && $content->id == $article->content_area_id))

                        <div class="row">
                            <br>
                            <div class="col-md-10 col-sm-9">
                                <h3>{{ $article->title }}</h3>
                                <ul class="list-inline">
                                    <li>{{ $article->published_at }}</li>
                                </ul>
                                <div class="row">
                                    <div class="col-xs-9">
                                        <div id="contents">
                                            <p>
                                                {!! $article->html_content !!}
                                            </p>
                                        </div>
                                        @if(Auth::check() and Auth::user()->isAnAuthor())
                                            <div class="btn-group">
                                                <a class="btn btn-primary btn-sm" href="/public/{{ $article->id }}/edit" role="button">Edit</a>

                                                {!! Form::open(['method' => 'DELETE', 'action' => ['PublicController@destroy', $article->id]]) !!}
                                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                                {!! Form::close() !!}

                                            </div>


                                        @endif

                                    </div>
                                    <div class="col-xs-3"></div>
                                </div>
                                <br><br>
                            </div>
                        </div>



                    @endif
                @endforeach
            </div>
        @endforeach
    @endif
    <hr>
    @if(Auth::check() and Auth::user()->isAnAuthor())
        <a class="btn btn-primary btn-sm" href="/create">New Article</a>
    @endif
@endif
<script>
    $('#search').keyup(function () {
        var search = $('#search').val();
        $("#contents:contains('"+search+"')").each(function () {
            var regex = new RegExp(search,'gi');
            $(this).html( $(this).text().replace(regex, "<span class='text-yellow'>"+search+"</span>") );
        });
    });
</script>
