<?php
/**
 * Created by PhpStorm.
 * User: iplayguitar81
 * Date: 6/30/19
 * Time: 7:24 PM
 */

namespace App\EventListener;


use FOS\UserBundle\Event\FormEvent;
use FOS\UserBundle\FOSUserEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\RouterInterface;

class RedirectAfterRegistrationSubscriber implements EventSubscriberInterface
{


    //declare $router var to be initialized in constructor
    private $router;

    //constructor method passing RouterInterface $router object...
    public function __construct(RouterInterface $router) {

        $this->router = $router;
    }


    //pass FormEvent object to onRegistrationSuccess method to set the response...
    //...to redirect to the home page
    public function onRegistrationSuccess(FormEvent $event) {

        //set $url var to equal router object and set route to home page...
        $url = $this->router->generate('home');

        //set $response var to equal new RedirectResponse passing the $url var...
        $response = new RedirectResponse($url);

        //set FormEvent $event object's response to $response var...
        $event->setResponse($response);

    }


    //override default REGISTRATION_SUCCESS FOSUserEvent calling onRegistrationSuccess...
    public static function getSubscribedEvents()
    {
       return [

           FOSUserEvents::REGISTRATION_SUCCESS => 'onRegistrationSuccess'

       ];
    }


}