<?php

namespace SaagieHiringBundle\Controller;

use Doctrine\ODM\MongoDB\DocumentRepository;
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
     * @var DocumentRepository
     */
    protected $humanRepository;

    public function setContainer(ContainerInterface $container = null)
    {
        parent::setContainer($container);
        $this->serializer = $this->get('serializer');
        $this->humanRepository = $this->get('doctrine_mongodb')->getRepository('SaagieHiringBundle:HumanEntity');
    }

    /**
     * @Route("/api/human")
     */
    public function getAllAction()
    {
        $humans = $this->humanRepository->findAll();

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
        $human = $this->humanRepository->find($id);

        $json = $this->serializer->serialize($human, 'json');
        $response = new Response($json);
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }
}
