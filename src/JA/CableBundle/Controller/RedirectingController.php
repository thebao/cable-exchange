<?php
/**
 * Created by PhpStorm.
 * User: theo
 * Date: 6/20/15
 * Time: 2:02 PM
 */

namespace JA\CableBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class RedirectingController extends Controller
{
    public function removeTrailingSlashAction(Request $request)
    {
        $pathInfo = $request->getPathInfo();
        $requestUri = $request->getRequestUri();

        $url = str_replace($pathInfo, rtrim($pathInfo, " /"), $requestUri);

        return $this->redirect($url,301);
    }
} 