@extends('layouts.app')

@section('content-header')
    <div class="container">
        <div class="row">
            <section class="content-header">
                <h1>
                    403 Error Page
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#">Errors</a></li>
                    <li class="active">403 error</li>
                </ol>
            </section>
        </div>
    </div>
@endsection

@section('content')
    <div class="container">
        <div class="row">
        <!-- Main content -->
        <section class="content">
            <div class="error-page">
                <h2 class="headline text-yellow"> 403</h2>

                <div class="error-content">
                    <h3><i class="fa fa-warning text-yellow"></i> Упс! У вас нет доступа.</h3>

                    <p>
                        К сожалению у вас нет доступа к этой странице.
                        Кстати, вы можете <a href="{{ URL::previous() }}">вернутся назад</a> или попытатся использовать поиск.
                    </p>

                </div>
                <!-- /.error-content -->
            </div>
            <!-- /.error-page -->
        </section>
        <!-- /.content -->
        </div>
    </div>
@endsection
