document.addEventListener('DOMContentLoaded', function () {
    const addButton = document.getElementById('addButton');
    const doneButton = document.getElementById('doneButton');
    const tableBody = document.getElementById('tableBody');
    const noDataRow = document.getElementById('noDataRow');
    const grandTotalRow = document.getElementById('grandTotalRow');
    const grandTotalCost = document.getElementById('grandTotalCost');
    const grandTotalMargin = document.getElementById('grandTotalMargin');
    const rows = {}; // Object to store existing rows

    let totalCost = 0;
    let totalMargin = 0;

    addButton.addEventListener('click', function () {
        const recipeSelect = document.getElementById('recipe');
        const quantityInput = document.getElementById('quantity');

        const recipeId = recipeSelect.value;
        const recipeName = recipeSelect.options[recipeSelect.selectedIndex].text;
        const quantity = parseInt(quantityInput.value, 10);
        const cost = parseFloat(recipeSelect.options[recipeSelect.selectedIndex].getAttribute('data-cost'));
        const sellingPrice = parseFloat(recipeSelect.options[recipeSelect.selectedIndex].getAttribute('data-selling-price'));
        const totalCostForRecipe = (cost * quantity).toFixed(2);
        const totalSellingPriceForRecipe = (sellingPrice * quantity).toFixed(2);
        const grossMargin = (totalSellingPriceForRecipe - totalCostForRecipe).toFixed(2);

        if (recipeId && !isNaN(quantity) && quantity > 0) {
            if (noDataRow) {
                noDataRow.remove();
            }

            if (rows[recipeName]) {
                const existingRow = rows[recipeName];
                const existingQuantity = parseInt(existingRow.children[1].textContent, 10);
                const existingTotalCost = parseFloat(existingRow.children[3].textContent);
                const existingGrossMargin = parseFloat(existingRow.children[4].textContent);
                const newQuantity = existingQuantity + quantity;
                const newTotalCost = existingTotalCost + parseFloat(totalCostForRecipe);
                const newGrossMargin = existingGrossMargin + parseFloat(grossMargin);

                existingRow.children[1].textContent = newQuantity;
                existingRow.children[3].textContent = newTotalCost.toFixed(2);
                existingRow.children[4].textContent = newGrossMargin.toFixed(2);
            } else {
                const newRow = document.createElement('tr');
                newRow.innerHTML = `
                    <td>${recipeName}</td>
                    <td>${quantity}</td>
                    <td>${sellingPrice.toFixed(2)}</td>
                    <td>${totalCostForRecipe}</td>
                    <td>${grossMargin}</td>
                    <td><button class="deleteButton btn btn-danger btn-sm">Delete</button></td>
                `;
                tableBody.appendChild(newRow);
                rows[recipeName] = newRow;

                // Add delete event listener to the new button
                newRow.querySelector('.deleteButton').addEventListener('click', function() {
                    deleteRow(newRow, recipeName, totalCostForRecipe, grossMargin);
                });
            }

            totalCost += parseFloat(totalCostForRecipe);
            totalMargin += parseFloat(grossMargin);
            grandTotalCost.textContent = totalCost.toFixed(2);
            grandTotalMargin.textContent = totalMargin.toFixed(2);
            grandTotalRow.style.display = 'table-row';
            doneButton.style.display = 'block';

            quantityInput.value = '';
            recipeSelect.value = '';
        } else {
            alert('Please select a recipe and enter a valid quantity sold.');
        }
    });

    doneButton.addEventListener('click', function () {
        const tableData = [];
        for (const row of tableBody.rows) {
            const recipe = row.cells[0].innerText;
            const quantity = row.cells[1].innerText;
            const sellingPrice = row.cells[2].innerText;
            const totalCost = row.cells[3].innerText;
            const grossMargin = row.cells[4].innerText;
            tableData.push({ recipe, quantity, sellingPrice, totalCost, grossMargin });
        }

        const formActionUrl = doneButton.getAttribute('data-action-url');

        const form = document.createElement('form');
        form.method = 'POST';
        form.action = formActionUrl;

        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        const csrfInput = document.createElement('input');
        csrfInput.type = 'hidden';
        csrfInput.name = '_token';
        csrfInput.value = csrfToken;
        form.appendChild(csrfInput);

        const tableDataInput = document.createElement('input');
        tableDataInput.type = 'hidden';
        tableDataInput.name = 'tableData';
        tableDataInput.value = JSON.stringify(tableData);
        form.appendChild(tableDataInput);

        document.body.appendChild(form);
        form.submit();
    });

    function deleteRow(row, recipeName, cost, margin) {
        row.remove();
        delete rows[recipeName];

        totalCost -= parseFloat(cost);
        totalMargin -= parseFloat(margin);
        grandTotalCost.textContent = totalCost.toFixed(2);
        grandTotalMargin.textContent = totalMargin.toFixed(2);

        if (Object.keys(rows).length === 0) {
            tableBody.innerHTML = '<tr id="noDataRow"><td colspan="6">No data available</td></tr>';
            grandTotalRow.style.display = 'none';
            doneButton.style.display = 'none';
        }
    }

    // Initial setup: attach delete event listener to any existing rows
    for (const row of tableBody.rows) {
        const deleteButton = row.querySelector('.deleteButton');
        if (deleteButton) {
            deleteButton.addEventListener('click', function () {
                const recipeName = row.cells[0].innerText;
                const cost = row.cells[3].innerText;
                const margin = row.cells[4].innerText;
                deleteRow(row, recipeName, cost, margin);
            });
        }
    }
});
