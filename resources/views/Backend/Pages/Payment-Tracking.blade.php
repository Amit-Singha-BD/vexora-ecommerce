@extends('Backend.Layout.MasterLayout')
@section('Content')
    <!-- Page Header -->
    <div class="page-header reveal">
        <div>
            <h1 class="page-title">Payments Tracking</h1>
            <p class="page-subtitle">Monitor gateway transaction IDs, methods, responses & payment statuses</p>
        </div>
        <button class="btn-gradient" id="payExportBtn">
            <i class="fa-solid fa-file-arrow-down me-1"></i> Export Report
        </button>
    </div>

    <!-- Metrics Row -->
    <div class="pay-metrics reveal">
        <div class="pay-metric">
            <div>
                <span class="pay-metric-label">Total Collected (Today)</span>
                <h3 class="pay-metric-value">৳ 48,500</h3>
            </div>
            <div class="pay-metric-icon" style="background: rgba(16,185,129,0.1); color: var(--success);">
                <i class="fa-solid fa-wallet"></i>
            </div>
        </div>

        <div class="pay-metric">
            <div>
                <span class="pay-metric-label">Successful Transactions</span>
                <h3 class="pay-metric-value">1,245</h3>
            </div>
            <div class="pay-metric-icon" style="background: rgba(99,102,241,0.1); color: var(--primary);">
                <i class="fa-solid fa-circle-check"></i>
            </div>
        </div>

        <div class="pay-metric">
            <div>
                <span class="pay-metric-label">Pending / Failed</span>
                <h3 class="pay-metric-value">14</h3>
            </div>
            <div class="pay-metric-icon" style="background: rgba(245,158,11,0.1); color: var(--accent);">
                <i class="fa-solid fa-triangle-exclamation"></i>
            </div>
        </div>
    </div>

    <!-- Filter Bar -->
    <div class="admin-card reveal" style="padding: 20px;">
        <div class="pay-filterbar">
            <div class="pay-search-wrap">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" class="form-control" id="paySearchInput" placeholder="Search Trx ID / Order ID...">
            </div>

            <select class="pay-filter-select" id="payGatewayFilter">
                <option value="all">All Gateways</option>
                <option value="bkash">bKash</option>
                <option value="ssl">SSLCommerz</option>
                <option value="nagad">Nagad</option>
                <option value="cod">Cash on Delivery</option>
            </select>

            <select class="pay-filter-select" id="payStatusFilter">
                <option value="all">All Status</option>
                <option value="success">Success</option>
                <option value="pending">Pending</option>
                <option value="failed">Failed</option>
                <option value="refunded">Refunded</option>
            </select>

            <button class="btn-gradient" id="payResetBtn" type="button">
                <i class="fa-solid fa-rotate-right me-1"></i> Reset
            </button>
        </div>
    </div>

    <!-- Payments Table -->
    <div class="admin-card reveal">
        <div class="responsive-table">
            <table>
                <thead>
                    <tr>
                        <th>Transaction</th>
                        <th>Order Ref</th>
                        <th>Gateway</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Date & Time</th>
                        <th style="text-align:right;">Actions</th>
                    </tr>
                </thead>
                <tbody id="payTableBody">

                    <!-- Row 1: bKash Success -->
                    <tr data-gateway="bkash" data-status="success">
                        <td data-label="Trx ID">
                            <div class="pay-trx-cell">
                                <span class="pay-trx-icon ic-bkash">
                                    <i class="fa-solid fa-mobile-screen"></i>
                                </span>
                                <div>
                                    <p class="pay-trx-id" data-copy="TRX98432105FG">TRX98432105FG</p>
                                    <span class="pay-trx-sub">bKash Gateway</span>
                                </div>
                            </div>
                        </td>
                        <td data-label="Order Ref">
                            <a href="orders.html" class="pay-order-ref">
                                <i class="fa-solid fa-receipt"></i> #ORD-2026-101
                            </a>
                        </td>
                        <td data-label="Gateway">
                            <span class="pay-gateway pay-gateway-bkash">
                                <i class="fa-solid fa-mobile-screen"></i> bKash
                            </span>
                        </td>
                        <td data-label="Amount"><span class="pay-amount">৳ 3,450</span></td>
                        <td data-label="Status">
                            <span class="pay-status pay-status-success">Success</span>
                        </td>
                        <td data-label="Date & Time">
                            <span class="ord-date-sub">22 Sep 2026<br>10:32 AM</span>
                        </td>
                        <td data-label="Actions" style="text-align:right;">
                            <div class="pay-actions">
                                <button class="btn-icon-action btn-view" title="View Details" data-bs-toggle="modal"
                                    data-bs-target="#paymentDetailModal">
                                    <i class="fa-solid fa-eye"></i>
                                </button>
                                <button class="btn-icon-action btn-delete" title="Issue Refund" data-bs-toggle="modal"
                                    data-bs-target="#refundModal">
                                    <i class="fa-solid fa-rotate-left"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <!-- Row 2: SSLCommerz Success -->
                    <tr data-gateway="ssl" data-status="success">
                        <td data-label="Trx ID">
                            <div class="pay-trx-cell">
                                <span class="pay-trx-icon ic-ssl">
                                    <i class="fa-solid fa-credit-card"></i>
                                </span>
                                <div>
                                    <p class="pay-trx-id" data-copy="SSL-TX-5548921">SSL-TX-5548921</p>
                                    <span class="pay-trx-sub">MasterCard / Visa</span>
                                </div>
                            </div>
                        </td>
                        <td data-label="Order Ref">
                            <a href="orders.html" class="pay-order-ref">
                                <i class="fa-solid fa-receipt"></i> #ORD-2026-103
                            </a>
                        </td>
                        <td data-label="Gateway">
                            <span class="pay-gateway pay-gateway-ssl">
                                <i class="fa-solid fa-credit-card"></i> SSLCommerz
                            </span>
                        </td>
                        <td data-label="Amount"><span class="pay-amount">৳ 8,900</span></td>
                        <td data-label="Status">
                            <span class="pay-status pay-status-success">Success</span>
                        </td>
                        <td data-label="Date & Time">
                            <span class="ord-date-sub">22 Sep 2026<br>09:15 AM</span>
                        </td>
                        <td data-label="Actions" style="text-align:right;">
                            <div class="pay-actions">
                                <button class="btn-icon-action btn-view" title="View Details" data-bs-toggle="modal"
                                    data-bs-target="#paymentDetailModal">
                                    <i class="fa-solid fa-eye"></i>
                                </button>
                                <button class="btn-icon-action btn-delete" title="Issue Refund" data-bs-toggle="modal"
                                    data-bs-target="#refundModal">
                                    <i class="fa-solid fa-rotate-left"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <!-- Row 3: COD Pending -->
                    <tr data-gateway="cod" data-status="pending">
                        <td data-label="Trx ID">
                            <div class="pay-trx-cell">
                                <span class="pay-trx-icon ic-cod">
                                    <i class="fa-solid fa-truck"></i>
                                </span>
                                <div>
                                    <p class="pay-trx-id" data-copy="COD-UNPAID-102">COD-UNPAID-102</p>
                                    <span class="pay-trx-sub">Cash on Delivery</span>
                                </div>
                            </div>
                        </td>
                        <td data-label="Order Ref">
                            <a href="orders.html" class="pay-order-ref">
                                <i class="fa-solid fa-receipt"></i> #ORD-2026-102
                            </a>
                        </td>
                        <td data-label="Gateway">
                            <span class="pay-gateway pay-gateway-cod">
                                <i class="fa-solid fa-truck"></i> COD
                            </span>
                        </td>
                        <td data-label="Amount"><span class="pay-amount">৳ 1,200</span></td>
                        <td data-label="Status">
                            <span class="pay-status pay-status-pending">Pending (Due)</span>
                        </td>
                        <td data-label="Date & Time">
                            <span class="ord-date-sub">21 Sep 2026<br>04:40 PM</span>
                        </td>
                        <td data-label="Actions" style="text-align:right;">
                            <div class="pay-actions">
                                <button class="btn-icon-action btn-view" title="View Details" data-bs-toggle="modal"
                                    data-bs-target="#paymentDetailModal">
                                    <i class="fa-solid fa-eye"></i>
                                </button>
                                <button class="btn-icon-action btn-edit" title="Mark as Collected" data-bs-toggle="modal"
                                    data-bs-target="#collectModal"
                                    style="background: rgba(16,185,129,0.12); color: var(--success);">
                                    <i class="fa-solid fa-check"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <!-- Row 4: Nagad Failed -->
                    <tr data-gateway="nagad" data-status="failed">
                        <td data-label="Trx ID">
                            <div class="pay-trx-cell">
                                <span class="pay-trx-icon ic-nagad">
                                    <i class="fa-solid fa-wallet"></i>
                                </span>
                                <div>
                                    <p class="pay-trx-id" data-copy="NGD-ERR-998231">NGD-ERR-998231</p>
                                    <span class="pay-trx-sub">Nagad Gateway</span>
                                </div>
                            </div>
                        </td>
                        <td data-label="Order Ref">
                            <a href="orders.html" class="pay-order-ref">
                                <i class="fa-solid fa-receipt"></i> #ORD-2026-098
                            </a>
                        </td>
                        <td data-label="Gateway">
                            <span class="pay-gateway pay-gateway-nagad">
                                <i class="fa-solid fa-wallet"></i> Nagad
                            </span>
                        </td>
                        <td data-label="Amount"><span class="pay-amount">৳ 2,150</span></td>
                        <td data-label="Status">
                            <span class="pay-status pay-status-failed">Failed</span>
                        </td>
                        <td data-label="Date & Time">
                            <span class="ord-date-sub">21 Sep 2026<br>02:10 PM</span>
                        </td>
                        <td data-label="Actions" style="text-align:right;">
                            <div class="pay-actions">
                                <button class="btn-icon-action btn-view" title="View Details" data-bs-toggle="modal"
                                    data-bs-target="#paymentDetailModal">
                                    <i class="fa-solid fa-eye"></i>
                                </button>
                                <button class="btn-icon-action btn-edit" title="Retry Verification">
                                    <i class="fa-solid fa-rotate-right"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                </tbody>
            </table>

            <div class="pay-empty d-none" id="payEmptyState">
                <i class="fa-solid fa-credit-card"></i>
                <p class="mb-0">No payments match your filter criteria.</p>
            </div>
        </div>

        <!-- Pagination -->
        <div class="pay-pagination">
            <small class="text-muted">
                Showing <strong class="text-dark">1-4</strong> of <strong class="text-dark">128</strong> payments
            </small>
            <div class="d-flex gap-2">
                <a href="#" class="pay-page-btn disabled"><i class="fa-solid fa-chevron-left"></i></a>
                <a href="#" class="pay-page-btn active">1</a>
                <a href="#" class="pay-page-btn">2</a>
                <a href="#" class="pay-page-btn">3</a>
                <a href="#" class="pay-page-btn"><i class="fa-solid fa-chevron-right"></i></a>
            </div>
        </div>
    </div>

    <!-- ============ PAYMENT DETAILS MODAL ============ -->
    <div class="modal fade" id="paymentDetailModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fa-solid fa-receipt me-2"></i> Payment Details
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">

                    <div class="text-center mb-3">
                        <span class="pay-gateway pay-gateway-bkash" style="font-size:0.8rem; padding:6px 14px;">
                            <i class="fa-solid fa-mobile-screen"></i> bKash
                        </span>
                        <div class="pay-trx-id mt-2" style="font-size:1rem; cursor:default;">
                            TRX98432105FG
                        </div>
                    </div>

                    <h6 class="fw-bold mb-2 mt-3" style="font-size:0.85rem; color:var(--primary);">
                        <i class="fa-solid fa-circle-info me-1"></i> Transaction Information
                    </h6>

                    <div class="pay-detail-row">
                        <span class="lbl">Order Reference</span>
                        <span class="val">
                            <a href="orders.html" class="pay-order-ref">
                                #ORD-2026-101
                            </a>
                        </span>
                    </div>
                    <div class="pay-detail-row">
                        <span class="lbl">Transaction ID</span>
                        <span class="val">TRX98432105FG</span>
                    </div>
                    <div class="pay-detail-row">
                        <span class="lbl">Amount</span>
                        <span class="val" style="font-size:1.05rem; color:var(--success);">৳ 3,450</span>
                    </div>
                    <div class="pay-detail-row">
                        <span class="lbl">Status</span>
                        <span class="val">
                            <span class="pay-status pay-status-success">Success</span>
                        </span>
                    </div>
                    <div class="pay-detail-row">
                        <span class="lbl">Date & Time</span>
                        <span class="val">22 Sep 2026, 10:32 AM</span>
                    </div>

                    <h6 class="fw-bold mb-2 mt-4" style="font-size:0.85rem; color:var(--primary);">
                        <i class="fa-solid fa-user me-1"></i> Payer Information
                    </h6>
                    <div class="pay-detail-row">
                        <span class="lbl">Payer Name</span>
                        <span class="val">Rafiq Ahmed</span>
                    </div>
                    <div class="pay-detail-row">
                        <span class="lbl">Account</span>
                        <span class="val">+880 1712-345678</span>
                    </div>

                    <h6 class="fw-bold mb-2 mt-4" style="font-size:0.85rem; color:var(--primary);">
                        <i class="fa-solid fa-code me-1"></i> Gateway Response Log
                    </h6>
                    <div class="pay-log">
                        <span class="k">"trxID":</span> <span class="s">"TRX98432105FG"</span>,
                        <span class="k">"paymentID":</span> <span class="s">"BKH99218301"</span>,
                        <span class="k">"amount":</span> <span class="n">3450.00</span>,
                        <span class="k">"currency":</span> <span class="s">"BDT"</span>,
                        <span class="k">"status":</span> <span class="s">"Completed"</span>,
                        <span class="k">"statusMessage":</span> <span class="s">"Successful"</span>,
                        <span class="k">"merchantInvoice":</span> <span class="s">"ORD-2026-101"</span>,
                        <span class="k">"payerReference":</span> <span class="s">"01712-345678"</span>
                    </div>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Close</button>
                    <button class="btn-gradient">
                        <i class="fa-solid fa-print me-1"></i> Print Receipt
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- ============ REFUND MODAL ============ -->
    <div class="modal fade" id="refundModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-body text-center p-4">
                    <div class="pay-modal-icon danger">
                        <i class="fa-solid fa-rotate-left"></i>
                    </div>
                    <h5 class="fw-bold mb-2">Issue Refund?</h5>
                    <p class="text-muted small mb-3">
                        This will reverse the payment of
                        <strong class="text-dark">৳ 3,450</strong> back to the customer.
                    </p>
                    <div class="mb-3 text-start">
                        <label class="form-label fw-semibold small">Refund Reason</label>
                        <select class="form-select form-select-sm mb-2">
                            <option>Customer requested</option>
                            <option>Product damaged</option>
                            <option>Wrong item shipped</option>
                            <option>Order cancelled</option>
                            <option>Other</option>
                        </select>
                        <textarea class="form-control form-control-sm" rows="2" placeholder="Optional note..."></textarea>
                    </div>
                    <div class="d-flex gap-2 justify-content-center">
                        <button class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
                        <button class="btn-gradient"
                            style="background: linear-gradient(135deg,#EF4444,#DC2626); box-shadow:0 4px 12px rgba(239,68,68,0.3);">
                            <i class="fa-solid fa-check me-1"></i> Confirm
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ============ MARK COLLECTED MODAL ============ -->
    <div class="modal fade" id="collectModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-body text-center p-4">
                    <div class="pay-modal-icon success">
                        <i class="fa-solid fa-circle-check"></i>
                    </div>
                    <h5 class="fw-bold mb-2">Mark as Collected?</h5>
                    <p class="text-muted small mb-3">
                        Confirm that
                        <strong class="text-dark">৳ 1,200</strong>
                        has been received from the delivery agent.
                    </p>
                    <div class="d-flex gap-2 justify-content-center">
                        <button class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
                        <button class="btn-gradient"
                            style="background: linear-gradient(135deg,#10B981,#059669); box-shadow:0 4px 12px rgba(16,185,129,0.3);">
                            <i class="fa-solid fa-check me-1"></i> Yes, Collected
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
