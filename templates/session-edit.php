<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Edit Session</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <?php include_once 'inc/header.php'; ?>
    <div class="container p-4 text-center">
        <h2 class="page-header">Editer une session</h2>
        <form action="edit.php?id=<?php echo $session->Numero; ?>" method="post" class="mx-auto w-50">
            <div class="form-group">
                <label>Année</label>
                <input type="number" class="form-control" name="Annee" value="<?php echo $session->Annee; ?>">
            </div>
            <div class="form-group">
                <label>Semestre</label>
                <input type="number" class="form-control" name="Sem" value="<?php echo $session->Sem; ?>">
            </div>
            <div class="form-group">
                <label>SemestreAb</label>
                <input type="number" class="form-control" name="SemAb" value="<?php echo $session->SemAb; ?>">
            </div>
            <div class="form-group">
                <label>Debut</label>
                <input type="date" class="form-control" name="Debut" value="<?php echo $session->Debut; ?>">
            </div>
            <div class="form-group">
                <label>Fin</label>
                <input type="date" class="form-control" name="Fin" value="<?php echo $session->Fin; ?>">
            </div>
            <div class="form-group">
                <label>Debut semestre</label>
                <input type="date" class="form-control" name="Debsem" value="<?php echo $session->Debsem; ?>">
            </div>
            <div class="form-group">
                <label>Fin semestre</label>
                <input type="date" class="form-control" name="Finsem" value="<?php echo $session->Finsem; ?>">
            </div>
            <div class="form-group">
                <label>Anneea</label>
                <input type="number" class="form-control" name="Annea" value="<?php echo $session->Annea; ?>">
            </div>
            <div class="form-group">
                <label>Anneab</label>
                <input type="number" class="form-control" name="Anneab" value="<?php echo $session->Anneab; ?>">
            </div>
            <input type="submit" class="btn btn-primary" value="Editer" name="submit">
        </form>
    </div>
    
    <!-- Include Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
<?php include_once 'inc/footer.php'; ?>