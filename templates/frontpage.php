<?php include 'inc/header.php'; ?>

<!-- Frontpage Section -->
<div class="container mt-3">
    <h1 class="page-title">Sessions</h1>
    <div class="row mb-4">
        <div class="col-md-6">
            <h5>Filtrer par colonne:</h5>
            <div class="form-row">
                <div class="col-md-6 mb-2">
                    <select id="filter-column" class="form-control">
                        <!--option value="" disabled selected>--</option-->
                        <option value="Numero">Numero</option>
                        <option value="Annee">Annee</option>
                        <option value="Sem">Sem</option>
                        <option value="Semab">Semab</option>
                        <option value="Debut">Debut</option>
                        <option value="Fin">Fin</option>
                        <option value="Debsem">Debsem</option>
                        <option value="Finsem">Finsem</option>
                        <option value="Annea">Annea</option>
                        <option value="Anneab">Anneab</option>
                    </select>
                </div>
                <div class="col-md-6 mb-2">
                    <input type="text" id="filter-value" class="form-control" placeholder="Enter a value">
                </div>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Numero</th>
                    <th>Annee</th>
                    <th>Sem</th>
                    <th>Semab</th>
                    <th>Debut</th>
                    <th>Fin</th>
                    <th>Debsem</th>
                    <th>Finsem</th>
                    <th>Annea</th>
                    <th>Anneab</th>
                    <th id="HeaderAction">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($sessions as $session): ?>
                    <tr>
                        <td>
                            <?php echo $session->Numero; ?>
                        </td>
                        <td>
                            <?php echo $session->Annee; ?>
                        </td>
                        <td>
                            <?php echo $session->Sem; ?>
                        </td>
                        <td>
                            <?php echo $session->SemAb; ?>
                        </td>
                        <td>
                            <?php echo $session->Debut; ?>
                        </td>
                        <td>
                            <?php echo $session->Fin; ?>
                        </td>
                        <td>
                            <?php echo $session->Debsem; ?>
                        </td>
                        <td>
                            <?php echo $session->Finsem; ?>
                        </td>
                        <td>
                            <?php echo $session->Annea; ?>
                        </td>
                        <td>
                            <?php echo $session->Anneab; ?>
                        </td>
                        <td class="HeaderColumn" id="view<?php echo $session->Numero ?>">
                            <a class="btn btn-primary" href="Session.php?id=<?php echo $session->Numero; ?>">View</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <button id="print-data" class="btn btn-primary m-3">Print</button>
</div>

<!-- Add Bootstrap CSS and JavaScript -->


<script>
    const filterColumn = document.getElementById('filter-column');
    const filterValue = document.getElementById('filter-value');
    const tableRows = document.querySelectorAll('.table tbody tr');
    const printButton = document.getElementById('print-data');
    const theader = document.getElementById('HeaderAction');
    const HeaderColumn = document.querySelectorAll('.HeaderColumn');

    filterColumn.addEventListener('change', () => {
        filterData(filterColumn.value, filterValue.value);
    });

    filterValue.addEventListener('input', () => {
        filterData(filterColumn.value, filterValue.value);
    });

    function filterData(column, value) {
        const filterRegex = new RegExp(value, 'i');
        tableRows.forEach(row => {
            const cell = row.querySelector(`td:nth-child(${getColumnIndex(column)})`);
            if (cell) {
                if (filterRegex.test(cell.textContent)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            }
        });
    }

    function getColumnIndex(columnName) {
        const headers = document.querySelectorAll('.table thead th');
        for (let i = 0; i < headers.length; i++) {
            if (headers[i].textContent.trim() === columnName) {
                return i + 1;
            }
        }
        return -1;
    }

    printButton.addEventListener('click', () => {
        // Hide the print button before printing
        printButton.style.display = 'none';
        theader.style.display = 'none';
        HeaderColumn.forEach(element => {
            element.style.display = 'none';
        });
        // Print the document
        window.print();

        // Restore the print button after printing (optional)
        printButton.style.display = 'block';
        theader.style.display = 'block';
        HeaderColumn.forEach(element => {
            element.style.display = 'block';
        });
    });
</script>


<!-- Footer Section -->
<?php include 'inc/footer.php'; ?>