<ul class="nav nav-treeview">
    <li class="nav-item ">
        <a href="{{ route('technologie.index') }}"
            class="nav-link nav-link {{ Request::is('technologie*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-table"></i>
            <p>Technologies</p>
        </a>
    </li>
</ul>
