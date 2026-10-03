@extends('Backend.Layout.MasterLayout')
@section('Content')
    <!-- Page Header -->
    <div class="page-header reveal">
        <div>
            <h1 class="page-title">Coupons Management</h1>
            <p class="page-subtitle">Create discount coupons, set limits & assign exclusive coupons to customers</p>
        </div>
        <a href="{{ route('coupon.create.view') }}" class="btn-gradient text-decoration-none">
            <i class="fa-solid fa-plus me-1"></i> Create New Coupon
        </a>
    </div>

    <!-- Metrics Row -->
    <div class="cpn-metrics reveal">
        <div class="cpn-metric">
            <div>
                <span class="cpn-metric-label">Active Coupons</span>
                <h3 class="cpn-metric-value">14</h3>
            </div>
            <div class="cpn-metric-icon" style="background: rgba(16,185,129,0.1); color: var(--success);">
                <i class="fa-solid fa-ticket"></i>
            </div>
        </div>

        <div class="cpn-metric">
            <div>
                <span class="cpn-metric-label">Total Redeemed</span>
                <h3 class="cpn-metric-value">328</h3>
            </div>
            <div class="cpn-metric-icon" style="background: rgba(99,102,241,0.1); color: var(--primary);">
                <i class="fa-solid fa-circle-check"></i>
            </div>
        </div>

        <div class="cpn-metric">
            <div>
                <span class="cpn-metric-label">Targeted User Coupons</span>
                <h3 class="cpn-metric-value">45</h3>
            </div>
            <div class="cpn-metric-icon" style="background: rgba(245,158,11,0.1); color: var(--accent);">
                <i class="fa-solid fa-user-tag"></i>
            </div>
        </div>
    </div>

    <!-- Filter Bar -->
    <div class="admin-card reveal" style="padding: 20px;">
        <div class="cpn-filterbar">
            <div class="cpn-search-wrap">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" class="form-control" id="cpnSearchInput" placeholder="Search coupon code...">
            </div>

            <select class="cpn-filter-select" id="cpnTypeFilter">
                <option value="all">All Types</option>
                <option value="pct">Percentage (%)</option>
                <option value="fixed">Fixed Amount (৳)</option>
            </select>

            <select class="cpn-filter-select" id="cpnStatusFilter">
                <option value="all">All Status</option>
                <option value="active">Active</option>
                <option value="expired">Expired</option>
                <option value="scheduled">Scheduled</option>
            </select>

            <button class="btn-gradient" id="cpnFilterBtn">
                <i class="fa-solid fa-filter me-1"></i> Filter
            </button>
        </div>
    </div>

    <!-- Coupons Table -->
    <div class="admin-card reveal">
        <div class="responsive-table">
            <table>
                <thead>
                    <tr>
                        <th>Coupon</th>
                        <th>Discount</th>
                        <th>Min Spend / Usage</th>
                        <th>Validity Period</th>
                        <th>Status</th>
                        <th style="text-align:right;">Actions</th>
                    </tr>
                </thead>
                <tbody id="cpnTableBody">

                    <!-- Row 1 -->
                    <tr data-type="pct" data-status="active">
                        <td data-label="Coupon Code">
                            <div class="cpn-code-cell">
                                <span class="cpn-code-icon"><i class="fa-solid fa-ticket"></i></span>
                                <div>
                                    <p class="cpn-code">EID2026</p>
                                    <span class="cpn-code-type">Public Campaign</span>
                                </div>
                            </div>
                        </td>
                        <td data-label="Discount">
                            <span class="cpn-discount cpn-discount-pct">
                                <i class="fa-solid fa-percent"></i> 15% OFF
                            </span>
                        </td>
                        <td data-label="Min Spend / Usage">
                            <span class="cpn-meta">Min: ৳ 1,000</span>
                            <span class="cpn-meta-sub">145 / 500 used</span>
                            <div class="cpn-usage-bar">
                                <div class="cpn-usage-fill" style="width: 29%;"></div>
                            </div>
                        </td>
                        <td data-label="Validity Period">
                            <span class="cpn-meta">01 Jun – 15 Jun 2026</span>
                        </td>
                        <td data-label="Status">
                            <span class="cpn-status cpn-status-active">Active</span>
                        </td>
                        <td data-label="Actions" style="text-align:right;">
                            <div class="cpn-actions">
                                <button class="btn-icon-action btn-view" title="Assign to User" data-bs-toggle="modal"
                                    data-bs-target="#assignCouponModal">
                                    <i class="fa-solid fa-user-plus"></i>
                                </button>
                                <button class="btn-icon-action btn-edit" title="Edit" data-bs-toggle="modal"
                                    data-bs-target="#editCouponModal">
                                    <i class="fa-solid fa-pen"></i>
                                </button>
                                <button class="btn-icon-action btn-delete" title="Delete" data-bs-toggle="modal"
                                    data-bs-target="#deleteCouponModal">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <!-- Row 2 -->
                    <tr data-type="fixed" data-status="active">
                        <td data-label="Coupon Code">
                            <div class="cpn-code-cell">
                                <span class="cpn-code-icon" style="background: rgba(245,158,11,0.1); color: var(--accent);">
                                    <i class="fa-solid fa-gift"></i>
                                </span>
                                <div>
                                    <p class="cpn-code">WELCOME500</p>
                                    <span class="cpn-code-type">New User Assigned</span>
                                </div>
                            </div>
                        </td>
                        <td data-label="Discount">
                            <span class="cpn-discount cpn-discount-fixed">
                                <i class="fa-solid fa-tag"></i> ৳ 500 OFF
                            </span>
                        </td>
                        <td data-label="Min Spend / Usage">
                            <span class="cpn-meta">Min: ৳ 2,500</span>
                            <span class="cpn-meta-sub">42 / 100 used</span>
                            <div class="cpn-usage-bar">
                                <div class="cpn-usage-fill" style="width: 42%;"></div>
                            </div>
                        </td>
                        <td data-label="Validity Period">
                            <span class="cpn-meta">01 Jan – 31 Dec 2026</span>
                        </td>
                        <td data-label="Status">
                            <span class="cpn-status cpn-status-active">Active</span>
                        </td>
                        <td data-label="Actions" style="text-align:right;">
                            <div class="cpn-actions">
                                <button class="btn-icon-action btn-view" title="Assign to User" data-bs-toggle="modal"
                                    data-bs-target="#assignCouponModal">
                                    <i class="fa-solid fa-user-plus"></i>
                                </button>
                                <button class="btn-icon-action btn-edit" title="Edit" data-bs-toggle="modal"
                                    data-bs-target="#editCouponModal">
                                    <i class="fa-solid fa-pen"></i>
                                </button>
                                <button class="btn-icon-action btn-delete" title="Delete" data-bs-toggle="modal"
                                    data-bs-target="#deleteCouponModal">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <!-- Row 3 -->
                    <tr data-type="pct" data-status="expired">
                        <td data-label="Coupon Code">
                            <div class="cpn-code-cell">
                                <span class="cpn-code-icon"
                                    style="background: rgba(239,68,68,0.1); color: var(--danger);">
                                    <i class="fa-solid fa-bolt"></i>
                                </span>
                                <div>
                                    <p class="cpn-code" style="color: var(--text-muted);">FLASH20</p>
                                    <span class="cpn-code-type">Flash Sale Special</span>
                                </div>
                            </div>
                        </td>
                        <td data-label="Discount">
                            <span class="cpn-discount cpn-discount-pct">
                                <i class="fa-solid fa-percent"></i> 20% OFF
                            </span>
                        </td>
                        <td data-label="Min Spend / Usage">
                            <span class="cpn-meta">Min: ৳ 500</span>
                            <span class="cpn-meta-sub">200 / 200 used</span>
                            <div class="cpn-usage-bar">
                                <div class="cpn-usage-fill full" style="width: 100%;"></div>
                            </div>
                        </td>
                        <td data-label="Validity Period">
                            <span class="cpn-meta">10 May – 12 May 2026</span>
                        </td>
                        <td data-label="Status">
                            <span class="cpn-status cpn-status-expired">Expired</span>
                        </td>
                        <td data-label="Actions" style="text-align:right;">
                            <div class="cpn-actions">
                                <button class="btn-icon-action btn-view" title="Assign (disabled)" disabled
                                    style="opacity:0.4; cursor:not-allowed;">
                                    <i class="fa-solid fa-user-plus"></i>
                                </button>
                                <button class="btn-icon-action btn-edit" title="Edit" data-bs-toggle="modal"
                                    data-bs-target="#editCouponModal">
                                    <i class="fa-solid fa-pen"></i>
                                </button>
                                <button class="btn-icon-action btn-delete" title="Delete" data-bs-toggle="modal"
                                    data-bs-target="#deleteCouponModal">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                </tbody>
            </table>

            <div class="cpn-empty d-none" id="cpnEmptyState">
                <i class="fa-solid fa-ticket"></i>
                <p class="mb-0">No coupons match your filter criteria.</p>
            </div>
        </div>

        <!-- Pagination -->
        <div class="cpn-pagination">
            <small class="text-muted">Showing <strong class="text-dark">1-3</strong> of <strong
                    class="text-dark">14</strong> coupons</small>
            <div class="d-flex gap-2">
                <a href="#" class="cpn-page-btn disabled"><i class="fa-solid fa-chevron-left"></i></a>
                <a href="#" class="cpn-page-btn active">1</a>
                <a href="#" class="cpn-page-btn">2</a>
                <a href="#" class="cpn-page-btn">3</a>
                <a href="#" class="cpn-page-btn"><i class="fa-solid fa-chevron-right"></i></a>
            </div>
        </div>
    </div>

    <!-- ============ ASSIGN COUPON MODAL ============ -->
    <div class="modal fade" id="assignCouponModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fa-solid fa-user-plus me-2"></i> Assign Coupon to User
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p class="text-muted small mb-3">
                        Target Coupon: <strong class="text-primary">#WELCOME500</strong>
                    </p>
                    <form id="assignCouponForm">
                        <div class="mb-3">
                            <label class="form-label fw-semibold small">Select Customer <span
                                    class="text-danger">*</span></label>
                            <select class="form-select" required>
                                <option value="">Choose customer...</option>
                                <option>Rafiq Ahmed (+880 1712-345678)</option>
                                <option>Sumaiya Islam (+880 1911-223344)</option>
                                <option>Kamal Hossain (+880 1678-990011)</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold small">Specific User Expiry (Optional)</label>
                            <input type="date" class="form-control">
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" id="notifyUser" checked>
                            <label class="form-check-label small" for="notifyUser">
                                Send SMS / Email notification to user
                            </label>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
                    <button class="btn-gradient" type="submit" form="assignCouponForm">
                        <i class="fa-solid fa-check me-1"></i> Assign Coupon
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- ============ EDIT COUPON MODAL ============ -->
    <div class="modal fade" id="editCouponModal" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fa-solid fa-pen-to-square me-2"></i> Edit Coupon
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="editCouponForm" class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small">Coupon Code <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control text-uppercase fw-bold" value="EID2026" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small">Discount Type</label>
                            <select class="form-select">
                                <option value="percentage" selected>Percentage (%)</option>
                                <option value="fixed">Fixed Amount (BDT)</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small">Discount Value</label>
                            <input type="number" class="form-control" value="15">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small">Minimum Spend (৳)</label>
                            <input type="number" class="form-control" value="1000">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small">Total Usage Limit</label>
                            <input type="number" class="form-control" value="500">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small">Per User Limit</label>
                            <input type="number" class="form-control" value="1">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small">Start Date</label>
                            <input type="date" class="form-control" value="2026-06-01">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small">Expiry Date</label>
                            <input type="date" class="form-control" value="2026-06-15">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
                    <button class="btn-gradient" type="submit" form="editCouponForm">
                        <i class="fa-solid fa-check me-1"></i> Update Coupon
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- ============ DELETE COUPON MODAL ============ -->
    <div class="modal fade" id="deleteCouponModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-body text-center p-4">
                    <div class="cpn-delete-icon">
                        <i class="fa-solid fa-triangle-exclamation"></i>
                    </div>
                    <h5 class="fw-bold mb-2">Delete Coupon?</h5>
                    <p class="text-muted small mb-4">
                        All user assignments & redemption history for this coupon will be permanently removed.
                    </p>
                    <div class="d-flex gap-2 justify-content-center">
                        <button class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
                        <button class="btn-gradient"
                            style="background: linear-gradient(135deg,#EF4444,#DC2626); box-shadow:0 4px 12px rgba(239,68,68,0.3);">
                            <i class="fa-solid fa-trash me-1"></i> Delete
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
