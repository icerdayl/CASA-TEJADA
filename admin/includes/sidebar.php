<?php
$currentPage = basename($_SERVER['PHP_SELF']);

function sidebarLinkClass(string $page, string $baseClass = ''): string
{
    global $currentPage;

    $activeClass = $currentPage === $page ? 'bg-slate-800 text-white' : 'text-slate-300 hover:bg-slate-800 hover:text-white';

    return trim($baseClass . ' ' . $activeClass);
}
?>

<div class="w-64 bg-slate-900 text-white min-h-screen fixed shadow-2xl border-r border-slate-800">

    <div class="p-6 border-b border-slate-700">

        <h1 class="text-2xl font-bold">
            CASA TEJADA
        </h1>

        <p class="text-slate-400 text-sm">
            Admin Panel
        </p>

    </div>

    <nav class="p-4">

        <ul class="space-y-2">

            <li>
                <a
                href="dashboard.php"
                class="block px-4 py-3 rounded-lg <?= sidebarLinkClass('dashboard.php') ?>">
                🏠 Dashboard
                </a>
            </li>

            <li>
                <a
                href="bookings.php"
                class="block px-4 py-3 rounded-lg <?= sidebarLinkClass('bookings.php') ?>">
                📅 Bookings
                </a>
            </li>

            <li>
                <a
                href="calendar.php"
                class="block px-4 py-3 rounded-lg <?= sidebarLinkClass('calendar.php') ?>">
                📆 Calendar
                </a>
            </li>

            <li>
                <a
                href="packages.php"
                class="block px-4 py-3 rounded-lg <?= sidebarLinkClass('packages.php') ?>">
                📦 Packages
                </a>
            </li>

            <li>
                <a
                href="gallery.php"
                class="block px-4 py-3 rounded-lg <?= sidebarLinkClass('gallery.php') ?>">
                🖼 Gallery
                </a>
            </li>

            <li>
                <a
                href="logout.php"
                class="block px-4 py-3 rounded-lg bg-red-600 hover:bg-red-700 text-white">
                🚪 Logout
                </a>
            </li>

        </ul>

    </nav>

</div>