<?php include_once 'inc/header.php'; ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="p-4">
                <h2 class="page-header text-center">Créer une session</h2>
                <form action="create.php" method="post">
                    <div class="form-group">
                        <label for="Annee">Année</label>
                        <input type="number" min="1992" class="form-control" id="Annee" name="Annee">
                    </div>
                    <div class="form-group">
                        <label for="Sem">Semestre</label>
                        <select class="form-control" id="Sem" name="Sem">
                            <option value="1">1</option>
                            <option value="2">2</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="SemAb">SemestreAb</label>
                        <select class="form-control" id="SemAb" name="SemAb">
                            <option value="2">2</option>
                            <option value="1">1</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="Debut">Debut</label>
                        <input type="date" class="form-control" id="Debut" name="Debut">
                    </div>
                    <div class="form-group">
                        <label for="Fin">Fin</label>
                        <input type="date" class="form-control" id="Fin" name="Fin">
                    </div>
                    <div class="form-group">
                        <label for="Debsem">Debut semestre</label>
                        <input type="date" class="form-control" id="Debsem" name="Debsem">
                    </div>
                    <div class="form-group">
                        <label for="Finsem">Fin semestre</label>
                        <input type="date" class="form-control" id="Finsem" name="Finsem">
                    </div>
                    <div class="form-group">
                        <label for="Annea">Anneea</label>
                        <input type="number" min="1992" class="form-control" id="Annea" name="Annea">
                    </div>
                    <div class="form-group">
                        <label for="Anneab">Anneeab</label>
                        <input type="number" min="1992" class="form-control" id="Anneab" name="Anneab">
                    </div>
                    <input type="submit" class="btn btn-primary m-2" value="Créer" name="submit">
                </form>
            </div>
        </div>
    </div>
</div>
<?php include_once 'inc/footer.php'; ?>