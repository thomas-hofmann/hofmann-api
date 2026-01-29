import './bootstrap';
import AOS from 'aos';
import 'aos/dist/aos.css';

window.addEventListener('load', () => {
    AOS.init({
        duration: 900,
        easing: 'ease-out-cubic',
        once: true,
    });
});
