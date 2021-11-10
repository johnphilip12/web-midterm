<li class="nav-item">
    <a href="{{ route('cars.index') }}"
       class="nav-link {{ Request::is('cars*') ? 'active' : '' }}">
        <p>Cars</p>
    </a>
</li>





<li class="nav-item">
    <a href="{{ route('logs.index') }}"
       class="nav-link {{ Request::is('logs*') ? 'active' : '' }}">
        <p>Logs</p>
    </a>
</li>


