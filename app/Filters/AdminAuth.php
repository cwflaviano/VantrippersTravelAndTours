<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AdminAuth implements FilterInterface
{
    /**
     * Do whatever processing this filter needs to do.
     * By default it should not return anything during
     * normal execution. However, when an abnormal state
     * is found, it should return an instance of
     * CodeIgniter\HTTP\Response. If it does, script
     * execution will end and that Response will be
     * sent back to the client, allowing for error pages,
     * redirects, etc.
     *
     * @param RequestInterface $request
     * @param array|null       $arguments
     *
     * @return RequestInterface|ResponseInterface|string|void
     */
    public function before(RequestInterface $request, $arguments = null)
    {
        $uri_segment = service('uri')->getSegment(1);

        if(session()->has('user_id')) {
            if($uri_segment === 'login') {
                return redirect()->to('/admin/dashboard');
            }

            if($arguments) {
                if($arguments[0] !== 'Admin') {
                    return redirect()->to('/page_not_found');
                }
                if($arguments[0] !== 'Manager') {
    
                }
                if($arguments[0] !== 'Staff') {
    
                }
                if($arguments[0] !== 'Intern') {
    
                }
            }
        }

        if(!session()->has('user_id') && $uri_segment === 'admin') {
            return redirect()->to('/');
        }
    }

    /**
     * Allows After filters to inspect and modify the response
     * object as needed. This method does not allow any way
     * to stop execution of other after filters, short of
     * throwing an Exception or Error.
     *
     * @param RequestInterface  $request
     * @param ResponseInterface $response
     * @param array|null        $arguments
     *
     * @return ResponseInterface|void
     */
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        //
    }
}
