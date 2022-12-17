<x-admin.layout :notifs='$adminNotifs'>



    {{-- Stock Modal --}}
    <div class="modal fade" id="stockModal" tabindex="-1" aria-labelledby="stockModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="stockModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="">
                        @csrf
                        <div class="row mb-3">
                            <label for="existingStockModal" class="col-sm-3">Existing Stock</label>
                            <input type="number" name="existingStockModal" id="existingStockModal"
                                class="border border-gray-200 rounded p-2 col-sm-9" readonly>
                        </div>
                        <div class="row">
                            <label for="additionalStockModal" class="col-sm-3">How many?</label>
                            <input type="number" name="additionalStock" id="additionalStock"
                                class="border border-gray-200 rounded p-2 col-sm-9 form-control">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="addStockBtn">Add</button>
                </div>
            </div>
        </div>
    </div>
    {{-- Update Menu Item Date Range Modal --}}
    <div class="modal fade" id="updateDateModal" tabindex="-1" aria-labelledby="updateDateModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateDateModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="">
                        @csrf
                        {{-- Temporary Date Options --}}
                        <div class="row">
                            <label for="">Current Date Range</label>
                            {{-- Displayed At --}}
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="prevDisplayedAt">Displayed at</label>
                                    <input type="date" name="prevDisplayedAt" id="prevDisplayedAt"
                                        class="border border-gray-200 rounded p-2 w-full form-control" disabled
                                        readonly>
                                </div>
                            </div>
                            {{-- Removed At --}}
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="prevRemovedAt">Removed at</label>
                                    <input type="date" name="prevRemovedAt" id="prevRemovedAt"
                                        class="border border-gray-200 rounded p-2 w-full form-control" disabled
                                        readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            {{-- Displayed At --}}
                            <label for="">New Date Range</label>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="newDisplayedAt">Displayed at</label>
                                    <input type="date" name="newDisplayedAt" id="newDisplayedAt"
                                        class="border border-gray-200 rounded p-2 w-full form-control">
                                </div>
                            </div>
                            {{-- Removed At --}}
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="newRemovedAt">Removed at</label>
                                    <input type="date" name="newRemovedAt" id="newRemovedAt"
                                        class="border border-gray-200 rounded p-2 w-full form-control">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="updateMenuDateRangeBtn">Update</button>
                </div>
            </div>
        </div>
    </div>
    <p>Menu Management</p>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="cookedMeals-tab" data-bs-toggle="tab"
                data-bs-target="#cookedMealsTableTab" type="button" role="tab" aria-controls="cookedMeals"
                aria-selected="true">Cooked Meals</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="pastas-tab" data-bs-toggle="tab" data-bs-target="#pastasTableTab"
                type="button" role="tab" aria-controls="pastas" aria-selected="false">Pastas</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="snacks-tab" data-bs-toggle="tab" data-bs-target="#snacksTableTab"
                type="button" role="tab" aria-controls="snacks" aria-selected="false">Snacks</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="beverages-tab" data-bs-toggle="tab" data-bs-target="#beveragesTableTab"
                type="button" role="tab" aria-controls="beverages" aria-selected="false">Beverages</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="others-tab" data-bs-toggle="tab" data-bs-target="#othersTableTab"
                type="button" role="tab" aria-controls="others" aria-selected="false">Others</button>
        </li>
    </ul>

    <div class="row">
        <div class="col-8 container-fluid">
            <div class="tab-content" id="myTabContent">
                {{-- Cooked Meals Table --}}
                <div class="tab-pane fade show active" id="cookedMealsTableTab" role="tabpanel"
                    aria-labelledby="cookedMealsTableTab">
                    <div class="row">
                        <div align="left"><a href="javascript:void(0)" class="btn btn-success mb-2"
                                id="addMenuItemBtn"><i class="fas fa-cart-plus"></i>&nbsp;Add
                                Menu Item</a>
                        </div>
                        <div class="col-8">
                            <table class="table table-hover table-sm" id="cookedMealsTable">
                                <thead>
                                    <tr>
                                        <th>Menu ID</th>
                                        <th>Food ID</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Status</th>
                                        <th>Removed At</th>
                                        <th>Stock</th>
                                        <th>Pre-Orders</th>
                                        <th>Remaining</th>
                                        <th>Options</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                <tfoot>

                                </tfoot>
                            </table>
                        </div>


                    </div>
                </div>
                {{-- Pastas Table --}}
                <div class="tab-pane fade" id="pastasTableTab" role="tabpanel" aria-labelledby="pastasTableTab">
                    <div align="left"><a href="javascript:void(0)" class="btn btn-success mb-2"
                            id="addMenuItemBtn">Add
                            Pasta Meals</a>
                    </div>
                    <div class="col-8">
                        <table class="table table-hover table-sm" id="pastasTable">
                            <thead>
                                <tr>
                                    <th>Menu ID</th>
                                    <th>Food ID</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>Removed At</th>
                                    <th>Stock</th>
                                    <th>Pre-Orders</th>
                                    <th>Remaining</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot>

                            </tfoot>
                        </table>
                    </div>
                </div>
                {{-- Snacks Table --}}
                <div class="tab-pane fade" id="snacksTableTab" role="tabpanel" aria-labelledby="snacksTableTab">
                    <div align="left"><a href="javascript:void(0)" class="btn btn-success mb-2"
                            id="addMenuItemBtn">Add
                            a Snack</a>
                    </div>
                    <div class="col-8">
                        <table class="table table-hover table-sm" id="snacksTable">
                            <thead>
                                <tr>
                                    <th>Menu ID</th>
                                    <th>Food ID</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>Removed At</th>
                                    <th>Stock</th>
                                    <th>Pre-Orders</th>
                                    <th>Remaining</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot>

                            </tfoot>
                        </table>
                    </div>
                </div>
                {{-- Beverages Table --}}
                <div class="tab-pane fade" id="beveragesTableTab" role="tabpanel"
                    aria-labelledby="beveragesTableTab">
                    <div class="col-8">
                        <table class="table table-hover table-sm" id="beveragesTable">
                            <thead>
                                <tr>
                                    <th>Menu ID</th>
                                    <th>Food ID</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>Removed At</th>
                                    <th>Stock</th>
                                    <th>Pre-Orders</th>
                                    <th>Remaining</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot>

                            </tfoot>
                        </table>
                    </div>
                </div>
                {{-- Other Food Items Table --}}
                <div class="tab-pane fade" id="othersTableTab" role="tabpanel" aria-labelledby="othersTableTab">
                    <div class="col-8">
                        <table class="table table-hover table-sm" id="othersTable">
                            <thead>
                                <tr>
                                    <th>Menu ID</th>
                                    <th>Food ID</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>Removed At</th>
                                    <th>Stock</th>
                                    <th>Pre-Orders</th>
                                    <th>Remaining</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot>

                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4" id="previewCookedMeals">
            <div class="row">
                <div class="col-12">
                    <input type="text" name="foodID" id="foodID"
                        class="border border-gray-200 rounded p-2 w-full" disabled hidden>
                    <input type="text" name="menuID" id="menuID"
                        class="border border-gray-200 rounded p-2 w-full" disabled hidden>
                    <img alt="" id="imageFood" class="form-control" style="height: 300px; width: 100%;" />
                </div>
                <div class="col-8">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name"
                        class="border border-gray-200 rounded p-2 w-full" disabled>
                </div>
                <div class="col-4">
                    <label for="price">Price</label>
                    <input type="number" name="price" id="price"
                        class="border border-gray-200 rounded p-2 w-full" disabled>
                </div>
                <div class="col-3">
                    <label for="stock">Stock</label>
                    <input type="number" name="stock" id="stock"
                        class="border border-gray-200 rounded p-2 w-full" disabled>
                </div>
                <div class="col-3">
                    <label for="color">Grade Color</label>
                    <input type="text" name="color" id="color"
                        class="border border-gray-200 rounded p-2 w-full" disabled>
                </div>
                <div class="col-6">
                    <label for="admin">Updated by</label>
                    <input type="text" name="admin" id="admin"
                        class="border border-gray-200 rounded p-2 w-full" disabled>
                </div>
                <div class="col-12">
                    <label for="description">Description</label>
                    <input type="text" name="description" id="description"
                        class="border border-gray-200 rounded p-2 w-full" disabled>
                </div>
                <div class="col-4">
                    <label for="calcKcal">Serving Size</label>
                    <input type="number" name="calcKcal" id="servingSize"
                        class="border border-gray-200 rounded p-2 w-full" disabled>
                </div>
                <div class="col-4">
                    <label for="calcKcal">Calories (kcal)</label>
                    <input type="number" name="calcKcal" id="calcKcal"
                        class="border border-gray-200 rounded p-2 w-full" disabled>
                </div>
                <div class="col-4">
                    <label for="calcKcal">Food Grade</label>
                    <input type="number" name="calcKcal" id="grade"
                        class="border border-gray-200 rounded p-2 w-full" disabled>
                </div>
                <div class="col-3">
                    <label for="calcKcal">TotFat (g)</label>
                    <input type="number" name="calcKcal" id="calcTotFat"
                        class="border border-gray-200 rounded p-2 w-full" disabled>
                </div>
                <div class="col-3">
                    <label for="calcTotFat">SatFat (g)</label>
                    <input type="number" name="calcTotFat" id="calcSatFat"
                        class="border border-gray-200 rounded p-2 w-full" disabled>
                </div>
                <div class="col-3">
                    <label for="calcKcal">Sugar (g)</label>
                    <input type="number" name="calcKcal" id="calcSugar"
                        class="border border-gray-200 rounded p-2 w-full" disabled>
                </div>
                <div class="col-3">
                    <label for="calcKcal">Sodium (mg)</label>
                    <input type="number" name="calcKcal" id="calcSodium"
                        class="border border-gray-200 rounded p-2 w-full" disabled>
                </div>
                <div class="col-12">
                    <a id="updateFoodInfo" href="javascript:void(0)" style="background-color: gray; border: none;"
                        class="btn btn-info" role="link" aria-disabled="true" disabled>Edit Info</a>
                    <a class="btn btn-primary" id="updatePreviewMenuStock" disabled><i
                            class="fas fa-plus"></i>&nbsp;Add Stock</a>
                    <a class="btn btn-warning" id="updatePreviewMenuDate" disabled><i
                            class="fas fa-calendar-alt"></i>&nbsp;Update Date</a>
                    <a class="btn btn-danger" id="removePreviewMenu" disabled><i
                            class="fas fa-minus-circle"></i>&nbsp;Remove</a>
                </div>
            </div>
        </div>
    </div>


    {{-- Preview Section --}}


    {{-- Add Menu Item Modal --}}
    <div class="modal fade" id="addMenuModal" tabindex="-1" aria-labelledby="addMenuModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="h4 modal-title" id="addMenuModalLabel">Add Menu Item</p>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="#addMenuForm">
                        @csrf
                        {{-- Name --}}
                        <div class="row mb-3 form-group">
                            <label for="nameAddMenu" class="col-sm-2 form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="nameAddMenu" id="nameAddMenu" class="form-control">
                            </div>
                        </div>
                        {{-- Existing Stock Readonly --}}
                        <div class="mb-3 row form-group">
                            <label for="stockAddMenu" class="form-label col-2">Stock</label>
                            <div class="col">
                                <input type="text" name="stockAddMenu" id="stockAddMenu"
                                    class="form-control-plaintext" disabled readonly>
                            </div>
                        </div>
                        {{-- Add Stock Confirmation --}}
                        <div class="row">
                            <div class="col-6">
                                <label for="addStockGroup">Add Stock?</label>
                                <div class="input-group" id="addStockGroup">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="addStock"
                                            id="addStockYes" value="option1">
                                        <label class="form-check-label" for="addStockYes">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label" for="addStockNo">No</label>
                                        <input class="form-check-input" type="radio" name="addStock"
                                            id="addStockNo" value="option2" checked>
                                    </div>
                                </div>
                            </div>
                            {{-- Quantity of Added Stock --}}
                            <div class="col-6">
                                <div class="mb-3 form-group">
                                    <label for="addMenuAddStock mb-3">How many?</label>
                                    <input type="number" name="addMenuAddStock" id="addMenuAddStock"
                                        class="border border-gray-200 rounded p-2 w-full form-control" disabled>
                                </div>
                            </div>
                        </div>
                        {{-- Status --}}
                        <div class="mb-3 row">
                            <label for="statusGroup">Status</label>
                            <div class="input-group" id="statusGroup">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status"
                                        id="statusPermanent" value="0" checked>
                                    <label class="form-check-label" for="status">Permanent</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status"
                                        id="statusTemporary" value="1">
                                    <label class="form-check-label" for="status">Temporary</label>
                                </div>
                            </div>
                        </div>
                        {{-- Temporary Date Options --}}
                        <div class="row">
                            {{-- Displayed At --}}
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="displayedAt">Displayed at</label>
                                    <input type="date" name="displayed_at" id="displayedAt"
                                        class="border border-gray-200 rounded p-2 w-full form-control" disabled>
                                </div>
                            </div>
                            {{-- Removed At --}}
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="removedAt">Removed at</label>
                                    <input type="date" name="removed_at" id="removedAt"
                                        class="border border-gray-200 rounded p-2 w-full form-control" disabled>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="bg-primary text-white rounded py-2 px-4 hover:bg-black"
                        id="addMenuClearBtn">Clear Fields</button>
                    <button type="button" class="btn btn-primary" id="submitMenuItemBtn">Add</button>
                </div>
            </div>
        </div>
    </div>

    {{-- Update Menu Item Modal --}}
    <div class="modal fade" id="updateMenuModal" tabindex="-1" aria-labelledby="updateMenuModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="h4 modal-title" id="updateMenuModalLabel"></p>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="#updateMenuForm">
                        @csrf
                        {{-- Name --}}
                        <div class="row mb-3 form-group">
                            <label for="nameUpdateMenu" class="col-sm-2 form-label">Name</label>
                            <input type="text" name="idUpdateMenu" id="idUpdateMenu" class="form-control" hidden>
                            <div class="col-sm-10">
                                <input type="text" name="nameUpdateMenu" id="nameUpdateMenu"
                                    class="form-control">
                            </div>
                        </div>
                        {{-- Existing Stock Readonly --}}
                        <div class="mb-3 row form-group">
                            <label for="stockUpdateMenu" class="form-label col-2">Stock</label>
                            <div class="col">
                                <input type="text" name="stockUpdateMenu" id="stockUpdateMenu"
                                    class="form-control-plaintext" disabled readonly>
                            </div>
                        </div>
                        {{-- Add Stock Confirmation --}}
                        <div class="row">
                            <div class="col-6">
                                <label for="addStockGroup">Add Stock?</label>
                                <div class="input-group" id="addStockGroup">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="addStock"
                                            id="addStockUpdateYes" value="option1">
                                        <label class="form-check-label" for="addStockUpdateYes">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label" for="addStockUpdateNo">No</label>
                                        <input class="form-check-input" type="radio" name="addStock"
                                            id="addStockUpdateNo" value="option2" checked>
                                    </div>
                                </div>
                            </div>
                            {{-- Quantity of Added Stock --}}
                            <div class="col-6">
                                <div class="mb-3 form-group">
                                    <label for="updateMenuAddStock mb-3">How many?</label>
                                    <input type="number" name="updateMenuAddStock" id="updateMenuAddStock"
                                        class="border border-gray-200 rounded p-2 w-full form-control" disabled>
                                </div>
                            </div>
                        </div>
                        {{-- Status --}}
                        <div class="mb-3 row">
                            <label for="statusGroup">Status</label>
                            <div class="input-group" id="statusGroup">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="statusUpdate"
                                        id="statusUpdatePermanent" value="0">
                                    <label class="form-check-label" for="statusUpdatePermanent">Permanent</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="statusUpdate"
                                        id="statusUpdateTemporary" value="1">
                                    <label class="form-check-label" for="statusUpdateTemporary">Temporary</label>
                                </div>
                            </div>
                        </div>
                        {{-- Current Temporary Date Options --}}
                        <div class="row">
                            <label for="">Current Date Range</label>
                            {{-- Displayed At --}}
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="currentDisplayedAt">Displayed at</label>
                                    <input type="date" name="currentDisplayedAt" id="currentDisplayedAt"
                                        class="border border-gray-200 rounded p-2 w-full form-control" disabled>
                                </div>
                            </div>
                            {{-- Removed At --}}
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="currentRemovedAt">Removed at</label>
                                    <input type="date" name="currentRemovedAt" id="currentRemovedAt"
                                        class="border border-gray-200 rounded p-2 w-full form-control" disabled>
                                </div>
                            </div>
                        </div>
                        {{-- Add Stock Confirmation --}}
                        <div class="row">
                            <div class="col-6">
                                <label for="updateDateGroup">Change Date Range?</label>
                                <div class="input-group" id="updateDateGroup">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="updateDate"
                                            id="updateDateYes" value="option1">
                                        <label class="form-check-label" for="updateDateYes">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label" for="updateDateNo">No</label>
                                        <input class="form-check-input" type="radio" name="updateDate"
                                            id="updateDateNo" value="option2" checked>
                                    </div>
                                </div>
                            </div>
                            {{-- New Temporary Date Options --}}
                            <div class="row">
                                {{-- Displayed At --}}
                                <label for="">New Date Range</label>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="updateDisplayedAt">Displayed at</label>
                                        <input type="date" name="updateDisplayedAt" id="updateDisplayedAt"
                                            class="border border-gray-200 rounded p-2 w-full form-control" disabled>
                                    </div>
                                </div>
                                {{-- Removed At --}}
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="updateRemovedAt">Removed at</label>
                                        <input type="date" name="updateRemovedAt" id="updateRemovedAt"
                                            class="border border-gray-200 rounded p-2 w-full form-control" disabled>
                                    </div>
                                </div>
                            </div>
                    </form>
                </div>
                <div class="modal-footer">
                    {{-- <button type="button" class="bg-primary text-white rounded py-2 px-4 hover:bg-black"
                        id="addMenuClearBtn">Clear Fields</button> --}}
                    <button type="button" class="btn btn-success" id="submitUpdateMenuItemBtn">Update</button>
                </div>
            </div>
        </div>
    </div>

    {{-- Stock Modal --}}
    {{-- <div class="modal fade" id="stockModal" tabindex="-1" aria-labelledby="stockModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="stockModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="">
                        @csrf
                        <div class="row mb-3">
                            <label for="existingStockModal" class="col-sm-3">Existing Stock</label>
                            <input type="number" name="existingStockModal" id="existingStockModal"
                                class="border border-gray-200 rounded p-2 col-sm-9" readonly>
                        </div>
                        <div class="row">
                            <label for="additionalStockModal" class="col-sm-3">How many?</label>
                            <input type="number" name="additionalStock" id="additionalStock"
                                class="border border-gray-200 rounded p-2 col-sm-9 form-control">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="addStockBtn">Add</button>
                </div>
            </div>
        </div>
    </div> --}}


    {{-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
    {{-- DataTable Resources Scripts --}}
    @include('partials.admin._DataTableScripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
</x-admin.layout>
<script>
    // Autocomplete search for Food Items in the Menu
    $('#nameAddMenu').typeahead({
        hint: true,
        highlight: true,
        minLength: 1,
        items: 5,
        source: function(query, process) {
            return $.get("{{ url('/autocomplete-search-foods') }}", {
                query: query
            }, function(data) {
                return process(data);
            });
        },
        updater: function(item) {
            $.get("{{ url('admin/menu/') }}" + '/' + item.name + '/getCurrentStock', function(data) {
                $('#stockAddMenu').val(data);
            });
            return item;
        }
    });

    // DataTables
    $(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        // Cooked Meals Table in the Menu
        var cookedMealsTable = $('#cookedMealsTable').DataTable({
            lengthMenu: [
                [10, 15, 20, 25, 30],
                [10, 15, 20, 25, 30]
            ],
            processing: true,
            serverSide: true,
            ajax: {
                type: "GET",
                url: "{{ route('menu.indexAdmin') }}",
            },
            // Footer Sorting
            initComplete: function() {

            },
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'food.id',
                    name: 'food.id'
                },
                {
                    data: 'food.name',
                    name: 'food.name'
                },
                {
                    data: 'food.price',
                    name: 'food.price'
                },
                {
                    data: 'status',
                    name: 'status',
                    render: function(data, type, row) {
                        return data == 1 ? 'Temporary' : 'Permanent';
                    }
                },
                {
                    data: 'removed_at',
                    name: 'removed_at',
                },

                {
                    data: 'prevStock',
                    name: 'prevStock'
                },
                {
                    data: 'count',
                    name: 'count'
                },
                {
                    data: 'food.stock',
                    name: 'food.stock',
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                }
            ],
            columnDefs: [{
                    target: 0,
                    visible: false
                },
                {
                    target: 1,
                    visible: false
                }
            ]
        });

        // Pasta Meals Table in the Menu
        var pastasTable = $('#pastasTable').DataTable({
            lengthMenu: [
                [10, 15, 20, 25, 30],
                [10, 15, 20, 25, 30]
            ],
            processing: true,
            serverSide: true,
            ajax: {
                type: "GET",
                url: "{{ route('menu.pastas') }}",
            },
            // Footer Sorting
            initComplete: function() {

            },
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'food.id',
                    name: 'food.id'
                },
                {
                    data: 'food.name',
                    name: 'food.name'
                },
                {
                    data: 'food.price',
                    name: 'food.price'
                },
                {
                    data: 'status',
                    name: 'status',
                    render: function(data, type, row) {
                        return data == 1 ? 'Temporary' : 'Permanent';
                    }
                },
                {
                    data: 'removed_at',
                    name: 'removed_at',
                },

                {
                    data: 'prevStock',
                    name: 'prevStock'
                },
                {
                    data: 'count',
                    name: 'count'
                },
                {
                    data: 'food.stock',
                    name: 'food.stock',
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                }
            ],
            columnDefs: [{
                    target: 0,
                    visible: false
                },
                {
                    target: 1,
                    visible: false
                }
            ]
        });
        // Snack Meals Table in the Menu
        var snacksTable = $('#snacksTable').DataTable({
            lengthMenu: [
                [10, 15, 20, 25, 30],
                [10, 15, 20, 25, 30]
            ],
            processing: true,
            serverSide: true,
            ajax: {
                type: "GET",
                url: "{{ route('menu.snacks') }}",
            },
            // Footer Sorting
            initComplete: function() {

            },
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'food.id',
                    name: 'food.id'
                },
                {
                    data: 'food.name',
                    name: 'food.name'
                },
                {
                    data: 'food.price',
                    name: 'food.price'
                },
                {
                    data: 'status',
                    name: 'status',
                    render: function(data, type, row) {
                        return data == 1 ? 'Temporary' : 'Permanent';
                    }
                },
                {
                    data: 'removed_at',
                    name: 'removed_at',
                },

                {
                    data: 'prevStock',
                    name: 'prevStock'
                },
                {
                    data: 'count',
                    name: 'count'
                },
                {
                    data: 'food.stock',
                    name: 'food.stock',
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                }
            ],
            columnDefs: [{
                    target: 0,
                    visible: false
                },
                {
                    target: 1,
                    visible: false
                }
            ]
        });
        // Beverages Table in the Menu
        var beveragesTable = $('#beveragesTable').DataTable({
            lengthMenu: [
                [10, 15, 20, 25, 30],
                [10, 15, 20, 25, 30]
            ],
            processing: true,
            serverSide: true,
            ajax: {
                type: "GET",
                url: "{{ route('menu.beverages') }}",
            },
            // Footer Sorting
            initComplete: function() {

            },
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'food.id',
                    name: 'food.id'
                },
                {
                    data: 'food.name',
                    name: 'food.name'
                },
                {
                    data: 'food.price',
                    name: 'food.price'
                },
                {
                    data: 'status',
                    name: 'status',
                    render: function(data, type, row) {
                        return data == 1 ? 'Temporary' : 'Permanent';
                    }
                },
                {
                    data: 'removed_at',
                    name: 'removed_at',
                },

                {
                    data: 'prevStock',
                    name: 'prevStock'
                },
                {
                    data: 'count',
                    name: 'count'
                },
                {
                    data: 'food.stock',
                    name: 'food.stock',
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                }
            ],
            columnDefs: [{
                    target: 0,
                    visible: false
                },
                {
                    target: 1,
                    visible: false
                }
            ]
        });
        // Other Food Items in the Menu
        var othersTable = $('#othersTable').DataTable({
            lengthMenu: [
                [10, 15, 20, 25, 30],
                [10, 15, 20, 25, 30]
            ],
            processing: true,
            serverSide: true,
            ajax: {
                type: "GET",
                url: "{{ route('menu.others') }}",
            },
            // Footer Sorting
            initComplete: function() {

            },
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'food.id',
                    name: 'food.id'
                },
                {
                    data: 'food.name',
                    name: 'food.name'
                },
                {
                    data: 'food.price',
                    name: 'food.price'
                },
                {
                    data: 'status',
                    name: 'status',
                    render: function(data, type, row) {
                        return data == 1 ? 'Temporary' : 'Permanent';
                    }
                },
                {
                    data: 'removed_at',
                    name: 'removed_at',
                },

                {
                    data: 'prevStock',
                    name: 'prevStock'
                },
                {
                    data: 'count',
                    name: 'count'
                },
                {
                    data: 'food.stock',
                    name: 'food.stock',
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                }
            ],
            columnDefs: [{
                    target: 0,
                    visible: false
                },
                {
                    target: 1,
                    visible: false
                }
            ]
        });

        // DataTable Buttons
        // Update Menu Item Details Modal
        $('body').on('click', '#editMenuItemDetailsDTBtn', function() {
            var id = $(this).data('id');
            $.get("{{ url('admin/menu/') }}" + '/' + id + '/getMenuItemDetails', function(data) {
                $('#updateMenuModalLabel').text('Update Menu Details of ' + data.food.name);
                $('#idUpdateMenu').val(data.id);
                $('#nameUpdateMenu').val(data.food.name);
                $('#stockUpdateMenu').val(data.food.stock);

                if (data.status == 1) {
                    $('#currentDisplayedAt').val(data.displayed_at);
                    $('#currentRemovedAt').val(data.removed_at);
                    $("#statusUpdatePermanent").prop("checked", false);
                    $("#statusUpdateTemporary").prop("checked", true);
                    $('#updateDateYes').prop("checked", false);
                    $('#updateDateNo').prop("checked", false);
                } else {
                    $("#statusUpdatePermanent").prop("checked", true);
                    $("#statusUpdateTemporary").prop("checked", false);
                }
                $('#updateMenuModal').modal('show');
            })
        });
        $('#updateMenuModal').on("click", function() {
            // - Add Stock if wanted
            if ($('#addStockUpdateNo').is(':checked')) {
                $('#updateMenuAddStock').prop('disabled', true);
            } else {
                $('#updateMenuAddStock').prop('disabled', false);
            }
            // - Status is selected
            if ($('#statusUpdatePermanent').is(':checked')) {
                $('#updateDisplayedAt').prop('disabled', true);
                $('#updateRemovedAt').prop('disabled', true);
                $('#updateDateYes').prop("checked", false);
                $('#updateDateNo').prop("checked", false);
            } else {
                // If user want to change date
                if ($('#updateDateNo').is(':checked')) {
                    $('#updateDisplayedAt').prop('disabled', true);
                    $('#updateRemovedAt').prop('disabled', true);
                } else {
                    $('#updateDisplayedAt').prop('disabled', false);
                    $('#updateRemovedAt').prop('disabled', false);
                }
            }
        });
        // Submit Updated Menu Item Details
        $('#updateMenuModal').on('click', '#submitUpdateMenuItemBtn', function(e) {
            e.preventDefault();
            let id = $('#idUpdateMenu').val();
            let addedStock = $('#updateMenuAddStock').val();
            let status = $('input[name="statusUpdate"]:checked').val();
            let displayed_at = $('#updateDisplayedAt').val();
            let removed_at = $('#updateRemovedAt').val();

            $.ajax({
                type: "POST",
                url: "{{ route('menu.updateMenuItem') }}",
                data: {
                    id: id,
                    status: status,
                    addedStock: addedStock,
                    displayed_at: displayed_at,
                    removed_at: removed_at
                },
                success: function(response) {
                    cookedMealsTable.ajax.reload();
                    snacksTable.ajax.reload();
                    beveragesTable.ajax.reload();
                    othersTable.ajax.reload();
                    $('#updateMenuModal').modal('hide');
                    $('#updateMenuModal form')[0].reset();
                    console.log(response);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });




        // --- ADD MENU ITEM MODAL ---
        // Show Menu Item Modal
        $('body').on('click', '#addMenuItemBtn', function() {
            $('#addMenuModal').modal('show');
        });
        // Add Menu Modal Conditions
        $('#addMenuModal').on("click", function() {
            // - Add Stock if wanted
            if ($('#addStockNo').is(':checked')) {
                $('#addMenuAddStock').prop('disabled', true);
            } else {
                $('#addMenuAddStock').prop('disabled', false);
            }
            // - Status is selected
            if ($('#statusPermanent').is(':checked')) {
                $('#displayedAt').prop('disabled', true);
                $('#removedAt').prop('disabled', true);
            } else {
                $('#displayedAt').prop('disabled', false);
                $('#removedAt').prop('disabled', false);
            }
        });
        // - Clear Button
        $('body').on('click', '#addMenuClearBtn', function(e) {
            e.preventDefault();
            $('#stockAddMenu').val('');
            $('#nameAddMenu').val('');
            $('#displayedAt').val('');
            $('#removedAt').val('');
            $('#addMenuAddStock').val('')
            $("input:radio[name='addStock']").prop('checked', false);
            $("input:radio[name='status']").prop('checked', false);
            $('#displayedAt').prop('disabled', true);
            $('#removedAt').prop('disabled', true);
            $('#addMenuAddStock').prop('disabled', true);
        });
        // Submit New Menu Item in Modal
        $('#addMenuModal').on('click', '#submitMenuItemBtn', function(e) {
            e.preventDefault();
            let name = $('#nameAddMenu').val()
            let addedStock = $('#addMenuAddStock').val();
            let menuStatus = $('input[name="status"]:checked').val();
            let displayed_at = $('#displayedAt').val();
            let removed_at = $('#removedAt').val();
            $.ajax({
                type: "POST",
                url: "{{ route('menu.addMenuItem') }}",
                data: {
                    name: name,
                    addedStock: addedStock,
                    menuStatus: menuStatus,
                    displayed_at: displayed_at,
                    removed_at: removed_at
                },
                success: function(response) {
                    cookedMealsTable.ajax.reload();
                    snacksTable.ajax.reload();
                    beveragesTable.ajax.reload();
                    othersTable.ajax.reload();
                    $('#addMenuModal').modal('hide');
                    $('#addMenuModal form')[0].reset();
                    console.log(response);
                    Swal.fire(
                        'Food Item Added in the Menu'
                    );
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });

        // Preview Section
        // Cooked Meals
        $('#cookedMealsTable').on('click', 'tr', function() {
            // var id = table.row(this).id();
            var id = cookedMealsTable.row(this).data().id;
            $.get("{{ url('admin/menu/') }}" + '/' + id + '/preview', function(data) {
                if (data.image != null) {
                    $('#imageFood').attr('src', "{{ asset('storage/') }}" + '/' + data.image);
                } else {
                    console.log('No Image');
                }
                $('#menuID').val(id);
                $('#foodID').val(data.id);
                $('#name').val(data.name);
                $('#description').val(data.description);
                $('#price').val(data.price);
                $('#stock').val(data.stock);
                $('#servingSize').val(data.servingSize);
                $('#calcKcal').val(data.calcKcal);
                $('#calcTotFat').val(data.calcTotFat);
                $('#calcSatFat').val(data.calcSatFat);
                $('#calcSugar').val(data.calcSugar);
                $('#calcSodium').val(data.calcSodium);
                $('#grade').val(data.grade);
                let color;
                if (data.grade <= 0) {
                    color = 'gray';
                } else if (data.grade <= 6) {
                    color = 'green';
                } else if (data.grade <= 9) {
                    color = 'amber';
                } else if (data.grade <= 12) {
                    color = 'red';
                } else {
                    color = 'gray';
                }
                $('#color').val(color);

                // <a id="updateFoodInfo" href="javascript:void(0)" style="background-color: gray; border: none;" class="btn btn-info" role="link" aria-disabled="true">Edit Information</a>
                $('#updatePreviewMenuStock').prop('disabled', false);
                $('#updatePreviewMenuDate').prop('disabled', false);
                $('#removePreviewMenu').prop('disabled', false);
                $('#updateFoodInfo').removeAttr('style');
                $('#updateFoodInfo').prop('href', "{{ url('admin/foods/') }}" + '/' + data.id +
                    '/edit');

                // $('#stockUpdate').val(data.stock);
            })
        });
        // Pastas
        $('#pastasTable').on('click', 'tr', function() {
            // var id = table.row(this).id();
            var id = pastasTable.row(this).data().id;
            $.get("{{ url('admin/menu/') }}" + '/' + id + '/preview', function(data) {
                if (data.image != null) {
                    $('#imageFood').attr('src', "{{ asset('storage/') }}" + '/' + data.image);
                } else {
                    console.log('No Image');
                }
                $('#menuID').val(id);
                $('#foodID').val(data.id);
                $('#name').val(data.name);
                $('#description').val(data.description);
                $('#price').val(data.price);
                $('#stock').val(data.stock);
                $('#servingSize').val(data.servingSize);
                $('#calcKcal').val(data.calcKcal);
                $('#calcTotFat').val(data.calcTotFat);
                $('#calcSatFat').val(data.calcSatFat);
                $('#calcSugar').val(data.calcSugar);
                $('#calcSodium').val(data.calcSodium);
                $('#grade').val(data.grade);
                let color;
                if (data.grade <= 0) {
                    color = 'gray';
                } else if (data.grade <= 6) {
                    color = 'green';
                } else if (data.grade <= 9) {
                    color = 'amber';
                } else if (data.grade <= 12) {
                    color = 'red';
                } else {
                    color = 'gray';
                }
                $('#color').val(color);

                // <a id="updateFoodInfo" href="javascript:void(0)" style="background-color: gray; border: none;" class="btn btn-info" role="link" aria-disabled="true">Edit Information</a>
                $('#updatePreviewMenuStock').prop('disabled', false);
                $('#updatePreviewMenuDate').prop('disabled', false);
                $('#removePreviewMenu').prop('disabled', false);
                $('#updateFoodInfo').removeAttr('style');
                $('#updateFoodInfo').prop('href', "{{ url('admin/foods/') }}" + '/' + data.id +
                    '/edit');

                // $('#stockUpdate').val(data.stock);
            })
        });
        // Snacks
        $('#snacksTable').on('click', 'tr', function() {
            // var id = table.row(this).id();
            var id = snacksTable.row(this).data().id;
            $.get("{{ url('admin/menu/') }}" + '/' + id + '/preview', function(data) {
                if (data.image != null) {
                    $('#imageFood').attr('src', "{{ asset('storage/') }}" + '/' + data.image);
                } else {
                    console.log('No Image');
                }
                $('#menuID').val(id);
                $('#foodID').val(data.id);
                $('#name').val(data.name);
                $('#description').val(data.description);
                $('#price').val(data.price);
                $('#stock').val(data.stock);
                $('#servingSize').val(data.servingSize);
                $('#calcKcal').val(data.calcKcal);
                $('#calcTotFat').val(data.calcTotFat);
                $('#calcSatFat').val(data.calcSatFat);
                $('#calcSugar').val(data.calcSugar);
                $('#calcSodium').val(data.calcSodium);
                $('#grade').val(data.grade);
                let color;
                if (data.grade <= 0) {
                    color = 'gray';
                } else if (data.grade <= 6) {
                    color = 'green';
                } else if (data.grade <= 9) {
                    color = 'amber';
                } else if (data.grade <= 12) {
                    color = 'red';
                } else {
                    color = 'gray';
                }
                $('#color').val(color);

                // <a id="updateFoodInfo" href="javascript:void(0)" style="background-color: gray; border: none;" class="btn btn-info" role="link" aria-disabled="true">Edit Information</a>
                $('#updatePreviewMenuStock').prop('disabled', false);
                $('#updatePreviewMenuDate').prop('disabled', false);
                $('#removePreviewMenu').prop('disabled', false);
                $('#updateFoodInfo').removeAttr('style');
                $('#updateFoodInfo').prop('href', "{{ url('admin/foods/') }}" + '/' + data.id +
                    '/edit');

                // $('#stockUpdate').val(data.stock);
            })
        });
        // Beverages
        $('#beveragesTable').on('click', 'tr', function() {
            // var id = table.row(this).id();
            var id = beveragesTable.row(this).data().id;
            $.get("{{ url('admin/menu/') }}" + '/' + id + '/preview', function(data) {
                if (data.image != null) {
                    $('#imageFood').attr('src', "{{ asset('storage/') }}" + '/' + data.image);
                } else {
                    console.log('No Image');
                }
                $('#menuID').val(id);
                $('#foodID').val(data.id);
                $('#name').val(data.name);
                $('#description').val(data.description);
                $('#price').val(data.price);
                $('#stock').val(data.stock);
                $('#servingSize').val(data.servingSize);
                $('#calcKcal').val(data.calcKcal);
                $('#calcTotFat').val(data.calcTotFat);
                $('#calcSatFat').val(data.calcSatFat);
                $('#calcSugar').val(data.calcSugar);
                $('#calcSodium').val(data.calcSodium);
                $('#grade').val(data.grade);
                let color;
                if (data.grade <= 0) {
                    color = 'gray';
                } else if (data.grade <= 6) {
                    color = 'green';
                } else if (data.grade <= 9) {
                    color = 'amber';
                } else if (data.grade <= 12) {
                    color = 'red';
                } else {
                    color = 'gray';
                }
                $('#color').val(color);

                // <a id="updateFoodInfo" href="javascript:void(0)" style="background-color: gray; border: none;" class="btn btn-info" role="link" aria-disabled="true">Edit Information</a>
                $('#updatePreviewMenuStock').prop('disabled', false);
                $('#updatePreviewMenuDate').prop('disabled', false);
                $('#removePreviewMenu').prop('disabled', false);
                $('#updateFoodInfo').removeAttr('style');
                $('#updateFoodInfo').prop('href', "{{ url('admin/foods/') }}" + '/' + data.id +
                    '/edit');

                // $('#stockUpdate').val(data.stock);
            })
        });
        // Others
        $('#othersTable').on('click', 'tr', function() {
            // var id = table.row(this).id();
            var id = othersTable.row(this).data().id;
            $.get("{{ url('admin/menu/') }}" + '/' + id + '/preview', function(data) {
                if (data.image != null) {
                    $('#imageFood').attr('src', "{{ asset('storage/') }}" + '/' + data.image);
                } else {
                    console.log('No Image');
                }
                $('#menuID').val(id);
                $('#foodID').val(data.id);
                $('#name').val(data.name);
                $('#description').val(data.description);
                $('#price').val(data.price);
                $('#stock').val(data.stock);
                $('#servingSize').val(data.servingSize);
                $('#calcKcal').val(data.calcKcal);
                $('#calcTotFat').val(data.calcTotFat);
                $('#calcSatFat').val(data.calcSatFat);
                $('#calcSugar').val(data.calcSugar);
                $('#calcSodium').val(data.calcSodium);
                $('#grade').val(data.grade);
                let color;
                if (data.grade <= 0) {
                    color = 'gray';
                } else if (data.grade <= 6) {
                    color = 'green';
                } else if (data.grade <= 9) {
                    color = 'amber';
                } else if (data.grade <= 12) {
                    color = 'red';
                } else {
                    color = 'gray';
                }
                $('#color').val(color);

                // <a id="updateFoodInfo" href="javascript:void(0)" style="background-color: gray; border: none;" class="btn btn-info" role="link" aria-disabled="true">Edit Information</a>
                $('#updatePreviewMenuStock').prop('disabled', false);
                $('#updatePreviewMenuDate').prop('disabled', false);
                $('#removePreviewMenu').prop('disabled', false);
                $('#updateFoodInfo').removeAttr('style');
                $('#updateFoodInfo').prop('href', "{{ url('admin/foods/') }}" + '/' + data.id +
                    '/edit');

                // $('#stockUpdate').val(data.stock);
            })
        });



        // Show Add Stock Modal
        $('body').on('click', '#updatePreviewMenuStock', function() {
            console.log('pasok stock modal');
            $('#stockModalLabel').text('Add Additional Stocks to ' + $('#name').val());
            $('#existingStockModal').val($('#stock').val());
            $('#stockModal').modal('show');
        });
        // SubmitStock Modal
        $('#stockModal').on('click', '#addStockBtn', function(e) {
            console.log('pasok');
            e.preventDefault();
            let name = $('#name').val();
            let additionalStock = $('#additionalStock').val();
            $.ajax({
                type: "POST",
                url: "{{ route('menu.addAdditionalStock') }}",
                data: {
                    name: name,
                    additionalStock: additionalStock
                },
                success: function(response) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Stock Added',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    cookedMealsTable.ajax.reload();
                    pastasTable.ajax.reload();
                    snacksTable.ajax.reload();
                    beveragesTable.ajax.reload();
                    othersTable.ajax.reload();
                    $('#stockModal').modal('hide');
                    $('#stockModal form')[0].reset();
                    console.log(response);

                },
                error: function(error) {
                    console.log(error);
                }
            });
        });

        $('body').on('click', '#updatePreviewMenuDate', function() {
            var id = $('#menuID').val();
            $.get("{{ url('admin/menu/') }}" + '/' + id + '/getMenuItemDetails', function(data) {
                // $('#updateDateModalLabel').text('Update date range of ' + $('#name').val());
                if (data.status == 1) {
                    $('#prevDisplayedAt').val(data.displayed_at);
                    $('#prevRemovedAt').val(data.removed_at);
                    $('#updateDateModal').modal('show');
                } else {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'warning',
                        title: 'Menu is permanent',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }

            })
        });
        // Update Date Range in Update Date Modal
        $('#updateDateModal').on('click', '#updateMenuDateRangeBtn', function() {
            var id = $('#menuID').val();
            var newDisplayedAt = $('#newDisplayedAt').val();
            var newRemovedAt = $('#newRemovedAt').val();
            $.ajax({
                type: "POST",
                url: "{{ route('menu.updateMenuDateRange') }}",
                data: {
                    id: id,
                    newDisplayedAt: newDisplayedAt,
                    newRemovedAt: newRemovedAt
                },
                success: function(response) {
                    console.log('success');
                    cookedMealsTable.ajax.reload();
                    snacksTable.ajax.reload();
                    beveragesTable.ajax.reload();
                    othersTable.ajax.reload();
                    $('#updateDateModal').modal('hide');
                    $('#updateDateModal form')[0].reset();
                    console.log(response);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        })



        // Highlight Values in Table
        // $('#foodTable tbody').on('mouseenter', 'td', function() {
        //     var colIdx = table.cell(this).index().column;

        //     $(table.cells().nodes()).removeClass('highlight');
        //     $(table.column(colIdx).nodes()).addClass('highlight');
        // });
        // View Food Data Modal
        // $('body').on('click', '.viewFood', function() {
        //     var foodID = $(this).data('id');
        //     $.get("{{ url('admin/foods/') }}" + '/' + foodID + '/view', function(data) {
        //         $('#viewFoodInfoModal').modal('show');
        //         $('#name').text(data.name);
        //         $('#description').text(data.description);
        //         $('#servingSize').text(data.servingSize);
        //         $('#calcKcal').text(data.calcKcal);
        //         $('#calcTotFat').text(data.calcTotFat);
        //         $('#calcSatFat').text(data.calcSatFat);
        //         $('#calcSugar').text(data.calcSugar);
        //         $('#calcSodium').text(data.calcSodium);
        //         $('#grade').text(data.grade);
        //         $('#created_at').text(data.created_at);
        //         $('#updated_at').text(data.updated_at);
        //         $('#user_id').text(data.user_id);
        //     })
        // });
        // View Food Image Modal
        // $('body').on('click', '.viewFoodImg', function() {
        //     var foodID = $(this).data('id');
        //     $.get("{{ url('admin/foods/') }}" + '/' + foodID + '/view', function(data) {
        //         $('#imageName').text(data.name);
        //         $('#imageFood').attr('src', "{{ url('storage/') }}" + '/' + data.image);
        //         $('#viewFoodImgModal').modal('show');
        //     })
        // });
    });

    // - Add Menu Item
</script>
