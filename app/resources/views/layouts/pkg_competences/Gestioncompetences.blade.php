<li class="nav-item has-treeview">
    <a href="#" class="nav-link {{ Request::is('nature-livrables*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-leaf"></i>
        <p>
            Gestion des competence
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item ">
            <a href="{{ route('competence.index') }}" class="nav-link nav-link {{ Request::is('competence*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-table"></i>
                <p>competence</p>
            </a>
        </li>
    </ul>



</li>
