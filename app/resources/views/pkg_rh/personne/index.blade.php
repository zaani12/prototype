@extends('layouts.app')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    {{ session('success') }}.
                </div>
            @endif

            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>La liste des {{ $type }}s</h1>
                </div>
                <div class="col-sm-6">
                    <div class="float-sm-right">
                        <a href="{{ route($type . '.create') }}" class="btn btnAdd">Ajouter</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header col-md-12">
                            <div class=" p-0">
                                <div class="input-group input-group-sm float-sm-right col-md-3 p-0">
                                    <input type="text" id="search" class="form-control float-right"
                                        placeholder="Search">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @include('personne.table')
                    </div>

                </div>
            </div>
        </div>

    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            function fetch_data(page, search) {

                var type = '<?php echo $type; ?>';

                console.log(type);

                $.ajax({
                    url: '/' + type + '?page=' + page + '&query=' + search.trim(),
                    success: function(data) {

                        var newData = $(data);

                        $('#membre-table').html(newData.find('#membre-table').html());
                        $('.card-footer').html(newData.find('.card-footer').html());
                        var paginationHtml = newData.find('.pagination').html();
                        if (paginationHtml) {
                            $('.pagination').html(paginationHtml);
                        } else {
                            $('.pagination').html('');
                        }
                    }
                });
            }


            $('body').on('click', '.pagination a', function(param) {
                param.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                var search = $('#search').val();
                fetch_data(page, search);
            });

            $('body').on('keyup', '#search', function() {
                var search = $('#search').val();
                var page = 1;
                fetch_data(page, search);
            });

            fetch_data(1, '');
        });

        function confirmDelete(form) {
            if (confirm("Are you sure you want to delete this member?")) {
                form.submit();
            }
        }
    </script>
@endsection
