<?php include 'inc/header.php'; ?>

<!-- Frontpage Section -->
<div class="content mt-3 p-4">
    <h1 class="page-title">Session</h1>
    <h5 class="mb-4">Trié par année</h5>

    <form method="GET" action="index.php" class="mb-4">
        <div class="form-group">
            <select title="select" name="Annee" class="form-control">
                <option value="0">Choisir une année</option>
                <?php foreach ($Annees as $Annee): ?>
                    <option value="<?php echo $Annee->Numero; ?>">
                        <?php echo $Annee->Annee; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Filter</button>
    </form>


    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Numero</th>
                    <th>Anne</th>
                    <th>Sem</th>
                    <th>Semab</th>
                    <th>Debut</th>
                    <th>Fin</th>
                    <th>Debsem</th>
                    <th>Finsem</th>
                    <th>Annea</th>
                    <th>Anneab</th>
                    <th>Actions</th>
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
                        <td>
                            <a class="btn btn-primary" href="Session.php?id=<?php echo $session->Numero; ?>">View</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Footer Section -->
<?php include 'inc/footer.php'; ?>