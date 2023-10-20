<!DOCTYPE html>
<html lang="en">

<head>
    <title>Header Sessions</title>
    <?php
    $urls = array();
    $scripts = array(
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js',
        'https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js',
        'https://code.jquery.com/jquery-3.5.1.slim.min.js',
        'https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js',
        'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js'
    );
    $stylesheets = array(
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css',
        'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css'
    );
    foreach ($scripts as $script) {
        if (!in_array($script, $urls)) {
            echo '<script src="' . $script . '"></script>' . PHP_EOL;
            $urls[] = $script;
        }
    }
    foreach ($stylesheets as $stylesheet) {
        if (!in_array($stylesheet, $urls)) {
            echo '<link rel="stylesheet" href="' . $stylesheet . '">' . PHP_EOL;
            $urls[] = $stylesheet;
        }
    }
    ?>

    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <!-- Header Navigation -->
    <div>

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark p-4">
            <a class="navbar-brand" href="index.php">
                <?php echo SITE_TITLE; ?>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="create.php">Create</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <?php displayMessage(); ?>