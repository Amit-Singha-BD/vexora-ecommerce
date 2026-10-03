@extends('Backend.Layout.MasterLayout')
@section('Content')
    <!-- Page Header -->
    <div class="page-header reveal">
        <div>
            <h1 class="page-title">Offers & Campaigns</h1>
            <p class="page-subtitle">Create seasonal campaigns, flash sales & map products to offers</p>
        </div>
        <a href="{{ route('campaign.create.view') }}" class="btn-gradient text-decoration-none">
            <i class="fa-solid fa-plus me-1"></i> Create New Campaign
        </a>
    </div>

    <!-- Metrics Row -->
    <div class="off-metrics reveal">
        <div class="off-metric">
            <div>
                <span class="off-metric-label">Active Campaigns</span>
                <h3 class="off-metric-value">04</h3>
            </div>
            <div class="off-metric-icon" style="background: rgba(16,185,129,0.1); color: var(--success);">
                <i class="fa-solid fa-bullhorn"></i>
            </div>
        </div>

        <div class="off-metric">
            <div>
                <span class="off-metric-label">Mapped Products</span>
                <h3 class="off-metric-value">112</h3>
            </div>
            <div class="off-metric-icon" style="background: rgba(99,102,241,0.1); color: var(--primary);">
                <i class="fa-solid fa-boxes-stacked"></i>
            </div>
        </div>

        <div class="off-metric">
            <div>
                <span class="off-metric-label">Upcoming Flash Sales</span>
                <h3 class="off-metric-value">02</h3>
            </div>
            <div class="off-metric-icon" style="background: rgba(245,158,11,0.1); color: var(--accent);">
                <i class="fa-solid fa-bolt"></i>
            </div>
        </div>
    </div>

    <!-- Filter Bar -->
    <div class="admin-card reveal" style="padding: 20px;">
        <div class="off-filterbar">
            <div class="off-search-wrap">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" class="form-control" id="offSearchInput"
                    placeholder="Search campaign title or slug...">
            </div>

            <select class="off-filter-select" id="offStatusFilter">
                <option value="all">All Status</option>
                <option value="active">Active</option>
                <option value="upcoming">Upcoming</option>
                <option value="expired">Expired</option>
            </select>

            <button class="btn-gradient" id="offResetBtn" type="button">
                <i class="fa-solid fa-rotate-right me-1"></i> Reset
            </button>
        </div>
    </div>

    <!-- Campaigns Table -->
    <div class="admin-card reveal">
        <div class="responsive-table">
            <table>
                <thead>
                    <tr>
                        <th>Campaign</th>
                        <th>Discount</th>
                        <th>Mapped Products</th>
                        <th>Duration</th>
                        <th>Status</th>
                        <th style="text-align:right;">Actions</th>
                    </tr>
                </thead>
                <tbody id="offTableBody">

                    <!-- Campaign 1: Active -->
                    <tr data-status="active">
                        <td data-label="Campaign">
                            <div class="off-cell">
                                <span class="off-icon camp-active"><i class="fa-solid fa-bullhorn"></i></span>
                                <div>
                                    <p class="off-title">Eid Mega Fest 2026</p>
                                    <span class="off-slug">eid-mega-fest-2026</span>
                                </div>
                            </div>
                        </td>
                        <td data-label="Discount">
                            <span class="off-discount off-discount-pct">
                                <i class="fa-solid fa-percent"></i> 20% Flat
                            </span>
                        </td>
                        <td data-label="Mapped Products">
                            <span class="off-mapped">
                                <i class="fa-solid fa-box-open"></i> 45 Products
                            </span>
                        </td>
                        <td data-label="Duration">
                            <span class="off-date">01 Jun – 15 Jun 2026</span>
                            <span class="off-date-sub">Running · 5 days left</span>
                        </td>
                        <td data-label="Status">
                            <span class="off-status off-status-active">Active</span>
                        </td>
                        <td data-label="Actions" style="text-align:right;">
                            <div class="off-actions">
                                <button class="btn-icon-action btn-view" title="Map Products" data-bs-toggle="modal"
                                    data-bs-target="#mapProductsModal">
                                    <i class="fa-solid fa-link"></i>
                                </button>
                                <button class="btn-icon-action btn-edit" title="Edit" data-bs-toggle="modal"
                                    data-bs-target="#editCampaignModal">
                                    <i class="fa-solid fa-pen"></i>
                                </button>
                                <button class="btn-icon-action btn-delete" title="Delete" data-bs-toggle="modal"
                                    data-bs-target="#deleteCampaignModal">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <!-- Campaign 2: Upcoming -->
                    <tr data-status="upcoming">
                        <td data-label="Campaign">
                            <div class="off-cell">
                                <span class="off-icon camp-upcoming"><i class="fa-solid fa-bolt"></i></span>
                                <div>
                                    <p class="off-title">Weekend Flash Deal</p>
                                    <span class="off-slug">weekend-flash-deal</span>
                                </div>
                            </div>
                        </td>
                        <td data-label="Discount">
                            <span class="off-discount off-discount-flash">
                                <i class="fa-solid fa-bolt"></i> Up to 50%
                            </span>
                        </td>
                        <td data-label="Mapped Products">
                            <span class="off-mapped">
                                <i class="fa-solid fa-box-open"></i> 18 Products
                            </span>
                        </td>
                        <td data-label="Duration">
                            <span class="off-date">26 Sep – 28 Sep 2026</span>
                            <span class="off-date-sub">Starts in 3 days</span>
                        </td>
                        <td data-label="Status">
                            <span class="off-status off-status-upcoming">Upcoming</span>
                        </td>
                        <td data-label="Actions" style="text-align:right;">
                            <div class="off-actions">
                                <button class="btn-icon-action btn-view" title="Map Products" data-bs-toggle="modal"
                                    data-bs-target="#mapProductsModal">
                                    <i class="fa-solid fa-link"></i>
                                </button>
                                <button class="btn-icon-action btn-edit" title="Edit" data-bs-toggle="modal"
                                    data-bs-target="#editCampaignModal">
                                    <i class="fa-solid fa-pen"></i>
                                </button>
                                <button class="btn-icon-action btn-delete" title="Delete" data-bs-toggle="modal"
                                    data-bs-target="#deleteCampaignModal">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <!-- Campaign 3: Expired -->
                    <tr data-status="expired">
                        <td data-label="Campaign">
                            <div class="off-cell">
                                <span class="off-icon camp-expired"><i class="fa-solid fa-flag"></i></span>
                                <div>
                                    <p class="off-title" style="color:var(--text-muted);">Independence Day Sale</p>
                                    <span class="off-slug">independence-sale</span>
                                </div>
                            </div>
                        </td>
                        <td data-label="Discount">
                            <span class="off-discount off-discount-fixed">
                                <i class="fa-solid fa-tag"></i> ৳ 300 Off
                            </span>
                        </td>
                        <td data-label="Mapped Products">
                            <span class="off-mapped muted">
                                <i class="fa-solid fa-box-open"></i> 49 Products
                            </span>
                        </td>
                        <td data-label="Duration">
                            <span class="off-date" style="color:var(--text-muted);">20 Mar – 26 Mar 2026</span>
                            <span class="off-date-sub">Ended · 6 days ago</span>
                        </td>
                        <td data-label="Status">
                            <span class="off-status off-status-expired">Expired</span>
                        </td>
                        <td data-label="Actions" style="text-align:right;">
                            <div class="off-actions">
                                <button class="btn-icon-action btn-view" title="Map Products" data-bs-toggle="modal"
                                    data-bs-target="#mapProductsModal">
                                    <i class="fa-solid fa-link"></i>
                                </button>
                                <button class="btn-icon-action btn-edit" title="Edit" data-bs-toggle="modal"
                                    data-bs-target="#editCampaignModal">
                                    <i class="fa-solid fa-pen"></i>
                                </button>
                                <button class="btn-icon-action btn-delete" title="Delete" data-bs-toggle="modal"
                                    data-bs-target="#deleteCampaignModal">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                </tbody>
            </table>

            <div class="off-empty d-none" id="offEmptyState">
                <i class="fa-solid fa-bullhorn"></i>
                <p class="mb-0">No campaigns match your filter criteria.</p>
            </div>
        </div>

        <!-- Pagination -->
        <div class="off-pagination">
            <small class="text-muted">
                Showing <strong class="text-dark">1-3</strong> of <strong class="text-dark">6</strong> campaigns
            </small>
            <div class="d-flex gap-2">
                <a href="#" class="off-page-btn disabled"><i class="fa-solid fa-chevron-left"></i></a>
                <a href="#" class="off-page-btn active">1</a>
                <a href="#" class="off-page-btn">2</a>
                <a href="#" class="off-page-btn"><i class="fa-solid fa-chevron-right"></i></a>
            </div>
        </div>
    </div>

    <!-- ============ MAP PRODUCTS MODAL ============ -->
    <div class="modal fade" id="mapProductsModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fa-solid fa-link me-2"></i> Map Products to Campaign
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">

                    <p class="text-muted small mb-3">
                        Campaign:
                        <strong class="text-primary">Eid Mega Fest 2026</strong>
                        <span class="off-status off-status-active ms-2"
                            style="font-size:0.66rem; padding:3px 9px;">Active</span>
                    </p>

                    <div class="off-selected-chip">
                        <i class="fa-solid fa-check-circle"></i>
                        <span id="offSelectedCount">2 products selected</span>
                    </div>

                    <div class="off-map-search">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        <input type="text" class="form-control" id="offMapSearch"
                            placeholder="Search products to attach...">
                    </div>

                    <div class="off-map-list" id="offMapList">

                        <!-- Product 1 -->
                        <label class="off-map-item selected">
                            <input type="checkbox" checked>
                            <span class="mi-thumb"><i class="fa-solid fa-mobile-screen"></i></span>
                            <div class="mi-body">
                                <p class="mi-name">Wireless Pro Smartphone</p>
                                <p class="mi-price">Regular: ৳ 3,450</p>
                            </div>
                            <div class="mi-input">
                                <input type="number" value="2999" placeholder="Offer price">
                            </div>
                        </label>

                        <!-- Product 2 -->
                        <label class="off-map-item selected">
                            <input type="checkbox" checked>
                            <span class="mi-thumb"><i class="fa-solid fa-shirt"></i></span>
                            <div class="mi-body">
                                <p class="mi-name">Casual Cotton Shirt</p>
                                <p class="mi-price">Regular: ৳ 1,200</p>
                            </div>
                            <div class="mi-input">
                                <input type="number" value="999" placeholder="Offer price">
                            </div>
                        </label>

                        <!-- Product 3 -->
                        <label class="off-map-item">
                            <input type="checkbox">
                            <span class="mi-thumb"><i class="fa-solid fa-clock"></i></span>
                            <div class="mi-body">
                                <p class="mi-name">Smart Watch E2</p>
                                <p class="mi-price">Regular: ৳ 2,800</p>
                            </div>
                            <div class="mi-input">
                                <input type="number" placeholder="Offer price" disabled>
                            </div>
                        </label>

                        <!-- Product 4 -->
                        <label class="off-map-item">
                            <input type="checkbox">
                            <span class="mi-thumb"><i class="fa-solid fa-laptop"></i></span>
                            <div class="mi-body">
                                <p class="mi-name">Ultra Slim Laptop 15"</p>
                                <p class="mi-price">Regular: ৳ 1,25,000</p>
                            </div>
                            <div class="mi-input">
                                <input type="number" placeholder="Offer price" disabled>
                            </div>
                        </label>

                        <!-- Product 5 -->
                        <label class="off-map-item">
                            <input type="checkbox">
                            <span class="mi-thumb"><i class="fa-solid fa-headphones"></i></span>
                            <div class="mi-body">
                                <p class="mi-name">Bluetooth Earbuds Pro</p>
                                <p class="mi-price">Regular: ৳ 1,000</p>
                            </div>
                            <div class="mi-input">
                                <input type="number" placeholder="Offer price" disabled>
                            </div>
                        </label>

                    </div>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
                    <button class="btn-gradient" id="offMapSaveBtn">
                        <i class="fa-solid fa-check-double me-1"></i> Update Mapped Products
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- ============ EDIT CAMPAIGN MODAL ============ -->
    <div class="modal fade" id="editCampaignModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fa-solid fa-pen-to-square me-2"></i> Edit Campaign
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="editCampaignForm" class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small">Campaign Title <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control" value="Eid Mega Fest 2026" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small">URL Slug</label>
                            <input type="text" class="form-control" value="eid-mega-fest-2026">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small">Discount Type</label>
                            <select class="form-select">
                                <option value="percentage" selected>Percentage (%)</option>
                                <option value="fixed">Fixed Amount (৳)</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small">Discount Value</label>
                            <input type="number" class="form-control" value="20">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small">Start Date & Time</label>
                            <input type="datetime-local" class="form-control" value="2026-06-01T00:00">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small">End Date & Time</label>
                            <input type="datetime-local" class="form-control" value="2026-06-15T23:59">
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold small">Banner Image URL</label>
                            <input type="text" class="form-control"
                                value="https://cdn.eshopbd.com/banners/eid-2026.jpg">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
                    <button class="btn-gradient" type="submit" form="editCampaignForm">
                        <i class="fa-solid fa-check me-1"></i> Update Campaign
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- ============ DELETE CAMPAIGN MODAL ============ -->
    <div class="modal fade" id="deleteCampaignModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-body text-center p-4">
                    <div class="off-delete-icon">
                        <i class="fa-solid fa-triangle-exclamation"></i>
                    </div>
                    <h5 class="fw-bold mb-2">Delete Campaign?</h5>
                    <p class="text-muted small mb-4">
                        This will remove the campaign and all its mapped products.
                        This action cannot be undone.
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
