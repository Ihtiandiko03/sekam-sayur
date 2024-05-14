<!-- MOBILE NAV -->
<div class="mb-nav">
    <div class="mb-move-item"></div>
    <div class="mb-nav-item {{ ($active === "Home") ? 'active' : '' }}">
        <a href="#home">
            <i class="bx bxs-home"></i>
        </a>
    </div>
    <div class="mb-nav-item">
        <a href="#about">
            <i class='bx bxs-wink-smile'></i>
        </a>
    </div>
    <div class="mb-nav-item">
        <a href="#food-menu-section">
            <i class='bx bxs-food-menu'></i>
        </a>
    </div>
    <div class="mb-nav-item">
        <a href="#testimonial">
            <i class='bx bxs-comment-detail'></i>
        </a>
    </div>
</div>
<!-- END MOBILE NAV -->
<!-- BACK TO TOP BTN -->
<a href="#home" class="back-to-top">
    <i class="bx bxs-to-top"></i>
</a>
<!-- END BACK TO TOP BTN -->
<!-- TOP NAVIGATION -->
<div class="nav">
    <div class="menu-wrap">
        <a href="#home">
            <div class="logo">
                Metro Sayur
            </div>
        </a>
        <div class="menu h-xs">
            <a href="/">
                <div class="menu-item {{ ($active === "Home") ? 'active' : '' }}">
                    Home
                </div>
            </a>
            <a href="#about">
                <div class="menu-item">
                    About
                </div>
            </a>
            <a href="#food-menu-section">
                <div class="menu-item">
                    Menu
                </div>
            </a>
            <a href="#testimonial">
                <div class="menu-item">
                    Testimonials
                </div>
            </a>
            <a href="/login">
                <div class="menu-item {{ ($active === "Login") ? 'active' : '' }}">
                    Login
                </div>
            </a>
        </div>
        <div class="right-menu">
            <div class="cart-btn">
                <i class='bx bx-cart-alt'></i>
            </div>
        </div>
    </div>
</div>
<!-- END TOP NAVIGATION -->