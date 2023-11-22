<?php include_once 'inc/header.php'; ?>

<style>
    .error-message {
        display: none;
        color: red;
    }
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="p-4">
                <h2 class="page-header text-center">Créer une session</h2>
                <form action="create.php" method="post" onsubmit="{return validateForm()}">
                    <div class="form-group">
                        <label for="Annee">Année</label>
                        <input type="number" min="1992" class="form-control" id="Annee" name="Annee">
                        <span class="error-message" id="AnneeError"></span>
                    </div>
                    <div class="form-group">
                        <label for="Sem">Semestre</label>
                        <select class="form-control" id="Sem" name="Sem">
                            <option value="1">1</option>
                            <option value="2">2</option>
                        </select>
                        <span class="error-message" id="SemError"></span>
                    </div>
                    <div class="form-group">
                        <label for="SemAb">SemestreAb</label>
                        <select class="form-control" id="SemAb" name="SemAb" disabled>
                            <option value="2">2</option>
                            <option value="1">1</option>
                        </select>
                        <span class="error-message" id="SemAbError"></span>
                    </div>
                    <div class="form-group">
                        <label for="Debut">Debut</label>
                        <input type="date" class="form-control" id="Debut" name="Debut">
                        <span class="error-message" id="DebutError"></span>
                    </div>
                    <div class="form-group">
                        <label for="Fin">Fin</label>
                        <input type="date" class="form-control" id="Fin" name="Fin">
                        <span class="error-message" id="FinError"></span>
                    </div>
                    <div class="form-group">
                        <label for="Debsem">Debut semestre</label>
                        <input type="date" class="form-control" id="Debsem" name="Debsem">
                        <span class="error-message" id="DebsemError"></span>
                    </div>
                    <div class="form-group">
                        <label for="Finsem">Fin semestre</label>
                        <input type="date" class="form-control" id="Finsem" name="Finsem">
                        <span class="error-message" id="FinsemError"></span>
                    </div>
                    <div class="form-group">
                        <label for="Annea">Anneea</label>
                        <input type="number" min="1992" class="form-control" id="Annea" name="Annea" disabled>
                        <span class="error-message" id="AnneaError"></span>
                    </div>
                    <div class="form-group">
                        <label for="Anneab">Anneeab</label>
                        <input type="number" min="1992" class="form-control" id="Anneab" name="Anneab" disabled>
                        <span class="error-message" id="AnneabError"></span>
                    </div>
                    <input type="submit" class="btn btn-primary m-2" value="Créer" name="submit">
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    /* if sem is 1 then semab must be 2 

1st case : if Sem= 1
Annee= should be an int , 
set Semab =  2 , 
Debut= dd/mm/Annee (the year here matches the value of Annee), 
Fin= dd/mm/Annee+1(the year here matches the value of Annee+ 1 ), 
Debsem= debut, Finsem= a date x > Debsem and x < Fin , 
Annea= Annee, Anneab= Annea+1  

2nd case : if Sem = 2 
Annee= an int  , Sem= 2 set Semab=  1 , 
Debut= dd/mm/Annee-1 (the year here matches the value of Annee-1), 
Fin= dd/mm/Annee (the year here matches the value of Annee ), 
Debsem= is a date x > debut and x <Fin , Finsem= Fin , 
Annea= Annee-1 , Anneab= Annea+1 */
    //second script

    document.getElementById('Sem').addEventListener('change', updateFields);
    document.getElementById('Annee').addEventListener('change', updateFields);
    document.getElementById('Debut').addEventListener('change', updateSemDates);
    document.getElementById('Fin').addEventListener('change', updateSemDates);

    updateFields();

    function updateFields() {
    var Annee = getInputValue('Annee');
    var Sem = getInputValue('Sem');
    
    // Check if Annee is empty and disable Sem
    if (!Annee) {
        document.getElementById('Sem').disabled = true;
        return;
    } else {
        document.getElementById('Sem').disabled = false;
    }

        var isSem1 = Sem === '1';
        document.getElementById('SemAb').value = isSem1 ? '2' : '1';
        document.getElementById('Debut').value = formatDate(isSem1 ? parseInt(Annee) : parseInt(Annee) - 1);
        document.getElementById('Fin').value = formatDate(isSem1 ? parseInt(Annee) + 1 : parseInt(Annee));
        document.getElementById('Debsem').value = document.getElementById('Debut').value;
        document.getElementById('Finsem').value = document.getElementById('Fin').value;
        document.getElementById('Annea').value = isSem1 ? Annee : parseInt(Annee) - 1;
        document.getElementById('Anneab').value = isSem1 ? parseInt(Annee) + 1 : parseInt(Annee);
    }

    function updateSemDates() {
        var Sem = getInputValue('Sem');
        if (Sem === '1') {
            document.getElementById('Debsem').value = this.value;
            //document.getElementById('Debut').min = this.value;
        } else if (Sem === '2') {
            var Fin = getInputValue('Fin');
            document.getElementById('Finsem').value = Fin;
        }
    }

    function formatDate(year) {
        return new Date(year, 1, 1).toISOString().split('T')[0];
    }

    function getInputValue(id) {
        return document.getElementById(id).value;
    }

    function validateForm() {
        clearErrors();
        var inputIds = ['Annee', 'Sem', 'SemAb', 'Debut', 'Fin', 'Debsem', 'Finsem', 'Annea', 'Anneab'];

        for (var i = 0; i < inputIds.length; i++) {
            var inputId = inputIds[i];
            var inputValue = getInputValue(inputId);
            if (!inputValue) {
                document.getElementById(inputId + 'Error').textContent = 'Champ obligatoire.';
                document.getElementById(inputId + 'Error').style.display = 'block';
            }
        }

        return !inputIds.some(function (id) {
            return getInputValue(id) === '';
        });
    }

    function clearErrors() {
        document.querySelectorAll('.error-message').forEach(function (element) {
            element.textContent = '';
            element.style.display = 'none';
        });
    }

</script>

<?php include_once 'inc/footer.php'; ?>