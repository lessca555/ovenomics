<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profitability</title>

    {{-- link --}}
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet" href="css/Styles.css">
    <script src="js/profitability.js" defer></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet">
</head>
<body>
    <section id="header">
        @include('livewire.layouts.nav2')
    </section>

    <section id="count" class="container -ml-3 -mr-3">
        <h2>Profitability</h2>
    </section>

    <section class="container -ml-3 -mr-3">
        <div class="table-responsive">
            <table id="profitabilityTable" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Recipe</th>
                        <th>Quantity Sold</th>
                        <th>Selling Price</th>
                        <th>Total Cost</th>
                        <th>Gross Margin</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    <tr id="noDataRow">
                        <td colspan="6">No data available</td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr id="grandTotalRow" style="display: none;">
                        <td colspan="3" style="text-align: right;"><strong>Grand Total:</strong></td>
                        <td id="grandTotalCost">0.00</td>
                        <td id="grandTotalMargin">0.00</td>
                        <td></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </section>

    <section class="container -ml-3 -mr-3">
        <div class="mb-3" style="position: relative;">
            <label for="recipe">Recipe:</label>
            <select id="recipe" class="form-control">
                <option value="">Select Recipe</option>
                @foreach($recipes as $recipe)
                    <option value="{{ $recipe->id }}" data-cost="{{ $recipe->cost_price }}" data-selling-price="{{ $recipe->selling_price }}">{{ $recipe->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="quantity">Quantity Sold:</label>
            <input type="number" id="quantity" class="form-control">
        </div>
        <button id="addButton" class="btn btn-primary">Add</button>
    </section>
    <section class="container -ml-3 -mr-3">
        <div id="doneButton" data-action-url="{{ route('report') }}" class="btn btn-success" style="float: right; margin-top: 10px; display: none;">Done</div>
    </section>

    <footer>
        <span>Created By Ovenomics</a> | <span class="far fa-copyright"></span> 2024 All rights reserved.</span>
    </footer>
</body>
</html>
