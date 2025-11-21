<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// --- PUBLIC AREA (Bebas Akses) ---
$routes->get('/', 'Home::index');
$routes->get('/login', 'Auth::index');
$routes->post('/auth/loginProcess', 'Auth::loginProcess');
$routes->get('/logout', 'Auth::logout');
$routes->get('taruna/print/(:num)', 'Taruna::printCard/$1');

// --- RESTRICTED AREA (Wajib Login) ---
// Kita bungkus semua rute admin dalam group dengan filter 'auth'
$routes->group('', ['filter' => 'auth'], function ($routes) {
    
    // Dashboard
    $routes->get('/dashboard', 'Dashboard::index');

    // Fitur Pasukan (Roster)
    $routes->get('/pasukan', 'Pasukan::index');

    // Fitur Profil Taruna
    $routes->get('taruna/(:num)', 'Taruna::detail/$1');

    // Fitur Disiplin
    $routes->post('discipline/store', 'Discipline::store');
    
    // Fitur Tahfidz
    $routes->post('tahfidz/store', 'Tahfidz::store');

    // RUTE KHUSUS SISWA
    $routes->get('/my-dossier', 'StudentArea::index');

    // Jalur Edit Profil
    $routes->get('taruna/edit/(:num)', 'Taruna::edit/$1');
    $routes->post('taruna/update/(:num)', 'Taruna::update/$1');
    $routes->get('taruna/print/(:num)', 'Taruna::printCard/$1');

    // Menggunakan POST (Sesuai dengan form di View tadi)
    $routes->post('discipline/delete/(:num)', 'Discipline::delete/$1');

    // Manajemen Kelas
    $routes->get('kelas', 'Kelas::index');
    $routes->post('kelas/store', 'Kelas::store');
    $routes->delete('kelas/delete/(:num)', 'Kelas::delete/$1');

    // Manajemen Siswa Baru
    $routes->get('taruna/create', 'Taruna::create');
    $routes->post('taruna/store', 'Taruna::store');
    $routes->get('/leaderboard', 'Leaderboard::index');

    // FITUR GANTI PASSWORD
    $routes->get('/change-password', 'Auth::changePassword');
    $routes->post('/auth/updatePassword', 'Auth::updatePassword');

    // Hapus Pasukan
    $routes->delete('taruna/delete/(:num)', 'Taruna::delete/$1');

    // Manajemen Perwira
    $routes->get('guru', 'Guru::index');
    $routes->post('guru/store', 'Guru::store');
    $routes->delete('guru/delete/(:num)', 'Guru::delete/$1');
});