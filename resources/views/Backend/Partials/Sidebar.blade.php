<div class="sidebar-backdrop" id="sidebarBackdrop"></div>

    <!-- ============ SIDEBAR ============ -->
    <aside class="admin-sidebar" id="adminSidebar">
        <ul class="sidebar-nav">
            <li>
                <a href="{{ route('dashboard.view') }}" class="nav-link active">
                    <i class="fa-solid fa-chart-pie nav-icon"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
            </li>

            <li>
                <a href="#" class="nav-link nav-dropdown-toggle" data-dropdown="categoryMenu">
                    <i class="fa-solid fa-folder-tree nav-icon"></i>
                    <span class="nav-text">Categories</span>
                    <i class="fa-solid fa-chevron-right arrow"></i>
                </a>
                <ul class="nav-submenu" id="categoryMenu">
                    <li>
                        <a href="{{ route('categories.view') }}" class="nav-link">
                            <i class="fa-solid fa-circle"></i>
                            <span class="nav-text">Category List</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('categories.create.view') }}" class="nav-link">
                            <i class="fa-solid fa-circle"></i>
                            <span class="nav-text">Create Category</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="#" class="nav-link nav-dropdown-toggle" data-dropdown="productMenu">
                    <i class="fa-solid fa-box nav-icon"></i>
                    <span class="nav-text">Product Management</span>
                    <i class="fa-solid fa-chevron-right arrow"></i>
                </a>
                <ul class="nav-submenu" id="productMenu">
                    <li>
                        <a href="{{ route('product.view') }}" class="nav-link">
                            <i class="fa-solid fa-circle"></i>
                            <span class="nav-text">All Products</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('product.create.view') }}" class="nav-link">
                            <i class="fa-solid fa-circle"></i>
                            <span class="nav-text">Create Product</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('product.image.view') }}" class="nav-link">
                            <i class="fa-solid fa-circle"></i>
                            <span class="nav-text">Product Images</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="#" class="nav-link nav-dropdown-toggle" data-dropdown="attrMenu">
                    <i class="fa-solid fa-sliders nav-icon"></i>
                    <span class="nav-text">Attributes & Variants</span>
                    <i class="fa-solid fa-chevron-right arrow"></i>
                </a>
                <ul class="nav-submenu" id="attrMenu">
                    <li>
                        <a href="{{ route('attribute.variant.view') }}" class="nav-link">
                            <i class="fa-solid fa-circle"></i>
                            <span class="nav-text">Attribute & Variant List</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('attribute.create.view') }}" class="nav-link">
                            <i class="fa-solid fa-circle"></i>
                            <span class="nav-text">Create Attribute</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('variant.create.view') }}" class="nav-link">
                            <i class="fa-solid fa-circle"></i>
                            <span class="nav-text">Create Product Variant</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="#" class="nav-link nav-dropdown-toggle" data-dropdown="couponMenu">
                    <i class="fa-solid fa-ticket nav-icon"></i>
                    <span class="nav-text">Coupons Management</span>
                    <i class="fa-solid fa-chevron-right arrow"></i>
                </a>
                <ul class="nav-submenu" id="couponMenu">
                    <li>
                        <a href="{{ route('coupon.view') }}" class="nav-link">
                            <i class="fa-solid fa-circle"></i>
                            <span class="nav-text">Coupon List</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('coupon.create.view') }}" class="nav-link">
                            <i class="fa-solid fa-circle"></i>
                            <span class="nav-text">Create Coupon</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="#" class="nav-link nav-dropdown-toggle" data-dropdown="offerMenu">
                    <i class="fa-solid fa-bullhorn nav-icon"></i>
                    <span class="nav-text">Offers & Campaigns</span>
                    <i class="fa-solid fa-chevron-right arrow"></i>
                </a>
                <ul class="nav-submenu" id="offerMenu">
                    <li>
                        <a href="{{ route('campaign.view') }}" class="nav-link">
                            <i class="fa-solid fa-circle"></i>
                            <span class="nav-text">Campaign List</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('campaign.create.view') }}" class="nav-link">
                            <i class="fa-solid fa-circle"></i>
                            <span class="nav-text">Create Campaign</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="{{ route('order.view') }}" class="nav-link">
                    <i class="fa-solid fa-list-check nav-icon"></i>
                    <span class="nav-text">Orders Management</span>
                </a>
            </li>
            <li>
                <a href="{{ route('payment.tracking.view') }}" class="nav-link">
                    <i class="fa-solid fa-credit-card nav-icon"></i>
                    <span class="nav-text">Payments Tracking</span>
                </a>
            </li>
            <li>
                <a href="{{ route('return.refund.view') }}" class="nav-link">
                    <i class="fa-solid fa-rotate-left nav-icon"></i>
                    <span class="nav-text">Returns & Refunds</span>
                </a>
            </li>

            <li>
                <a href="{{ route('customer.view') }}" class="nav-link">
                    <i class="fa-solid fa-users nav-icon"></i>
                    <span class="nav-text">Customers List</span>
                </a>
            </li>

            <li>
                <a href="{{ route('setting.view') }}" class="nav-link active">
                    <i class="fa-solid fa-gears nav-icon"></i>
                    <span class="nav-text">System Settings</span>
                </a>
            </li>
        </ul>
    </aside>
