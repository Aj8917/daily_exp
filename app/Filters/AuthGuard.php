<?php 
namespace App\Filters;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthGuard implements FilterInterface
{
    public function before(RequestInterface $request , $argument=null)
    {
        if(!session()->get('isLoggedIn'))
        {
            return redirect()
                   ->to('/');
        }
    }

    public function after(RequestInterface $request,ResponseInterface $responce , $argument=null)
    {

    }
}
