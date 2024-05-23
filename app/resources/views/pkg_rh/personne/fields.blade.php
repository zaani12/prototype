<div class="form-group">
    <label for="exampleInputEmail1">Nom </label>
    <input name="nom" type="text" class="form-control"
        id="exampleInputEmail1" value="{{ isset($personne) ? $personne->nom : null}}">
</div>

<div class="form-group">
    <label for="exampleInputPassword1">Prenom</label>
    <input name="prenom" type="text" class="form-control"
        id="exampleInputPassword1" value="{{ isset($personne) ? $personne->prenom : null}}">
</div>

<div class="form-group">
    <label for="exampleInputPassword1">Email</label>
    <input name="email" type="email" class="form-control"
        id="exampleInputPassword2" value="{{ isset($personne) ? $personne->email : null}}">
</div>