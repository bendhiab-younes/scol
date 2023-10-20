<?php include_once 'inc/header.php'; ?>
<div class="p-4">

    <h2 class="page-header">Editer une session</h2>
    <form action="edit.php?id=<?php echo $session->Numero;?>" method="post">

        <div class="form-group">
            <label>Année</label>
            <input type="text" class="form-control" name="Annee" value="<?php echo $session->Annee; ?>">
        </div>
        <div class="form-group">
            <label>Semestre</label>
            <input type="text" class="form-control" name="Sem" value="<?php echo $session->Sem; ?>">
        </div>
        <div class="form-group">
            <label>SemestreAb</label>
            <input type="text" class="form-control" name="SemAb"value="<?php echo $session->SemAb; ?>">
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
            <input type="date" class="form-control" name="Debsem"  value="<?php echo $session->Debsem; ?>">
        </div>
        <div class="form-group">
            <label>fin semestre</label>
            <input type="date" class="form-control" name="Finsem" value="<?php echo $session->Finsem; ?>">
        </div>
        <div class="form-group">
            <label>Anneea</label>
            <input type="text" class="form-control" name="Annea"  value="<?php echo $session->Annea; ?>">
        </div>
        <div class="form-group">
            <label>Anneab</label>
            <input type="text" class="form-control" name="Anneab" value="<?php echo $session->Annee; ?>"value="<?php echo $session->Anneab; ?>">
        </div>
        <input type="submit" class="btn btn-primary m-2" value="editer" name="submit">
    </form>
</div>