<nav class="sidebar">
    <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
            E<span>Ticaret</span>
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">
            <li class="nav-item nav-category">Main</li>
            <li class="nav-item {{ Route::is('admin.index') ? 'active' : '' }}">
                <a href="{{ route('admin.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item nav-category">Ürün Yönetimi</li>
            <li class="nav-item {{ Route::is('admin.brand.index') || Route::is('admin.brand.create') ? 'active' : '' }}">
                <a class="nav-link" data-bs-toggle="collapse" href="#emails" role="button" aria-expanded="false" aria-controls="emails">
                    <i class="link-icon" data-feather="bold"></i>
                    <span class="link-title">Marka Yönetimi</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse {{ Route::is('admin.brand.index') || Route::is('admin.brand.create') ? 'show' : '' }}" id="emails">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('admin.brand.index') }}" class="nav-link {{ Route::is('admin.brand.index') ? 'active' : '' }}">Marka Listesi</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.brand.create') }}" class="nav-link {{ Route::is('admin.brand.create') ? 'active' : '' }}">Marka Ekleme</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item {{ Route::is('admin.category.index') || Route::is('admin.category.create') ? 'active' : '' }}">
                <a class="nav-link" data-bs-toggle="collapse" href="#categories" role="button" aria-expanded="false" aria-controls="categories">
                    <i class="link-icon" data-feather="list"></i>
                    <span class="link-title">Kategori Yönetimi</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse {{ Route::is('admin.category.index') || Route::is('admin.category.create') ? 'show' : '' }}" id="categories">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('admin.category.index') }}" class="nav-link {{ Route::is('admin.category.index') ? 'active' : '' }}">Kategori Listesi</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.category.create') }}" class="nav-link {{ Route::is('admin.category.create') ? 'active' : '' }}">Kategori Ekleme</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item {{ Route::is('admin.product.index') || Route::is('admin.product.create') ? 'active' : '' }}">
                <a class="nav-link" data-bs-toggle="collapse" href="#products" role="button" aria-expanded="false" aria-controls="products">
                    <i class="link-icon" data-feather="list"></i>
                    <span class="link-title">Ürün Yönetimi</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse {{ Route::is('admin.product.index') || Route::is('admin.product.create') ? 'show' : '' }}" id="products">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('admin.product.index') }}" class="nav-link {{ Route::is('admin.product.index') ? 'active' : '' }}">Ürün Listesi</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.product.create') }}" class="nav-link {{ Route::is('admin.product.create') ? 'active' : '' }}">Ürün Ekleme</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a href="../../pages/apps/chat.html" class="nav-link">
                    <i class="link-icon" data-feather="message-square"></i>
                    <span class="link-title">Chat</span>
                </a>
            </li>

        </ul>
    </div>
</nav>
