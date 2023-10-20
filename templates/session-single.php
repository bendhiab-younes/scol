<?php include_once 'inc/header.php'; ?>
<div class="row">
    <div class="col">
        <ul class="list-group">
            <li class="list-group-item">
                <h5>Session Information</h5>
            </li>
            <li class="list-group-item"><strong>Numero:</strong>
                <?php echo $session->Numero; ?>
            </li>
            <li class="list-group-item"><strong>Annee:</strong>
                <?php echo $session->Annee; ?>
            </li>
            <li class="list-group-item"><strong>Sem:</strong>
                <?php echo $session->Sem; ?>
            </li>
            <li class="list-group-item"><strong>Semab:</strong>
                <?php echo $session->SemAb; ?>
            </li>
            <li class="list-group-item"><strong>Debut:</strong>
                <?php echo $session->Debut; ?>
            </li>
            <li class="list-group-item"><strong>Fin:</strong>
                <?php echo $session->Fin; ?>
            </li>
            <li class="list-group-item"><strong>Debsem:</strong>
                <?php echo $session->Debsem; ?>
            </li>
            <li class="list-group-item"><strong>Finsem:</strong>
                <?php echo $session->Finsem; ?>
            </li>
            <li class="list-group-item"><strong>Annea:</strong>
                <?php echo $session->Annea; ?>
            </li>
            <li class="list-group-item"><strong>Anneab:</strong>
                <?php echo $session->Anneab; ?>
            </li>
        </ul>
    </div>
    <div>
    </div>
    <div class="well">
        <form style="display:inline;" method="post" action="Session.php">
            <a class="btn btn-primary m-2" href="index.php">retourner</a>
            <a href="edit.php?id=<?php echo $session->Numero ?>" class="btn btn-secondary">edit</a>
            <input type="hidden" name="del_id" value="<?php echo $session->Numero; ?>">
            <input type="submit" class="btn btn-danger" value="supprimer">
        </div>
</div>