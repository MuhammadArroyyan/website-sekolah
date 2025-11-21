<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // CEK IDENTITAS: Apakah user sudah login?
        if (!session()->get('isLoggedIn')) {
            // Jika belum, arahkan ke Gerbang Login dengan pesan error
            return redirect()->to('/login')->with('error', 'ACCESS DENIED: Login Required.');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Tidak ada tindakan setelah request (biarkan kosong)
    }
}