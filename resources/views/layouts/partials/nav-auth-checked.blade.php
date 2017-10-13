
@can('users.index')
    <li class="nav-item">
        <a class="nav-link" href="{{ route('backend.user') }}">@lang('backend::layout.nav.users')</a>
    </li>
@endcan
