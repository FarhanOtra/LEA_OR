<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">

    <div class="c-sidebar-brand">
        <img class="c-sidebar-brand-full" src="{{ asset('assets/brand/coreui-pro-base-white.svg') }}" width="118"
             height="46" alt="CoreUI Logo">
        <img class="c-sidebar-brand-minimized" src="{{ asset('assets/brand/coreui-signet-white.svg') }}" width="118"
             height="46" alt="CoreUI Logo">
    </div>

    <ul class="c-sidebar-nav" data-drodpown-accordion="true">

        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('home') }}">
                <i class="cil-speedometer c-sidebar-nav-icon"></i>
                Dashboard<span class="badge badge-info">NEW</span>
            </a>
        </li>

        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{route('barang.index')}}">
                <i class="cil-address-book c-sidebar-nav-icon"></i>
                Barang
            </a>
        </li>

    </ul>
    <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent"
            data-class="c-sidebar-unfoldable">
    </button>
</div>
