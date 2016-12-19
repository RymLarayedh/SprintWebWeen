<?php

/**
 * Created by PhpStorm.
 * User: ElarbiMohamedAymen
 * Date: 18/11/2016
 * Time: 00:16
 */
namespace MyApp\EspritBundle\Redirection;
use Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Router;
use Symfony\Component\Security\Core\Authorization\AuthorizationChecker;

class Afterloginredirection implements AuthenticationSuccessHandlerInterface
{
    protected $router;
    protected $security;

    /**
     * AfterLoginRedirection constructor.
     * @param Router $router
     * @param AuthorizationChecker $security
     */
    public function __construct(Router $router, AuthorizationChecker $security)
    {
        $this->router = $router;
        $this->security = $security;
    }


    public function onAuthenticationSuccess(Request $request, TokenInterface $token)
    {
        if ($this->security->isGranted('ROLE_SUPER_ADMIN')) {
            $response = new RedirectResponse($this->router->generate('my_app_esprit_admin'));
        } else {
            //$referer_url = $request->headers->get('referer');

            $response = new RedirectResponse($this->router->generate('my_app_esprit_client'));
        }
        return $response;
    }
}