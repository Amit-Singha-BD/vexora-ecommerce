@extends('Backend.Layout.MasterLayout')
@section('Content')
    <!-- Page Header -->
    <div class="page-header reveal">
        <div>
            <h1 class="page-title">Customer Management</h1>
            <p class="page-subtitle">View registered users, manage account status & track order histories</p>
        </div>
        <button class="btn-gradient" id="custExportBtn">
            <i class="fa-solid fa-download me-1"></i> Export Customers
        </button>
    </div>

    <!-- Metrics Row -->
    <div class="cust-metrics reveal">
        <div class="cust-metric">
            <div>
                <span class="cust-metric-label">Total Registered</span>
                <h3 class="cust-metric-value">3,420</h3>
            </div>
            <div class="cust-metric-icon" style="background: rgba(99,102,241,0.1); color: var(--primary);">
                <i class="fa-solid fa-users"></i>
            </div>
        </div>

        <div class="cust-metric">
            <div>
                <span class="cust-metric-label">Active Customers</span>
                <h3 class="cust-metric-value">3,285</h3>
            </div>
            <div class="cust-metric-icon" style="background: rgba(16,185,129,0.1); color: var(--success);">
                <i class="fa-solid fa-user-check"></i>
            </div>
        </div>

        <div class="cust-metric">
            <div>
                <span class="cust-metric-label">Suspended</span>
                <h3 class="cust-metric-value">135</h3>
            </div>
            <div class="cust-metric-icon" style="background: rgba(239,68,68,0.1); color: var(--danger);">
                <i class="fa-solid fa-user-slash"></i>
            </div>
        </div>
    </div>

    <!-- Filter Bar -->
    <div class="admin-card reveal" style="padding: 20px;">
        <div class="cust-filterbar">
            <div class="cust-search-wrap">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" class="form-control" id="custSearchInput"
                    placeholder="Search by name, email or phone...">
            </div>

            <select class="cust-filter-select" id="custStatusFilter">
                <option value="all">All Status</option>
                <option value="active">Active</option>
                <option value="suspended">Suspended</option>
            </select>

            <button class="btn-gradient" id="custResetBtn" type="button">
                <i class="fa-solid fa-rotate-right me-1"></i> Reset
            </button>
        </div>
    </div>

    <!-- Customers Table -->
    <div class="admin-card reveal">
        <div class="responsive-table">
            <table>
                <thead>
                    <tr>
                        <th>Customer</th>
                        <th>Phone Number</th>
                        <th>Registered</th>
                        <th>Status</th>
                        <th style="text-align:right;">Actions</th>
                    </tr>
                </thead>
                <tbody id="custTableBody">

                    <!-- Customer 1: Active -->
                    <tr data-status="active">
                        <td data-label="Customer">
                            <div class="cust-cell">
                                <span class="cust-avatar v1">AI</span>
                                <div>
                                    <p class="cust-name">Ariful Islam</p>
                                    <span class="cust-email" data-copy="ariful.islam@gmail.com" title="Click to copy email">
                                        <i class="fa-regular fa-envelope"></i>
                                        ariful.islam@gmail.com
                                    </span>
                                </div>
                            </div>
                        </td>
                        <td data-label="Phone">
                            <span class="cust-phone">+880 1712-345678</span>
                        </td>
                        <td data-label="Registered">
                            <span class="cust-date">15 Jan 2026</span>
                            <span class="cust-date-sub">8 months ago</span>
                        </td>
                        <td data-label="Status">
                            <span class="cust-status cust-status-active">Active</span>
                        </td>
                        <td data-label="Actions" style="text-align:right;">
                            <div class="cust-actions">
                                <button class="btn-profile" data-bs-toggle="modal" data-bs-target="#customerProfileModal">
                                    <i class="fa-solid fa-user"></i> Profile
                                </button>
                                <button class="btn-icon-action btn-delete" title="Suspend Account" data-bs-toggle="modal"
                                    data-bs-target="#suspendCustomerModal">
                                    <i class="fa-solid fa-ban"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <!-- Customer 2: Active -->
                    <tr data-status="active">
                        <td data-label="Customer">
                            <div class="cust-cell">
                                <span class="cust-avatar v2">NJ</span>
                                <div>
                                    <p class="cust-name">Nusrat Jahan</p>
                                    <span class="cust-email" data-copy="nusrat.jahan@yahoo.com" title="Click to copy email">
                                        <i class="fa-regular fa-envelope"></i>
                                        nusrat.jahan@yahoo.com
                                    </span>
                                </div>
                            </div>
                        </td>
                        <td data-label="Phone">
                            <span class="cust-phone">+880 1819-876543</span>
                        </td>
                        <td data-label="Registered">
                            <span class="cust-date">22 Feb 2026</span>
                            <span class="cust-date-sub">7 months ago</span>
                        </td>
                        <td data-label="Status">
                            <span class="cust-status cust-status-active">Active</span>
                        </td>
                        <td data-label="Actions" style="text-align:right;">
                            <div class="cust-actions">
                                <button class="btn-profile" data-bs-toggle="modal" data-bs-target="#customerProfileModal">
                                    <i class="fa-solid fa-user"></i> Profile
                                </button>
                                <button class="btn-icon-action btn-delete" title="Suspend Account" data-bs-toggle="modal"
                                    data-bs-target="#suspendCustomerModal">
                                    <i class="fa-solid fa-ban"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <!-- Customer 3: Suspended -->
                    <tr data-status="suspended">
                        <td data-label="Customer">
                            <div class="cust-cell">
                                <span class="cust-avatar v5 suspended">RK</span>
                                <div>
                                    <p class="cust-name" style="color:var(--text-muted);">Rafiqul Karim</p>
                                    <span class="cust-email" data-copy="rafiq.spam@hotmail.com"
                                        title="Click to copy email">
                                        <i class="fa-regular fa-envelope"></i>
                                        rafiq.spam@hotmail.com
                                    </span>
                                </div>
                            </div>
                        </td>
                        <td data-label="Phone">
                            <span class="cust-phone">+880 1911-223344</span>
                        </td>
                        <td data-label="Registered">
                            <span class="cust-date">05 Mar 2026</span>
                            <span class="cust-date-sub">6 months ago</span>
                        </td>
                        <td data-label="Status">
                            <span class="cust-status cust-status-suspended">Suspended</span>
                        </td>
                        <td data-label="Actions" style="text-align:right;">
                            <div class="cust-actions">
                                <button class="btn-profile" data-bs-toggle="modal"
                                    data-bs-target="#customerProfileModal">
                                    <i class="fa-solid fa-user"></i> Profile
                                </button>
                                <button class="btn-icon-action" title="Activate Account" data-bs-toggle="modal"
                                    data-bs-target="#activateCustomerModal"
                                    style="background: rgba(16,185,129,0.12); color: var(--success);">
                                    <i class="fa-solid fa-check"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                </tbody>
            </table>

            <div class="cust-empty d-none" id="custEmptyState">
                <i class="fa-solid fa-users"></i>
                <p class="mb-0">No customers match your filter criteria.</p>
            </div>
        </div>

        <!-- Pagination -->
        <div class="cust-pagination">
            <small class="text-muted">
                Showing <strong class="text-dark">1-3</strong> of <strong class="text-dark">3,420</strong> customers
            </small>
            <div class="d-flex gap-2">
                <a href="#" class="cust-page-btn disabled"><i class="fa-solid fa-chevron-left"></i></a>
                <a href="#" class="cust-page-btn active">1</a>
                <a href="#" class="cust-page-btn">2</a>
                <a href="#" class="cust-page-btn">3</a>
                <a href="#" class="cust-page-btn"><i class="fa-solid fa-chevron-right"></i></a>
            </div>
        </div>
    </div>

    <!-- ============ CUSTOMER PROFILE MODAL ============ -->
    <div class="modal fade" id="customerProfileModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fa-solid fa-user-gear me-2"></i> Customer Profile
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">

                    <!-- Hero -->
                    <div class="cust-profile-hero">
                        <div class="cust-hero-avatar">AI</div>
                        <div class="cust-hero-info">
                            <h4 class="cust-hero-name">Ariful Islam</h4>
                            <div class="cust-hero-meta">
                                <span><i class="fa-regular fa-envelope"></i> ariful.islam@gmail.com</span>
                                <span><i class="fa-solid fa-phone"></i> +880 1712-345678</span>
                            </div>
                        </div>
                    </div>

                    <!-- Summary -->
                    <div class="cust-summary-grid">
                        <div class="cust-summary-card">
                            <span class="cust-summary-label">Total Orders</span>
                            <p class="cust-summary-value" style="color:var(--primary);">08</p>
                        </div>
                        <div class="cust-summary-card">
                            <span class="cust-summary-label">Total Spent</span>
                            <p class="cust-summary-value" style="color:var(--success);">৳ 24,500</p>
                        </div>
                        <div class="cust-summary-card">
                            <span class="cust-summary-label">Member Since</span>
                            <p class="cust-summary-value" style="color:var(--accent);">Jan 2026</p>
                        </div>
                    </div>

                    <!-- Order History -->
                    <h6 class="fw-bold mb-2" style="font-size:0.85rem; color:var(--primary);">
                        <i class="fa-solid fa-box-open me-1"></i> Recent Order History
                    </h6>

                    <div
                        style="max-height: 280px; overflow-y: auto; border: 1px solid var(--border-color); border-radius: var(--radius-md); padding: 4px 12px;">
                        <table class="cust-orders-table">
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Items</th>
                                    <th>Amount</th>
                                    <th>Payment</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><span class="cust-order-id">#ORD-9821</span></td>
                                    <td>Wireless Pro Smartphone (1)</td>
                                    <td><strong>৳ 3,450</strong></td>
                                    <td><span class="pay-status pay-status-success"
                                            style="font-size:0.68rem; padding:4px 9px;">Paid</span></td>
                                    <td><span class="ord-status ord-status-delivered"
                                            style="font-size:0.68rem; padding:4px 9px;">Delivered</span></td>
                                    <td><small class="text-muted">18 Sep 2026</small></td>
                                </tr>
                                <tr>
                                    <td><span class="cust-order-id">#ORD-9410</span></td>
                                    <td>Cotton Shirt (2), Watch (1)</td>
                                    <td><strong>৳ 5,200</strong></td>
                                    <td><span class="pay-status pay-status-success"
                                            style="font-size:0.68rem; padding:4px 9px;">Paid</span></td>
                                    <td><span class="ord-status ord-status-shipped"
                                            style="font-size:0.68rem; padding:4px 9px;">Shipped</span></td>
                                    <td><small class="text-muted">10 Sep 2026</small></td>
                                </tr>
                                <tr>
                                    <td><span class="cust-order-id">#ORD-8912</span></td>
                                    <td>Bluetooth Earbuds (1)</td>
                                    <td><strong>৳ 1,850</strong></td>
                                    <td><span class="pay-status pay-status-failed"
                                            style="font-size:0.68rem; padding:4px 9px;">Unpaid</span></td>
                                    <td><span class="ord-status ord-status-cancelled"
                                            style="font-size:0.68rem; padding:4px 9px;">Cancelled</span></td>
                                    <td><small class="text-muted">25 Aug 2026</small></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Close</button>
                    <button class="btn-suspend">
                        <i class="fa-solid fa-ban"></i> Suspend Account
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- ============ SUSPEND CUSTOMER MODAL ============ -->
    <div class="modal fade" id="suspendCustomerModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-body text-center p-4">
                    <div class="cust-modal-icon danger">
                        <i class="fa-solid fa-user-slash"></i>
                    </div>
                    <h5 class="fw-bold mb-2">Suspend Account?</h5>
                    <p class="text-muted small mb-4">
                        The customer won't be able to log in or place new orders.
                        You can re-activate them anytime.
                    </p>
                    <div class="d-flex gap-2 justify-content-center">
                        <button class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
                        <button class="btn-suspend" style="padding: 8px 20px;">
                            <i class="fa-solid fa-ban"></i> Suspend
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ============ ACTIVATE CUSTOMER MODAL ============ -->
    <div class="modal fade" id="activateCustomerModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-body text-center p-4">
                    <div class="cust-modal-icon success">
                        <i class="fa-solid fa-user-check"></i>
                    </div>
                    <h5 class="fw-bold mb-2">Activate Account?</h5>
                    <p class="text-muted small mb-4">
                        This will restore full access for the customer
                        and allow them to place new orders.
                    </p>
                    <div class="d-flex gap-2 justify-content-center">
                        <button class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
                        <button class="btn-activate" style="padding: 8px 20px;">
                            <i class="fa-solid fa-check"></i> Activate
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
