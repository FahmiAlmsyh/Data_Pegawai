@extends('backend.layout.app')
@section('main')
    <div class="wrapper">
        @include('backend.components.sidebar')

        <div class="main-panel">
            <div class="main-header">
                <div class="main-header-logo">
                    @include('backend.components.logo')
                </div>
                @include('backend.components.navbar')
            </div>

            <div class="container">
                <div class="page-inner">
                    <div class="row">

                        <div class="col-md-12">
                            <div class="card" style="height: 80vh">
                                <div class="card-body align-content-center">
                                    <h1 class="h3 mb-4 text-center ">Bonjour 👋🏻</h1>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            @include('backend.components.footer')
        </div>

    </div>
@endsection
