<?php include_once 'inc/header.php'; ?>
<div class="p-4">

    <h2 class="page-header">crée une session</h2>
    <form action="create.php" method="post">


        <div class="form-group">
            <label>Année</label>
            <input type="text" class="form-control" name="Annee">
        </div>
        <div class="form-group">
            <label>Semestre</label>
            <input type="text" class="form-control" name="Sem">
        </div>
        <div class="form-group">
            <label>SemestreAb</label>
            <input type="text" class="form-control" name="SemAb">
        </div>
        <div class="form-group">
            <label>Debut</label>
            <input type="date" class="form-control" name="Debut">
        </div>
        <div class="form-group">
            <label>Fin</label>
            <input type="date" class="form-control" name="Fin">
        </div>
        <div class="form-group">
            <label>Debut semestre</label>
            <input type="date" class="form-control" name="Debsem">
        </div>
        <div class="form-group">
            <label>fin semestre</label>
            <input type="date" class="form-control" name="Finsem">
        </div>
        <div class="form-group">
            <label>Anneea</label>
            <input type="text" class="form-control" name="Annea">
        </div>
        <div class="form-group">
            <label>Anneeab</label>
            <input type="text" class="form-control" name="Anneab">
        </div>
        <input type="submit" class="btn btn-primary m-2" value="créer" name="submit">
    </form>
</div>