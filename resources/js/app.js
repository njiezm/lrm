import '@fontsource-variable/dm-sans';
import '@fontsource-variable/bricolage-grotesque';
import 'bootstrap-icons/font/bootstrap-icons.css';
import { Collapse, Offcanvas } from 'bootstrap';

window.bootstrap = { Collapse, Offcanvas };

const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

// En-tête : ombre au défilement
const header = document.querySelector('.site-header');
const onScroll = () => header?.classList.toggle('is-scrolled', window.scrollY > 10);
window.addEventListener('scroll', onScroll, { passive: true });
onScroll();

// Apparition progressive des blocs
const revealEls = document.querySelectorAll('.reveal');
if ('IntersectionObserver' in window && !reduceMotion) {
    const io = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                io.unobserve(entry.target);
            }
        });
    }, { rootMargin: '0px 0px -8% 0px', threshold: 0.08 });
    revealEls.forEach((el) => io.observe(el));
} else {
    revealEls.forEach((el) => el.classList.add('is-visible'));
}

// Fermer le menu mobile lors d'un clic sur un lien
document.querySelectorAll('.offcanvas a').forEach((a) => {
    a.addEventListener('click', () => Offcanvas.getInstance(a.closest('.offcanvas'))?.hide());
});

// ---------------------------------------------------------------
// Formulaire : compteurs +/−
// ---------------------------------------------------------------
document.querySelectorAll('.stepper').forEach((stepper) => {
    const input = stepper.querySelector('input');
    stepper.querySelectorAll('button[data-step]').forEach((btn) => {
        btn.addEventListener('click', () => {
            const min = parseInt(input.min || '0', 10);
            const max = parseInt(input.max || '999', 10);
            const value = (parseInt(input.value, 10) || 0) + parseInt(btn.dataset.step, 10);
            input.value = Math.min(max, Math.max(min, value));
            input.dispatchEvent(new Event('change', { bubbles: true }));
        });
    });
});

// Champ « âge des enfants » visible seulement s'il y a des enfants
const childrenInput = document.getElementById('children');
const agesWrap = document.getElementById('children-ages-wrap');
const syncAges = () => { if (agesWrap) agesWrap.hidden = !(parseInt(childrenInput?.value, 10) > 0); };
childrenInput?.addEventListener('change', syncAges);
childrenInput?.addEventListener('input', syncAges);
syncAges();

// Pré-remplissage depuis l'URL (?excursion=la-kreole&date=…&adults=2)
const bookingForm = document.getElementById('booking-form');
if (bookingForm && !bookingForm.dataset.hasOld) {
    const params = new URLSearchParams(window.location.search);
    ['excursion', 'date', 'adults', 'children'].forEach((key) => {
        const field = bookingForm.elements[key];
        if (field && params.get(key)) field.value = params.get(key);
    });
    syncAges();
}

// Envoyer la même demande par WhatsApp (message pré-rempli)
document.querySelectorAll('[data-wa-from-form]').forEach((btn) => {
    btn.addEventListener('click', (e) => {
        const form = document.getElementById(btn.dataset.waFromForm);
        if (!form) return;
        e.preventDefault();
        const f = form.elements;
        const exc = f.excursion?.selectedOptions?.[0]?.textContent?.trim() || '';
        const date = f.date?.value
            ? new Date(`${f.date.value}T12:00:00`).toLocaleDateString('fr-FR', { weekday: 'long', day: 'numeric', month: 'long', year: 'numeric' })
            : 'date à définir';
        const kids = parseInt(f.children?.value, 10) > 0
            ? ` · Enfants : ${f.children.value}${f.children_ages?.value ? ` (${f.children_ages.value})` : ''}`
            : '';
        const lines = [
            'Bonjour Le Roi Mongin,',
            `je souhaite réserver : ${exc || 'une excursion'}`,
            `Date : ${date}`,
            `Adultes : ${f.adults?.value || 1}${kids}`,
            f.name?.value ? `Nom : ${f.name.value}` : '',
            f.message?.value ? `\n${f.message.value}` : '',
        ].filter(Boolean);
        window.open(`https://wa.me/${btn.dataset.waNumber}?text=${encodeURIComponent(lines.join('\n'))}`, '_blank', 'noopener');
    });
});

// ---------------------------------------------------------------
// Galerie : filtres + visionneuse
// ---------------------------------------------------------------
const grid = document.querySelector('.gallery-grid');
const dialog = document.getElementById('lightbox');
if (grid && dialog) {
    const items = [...grid.querySelectorAll('figure')];
    const filters = [...document.querySelectorAll('.gallery-filters button')];
    filters.forEach((btn) => {
        btn.addEventListener('click', () => {
            filters.forEach((b) => b.setAttribute('aria-pressed', String(b === btn)));
            items.forEach((fig) => { fig.hidden = btn.dataset.filter !== 'all' && fig.dataset.cat !== btn.dataset.filter; });
        });
    });

    const img = dialog.querySelector('img');
    const caption = dialog.querySelector('figcaption');
    let current = 0;
    const visible = () => items.filter((fig) => !fig.hidden);
    const show = (fig) => {
        const btn = fig.querySelector('button');
        img.src = btn.dataset.full;
        img.alt = btn.querySelector('img').alt;
        caption.textContent = img.alt;
        current = visible().indexOf(fig);
    };
    const step = (d) => { const v = visible(); show(v[(current + d + v.length) % v.length]); };

    items.forEach((fig) => fig.querySelector('button').addEventListener('click', () => { show(fig); dialog.showModal(); }));
    dialog.querySelector('.lb-prev').addEventListener('click', () => step(-1));
    dialog.querySelector('.lb-next').addEventListener('click', () => step(1));
    dialog.querySelector('.lb-close').addEventListener('click', () => dialog.close());
    dialog.addEventListener('click', (e) => { if (e.target === dialog) dialog.close(); });
    dialog.addEventListener('keydown', (e) => {
        if (e.key === 'ArrowLeft') step(-1);
        if (e.key === 'ArrowRight') step(1);
    });
    let touchX = null;
    dialog.addEventListener('touchstart', (e) => { touchX = e.touches[0].clientX; }, { passive: true });
    dialog.addEventListener('touchend', (e) => {
        if (touchX === null) return;
        const dx = e.changedTouches[0].clientX - touchX;
        if (Math.abs(dx) > 50) step(dx > 0 ? -1 : 1);
        touchX = null;
    });
}
