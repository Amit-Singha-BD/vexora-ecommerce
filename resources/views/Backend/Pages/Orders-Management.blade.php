@extends('Backend.Layout.MasterLayout')
@section('Content')
    <!-- Page Header -->
    <div class="page-header reveal">
        <div>
            <h1 class="page-title">Orders Management</h1>
            <p class="page-subtitle">Track customer orders, update workflow statuses & view audit history</p>
        </div>
        <button class="btn-gradient" id="ordExportBtn">
            <i class="fa-solid fa-file-excel me-1"></i> Export Orders
        </button>
    </div>

    <!-- Metrics Row -->
    <div class="ord-metrics reveal">
        <div class="ord-metric">
            <div>
                <span class="ord-metric-label">Total Orders</span>
                <h3 class="ord-metric-value">45</h3>
            </div>
            <div class="ord-metric-icon" style="background: rgba(99,102,241,0.1); color: var(--primary);">
                <i class="fa-solid fa-cart-shopping"></i>
            </div>
        </div>
        <div class="ord-metric">
            <div>
                <span class="ord-metric-label">Pending</span>
                <h3 class="ord-metric-value">08</h3>
            </div>
            <div class="ord-metric-icon" style="background: rgba(245,158,11,0.1); color: var(--accent);">
                <i class="fa-solid fa-clock"></i>
            </div>
        </div>
        <div class="ord-metric">
            <div>
                <span class="ord-metric-label">Shipped</span>
                <h3 class="ord-metric-value">14</h3>
            </div>
            <div class="ord-metric-icon" style="background: rgba(6,182,212,0.1); color: var(--secondary);">
                <i class="fa-solid fa-truck-fast"></i>
            </div>
        </div>
        <div class="ord-metric">
            <div>
                <span class="ord-metric-label">Delivered</span>
                <h3 class="ord-metric-value">21</h3>
            </div>
            <div class="ord-metric-icon" style="background: rgba(16,185,129,0.1); color: var(--success);">
                <i class="fa-solid fa-circle-check"></i>
            </div>
        </div>
    </div>

    <!-- Filter Bar -->
    <div class="admin-card reveal" style="padding: 20px;">
        <div class="ord-filterbar">
            <div class="ord-search-wrap">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" class="form-control" id="ordSearchInput"
                    placeholder="Search by Order ID, Customer, Phone...">
            </div>

            <select class="ord-filter-select" id="ordStatusFilter">
                <option value="all">All Status</option>
                <option value="pending">Pending</option>
                <option value="processing">Processing</option>
                <option value="shipped">Shipped</option>
                <option value="delivered">Delivered</option>
                <option value="cancelled">Cancelled</option>
            </select>

            <input type="date" class="ord-filter-date" id="ordDateFilter">

            <button class="btn-gradient" id="ordResetBtn" type="button">
                <i class="fa-solid fa-rotate-right me-1"></i> Reset
            </button>
        </div>
    </div>

    <!-- Orders Table -->
    <div class="admin-card reveal">
        <div class="responsive-table">
            <table>
                <thead>
                    <tr>
                        <th>Order</th>
                        <th>Customer</th>
                        <th>Items</th>
                        <th>Total</th>
                        <th>Payment</th>
                        <th>Status</th>
                        <th style="text-align:right;">Actions</th>
                    </tr>
                </thead>
                <tbody id="ordTableBody">

                    <!-- Order 1 -->
                    <tr data-status="pending">
                        <td data-label="Order ID">
                            <div class="ord-id-cell">
                                <span class="ord-id-icon"><i class="fa-solid fa-receipt"></i></span>
                                <div>
                                    <p class="ord-id" data-copy="#ORD-2026-101">#ORD-2026-101</p>
                                    <span class="ord-date-sub">22 Sep 2026, 10:30 AM</span>
                                </div>
                            </div>
                        </td>
                        <td data-label="Customer">
                            <div class="ord-customer">
                                <span class="ord-avatar">RA</span>
                                <div>
                                    <p class="ord-customer-name">Rafiq Ahmed</p>
                                    <span class="ord-customer-phone">+880 1712-345678</span>
                                </div>
                            </div>
                        </td>
                        <td data-label="Items">
                            <span class="ord-items-badge">
                                <i class="fa-solid fa-box"></i> 2 Items
                            </span>
                        </td>
                        <td data-label="Total"><span class="ord-amount">৳ 3,450</span></td>
                        <td data-label="Payment">
                            <span class="ord-pay ord-pay-paid">
                                <i class="fa-solid fa-circle-check"></i> Paid · bKash
                            </span>
                        </td>
                        <td data-label="Status">
                            <span class="ord-status ord-status-pending">Pending</span>
                        </td>
                        <td data-label="Actions" style="text-align:right;">
                            <div class="ord-actions">
                                <select class="ord-status-select" data-order="#ORD-2026-101">
                                    <option value="pending" selected>Pending</option>
                                    <option value="processing">Processing</option>
                                    <option value="shipped">Shipped</option>
                                    <option value="delivered">Delivered</option>
                                    <option value="cancelled">Cancelled</option>
                                </select>
                                <button class="btn-icon-action btn-view" title="History" data-bs-toggle="modal"
                                    data-bs-target="#statusHistoryModal">
                                    <i class="fa-solid fa-clock-rotate-left"></i>
                                </button>
                                <button class="btn-icon-action btn-edit" title="View Details" data-bs-toggle="modal"
                                    data-bs-target="#viewOrderModal">
                                    <i class="fa-solid fa-eye"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <!-- Order 2 -->
                    <tr data-status="processing">
                        <td data-label="Order ID">
                            <div class="ord-id-cell">
                                <span class="ord-id-icon"><i class="fa-solid fa-receipt"></i></span>
                                <div>
                                    <p class="ord-id" data-copy="#ORD-2026-102">#ORD-2026-102</p>
                                    <span class="ord-date-sub">21 Sep 2026, 03:15 PM</span>
                                </div>
                            </div>
                        </td>
                        <td data-label="Customer">
                            <div class="ord-customer">
                                <span class="ord-avatar"
                                    style="background: linear-gradient(135deg,#F59E0B,#EF4444);">NA</span>
                                <div>
                                    <p class="ord-customer-name">Nazma Akter</p>
                                    <span class="ord-customer-phone">+880 1819-987654</span>
                                </div>
                            </div>
                        </td>
                        <td data-label="Items">
                            <span class="ord-items-badge">
                                <i class="fa-solid fa-box"></i> 1 Item
                            </span>
                        </td>
                        <td data-label="Total"><span class="ord-amount">৳ 1,200</span></td>
                        <td data-label="Payment">
                            <span class="ord-pay ord-pay-unpaid">
                                <i class="fa-solid fa-clock"></i> COD · Unpaid
                            </span>
                        </td>
                        <td data-label="Status">
                            <span class="ord-status ord-status-processing">Processing</span>
                        </td>
                        <td data-label="Actions" style="text-align:right;">
                            <div class="ord-actions">
                                <select class="ord-status-select" data-order="#ORD-2026-102">
                                    <option value="pending">Pending</option>
                                    <option value="processing" selected>Processing</option>
                                    <option value="shipped">Shipped</option>
                                    <option value="delivered">Delivered</option>
                                    <option value="cancelled">Cancelled</option>
                                </select>
                                <button class="btn-icon-action btn-view" title="History" data-bs-toggle="modal"
                                    data-bs-target="#statusHistoryModal">
                                    <i class="fa-solid fa-clock-rotate-left"></i>
                                </button>
                                <button class="btn-icon-action btn-edit" title="View Details" data-bs-toggle="modal"
                                    data-bs-target="#viewOrderModal">
                                    <i class="fa-solid fa-eye"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <!-- Order 3 -->
                    <tr data-status="shipped">
                        <td data-label="Order ID">
                            <div class="ord-id-cell">
                                <span class="ord-id-icon"><i class="fa-solid fa-receipt"></i></span>
                                <div>
                                    <p class="ord-id" data-copy="#ORD-2026-103">#ORD-2026-103</p>
                                    <span class="ord-date-sub">20 Sep 2026, 09:42 AM</span>
                                </div>
                            </div>
                        </td>
                        <td data-label="Customer">
                            <div class="ord-customer">
                                <span class="ord-avatar"
                                    style="background: linear-gradient(135deg,#10B981,#06B6D4);">TH</span>
                                <div>
                                    <p class="ord-customer-name">Tanvir Hossain</p>
                                    <span class="ord-customer-phone">+880 1521-112233</span>
                                </div>
                            </div>
                        </td>
                        <td data-label="Items">
                            <span class="ord-items-badge">
                                <i class="fa-solid fa-box"></i> 4 Items
                            </span>
                        </td>
                        <td data-label="Total"><span class="ord-amount">৳ 8,900</span></td>
                        <td data-label="Payment">
                            <span class="ord-pay ord-pay-paid">
                                <i class="fa-solid fa-circle-check"></i> Paid · SSLCommerz
                            </span>
                        </td>
                        <td data-label="Status">
                            <span class="ord-status ord-status-shipped">Shipped</span>
                        </td>
                        <td data-label="Actions" style="text-align:right;">
                            <div class="ord-actions">
                                <select class="ord-status-select" data-order="#ORD-2026-103">
                                    <option value="pending">Pending</option>
                                    <option value="processing">Processing</option>
                                    <option value="shipped" selected>Shipped</option>
                                    <option value="delivered">Delivered</option>
                                    <option value="cancelled">Cancelled</option>
                                </select>
                                <button class="btn-icon-action btn-view" title="History" data-bs-toggle="modal"
                                    data-bs-target="#statusHistoryModal">
                                    <i class="fa-solid fa-clock-rotate-left"></i>
                                </button>
                                <button class="btn-icon-action btn-edit" title="View Details" data-bs-toggle="modal"
                                    data-bs-target="#viewOrderModal">
                                    <i class="fa-solid fa-eye"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                </tbody>
            </table>

            <div class="ord-empty d-none" id="ordEmptyState">
                <i class="fa-solid fa-cart-shopping"></i>
                <p class="mb-0">No orders match your filter criteria.</p>
            </div>
        </div>

        <!-- Pagination -->
        <div class="ord-pagination">
            <small class="text-muted">
                Showing <strong class="text-dark">1-3</strong> of <strong class="text-dark">45</strong> orders
            </small>
            <div class="d-flex gap-2">
                <a href="#" class="ord-page-btn disabled"><i class="fa-solid fa-chevron-left"></i></a>
                <a href="#" class="ord-page-btn active">1</a>
                <a href="#" class="ord-page-btn">2</a>
                <a href="#" class="ord-page-btn">3</a>
                <a href="#" class="ord-page-btn"><i class="fa-solid fa-chevron-right"></i></a>
            </div>
        </div>
    </div>

    <!-- ============ STATUS HISTORY MODAL ============ -->
    <div class="modal fade" id="statusHistoryModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fa-solid fa-clock-rotate-left me-2"></i> Status History & Notes
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p class="text-muted small mb-3">
                        Order: <strong class="text-primary">#ORD-2026-101</strong>
                    </p>

                    <!-- Timeline -->
                    <div class="ord-timeline">
                        <div class="ord-timeline-item is-latest is-pending">
                            <div class="ord-timeline-head">
                                <p class="ord-timeline-title">
                                    Status: <span class="ord-status ord-status-pending"
                                        style="font-size:0.7rem;">Pending</span>
                                </p>
                                <span class="ord-timeline-time">22 Sep 2026 · 10:30 AM</span>
                            </div>
                            <p class="ord-timeline-note">Order placed by customer via website cart.</p>
                            <span class="ord-timeline-by">by System</span>
                        </div>
                    </div>

                    <!-- Add note form -->
                    <div class="admin-card" style="margin-bottom:0; padding:18px; background:#FAFBFC;">
                        <h6 class="fw-bold mb-3" style="font-size:0.85rem;">
                            <i class="fa-solid fa-plus text-primary me-1"></i> Add New Status Change
                        </h6>
                        <form id="ordStatusForm">
                            <div class="mb-3">
                                <label class="form-label fw-semibold small">New Status</label>
                                <select class="form-select form-select-sm">
                                    <option value="pending">Pending</option>
                                    <option value="processing" selected>Processing — Verify payment & stock</option>
                                    <option value="shipped">Shipped</option>
                                    <option value="delivered">Delivered</option>
                                    <option value="cancelled">Cancelled</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold small">Note / Admin Comment</label>
                                <textarea class="form-control form-control-sm" rows="3"
                                    placeholder="Write internal or customer note about this change..."></textarea>
                            </div>
                            <button type="submit" class="btn-gradient w-100">
                                <i class="fa-solid fa-floppy-disk me-1"></i> Save Status & Note
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ============ VIEW ORDER DETAILS MODAL ============ -->
    <div class="modal fade" id="viewOrderModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fa-solid fa-receipt me-2"></i> Order Details
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">

                    <div class="text-center mb-3">
                        <span class="ord-id" style="font-size:1.1rem;">#ORD-2026-101</span>
                        <div class="text-muted small mt-1">22 Sep 2026 · 10:30 AM</div>
                    </div>

                    <!-- Customer & Payment -->
                    <h6 class="fw-bold mb-2 mt-4" style="font-size:0.85rem; color:var(--primary);">
                        <i class="fa-solid fa-user me-1"></i> Customer
                    </h6>
                    <div class="ord-detail-row">
                        <span class="lbl">Name</span>
                        <span class="val">Rafiq Ahmed</span>
                    </div>
                    <div class="ord-detail-row">
                        <span class="lbl">Phone</span>
                        <span class="val">+880 1712-345678</span>
                    </div>
                    <div class="ord-detail-row">
                        <span class="lbl">Shipping Address</span>
                        <span class="val">House 42, Road 7, Dhanmondi, Dhaka 1205</span>
                    </div>

                    <!-- Products -->
                    <h6 class="fw-bold mb-2 mt-4" style="font-size:0.85rem; color:var(--primary);">
                        <i class="fa-solid fa-box me-1"></i> Ordered Items
                    </h6>

                    <div class="ord-detail-product">
                        <div class="ord-detail-thumb"><i class="fa-solid fa-mobile-screen"></i></div>
                        <div style="flex:1;">
                            <p class="ord-detail-pname">Wireless Pro Smartphone</p>
                            <p class="ord-detail-pmeta">Qty: 1 · ৳ 2,450</p>
                        </div>
                        <strong class="text-dark">৳ 2,450</strong>
                    </div>

                    <div class="ord-detail-product">
                        <div class="ord-detail-thumb"><i class="fa-solid fa-headphones"></i></div>
                        <div style="flex:1;">
                            <p class="ord-detail-pname">Bluetooth Earbuds Pro</p>
                            <p class="ord-detail-pmeta">Qty: 1 · ৳ 1,000</p>
                        </div>
                        <strong class="text-dark">৳ 1,000</strong>
                    </div>

                    <!-- Payment Summary -->
                    <h6 class="fw-bold mb-2 mt-4" style="font-size:0.85rem; color:var(--primary);">
                        <i class="fa-solid fa-credit-card me-1"></i> Payment Summary
                    </h6>
                    <div class="ord-detail-row">
                        <span class="lbl">Subtotal</span>
                        <span class="val">৳ 3,450</span>
                    </div>
                    <div class="ord-detail-row">
                        <span class="lbl">Shipping</span>
                        <span class="val">৳ 0</span>
                    </div>
                    <div class="ord-detail-row">
                        <span class="lbl">Discount</span>
                        <span class="val">৳ 0</span>
                    </div>
                    <div class="ord-detail-row">
                        <span class="lbl" style="font-weight:700;">Total</span>
                        <span class="val" style="font-size:1.05rem; color:var(--primary);">৳ 3,450</span>
                    </div>
                    <div class="ord-detail-row">
                        <span class="lbl">Payment Method</span>
                        <span class="val">
                            <span class="ord-pay ord-pay-paid">
                                <i class="fa-solid fa-circle-check"></i> bKash
                            </span>
                        </span>
                    </div>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Close</button>
                    <button class="btn-gradient">
                        <i class="fa-solid fa-print me-1"></i> Print Invoice
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
