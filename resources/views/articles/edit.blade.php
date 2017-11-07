@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Articles</div>
                        <div class="panel-body">

                        <form method="post" action="{{route('article.update', ['article' => $article->id])}}" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group">
                                <input type="hidden" class="hidden" value="{{$article->id}}" id="exampleId" placeholder="Enter title" name="id">
                            </div>
                            <div class="form-group">
                                <label for="tag_list">Categories:</label>
                                <select name="categories[]" class="form-control state-tags-multiple" multiple="multiple">
                                    @foreach($categories as $key=>$value)
                                        @if( in_array($value,$selfCategories) )
                                            <option value="{{ $value }}" selected="selected">
                                                {{ $key }}
                                            </option>
                                        @else
                                            <option value="{{ $value }}">
                                                {{ $key }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleTitle">Title</label>
                                <input type="text" class="form-control" value="{{$article->title}}" id="exampleTitle" placeholder="Enter title" name="title">
                            </div>
                            <div class="form-group">
                                <label for="exampleContent">Content</label>
                                <textarea class="form-control" id="exampleContent" placeholder="Enter Content"  name="content">{{$article->content}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleContent">Image</label>
                                <input type="file" class="form-control" id="exampleImage" value="{{$article->image}}" placeholder="Select file" name="image">
                            </div>
                            <button type="submit" class="btn btn-block btn-primary">STORE</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(".state-tags-multiple").select2({
            placeholder: 'Select an category',
        });
    </script>
@stop