<nav aria-label="breadcrumb" class="main-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form-1').submit();" class="mr-2 text-danger" title="logout">
                <i class="fas fa-power-off"></i>
                <form id="logout-form-1" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </a>
            <span class="pr-2 text-secondary">|</span>
            <a href="{{ route('user.dashboard') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item"><a href="javascript:void(0)">User</a></li>
        <li class="breadcrumb-item active" aria-current="page">User Profile</li>
    </ol>
</nav>