<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profitability Report</title>

    {{-- css link --}}
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet" href="/css/Styles.css">
</head>
<body>
    <section id="header">
        <nav class="navbar">
            <h4>Ovenomics</h4>
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="">About</a></li>
                <li><a href="/dashboard">Dashboard</a></li>
                <li><a href="">User</a></li>
            </ul>
        </nav>
    </section>

    <section id="count" class="container -ml-3 -mr-3">
        <h2>Profitability Report</h2>
    </section>

    <section class="container -ml-3 -mr-3">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Recipe</th>
                        <th>Quantity Sold</th>
                        <th>Selling Price</th>
                        <th>Total Cost</th>
                        <th>Gross Margin</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $totalCost = 0;
                        $totalMargin = 0;
                    @endphp
                    @foreach($tableData as $row)
                        <tr>
                            <td>{{ $row['recipe'] }}</td>
                            <td>{{ $row['quantity'] }}</td>
                            <td>{{ $row['sellingPrice'] }}</td>
                            <td>{{ $row['totalCost'] }}</td>
                            <td>{{ $row['grossMargin'] }}</td>
                        </tr>
                        @php
                            $totalCost += $row['totalCost'];
                            $totalMargin += $row['grossMargin'];
                        @endphp
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3" style="text-align: right;"><strong>Grand Total:</strong></td>
                        <td>{{ number_format($totalCost, 2) }}</td>
                        <td>{{ number_format($totalMargin, 2) }}</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </section>

    <footer>
        <span>Created By Ovenomics</a> | <span class="far fa-copyright"></span> 2024 All rights reserved.</span>
    </footer>
</body>
</html>
