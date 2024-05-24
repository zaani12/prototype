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
<<<<<<< HEAD
            <a href="{{ route('competence.index') }}"
                class="nav-link nav-link {{ Request::is('competence*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-table"></i>
                <p>Gestion Competences</p>
=======
            <a href="{{ route('technologies.index') }}"
                class="nav-link nav-link {{ Request::is('technologies*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-table"></i>
                <p>Technologies</p>
>>>>>>> develop
            </a>
        </li>
    </ul>
</li>
