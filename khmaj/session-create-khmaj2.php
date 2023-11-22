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
                        <select class="form-control" id="SemAb" name="SemAb">
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
Annee= an int , 
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
    document.getElementById('Debut').addEventListener('change', function() {
    var Sem = document.getElementById('Sem').value;
    if (Sem === '1') {
        document.getElementById('Debsem').value = this.value;
    }
});
document.getElementById('Fin').addEventListener('change', function() {
    var Sem = document.getElementById('Sem').value;
    if (Sem === '2') {
        document.getElementById('Finsem').value = this.value;
    }
});

    function updateFields() {
        var Annee = document.getElementById('Annee').value;
        var Sem = document.getElementById('Sem').value;

        if (!Annee) {
            return; // If Annee is empty, don't do anything
        }

        if (Sem === '1') {
            document.getElementById('SemAb').value = '2';
            //console.log(Annee)
            document.getElementById('Debut').value = formatDate(parseInt(Annee));
            var chosen_debut = document.getElementById('Debut').value;
            document.getElementById('Debsem').value = chosen_debut;
            document.getElementById('Fin').value = formatDate(parseInt(Annee) + 1);
            document.getElementById('Finsem').value = formatDate(parseInt(Annee) + 1);
            document.getElementById('Annea').value = Annee;
            document.getElementById('Anneab').value = parseInt(Annee) + 1;
        } else if (Sem === '2') {
            document.getElementById('SemAb').value = '1';
            document.getElementById('Debut').value = formatDate(parseInt(Annee ) -1 );
            document.getElementById('Fin').value = formatDate(Annee);
            document.getElementById('Finsem').value = formatDate(Annee);
            document.getElementById('Annea').value = parseInt(Annee) - 1;
            document.getElementById('Anneab').value = parseInt(Annee);
        }
    }

    function formatDate(year) {
        var date = new Date(year, 1, 1); // This will create a date in YYYY-MM-DD format with the year you provide and January 1st as the month and day.
        //console.log(date.toISOString().split('T')[0]);
        return date.toISOString().split('T')[0]; // This will format the date in YYYY-MM-DD format.
    }


    function validateForm() {
        // Clear all error messages
        clearErrors();

        // Gather form values
        var inputs = [];
        var inputIds = ['Annee', 'Sem', 'SemAb', 'Debut', 'Fin', 'Debsem', 'Finsem', 'Annea', 'Anneab'];

        for (var i = 0; i < inputIds.length; i++) {
            var inputId = inputIds[i];
            var inputValue = getInputvalue(inputId);
            inputs.push(inputValue);
            if (!inputValue) {
                document.getElementById(inputId + 'Error').textContent = 'Champ obligatoire.';
                document.getElementById(inputId + 'Error').style.display = 'block';
            }
        }

        // If any field is empty, prevent form submission
        if (inputs.includes('')) {
            return false;
        }

        return true;
    }

    function getInputvalue(id) {
        var elem = document.getElementById(id).value;
        console.log("getinputby id `$id`", elem);
        return elem;
    }

    function clearErrors() {
        // Clear all error messages
        var errorElements = document.querySelectorAll('.error-message');
        errorElements.forEach(function (element) {
            element.textContent = '';
            element.style.display = 'none';
        });
    }
</script>

<?php include_once 'inc/footer.php'; ?>