@extends('Backend.Layout.MasterLayout')
@section('Content')
    <div class="page-header reveal">
        <div>
            <h1 class="page-title">Category Management</h1>
            <p class="page-subtitle">Create, edit and manage parent-child hierarchical categories</p>
        </div>
        <a href="{{ route('categories.create.view') }}" class="btn-gradient text-decoration-none">
            <i class="fa-solid fa-plus me-1"></i> Add New Category
        </a>
    </div>

    <div class="admin-card reveal">

        <!-- Toolbar -->
        <div class="cat-toolbar">
            <div class="cat-search-wrap">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" class="form-control" id="catSearchInput" placeholder="Search categories...">
            </div>

            <select class="cat-filter-select" id="catTypeFilter">
                <option value="all">All Types</option>
                <option value="parent">Parent Only</option>
                <option value="child">Child Only</option>
            </select>

            <span class="ms-auto text-muted small d-none d-md-inline">
                Total: <strong class="text-dark">5</strong> categories
            </span>
        </div>

        <!-- Responsive Table -->
        <div class="responsive-table">
            <table>
                <thead>
                    <tr>
                        <th style="width:70px;">#ID</th>
                        <th>Category Name</th>
                        <th>Slug</th>
                        <th>Type / Level</th>
                        <th>Parent</th>
                        <th style="text-align:right;">Actions</th>
                    </tr>
                </thead>
                <tbody id="catTableBody">

                    <tr data-type="parent">
                        <td data-label="ID"><span class="order-id">#1</span></td>
                        <td data-label="Category Name">
                            <div class="cat-name-cell">
                                <span class="cat-icon-box cat-parent-icon"><i class="fa-solid fa-folder"></i></span>
                                <span>Electronics</span>
                            </div>
                        </td>
                        <td data-label="Slug"><span class="cat-slug">electronics</span></td>
                        <td data-label="Type / Level">
                            <span class="cat-badge cat-badge-parent">
                                <i class="fa-solid fa-sitemap"></i> Parent
                            </span>
                        </td>
                        <td data-label="Parent"><span class="text-muted">—</span></td>
                        <td data-label="Actions" style="text-align:right;">
                            <div class="cat-actions">
                                <button class="btn-icon-action btn-edit" title="Edit" data-bs-toggle="modal"
                                    data-bs-target="#editCategoryModal">
                                    <i class="fa-solid fa-pen"></i>
                                </button>
                                <button class="btn-icon-action btn-delete" title="Delete" data-bs-toggle="modal"
                                    data-bs-target="#deleteCategoryModal">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <tr data-type="child">
                        <td data-label="ID"><span class="order-id">#2</span></td>
                        <td data-label="Category Name">
                            <div class="cat-name-cell">
                                <span class="cat-branch">└─</span>
                                <span class="cat-icon-box cat-child-icon"><i class="fa-solid fa-tag"></i></span>
                                <span>Smartphones</span>
                            </div>
                        </td>
                        <td data-label="Slug"><span class="cat-slug">smartphones</span></td>
                        <td data-label="Type / Level">
                            <span class="cat-badge cat-badge-child">
                                <i class="fa-solid fa-diagram-project"></i> Child
                            </span>
                        </td>
                        <td data-label="Parent"><span class="fw-semibold">Electronics</span></td>
                        <td data-label="Actions" style="text-align:right;">
                            <div class="cat-actions">
                                <button class="btn-icon-action btn-edit" title="Edit" data-bs-toggle="modal"
                                    data-bs-target="#editCategoryModal">
                                    <i class="fa-solid fa-pen"></i>
                                </button>
                                <button class="btn-icon-action btn-delete" title="Delete" data-bs-toggle="modal"
                                    data-bs-target="#deleteCategoryModal">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <tr data-type="child">
                        <td data-label="ID"><span class="order-id">#3</span></td>
                        <td data-label="Category Name">
                            <div class="cat-name-cell">
                                <span class="cat-branch">└─</span>
                                <span class="cat-icon-box cat-child-icon"><i class="fa-solid fa-tag"></i></span>
                                <span>Laptops & PCs</span>
                            </div>
                        </td>
                        <td data-label="Slug"><span class="cat-slug">laptops-pcs</span></td>
                        <td data-label="Type / Level">
                            <span class="cat-badge cat-badge-child">
                                <i class="fa-solid fa-diagram-project"></i> Child
                            </span>
                        </td>
                        <td data-label="Parent"><span class="fw-semibold">Electronics</span></td>
                        <td data-label="Actions" style="text-align:right;">
                            <div class="cat-actions">
                                <button class="btn-icon-action btn-edit" title="Edit" data-bs-toggle="modal"
                                    data-bs-target="#editCategoryModal">
                                    <i class="fa-solid fa-pen"></i>
                                </button>
                                <button class="btn-icon-action btn-delete" title="Delete" data-bs-toggle="modal"
                                    data-bs-target="#deleteCategoryModal">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <tr data-type="parent">
                        <td data-label="ID"><span class="order-id">#4</span></td>
                        <td data-label="Category Name">
                            <div class="cat-name-cell">
                                <span class="cat-icon-box cat-parent-icon"><i class="fa-solid fa-folder"></i></span>
                                <span>Men's Fashion</span>
                            </div>
                        </td>
                        <td data-label="Slug"><span class="cat-slug">mens-fashion</span></td>
                        <td data-label="Type / Level">
                            <span class="cat-badge cat-badge-parent">
                                <i class="fa-solid fa-sitemap"></i> Parent
                            </span>
                        </td>
                        <td data-label="Parent"><span class="text-muted">—</span></td>
                        <td data-label="Actions" style="text-align:right;">
                            <div class="cat-actions">
                                <button class="btn-icon-action btn-edit" title="Edit" data-bs-toggle="modal"
                                    data-bs-target="#editCategoryModal">
                                    <i class="fa-solid fa-pen"></i>
                                </button>
                                <button class="btn-icon-action btn-delete" title="Delete" data-bs-toggle="modal"
                                    data-bs-target="#deleteCategoryModal">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <tr data-type="child">
                        <td data-label="ID"><span class="order-id">#5</span></td>
                        <td data-label="Category Name">
                            <div class="cat-name-cell">
                                <span class="cat-branch">└─</span>
                                <span class="cat-icon-box cat-child-icon"><i class="fa-solid fa-tag"></i></span>
                                <span>Casual Shirts</span>
                            </div>
                        </td>
                        <td data-label="Slug"><span class="cat-slug">casual-shirts</span></td>
                        <td data-label="Type / Level">
                            <span class="cat-badge cat-badge-child">
                                <i class="fa-solid fa-diagram-project"></i> Child
                            </span>
                        </td>
                        <td data-label="Parent"><span class="fw-semibold">Men's Fashion</span></td>
                        <td data-label="Actions" style="text-align:right;">
                            <div class="cat-actions">
                                <button class="btn-icon-action btn-edit" title="Edit" data-bs-toggle="modal"
                                    data-bs-target="#editCategoryModal">
                                    <i class="fa-solid fa-pen"></i>
                                </button>
                                <button class="btn-icon-action btn-delete" title="Delete" data-bs-toggle="modal"
                                    data-bs-target="#deleteCategoryModal">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                </tbody>
            </table>

            <div class="cat-empty d-none" id="catEmptyState">
                <i class="fa-solid fa-folder-open"></i>
                <p class="mb-0">No categories found matching your search.</p>
            </div>
        </div>
    </div>

    <!-- ============ EDIT CATEGORY MODAL ============ -->
    <div class="modal fade" id="editCategoryModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fa-solid fa-pen-to-square me-2"></i> Edit Category
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="editCategoryForm">
                        <div class="mb-3">
                            <label class="form-label fw-semibold small">Category Name <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control" value="Smartphones" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold small">Slug</label>
                            <input type="text" class="form-control" value="smartphones">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold small">Parent Category</label>
                            <select class="form-select">
                                <option value="">— None (Top Level Parent) —</option>
                                <option value="1" selected>Electronics</option>
                                <option value="4">Men's Fashion</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold small">Description</label>
                            <textarea class="form-control" rows="3">All kinds of modern smartphones and accessories.</textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
                    <button class="btn-gradient" type="submit" form="editCategoryForm">
                        <i class="fa-solid fa-check me-1"></i> Update Category
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- ============ DELETE CONFIRMATION MODAL ============ -->
    <div class="modal fade" id="deleteCategoryModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-body text-center p-4">
                    <div class="cat-delete-icon">
                        <i class="fa-solid fa-triangle-exclamation"></i>
                    </div>
                    <h5 class="fw-bold mb-2">Delete Category?</h5>
                    <p class="text-muted small mb-4">
                        This action cannot be undone. All related sub-categories will also be affected.
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
