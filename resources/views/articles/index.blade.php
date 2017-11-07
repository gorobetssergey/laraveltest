@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Articles</div>

                    <div class="panel-body">
                        <div id="accordion" role="tablist">
                            @foreach($articles as $article)
                                <div class="card">
                                    <div class="card-header" role="tab" id="{{'heading'.$loop->iteration}}">
                                        <h5 class="mb-0">
                                            <div class="row">
                                                <div class="col-md-8 col-md-offset-1">
                                                    <a data-toggle="collapse" href="{{'#collapse'.$loop->iteration}}" aria-expanded="true" aria-controls="{{'collapse'.$loop->iteration}}">
                                                        {{$article->title}}
                                                    </a>
                                                </div>
                                                @can('edit', $article)
                                                    <div class="col-md-2">
                                                        <a href="{{route('article.edit',['article' => $article->id])}}" class="btn btn-info btn-block">edit</a>
                                                    </div>
                                                @endcan
                                            </div>
                                        </h5>
                                    </div>

                                    <div id="{{'collapse'.$loop->iteration}}" class="collapse" role="tabpanel" aria-labelledby="{{'heading'.$loop->iteration}}" data-parent="#accordion">
                                        <div class="card-body">
                                            <ul>
                                                @foreach($article->categoryArticles as $item)
                                                    <li>{{$item->category->title}}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                            @endforeach
                        </div>
                    </div>
                    <a href="{{route('article.create')}}" class="btn btn-block btn-primary">Add Article</a>
                </div>
            </div>
        </div>
    </div>
@endsection
