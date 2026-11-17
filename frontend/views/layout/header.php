<?php
$menu = get_menu_by_slug('main');
// Auf Projektseiten liegt der Header auf hellem Hintergrund → dunkles Logo verwenden
$logo = is_singular('project') ? (get_globals_logo2() ?: get_globals_logo()) : get_globals_logo();
?>

<header data-layout="header">
    <a class="logo-link" href="<?= home_url('/') ?>" aria-label="Zur Startseite">
        <img class="logo" src="<?= $logo['src'] ?>" alt="<?= $logo['alt'] ?>">
    </a>
    <nav class="nav-container" aria-label="Hauptnavigation">
        <ul class="nav">
            <?php foreach ($menu as $item) : ?>
                <li class="nav-item">
                    <a target="<?= $item['target'] ?: '_self' ?>" href="<?= $item['url'] ?>">
                        <?= $item['title'] ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </nav>
</header>
