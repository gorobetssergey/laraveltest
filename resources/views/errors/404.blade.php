@extends('layouts.app')
@section('content-header')
    <section class="content-header">
        <h1>
            404 Error Page
        </h1>
        <ol class="breadcrumb">
            <li><a href="#">Errors</a></li>
            <li class="active">404 error</li>
        </ol>
    </section>
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="error-page">
            <h2 class="headline text-yellow"> 404</h2>

            <div class="error-content">
                <h3><i class="fa fa-warning text-yellow"></i> Упс! Страница не найдена.</h3>

                <p>
                    Мы не смогли найти запрошенную страницу.
                    Кстати, вы можете <a href="{{ URL::previous() }}">вернутся назад</a> или попытатся использовать поиск.
                </p>

            </div>
            <!-- /.error-content -->
        </div>
        <!-- /.error-page -->
    </section>
    <!-- /.content -->
@endsection
