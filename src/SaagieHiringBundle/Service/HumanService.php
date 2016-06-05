<?php

namespace SaagieHiringBundle\Service;


use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\DocumentRepository;
use SaagieHiringBundle\Document\HumanEntity;

class HumanService
{
    /**
     * @var DocumentManager
     */
    private $documentManager;

    /**
     * @var DocumentRepository
     */
    private $humanRepository;

    public function __construct(DocumentManager $documentManager)
    {
        $this->documentManager = $documentManager;
        $this->humanRepository = $documentManager->getRepository('SaagieHiringBundle:HumanEntity');
    }

    public function getAllHumans() {
        return $this->humanRepository->findAll();
    }

    public function getHuman($id) {
        return $this->humanRepository->find($id);
    }

    public function deleteHuman($id) {
        $humanEntity = $this->humanRepository->find($id);
        $this->documentManager->remove($humanEntity);
        return $humanEntity;
    }

    public function createHuman(HumanEntity $humanEntity) {
        return $humanEntity;
    }

    public function updateHuman(HumanEntity $humanEntity) {
        return $humanEntity;
    }
}