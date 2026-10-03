@extends('Backend.Layout.MasterLayout')
@section('Content')
    <!-- Page Header -->
    <div class="page-header reveal">
        <div>
            <h1 class="page-title">Returns & Refunds</h1>
            <p class="page-subtitle">Review customer return requests, inspect items & process refunds</p>
        </div>
        <button class="btn-gradient" id="retExportBtn">
            <i class="fa-solid fa-file-arrow-down me-1"></i> Export Logs
        </button>
    </div>

    <!-- Metrics Row -->
    <div class="ret-metrics reveal">
        <div class="ret-metric">
            <div>
                <span class="ret-metric-label">Pending Requests</span>
                <h3 class="ret-metric-value">08</h3>
            </div>
            <div class="ret-metric-icon" style="background: rgba(245,158,11,0.1); color: var(--accent);">
                <i class="fa-solid fa-clock-rotate-left"></i>
            </div>
        </div>

        <div class="ret-metric">
            <div>
                <span class="ret-metric-label">Approved · Refund Pending</span>
                <h3 class="ret-metric-value">03</h3>
            </div>
            <div class="ret-metric-icon" style="background: rgba(99,102,241,0.1); color: var(--primary);">
                <i class="fa-solid fa-arrows-rotate"></i>
            </div>
        </div>

        <div class="ret-metric">
            <div>
                <span class="ret-metric-label">Total Refunded</span>
                <h3 class="ret-metric-value">৳ 12,450</h3>
            </div>
            <div class="ret-metric-icon" style="background: rgba(16,185,129,0.1); color: var(--success);">
                <i class="fa-solid fa-bangladeshi-taka-sign"></i>
            </div>
        </div>
    </div>

    <!-- Filter Bar -->
    <div class="admin-card reveal" style="padding: 20px;">
        <div class="ret-filterbar">
            <div class="ret-search-wrap">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" class="form-control" id="retSearchInput"
                    placeholder="Search Return ID / Order ID / Customer...">
            </div>

            <select class="ret-filter-select" id="retStatusFilter">
                <option value="all">All Status</option>
                <option value="pending">Pending Review</option>
                <option value="approved">Approved</option>
                <option value="rejected">Rejected</option>
                <option value="refunded">Refunded</option>
            </select>

            <button class="btn-gradient" id="retResetBtn" type="button">
                <i class="fa-solid fa-rotate-right me-1"></i> Reset
            </button>
        </div>
    </div>

    <!-- Returns Table -->
    <div class="admin-card reveal">
        <div class="responsive-table">
            <table>
                <thead>
                    <tr>
                        <th>Return</th>
                        <th>Order Ref</th>
                        <th>Customer</th>
                        <th>Reason & Item</th>
                        <th>Refund</th>
                        <th>Status</th>
                        <th style="text-align:right;">Actions</th>
                    </tr>
                </thead>
                <tbody id="retTableBody">

                    <!-- Row 1: Pending -->
                    <tr data-status="pending">
                        <td data-label="Return ID">
                            <div class="ret-id-cell">
                                <span class="ret-id-icon"><i class="fa-solid fa-rotate-left"></i></span>
                                <div>
                                    <p class="ret-id" data-copy="#RET-2026-051">#RET-2026-051</p>
                                    <span class="ret-id-sub">Requested 22 Sep 2026</span>
                                </div>
                            </div>
                        </td>
                        <td data-label="Order Ref">
                            <a href="orders.html" class="ret-order-ref">
                                <i class="fa-solid fa-receipt"></i> #ORD-2026-101
                            </a>
                        </td>
                        <td data-label="Customer">
                            <div class="ret-customer">
                                <span class="ret-avatar">RA</span>
                                <div>
                                    <p class="ret-customer-name">Rafiq Ahmed</p>
                                    <span class="ret-customer-phone">+880 1712-345678</span>
                                </div>
                            </div>
                        </td>
                        <td data-label="Reason & Item">
                            <span class="ret-reason-badge ret-reason-defective">
                                <i class="fa-solid fa-triangle-exclamation"></i> Defective Product
                            </span>
                            <span class="ret-item-text">1× Wireless Pro Smartphone</span>
                        </td>
                        <td data-label="Refund">
                            <span class="ret-amount">৳ 3,450</span>
                        </td>
                        <td data-label="Status">
                            <span class="ret-status ret-status-pending">Pending Review</span>
                        </td>
                        <td data-label="Actions" style="text-align:right;">
                            <div class="ret-actions">
                                <button class="btn-gradient" style="padding: 7px 16px; font-size: 0.78rem;"
                                    data-bs-toggle="modal" data-bs-target="#processReturnModal">
                                    <i class="fa-solid fa-pen-to-square me-1"></i> Review
                                </button>
                            </div>
                        </td>
                    </tr>

                    <!-- Row 2: Approved (refund pending) -->
                    <tr data-status="approved">
                        <td data-label="Return ID">
                            <div class="ret-id-cell">
                                <span class="ret-id-icon" style="background: rgba(6,182,212,0.1); color: var(--secondary);">
                                    <i class="fa-solid fa-check"></i>
                                </span>
                                <div>
                                    <p class="ret-id" data-copy="#RET-2026-048">#RET-2026-048</p>
                                    <span class="ret-id-sub">Approved 21 Sep 2026</span>
                                </div>
                            </div>
                        </td>
                        <td data-label="Order Ref">
                            <a href="orders.html" class="ret-order-ref">
                                <i class="fa-solid fa-receipt"></i> #ORD-2026-085
                            </a>
                        </td>
                        <td data-label="Customer">
                            <div class="ret-customer">
                                <span class="ret-avatar"
                                    style="background: linear-gradient(135deg,#F59E0B,#EF4444);">SI</span>
                                <div>
                                    <p class="ret-customer-name">Sumaiya Islam</p>
                                    <span class="ret-customer-phone">+880 1911-223344</span>
                                </div>
                            </div>
                        </td>
                        <td data-label="Reason & Item">
                            <span class="ret-reason-badge ret-reason-wrong">
                                <i class="fa-solid fa-ruler-combined"></i> Wrong Size / Color
                            </span>
                            <span class="ret-item-text">1× Casual Cotton Shirt</span>
                        </td>
                        <td data-label="Refund">
                            <span class="ret-amount">৳ 1,200</span>
                        </td>
                        <td data-label="Status">
                            <span class="ret-status ret-status-approved">Approved · Refund Pending</span>
                        </td>
                        <td data-label="Actions" style="text-align:right;">
                            <div class="ret-actions">
                                <button class="btn-approve" style="padding: 7px 16px; font-size: 0.78rem;"
                                    data-bs-toggle="modal" data-bs-target="#issueRefundModal">
                                    <i class="fa-solid fa-money-bill-transfer me-1"></i> Pay Refund
                                </button>
                            </div>
                        </td>
                    </tr>

                    <!-- Row 3: Refunded -->
                    <tr data-status="refunded">
                        <td data-label="Return ID">
                            <div class="ret-id-cell">
                                <span class="ret-id-icon"
                                    style="background: rgba(16,185,129,0.1); color: var(--success);">
                                    <i class="fa-solid fa-circle-check"></i>
                                </span>
                                <div>
                                    <p class="ret-id" data-copy="#RET-2026-042">#RET-2026-042</p>
                                    <span class="ret-id-sub">Refunded 18 Sep 2026</span>
                                </div>
                            </div>
                        </td>
                        <td data-label="Order Ref">
                            <a href="orders.html" class="ret-order-ref">
                                <i class="fa-solid fa-receipt"></i> #ORD-2026-070
                            </a>
                        </td>
                        <td data-label="Customer">
                            <div class="ret-customer">
                                <span class="ret-avatar"
                                    style="background: linear-gradient(135deg,#10B981,#06B6D4);">KH</span>
                                <div>
                                    <p class="ret-customer-name">Kamal Hossain</p>
                                    <span class="ret-customer-phone">+880 1678-990011</span>
                                </div>
                            </div>
                        </td>
                        <td data-label="Reason & Item">
                            <span class="ret-reason-badge ret-reason-mind">
                                <i class="fa-solid fa-lightbulb"></i> Change of Mind
                            </span>
                            <span class="ret-item-text">1× Smart Watch E2</span>
                        </td>
                        <td data-label="Refund">
                            <span class="ret-amount">৳ 2,800</span>
                        </td>
                        <td data-label="Status">
                            <span class="ret-status ret-status-refunded">Refund Completed</span>
                        </td>
                        <td data-label="Actions" style="text-align:right;">
                            <div class="ret-actions">
                                <button class="btn-icon-action btn-view" title="View Details">
                                    <i class="fa-solid fa-eye"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                </tbody>
            </table>

            <div class="ret-empty d-none" id="retEmptyState">
                <i class="fa-solid fa-rotate-left"></i>
                <p class="mb-0">No return requests match your filter criteria.</p>
            </div>
        </div>

        <!-- Pagination -->
        <div class="ret-pagination">
            <small class="text-muted">
                Showing <strong class="text-dark">1-3</strong> of <strong class="text-dark">12</strong> returns
            </small>
            <div class="d-flex gap-2">
                <a href="#" class="ret-page-btn disabled"><i class="fa-solid fa-chevron-left"></i></a>
                <a href="#" class="ret-page-btn active">1</a>
                <a href="#" class="ret-page-btn">2</a>
                <a href="#" class="ret-page-btn"><i class="fa-solid fa-chevron-right"></i></a>
            </div>
        </div>
    </div>


    <!-- ============ REVIEW RETURN MODAL ============ -->
    <div class="modal fade" id="processReturnModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fa-solid fa-rotate-left me-2"></i> Review Return Request
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">

                    <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
                        <div>
                            <div class="text-muted small">Return ID</div>
                            <strong class="text-primary"
                                style="font-family:'Courier New',monospace;">#RET-2026-051</strong>
                        </div>
                        <div class="text-end">
                            <div class="text-muted small">Order Reference</div>
                            <a href="orders.html" class="ret-order-ref">
                                <i class="fa-solid fa-receipt"></i> #ORD-2026-101
                            </a>
                        </div>
                    </div>

                    <!-- Customer Reason -->
                    <div class="ret-reason-box">
                        <div class="rb-title">
                            <i class="fa-solid fa-comment-dots me-1"></i> Customer's Reason
                        </div>
                        <p class="rb-text">
                            "The phone screen has dead pixels right out of the box.
                            Requesting replacement or refund."
                        </p>
                    </div>

                    <!-- Item Inspection Checklist -->
                    <h6 class="fw-bold mb-2 mt-3" style="font-size:0.85rem; color:var(--primary);">
                        <i class="fa-solid fa-clipboard-check me-1"></i> Item Inspection
                    </h6>

                    <div id="retInspectList">
                        <label class="ret-inspect-item checked" for="ii1">
                            <input type="checkbox" id="ii1" checked>
                            <div class="ii-body">
                                <p class="ii-name">Wireless Pro Smartphone</p>
                                <p class="ii-meta">Qty: 1 · SKU: WPS-990</p>
                                <span class="ii-status">
                                    <i class="fa-solid fa-circle-check me-1"></i> Defective Verified
                                </span>
                            </div>
                        </label>
                    </div>

                    <!-- Decision -->
                    <h6 class="fw-bold mb-2 mt-4" style="font-size:0.85rem; color:var(--primary);">
                        <i class="fa-solid fa-gavel me-1"></i> Decision
                    </h6>

                    <form id="retDecisionForm">
                        <div class="mb-3">
                            <label class="form-label fw-semibold small">Review Decision</label>
                            <select class="form-select">
                                <option value="approve" selected>✅ Approve Return & Proceed to Refund</option>
                                <option value="reject">❌ Reject Return Request</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold small">Admin Review Notes</label>
                            <textarea class="form-control" rows="3" placeholder="Write internal inspection notes for the record..."></textarea>
                        </div>
                    </form>

                </div>
                <div class="modal-footer d-flex justify-content-between flex-wrap gap-2">
                    <button class="btn-reject" data-bs-dismiss="modal">
                        <i class="fa-solid fa-xmark me-1"></i> Reject Return
                    </button>
                    <button class="btn-approve" type="submit" form="retDecisionForm">
                        <i class="fa-solid fa-check me-1"></i> Approve Return
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- ============ ISSUE REFUND MODAL ============ -->
    <div class="modal fade" id="issueRefundModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fa-solid fa-money-bill-transfer me-2"></i> Process Refund
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">

                    <p class="text-muted small mb-3">
                        Return ID: <strong class="text-primary"
                            style="font-family:'Courier New',monospace;">#RET-2026-048</strong>
                    </p>

                    <!-- Refund preview -->
                    <div class="ret-refund-preview">
                        <span class="rp-label">Total Refund</span>
                        <span class="rp-value">৳ 1,200</span>
                    </div>

                    <form id="retRefundForm">

                        <div class="mb-3">
                            <label class="form-label fw-semibold small">Refund Method <span
                                    class="text-danger">*</span></label>
                            <select class="form-select">
                                <option value="bkash" selected>bKash Merchant Refund (Instant)</option>
                                <option value="sslcommerz">SSLCommerz Gateway Refund</option>
                                <option value="nagad">Nagad Merchant Refund</option>
                                <option value="bank">Bank Account Transfer</option>
                                <option value="cash">Cash Handover</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold small">Refund Amount (BDT)</label>
                            <input type="number" class="form-control fw-bold" value="1200" step="0.01"
                                style="color:var(--success);">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold small">Gateway Reference / Trx ID</label>
                            <input type="text" class="form-control" placeholder="e.g. REFUND-TRX-998822">
                            <small class="text-muted" style="font-size:0.72rem;">
                                Leave blank if processing cash handover.
                            </small>
                        </div>

                        <div class="mb-0">
                            <label class="form-label fw-semibold small">Internal Note (Optional)</label>
                            <textarea class="form-control" rows="2" placeholder="e.g. Refund processed after QC approval..."></textarea>
                        </div>

                    </form>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
                    <button class="btn-approve" type="submit" form="retRefundForm">
                        <i class="fa-solid fa-check-double me-1"></i> Confirm Refund
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
