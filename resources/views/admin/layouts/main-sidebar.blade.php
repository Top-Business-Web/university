<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="side-header">
        <a class="header-brand1" href="#">
            <img src="{{ asset('assets/logo/download.jfif') }}" class="header-brand-img light-logo1" alt="logo">
        </a>
        <!-- LOGO -->
    </div>
    <ul class="side-menu">
        <li>
            <h3><a href="{{ route('admin.home') }}">{{ trans('admin.dashboard')}}</a></h3>
        </li>

        <li class="slide">
            <a class="side-menu__item" href="{{route('admins.index')}}">
                <i class="fa fa-user-alt side-menu__icon"></i>
                <span class="side-menu__label">{{trans('admin.all_admins')}}</span>
            </a>
        </li>

        <li class="slide">
            <a class="side-menu__item" href="{{route('selections.index')}}">
                <i class="fa fa-marker side-menu__icon"></i>
                <span class="side-menu__label">Selections</span>
            </a>
        </li>

    </ul>
</aside>
