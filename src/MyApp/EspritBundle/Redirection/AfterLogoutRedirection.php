<?php
/**
 * Created by PhpStorm.
 * User: ElarbiMohamedAymen
 * Date: 18/11/2016
 * Time: 00:37
 */

namespace MyApp\EspritBundle\Redirection;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Http\Logout\LogoutSuccessHandlerInterface;

class AfterLogoutRedirection implements LogoutSuccessHandlerInterface
{
    /**
     * @var \Symfony\Component\Routing\RouterInterface
     */
    private $router;
    /**
     * @var \Symfony\Component\Security\Core\SecurityContextInterface
     */
    private $security;
    /**
     * @param SecurityContextInterface $security
     */
    public function __construct(RouterInterface $router, Security $security)
    {
        $this->router = $router;
        $this->security = $security;
    }
    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function onLogoutSuccess(Request $request)
    {
        // Get list of roles for current user
        $roles = $this->security->getToken()->getRoles();
        // Tranform this list in array
       /* $rolesTab = array_map(function($role){
            return $role->getRole();
        }, $roles);
*/
            $response = new RedirectResponse($this->router->generate('my_app_esprit_homepage'));
        return $response;
    }
}