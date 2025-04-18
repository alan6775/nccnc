<?php
// Handle form submission
$success = false;
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $to = 'alan.wold@astoncare.co.uk'; // <-- Replace with your email address
    $subject = isset($_POST['subject']) && $_POST['subject'] !== '' ? $_POST['subject'] : 'New Contact Form Submission';

    // Sanitize inputs
    $name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '';
    $email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';
    $phone = isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : '';
    $message = isset($_POST['message']) ? htmlspecialchars($_POST['message']) : '';

    if (!$name || !$email || !$message) {
        $error = 'Please fill out all required fields.';
    } else {
        $body = "Name: " . $name . "\nEmail: " . $email . "\nPhone: " . $phone . "\n\nMessage:\n" . $message;
        $headers = 'From: ' . $email;

        if (mail($to, $subject, $body, $headers)) {
            $success = true;
        } else {
            $error = 'Something went wrong while sending your message. Please try again later.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <!-- HEAD TAGS UNCHANGED -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="North Cornwall CNC – family‑run specialists in illuminated 3D signs. Discover our story, values and craftsmanship." />
    <title>Contact Us | North Cornwall CNC</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style>
        body{font-family:Inter,system-ui,"Segoe UI",sans-serif}
        header.scrolled{backdrop-filter:blur(10px);background-color:rgba(15,23,42,.6)}
    </style>
</head>
<!-- Header -->
<header id="site-header" class="fixed inset-x-0 top-0 z-50 flex items-center justify-between px-4 md:px-8 py-3 transition-colors duration-300">
    <a href="/" class="text-xl font-bold tracking-tight text-white"><span class="text-yellow-300">Nc</span>CnC<span class="hidden sm:inline"> Contact</span></a>

    <button id="navToggle" class="text-white text-2xl md:hidden focus:outline-none" aria-label="Toggle navigation">☰</button>

    <nav aria-label="Main navigation" class="hidden md:block">
        <ul class="flex gap-6 text-sm font-medium text-white">
            <li><a class="hover:text-yellow-300" href="/">Home</a></li>
            <li><a class="hover:text-yellow-300" href="about">About</a></li>
            <li><a class="hover:text-yellow-300" href="3d-signs">3D Signs</a></li>
            <li><a class="hover:text-yellow-300" href="gallery">Gallery</a></li>
            <li><a class="hover:text-yellow-300" href="contact">Contact</a></li>
        </ul>
    </nav>
</header>

<!-- Mobile slide‑over nav -->
<nav id="mobileNav" class="fixed inset-0 z-40 hidden flex-col bg-gradient-to-b from-sky-600 to-indigo-700 p-6 text-lg font-medium text-white">
    <button class="self-end text-3xl" aria-label="Close navigation" id="navClose">×</button>
    <ul class="mt-8 space-y-4">
        <li><a href="/">Home</a></li>
        <li><a href="about">About</a></li>
        <li><a href="3d-signs">3D Signs</a></li>
        <li><a href="gallery">Gallery</a></li>
        <li><a href="contact">Contact</a></li>
    </ul>
</nav>

<main class="pt-0">
    <section class="relative bg-gradient-to-r from-sky-700 to-indigo-800 pt-32 pb-12 text-center text-white">
        <h1 class="mx-auto max-w-4xl px-4 text-4xl font-extrabold tracking-tight md:text-5xl">Contact Us</h1>
        <p class="mx-auto mt-4 max-w-2xl px-4 text-lg">We’re here to help with your illuminated 3D sign needs. Reach out to us today!</p>
    </section>

    <section class="mx-auto mt-16 max-w-3xl px-4 lg:px-0">
        <h2 class="text-3xl font-extrabold text-slate-900 text-center">Let’s Create Something Brilliant</h2>
        <p class="mt-2 text-center text-slate-600 max-w-2xl mx-auto">Have an idea or project in mind? Fill out the form and we’ll get back to you as soon as possible — usually within one business day.</p>

        <?php if ($success): ?>
            <div class="mt-6 p-4 text-center rounded-md bg-green-50 text-green-700 border border-green-200">
                ✅ Your message has been sent! We’ll be in touch shortly.
            </div>
        <?php elseif ($error): ?>
            <div class="mt-6 p-4 text-center rounded-md bg-red-50 text-red-700 border border-red-200">
                ❌ <?= $error ?>
            </div>
        <?php endif; ?>

        <form action="contact.php" method="POST" class="mt-10 space-y-6 bg-white p-6 rounded-xl shadow-md">
            <!-- FORM FIELDS UNCHANGED -->
            <!-- Copy form fields from your original HTML -->
            <div class="grid gap-6 sm:grid-cols-2">
                <div>
                    <label for="name" class="block text-sm font-medium text-slate-700">Full Name *</label>
                    <input type="text" id="name" name="name" required placeholder="Jane Doe" class="mt-1 w-full rounded-lg border border-slate-300 px-4 py-2" />
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-slate-700">Email Address *</label>
                    <input type="email" id="email" name="email" required placeholder="jane@example.com" class="mt-1 w-full rounded-lg border border-slate-300 px-4 py-2" />
                </div>
                <div>
                    <label for="phone" class="block text-sm font-medium text-slate-700">Phone (optional)</label>
                    <input type="tel" id="phone" name="phone" placeholder="01208 368564" class="mt-1 w-full rounded-lg border border-slate-300 px-4 py-2" />
                </div>
                <div>
                    <label for="subject" class="block text-sm font-medium text-slate-700">Subject</label>
                    <input type="text" id="subject" name="subject" placeholder="I’m interested in a 3D sign…" class="mt-1 w-full rounded-lg border border-slate-300 px-4 py-2" />
                </div>
            </div>
            <div>
                <label for="message" class="block text-sm font-medium text-slate-700">Your Message *</label>
                <textarea id="message" name="message" rows="5" required placeholder="Tell us more about your project or enquiry…" class="mt-1 w-full rounded-lg border border-slate-300 px-4 py-2"></textarea>
            </div>
            <div class="text-center">
                <button type="submit" class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-sky-700 hover:bg-indigo-800 text-white font-semibold rounded-lg shadow-md transition">
                    ✉️ Send Message
                </button>
            </div>
        </form>
    </section>
</main>
<script src="/js/functions.js"></script>
<!-- Footer remains unchanged -->
</body>
</html>
