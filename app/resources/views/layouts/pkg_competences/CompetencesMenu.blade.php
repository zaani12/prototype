<li class="nav-item has-treeview">
    <a class="nav-link nav-link {{ Request::is('competences*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-table"></i>
        <p>
            Gestion des Competences
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item ">
            <a href="{{ route('CategorieTechnologie.index') }}"
                class="nav-link nav-link {{ Request::is('CategorieTechnologie*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-table"></i>
                <p>Categorie technologie</p>
            </a>
        </li>
    </ul>
</li>