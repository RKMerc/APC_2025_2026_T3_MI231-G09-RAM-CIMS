<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RAM-CIMS - Inventory Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">

    <div class="container mt-5">
        
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                <strong>Success!</strong> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="text-primary fw-bold mb-0">RAM-CIMS Inventory Stock</h2>
                <small class="text-muted">APC Clinic Administration Module</small>
            </div>
            <button type="button" class="btn btn-primary fw-semibold" data-bs-toggle="modal" data-bs-target="#addItemModal">
                + Add New Item
            </button>
        </div>

        <div class="card shadow-sm">
            <div class="card-body p-0">
                <table class="table table-hover table-striped mb-0 align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>Code</th>
                            <th>Generic Name</th>
                            <th>Brand Name</th>
                            <th>Category</th>
                            <th>Quantity On Hand</th>
                            <th>Expiration Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($supplies as $item)
                            <tr>
                                <td><span class="badge bg-dark font-monospace">{{ $item->ITEM_CODE }}</span></td>
                                <td class="fw-semibold text-secondary">{{ $item->GENERIC_NAME }}</td>
                                <td class="text-muted"><em>{{ $item->BRAND_NAME ?? 'N/A' }}</em></td>
                                <td><span class="badge bg-light text-dark border">{{ $item->ITEM_CATEGORY }}</span></td>
                                <td class="fw-bold {{ $item->ITEM_QUANTITY < 10 ? 'text-danger' : 'text-success' }}">
                                    {{ $item->ITEM_QUANTITY }} pcs
                                </td>
                                <td>{{ \Carbon\Carbon::parse($item->ITEM_EXPIRATION_DATE)->format('Y-M-d') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-5 text-muted">No campus clinic supplies recorded yet.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addItemModal" tabindex="-1" aria-labelledby="addItemModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title fw-bold" id="addItemModalLabel">Register New Supply Item</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/inventory" method="POST">
                    @csrf
                    <div class="modal-body row g-3">
                        
                        <div class="col-md-6">
                            <label for="ITEM_CODE" class="form-label fw-semibold">Item Code</label>
                            <input type="text" class="form-control" id="ITEM_CODE" name="ITEM_CODE" placeholder="e.g., 1001" required>
                        </div>

                        <div class="col-md-6">
                            <label for="ITEM_CATEGORY" class="form-label fw-semibold">Category</label>
                            <select class="form-select" id="ITEM_CATEGORY" name="ITEM_CATEGORY" required>
                                <option value="" disabled selected>Select category...</option>
                                <option value="Medicine">Medicine</option>
                                <option value="Medical Supply">Medical Supply</option>
                                <option value="Equipment">Equipment</option>
                                <option value="First Aid">First Aid</option>
                            </select>
                        </div>

                        <div class="col-12">
                            <label for="GENERIC_NAME" class="form-label fw-semibold">Generic Name</label>
                            <input type="text" class="form-control" id="GENERIC_NAME" name="GENERIC_NAME" placeholder="e.g., Paracetamol" required>
                        </div>

                        <div class="col-12">
                            <label for="BRAND_NAME" class="form-label fw-semibold">Brand Name (Optional)</label>
                            <input type="text" class="form-control" id="BRAND_NAME" name="BRAND_NAME" placeholder="e.g., Biogesic">
                        </div>

                        <div class="col-md-6">
                            <label for="ITEM_QUANTITY" class="form-label fw-semibold">Initial Quantity</label>
                            <input type="number" class="form-control" id="ITEM_QUANTITY" name="ITEM_QUANTITY" min="0" placeholder="0" required>
                        </div>

                        <div class="col-md-6">
                            <label for="ITEM_EXPIRATION_DATE" class="form-label fw-semibold">Expiration Date</label>
                            <input type="date" class="form-control" id="ITEM_EXPIRATION_DATE" name="ITEM_EXPIRATION_DATE" required>
                        </div>

                    </div>
                    <div class="modal-footer bg-light">
                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal">Cancel</button>
                        <button type="submit" class="btn btn-success fw-semibold">Save to Inventory</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>