<?php
$menu = get_menu_by_slug('legals');
$logo2 = get_globals_logo2();
$email = get_globals_email();
$socials = get_globals_socials();
?>

<footer data-layout="footer" id="contact">
    <!-- Mitte: Logo, E-Mail und Socials -->
    <div class="footer-center">
        <?php if ($logo2) : ?>
            <img class="logo2" src="<?= $logo2['src'] ?>" alt="<?= $logo2['alt'] ?>">
        <?php endif; ?>

        <?php if ($email) : ?>
            <a class="footer-email" href="mailto:<?= antispambot($email) ?>"><?= antispambot(with_dot($email)) ?></a>
        <?php endif; ?>

        <div class="socials">
            <?php foreach ($socials as $item) : ?>
                <a target="_blank" rel="noopener" href="<?= $item['link'] ?>" aria-label="Link zu <?= $item['title'] ?>">
                    <?= with_dot($item['title']) ?>
                </a>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Unten: «Contact» links, Impressum/Datenschutz rechts -->
    <div class="footer-bottom">
        <div class="footer-big-title">
            <img class="contact-svg" src="<?= get_template_directory_uri() ?>/frontend/images/contact.svg" alt="Contact">
            <span class="footer-subtitle">Get in touch.</span>
        </div>

        <nav class="nav-container" aria-label="Rechtliches">
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
    </div>
</footer>
