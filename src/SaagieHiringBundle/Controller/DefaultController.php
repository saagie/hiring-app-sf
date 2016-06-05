<?php

namespace SaagieHiringBundle\Controller;


use SaagieHiringBundle\Service\HumanService;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\DependencyInjection\ContainerInterface;
use JMS\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @var SerializerInterface
     */
    protected $serializer;

    /**
     * @var HumanService
     */
    protected $humanService;

    public function setContainer(ContainerInterface $container = null)
    {
        parent::setContainer($container);
        $this->serializer = $this->get('serializer');
        $this->humanService = $this->get('saagie_hiring.human');
    }

    /**
     * @Route("/api/human")
     */
    public function getAllAction()
    {
        $humans = $this->humanService->getAllHumans();

        $json = $this->serializer->serialize($humans, 'json');
        $response = new Response($json);
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    /**
     * @Route("/api/human/{id}")
     */
    public function getOneAction($id)
    {
        $human = $this->humanService->getHuman($id);

        $json = $this->serializer->serialize($human, 'json');
        $response = new Response($json);
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    /**
     * @Route("/api/human")
     * @Method("POST")
     */
    public function createAction()
    {
        return new Response();
    }

    /**
     * @Route("/api/human/{id}")
     * @Method("DELETE")
     */
    public function deleteAction()
    {
        return new Response();
    }
}
