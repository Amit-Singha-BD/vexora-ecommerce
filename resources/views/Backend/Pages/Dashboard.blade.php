@extends('Backend.Layout.MasterLayout')
@section('Content')
    <!-- Page Header -->
    <div class="page-header reveal">
        <div>
            <h1 class="page-title">Dashboard Overview</h1>
            <p class="page-subtitle">Real-time metrics, analytics & store performance</p>
        </div>
        <span class="live-badge">
            <span class="live-dot"></span> Live System Active
        </span>
    </div>

    <!-- Metric Cards -->
    <div class="row g-3 g-md-4 mb-4">
        <!-- Card 1 -->
        <div class="col-sm-6 col-xl-3 reveal">
            <div class="metric-card">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <span class="metric-label">Total Sales</span>
                        <h3 class="metric-value">$48,250</h3>
                        <span class="metric-trend up">
                            <i class="fa-solid fa-arrow-trend-up"></i> +12.5% this month
                        </span>
                    </div>
                    <div class="metric-icon-wrap" style="background: rgba(99,102,241,0.1); color: var(--primary);">
                        <i class="fa-solid fa-wallet"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="col-sm-6 col-xl-3 reveal">
            <div class="metric-card">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <span class="metric-label">Today's Orders</span>
                        <h3 class="metric-value">38</h3>
                        <span class="metric-trend up">
                            <i class="fa-solid fa-arrow-trend-up"></i> +8 new today
                        </span>
                    </div>
                    <div class="metric-icon-wrap" style="background: rgba(6,182,212,0.1); color: var(--secondary);">
                        <i class="fa-solid fa-bag-shopping"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="col-sm-6 col-xl-3 reveal">
            <div class="metric-card">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <span class="metric-label">New Users</span>
                        <h3 class="metric-value">142</h3>
                        <span class="metric-trend up">
                            <i class="fa-solid fa-user-plus"></i> +14 this week
                        </span>
                    </div>
                    <div class="metric-icon-wrap" style="background: rgba(16,185,129,0.1); color: var(--success);">
                        <i class="fa-solid fa-users"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 4 -->
        <div class="col-sm-6 col-xl-3 reveal">
            <div class="metric-card">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <span class="metric-label">Pending Returns</span>
                        <h3 class="metric-value">05</h3>
                        <span class="metric-trend warn">
                            <i class="fa-solid fa-clock"></i> Action required
                        </span>
                    </div>
                    <div class="metric-icon-wrap" style="background: rgba(245,158,11,0.1); color: var(--accent);">
                        <i class="fa-solid fa-rotate-left"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Orders -->
    <div class="admin-card reveal">
        <div class="admin-card-header">
            <h2 class="admin-card-title">
                <i class="fa-solid fa-list-check"></i> Recent Store Orders
            </h2>
            <button class="btn-gradient">
                <i class="fa-solid fa-arrow-right me-1"></i> View All
            </button>
        </div>

        <div class="responsive-table">
            <table>
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Customer</th>
                        <th>Date</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th style="text-align:right;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td data-label="Order ID"><span class="order-id">#ORD-2026-90821</span></td>
                        <td data-label="Customer">
                            <div class="customer-cell">
                                <span class="customer-avatar">AS</span>
                                <span>Amit Singha</span>
                            </div>
                        </td>
                        <td data-label="Date">Sep 21, 2026</td>
                        <td data-label="Amount"><strong>$96.00</strong></td>
                        <td data-label="Status">
                            <span class="status-badge badge-shipped">Shipped</span>
                        </td>
                        <td data-label="Action" style="text-align:right;">
                            <button class="btn-icon-action btn-view" title="View" data-bs-toggle="modal"
                                data-bs-target="#viewOrderModal">
                                <i class="fa-solid fa-eye"></i>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td data-label="Order ID"><span class="order-id">#ORD-2026-90820</span></td>
                        <td data-label="Customer">
                            <div class="customer-cell">
                                <span class="customer-avatar">RA</span>
                                <span>Rahim Ahmed</span>
                            </div>
                        </td>
                        <td data-label="Date">Sep 21, 2026</td>
                        <td data-label="Amount"><strong>$140.00</strong></td>
                        <td data-label="Status">
                            <span class="status-badge badge-processing">Processing</span>
                        </td>
                        <td data-label="Action" style="text-align:right;">
                            <button class="btn-icon-action btn-view" title="View">
                                <i class="fa-solid fa-eye"></i>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td data-label="Order ID"><span class="order-id">#ORD-2026-90819</span></td>
                        <td data-label="Customer">
                            <div class="customer-cell">
                                <span class="customer-avatar">TS</span>
                                <span>Tasfia Sultana</span>
                            </div>
                        </td>
                        <td data-label="Date">Sep 20, 2026</td>
                        <td data-label="Amount"><strong>$215.50</strong></td>
                        <td data-label="Status">
                            <span class="status-badge badge-delivered">Delivered</span>
                        </td>
                        <td data-label="Action" style="text-align:right;">
                            <button class="btn-icon-action btn-view" title="View">
                                <i class="fa-solid fa-eye"></i>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td data-label="Order ID"><span class="order-id">#ORD-2026-90818</span></td>
                        <td data-label="Customer">
                            <div class="customer-cell">
                                <span class="customer-avatar">KH</span>
                                <span>Kamal Hossain</span>
                            </div>
                        </td>
                        <td data-label="Date">Sep 20, 2026</td>
                        <td data-label="Amount"><strong>$45.00</strong></td>
                        <td data-label="Status">
                            <span class="status-badge badge-pending">Pending</span>
                        </td>
                        <td data-label="Action" style="text-align:right;">
                            <button class="btn-icon-action btn-view" title="View">
                                <i class="fa-solid fa-eye"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- ============ VIEW ORDER MODAL ============ -->
    <div class="modal fade" id="viewOrderModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fa-solid fa-receipt me-2"></i> Order Details
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p class="text-muted small mb-3">Order ID: <strong class="text-primary">#ORD-2026-90821</strong></p>
                    <div class="mb-2"><strong>Customer:</strong> Amit Singha</div>
                    <div class="mb-2"><strong>Date:</strong> Sep 21, 2026</div>
                    <div class="mb-2"><strong>Amount:</strong> $96.00</div>
                    <div class="mb-2"><strong>Status:</strong>
                        <span class="status-badge badge-shipped ms-2">Shipped</span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-outline-soft" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
