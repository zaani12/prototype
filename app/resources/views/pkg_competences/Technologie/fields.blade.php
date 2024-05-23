<form action="{{ $dataToEdit ? route('technologies.update', $dataToEdit->id) : route('technologies.store') }}"
    method="POST">
    @csrf
    @if ($dataToEdit)
        @method('PUT')
    @endif
    <div class="card-body">
        <div class="form-group">
            <label for="nom">{{ __('app.name') }} <span class="text-danger">*</span></label>
            <input name="nom" type="text" class="form-control" id="nom" placeholder="Entrez le titre"
                value="{{ $dataToEdit ? $dataToEdit->nom : old('nom') }}">
            @error('nom')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label
                for="categorie_technologies_id">{{ __('pkg_competences/technologie/technologie.categorie_technologies') }}
                <span class="text-danger">*</span></label>
            <input name="categorie_technologies_id" type="text" class="form-control" id="categorie_technologies_id"
                placeholder="Entrez le titre"
                value="{{ $dataToEdit ? $dataToEdit->categorie_technologies_id : old('categorie_technologies_id') }}">
            @error('categorie_technologies_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="competence_id">{{ __('pkg_competences/technologie/technologie.competence') }} <span
                    class="text-danger">*</span></label>
            <input name="competence_id" type="text" class="form-control" id="competence_id"
                placeholder="Entrez le titre"
                value="{{ $dataToEdit ? $dataToEdit->competence_id : old('competence_id') }}">
            @error('competence_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>


        <div class="form-group">
            <label for="inputDescription">{{ __('app.description') }}</label>
            <textarea name="description" id="editor" class="form-control" rows="7" placeholder="Entrez la description">
                {{ $dataToEdit ? $dataToEdit->description : old('description') }}
            </textarea>
            @error('description')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="card-footer">
        <a href="{{ route('technologies.index') }}" class="btn btn-default">{{ __('app.cancel') }}</a>
        <button type="submit" class="btn btn-info">{{ $dataToEdit ? __('app.edit') : __('app.add') }}</button>
    </div>
</form>
