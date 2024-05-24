@extends('layouts.app')
@section('title', __('app.edit') . ' ' . __('pkg_competences/categorieTechnologie.singular'))
@section('content')
    <div class="content-header">
        @if ($errors->has('project_exists'))
            <div class="alert alert-danger">
                {{ $errors->first('project_exists') }}
            </div>
        @else
            @if ($errors->has('unexpected_error'))
                <div class="alert alert-danger">
                    {{ $errors->first('unexpected_error') }}
                </div>
            @endif
        @endif
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="nav-icon fas fa-table"></i>
                                {{ __('app.edit') }} {{ __('pkg_competences/categorieTechnologie.singular') }}
                            </h3>
                        </div>
                        <div class="card-body">
                            <form id="createForm">
                                <div class="modal-body">
                                  <div class="form-group">
                                    <label for="nom">Nom:</label>
                                    <input type="text" class="form-control" id="nom" name="nom">
                                    @error('nom')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                  </div>
                                  <div class="form-group">
                                    <label for="description">Description:</label>
                                    <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                                    @error('description')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                  </div>
                                </div>
                                <div class="card-footer">
                                  <button type="button" class="btn btn-secondary">{{ __('app.cancel') }}</button>
                                  <button type="submit" class="btn btn-info">{{ __('app.edit') }}</button>
                                </div>
                              </form>
                        </div>                    
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
