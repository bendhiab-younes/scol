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
                        <input type="number" min="1992" class="form-control" id="Annea" name="Annea">
                        <span class="error-message" id="AnneaError"></span>
                    </div>
                    <div class="form-group">
                        <label for="Anneab">Anneeab</label>
                        <input type="number" min="1992" class="form-control" id="Anneab" name="Anneab">
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

    var inputIds = ['Annee', 'Sem', 'SemAb', 'Debut', 'Fin', 'Debsem', 'Finsem', 'Annea', 'Anneab'];

    function getInputValue(id) {
        return document.getElementById(id).value;
    }

    function setInputValue(id, value) {
        document.getElementById(id).value = value;
    }

    function clearErrors() {
        inputIds.forEach(function (inputId) {
            document.getElementById(inputId + 'Error').textContent = '';
            document.getElementById(inputId + 'Error').style.display = 'none';
        });
    }

    function validateForm() {
        clearErrors();
        var inputs = inputIds.map(getInputValue);

        if (inputs.some(input => input === '')) {
            alert('Tous les champs sont obligatoires.');
            return false;
        }

        setAutomaticValues(...inputs);

        if (!validateCoherenceRules(...inputs)) {
            alert('Le formulaire n\'est pas cohérent. Veuillez vérifier les informations.');
            return false;
        }

        return true;
    }

    function setAutomaticValues(Sem, SemAb, Annee, Debut, Fin, Debsem, Finsem, Annea, Anneab) {
        if (Sem === '1') {
            setInputValue('SemAb', '2');
            setInputValue('Debut', getFormattedDate(Annee, 1, 1));
            setInputValue('Fin', getFormattedDate(parseInt(Annee) + 1, 1, 1));
            setInputValue('Debsem', Debut);
            setInputValue('Annea', Annee);
            setInputValue('Anneab', parseInt(Annea) + 1);
        } else if (Sem === '2') {
            setInputValue('SemAb', '1');
            setInputValue('Debut', getFormattedDate(parseInt(Annee) - 1, 1, 1));
            setInputValue('Fin', getFormattedDate(Annee, 1, 1));
            setInputValue('Debsem', Debut);
            setInputValue('Finsem', Fin);
            setInputValue('Annea', parseInt(Annee) - 1);
            setInputValue('Anneab', parseInt(Annea) + 1);
        }
    }

    function validateCoherenceRules(Sem, SemAb, Annee, Debut, Fin, Debsem, Finsem, Annea, Anneab) {
        if (Sem === '1' && SemAb === '2') {
            return validateCase1(Annee, Debut, Fin, Debsem, Finsem, Annea, Anneab);
        } else if (Sem === '2' && SemAb === '1') {
            return validateCase2(Annee, Debut, Fin, Debsem, Finsem, Annea, Anneab);
        }

        return false;
    }

    function validateCase1(Annee, Debut, Fin, Debsem, Finsem, Annea, Anneab) {
        return (
            validateDateOrder(Debut, Fin, 'Debut', 'Fin') &&
            validateDateOrder(Debsem, Finsem, 'Debut semestre', 'Fin semestre') &&
            parseInt(Annea) === parseInt(Annee) &&
            parseInt(Anneab) === parseInt(Annea) + 1
        );
    }

    function validateCase2(Annee, Debut, Fin, Debsem, Finsem, Annea, Anneab) {
        return (
            validateDateOrder(Debut, Fin, 'Debut', 'Fin') &&
            validateDateOrder(Debsem, Finsem, 'Debut semestre', 'Fin semestre') &&
            parseInt(Annea) === parseInt(Annee) - 1 &&
            parseInt(Anneab) === parseInt(Annea) + 1
        );
    }

    function validateDateOrder(start, end, startLabel, endLabel) {
        if (new Date(start) >= new Date(end)) {
            document.getElementById(startLabel + 'Error').textContent = 'La date de ' + startLabel.toLowerCase() + ' doit être antérieure à la date de ' + endLabel.toLowerCase() + '.';
            document.getElementById(endLabel + 'Error').textContent = 'La date de ' + endLabel.toLowerCase() + ' doit être postérieure à la date de ' + startLabel.toLowerCase() + '.';
            return false;
        }
        return true;
    }

    function getFormattedDate(year, month, day) {
        // Ensure month and day have two digits
        month = month.toString().padStart(2, '0');
        day = day.toString().padStart(2, '0');
        return `${year}-${month}-${day}`;
    }




</script>

<?php include_once 'inc/footer.php'; ?>

<!--   // Gather form values
    var inputs = [];
    var inputIds = ['Annee', 'Sem', 'SemAb', 'Debut', 'Fin', 'Debsem', 'Finsem', 'Annea', 'Anneab'];

    function getInputvalue(id) {
        var elem = document.getElementById(id).value;
        console.log(elem);
        return elem;
    }

    function validateForm() {
        // Reset error messages
        clearErrors();

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

        // Validate coherence rules
        if (!validateCoherenceRules(inputs[1], inputs[2], inputs[0], inputs[3], inputs[4], inputs[5], inputs[6], inputs[7], inputs[8])) {
            console.log('false required field validation');
            alert('Le formulaire n\'est pas cohérent. Veuillez vérifier les informations.');
            console.log(inputs);
            return false;
        }

        return true;
    }

    function validateCoherenceRules(Sem, SemAb, Annee, Debut, Fin, Debsem, Finsem, Annea, Anneab) {
        // Validate based on provided rules
        if (
            (Sem === '1' && SemAb === '2' && validateCase1(Annee, Debut, Fin, Debsem, Finsem, Annea, Anneab)) ||
            (Sem === '2' && SemAb === '1' && validateCase2(Annee, Debut, Fin, Debsem, Finsem, Annea, Anneab))
        ) {
            return true;
            console.log('coherent');
        }

        return false;
    }

    function validateCase1(Annee, Debut, Fin, Debsem, Finsem, Annea, Anneab) {
        // Validate Case 1 rules
        console.log('case1 valid');
        return (
            validateDateOrder(Debut, Fin, 'Debut', 'Fin') &&
            validateDateOrder(Debsem, Finsem, 'Debut semestre', 'Fin semestre') &&
            Annee == Annea &&
            Anneab == parseInt(Annea) + 1
        );
    }

    function validateCase2(Annee, Debut, Fin, Debsem, Finsem, Annea, Anneab) {
        // Validate Case 2 rules
        console.log('case2 valid');
        return (
            validateDateOrder(Debut, Fin, 'Debut', 'Fin') &&
            validateDateOrder(Debsem, Finsem, 'Debut semestre', 'Fin semestre') &&
            parseInt(Annea) == parseInt(Annee) - 1 &&
            Anneab == parseInt(Annea) + 1
        );
    }

    function validateDateOrder(start, end, startLabel, endLabel) {
        if (new Date(start) >= new Date(end)) {
            document.getElementById(startLabel + 'Error').textContent = 'La date de ' + startLabel.toLowerCase() + ' doit être antérieure à la date de ' + endLabel.toLowerCase() + '.';
            document.getElementById(endLabel + 'Error').textContent = 'La date de ' + endLabel.toLowerCase() + ' doit être postérieure à la date de ' + startLabel.toLowerCase() + '.';
            console.log('false vilidateDateOrder');
            return false;
        }
        console.log('true vilidateDateOrder');
        return true;
    }

    function clearErrors() {
        // Clear all error messages
        var errorElements = document.querySelectorAll('.error-message');
        errorElements.forEach(function (element) {
            element.textContent = '';
            element.style.display = 'none';
        });
    } -->

<!--  -->