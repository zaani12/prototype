<div class="card-body table-responsive p-0">
<table class="table table-striped text-nowrap">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Email</th>
            <th>Type</th>
            <th>action</th>
        </tr>
    </thead>
    <tbody id="membre-table">
        @foreach ($personnes as $item)
            <tr>
                <td>{{$item->nom}}</td>
                <td>{{$item->prenom}}</td>
                <td>{{$item->email}}</td>
                <td>{{$item->type}}</td>
                <td class="d-flex justify-content-center">
                    <a href="{{ route($type.'.edit', $item->id) }}" class="btn btn-sm btn-default"><i
                            class="fa-solid fa-pen-to-square"></i></a>
                            <form action="{{ route($type.'.delete', $item->id) }}" class="ml-2" method="post">
                                @csrf
                                @method('delete')
                                <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete(this.form)"><i
                                        class="fa-solid fa-trash"></i></button>
                            </form>
                            
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>
<div class="card-footer clearfix mb-2 mr-5">
    <ul class="pagination  m-0 float-right">
        {{$personnes->links()}}
    </ul>
</div>