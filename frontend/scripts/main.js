/* ==========================================
   HERO STARTSEITE: mehrere Videos im Wechsel
   Jedes Video zeigt einen Ausschnitt (Start + Dauer aus dem CMS),
   danach wird sanft zum nächsten Video überblendet.
   ========================================== */
function initHeroClips() {
    const hero = document.querySelector('[data-module="hero_front"]');
    if (!hero) return;

    const videos = [...hero.querySelectorAll('.hero-video')];
    if (videos.length < 2) return; // ein Video läuft einfach im Loop

    let current = 0;
    let timer = null;

    const playClip = (index) => {
        const video = videos[index];
        const start = parseFloat(video.dataset.start) || 0;
        const dauer = (parseFloat(video.dataset.dauer) || 4) * 1000;

        const go = () => {
            video.currentTime = start;
            video.play().catch(() => {});
            videos.forEach((v, i) => v.classList.toggle('is-active', i === index));

            // vorheriges Video nach der Überblendung anhalten
            const previous = videos[(index - 1 + videos.length) % videos.length];
            setTimeout(() => { if (previous !== video) previous.pause(); }, 800);

            clearTimeout(timer);
            timer = setTimeout(() => {
                current = (current + 1) % videos.length;
                playClip(current);
            }, dauer);
        };

        // Warten, bis das Video weiss, wie lang es ist (sonst funktioniert currentTime nicht)
        if (video.readyState >= 1) {
            go();
        } else {
            video.addEventListener('loadedmetadata', go, { once: true });
            video.load();
        }
    };

    playClip(0);
}

/* ==========================================
   PROJEKTSEITE: Video per Klick abspielen
   ========================================== */
function initProjectPlayer() {
    document.querySelectorAll('[data-player]').forEach((player) => {
        const video = player.querySelector('video');
        const button = player.querySelector('.play-button');
        if (!video || !button) return;

        button.addEventListener('click', () => {
            player.classList.add('is-playing');
            video.controls = true;
            video.play().catch(() => {});
        });

        video.addEventListener('ended', () => {
            player.classList.remove('is-playing');
            video.controls = false;
        });
    });
}

initHeroClips();
initProjectPlayer();
