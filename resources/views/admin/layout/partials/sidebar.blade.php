<a class="sidebar-menu-list">
    <a class="list-group-item list-group-item-action d-md-none d-lg-none d-xl-none d-xxl-none" type="button"
       id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
        <div class="profile-info-icon-sidebar me-1"><span>{{ auth()->user()->name[0] }}</span></div>
        <span class="sidebar-menu-text fs-6">{{auth()->user()->name .' '. auth()->user()->surname}}</span>
        <i class="bi bi-chevron-down sidebar-toggle-icon me-1"></i>
    </a>

    <ul class="dropdown-menu sidebar-dropdown-open d-md-none d-lg-none d-xl-none d-xxl-none"
        aria-labelledby="dropdownMenuButton1">
        <span class="text-secondary ms-2">Version : v{{ app()->version() }}</span><br>
        <span class="text-secondary ms-2 fw-bold">HESAP</span>
        <li><a class="dropdown-item" href="{{route('admin.profile.edit')}}">Hesabım</a></li>
        <li><a class="dropdown-item" href="{{route('logout-user')}}">Çıkış Yap</a></li>
    </ul>

    <a class="list-group-item list-group-item-action d-none d-md-block {{ request()->is('admin/dashboard') ? 'active' : '' }}"
       href="{{route('admin.dashboard')}}">
        <i class="bi bi-house fs-4"></i>
        <span class="sidebar-menu-text">Ana Sayfa</span>
    </a>

    <a class="list-group-item list-group-item-action d-none d-md-block {{ request()->is('admin/company*') ? 'active' : '' }}"
       href="{{route('admin.company.index')}}">
        <i class="bi bi-building fs-4"></i>
        <span class="sidebar-menu-text">Şirketler</span>
    </a>

    <a class="list-group-item list-group-item-action d-none d-md-block {{ request()->is('admin/manager-user*') ? 'active' : '' }}"
       href="{{route('admin.manager-user.index')}}">
        <i class="bi bi-people fs-4"></i>
        <span class="sidebar-menu-text">Kullanıcılar</span>
    </a>

    <a class="list-group-item list-group-item-action {{ request()->is('admin/question*', 'admin/type*', 'admin/lesson-content*') ? 'active' : '' }}"
       type="button" id="dropdownMenuButton4" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="bi bi-question-circle fs-4"></i>
        <span class="sidebar-menu-text">Soru Bankası</span>
        <i class="bi bi-chevron-down sidebar-toggle-icon me-1"></i>
    </a>

    <ul class="dropdown-menu sidebar-dropdown-open" aria-labelledby="dropdownMenuButton4">
        <span class="text-secondary ms-2">BANK</span>
        <li><a class="dropdown-item" href="{{route('admin.lesson-content.index')}}">Dersler</a></li>
        <li><a class="dropdown-item" href="{{route('admin.question.index')}}">Sorular</a></li>
        <li><a class="dropdown-item" href="{{route('admin.type.index')}}">Soru Kategorileri</a></li>
    </ul>

    <a class="list-group-item list-group-item-action {{ request()->is('admin/coupon*', 'admin/package*', 'admin/payment-plan*') ? 'active' : '' }}"
       type="button" id="dropdownMenuButton3" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="bi bi-megaphone fs-4"></i>
        <span class="sidebar-menu-text">Pazarlama</span>
        <i class="bi bi-chevron-down sidebar-toggle-icon me-1"></i>
    </a>

    <ul class="dropdown-menu sidebar-dropdown-open" aria-labelledby="dropdownMenuButton3">
        <span class="text-secondary ms-2">MARKETING</span>
        <li><a class="dropdown-item" href="{{route('admin.payment-plan.index')}}">Ödeme Planları</a></li>
        <li><a class="dropdown-item" href="{{route('admin.package.index')}}">Paketler</a></li>
        <li><a class="dropdown-item" href="{{route('admin.coupon.index')}}">Kuponlar</a></li>
    </ul>

    <a class="list-group-item list-group-item-action {{ request()->is('admin/language*', 'admin/group*', 'admin/period*', 'admin/car-type*') ? 'active' : '' }}"
       type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="bi bi-gear fs-4"></i>
        <span class="sidebar-menu-text">Sistem Ayarları</span>
        <i class="bi bi-chevron-down sidebar-toggle-icon me-1"></i>
    </a>

    <ul class="dropdown-menu sidebar-dropdown-open" aria-labelledby="dropdownMenuButton2">
        <span class="text-secondary ms-2">SETTINGS</span>
        <li><a class="dropdown-item" href="{{route('admin.language.index')}}">Dil Seçenekleri</a></li>
        <li><a class="dropdown-item" href="{{route('admin.group.index')}}">Ehliyet Grupları</a></li>
        <li><a class="dropdown-item" href="{{route('admin.period.index')}}">Dönemler</a></li>
        <li><a class="dropdown-item" href="{{route('admin.car-type.index')}}">Araç Türleri</a></li>
    </ul>


</a>
