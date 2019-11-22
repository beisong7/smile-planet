<nav class="navbar navbar-expand-sm navbar-fixed-top nav-admin" style="position: fixed; top: 0">

    <!-- Links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="#">Settings</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('alogout-form').submit();">
                <i class="fa fa-sign-out"></i> Logout
            </a>

            <form id="alogout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </li>
    </ul>

</nav>