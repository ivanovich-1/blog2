<nav class="custom-wrapper" id="menu">
    <div class="pure-menu"></div>
    <ul class="container-flex list-unstyled">
        <li><a href="{{ route('pages.home') }}" class="text-uppercase {{ setActiveRoute('pages.home') }}">{{ __('app.navbar.home') }}</a></li>
        <li><a href="{{ route('pages.about') }}" class="text-uppercase {{ setActiveRoute('pages.about') }}">{{ __('app.navbar.about') }}</a></li>
        <li><a href="{{ route('pages.archive') }}" class="text-uppercase {{ setActiveRoute('pages.archive') }}">{{ __('app.navbar.archive') }}</a></li>
        <li><a href="{{ route('pages.contact') }}" class="text-uppercase {{ setActiveRoute('pages.contact') }}">{{ __('app.navbar.contact') }}</a></li>
        <li class="text-uppercase"><a href="{{ route('set_language', ['es']) }}" class="dropdown-item"> {{ __('menu.spain') }}</a></li>
        <li class="text-uppercase"><a href="{{ route('set_language', ['en']) }}" class="dropdown-item"> {{ __('menu.english') }}</a></li>
    </ul>
</nav>
