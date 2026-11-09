<?php
$menu = get_menu_by_slug('legals');
$logo2 = get_globals_logo2();
$socials = get_globals_socials();
?>

<footer data-layout="footer">
    <!-- Mittlerer Bereich: Logo, E-Mail und Socials zentriert -->
    <div class="footer-center">
        <img class="logo2" src="<?= $logo2['src'] ?>" alt="<?= $logo2['alt'] ?>">
        <div class="socials">
            <?php foreach ($socials as $item) : ?>
                <a target="_blank" href="<?= $item['link'] ?>" aria-label="Link zu <?= $item['title'] ?>">
                    <?= $item['title'] ?>.
                </a>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Unterster Bereich: "Contact" links & Impressum/Datenschutz rechts -->
    <div class="footer-bottom">
        <div class="footer-big-title">
            <div class="footer-big-title">
            <img class="contact-svg" src="<?php echo get_template_directory_uri(); ?>/frontend/images/contact.svg" alt="Contact">
            <span class="footer-subtitle">Get in touch.</span>
        </div>
        </div>

        <nav class="nav-container">
            <ul class="nav">
                <?php foreach ($menu as $item) : ?>
                    <li class="nav-item">
                        <a target="<?= $item['target'] ?>" href="<?= $item['url'] ?>">
                            <?= $item['title'] ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>
    </div>
</footer>