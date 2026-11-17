<main data-page="page">
    <?php render_modules(); 
    //hier kommt mein Startseiten Hero rein?>
</main>

<section data-module="hero_front">
    <video class="hero-video" autoplay muted loop playsinline>
        <source src="<?= $data['video_startseite']['src'] ?>" type="video/mp4">
    </video>
</section>