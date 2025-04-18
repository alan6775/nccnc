// Mobile nav
const navToggle = document.getElementById('navToggle');
const mobileNav = document.getElementById('mobileNav');
const navClose = document.getElementById('navClose');
navToggle && navToggle.addEventListener('click', () => mobileNav.classList.remove('hidden'));
navClose && navClose.addEventListener('click', () => mobileNav.classList.add('hidden'));

// Header blur
const header = document.getElementById('site-header');
const blurHeader = () => window.scrollY > 10 ? header.classList.add('scrolled') : header.classList.remove('scrolled');
blurHeader(); window.addEventListener('scroll', blurHeader);

function highlightActiveNav() {
    const currentPath = window.location.pathname.replace(/\/$/, '').replace(/\.[^/.]+$/, '').replace("/nccnc/","") // Remove trailing slash and file extension
    const navLinks = document.querySelectorAll('nav a');

    navLinks.forEach(link => {
        const linkPath = link.getAttribute('href').replace(/\/$/, '').replace(/\.[^/.]+$/, ''); // Normalize link path
        console.log(`Link: ${linkPath}, Current: ${currentPath}`); // Debugging line
        if (linkPath === currentPath) {
            link.classList.add('text-yellow-300', 'font-semibold'); // Add active styles
        } else {
            link.classList.remove('text-yellow-300', 'font-semibold'); // Remove active styles
        }
    });
}

// Run the function on page load
document.addEventListener('DOMContentLoaded', highlightActiveNav);