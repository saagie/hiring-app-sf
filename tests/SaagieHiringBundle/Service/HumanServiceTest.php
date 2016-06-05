<?php

namespace SaagieHiringBundle\Tests\Service;


use Liip\FunctionalTestBundle\Test\WebTestCase;

class HumanServiceTest extends WebTestCase
{
    /**
     * @test
     */
    public function should_get_all_humans() {
        // GIVEN
        $this->loadFixtures(array('SaagieHiringBundle\DataFixtures\MongoDB\LoadHumanData'), null, 'doctrine_mongodb');

        // WHEN
        $humanRepository = $this->getContainer()->get('doctrine_mongodb')->getRepository('SaagieHiringBundle:HumanEntity');
        $humans = $humanRepository->findAll();

        // THEN
        $this->assertCount(6, $humans);
    }

    /**
     * @test
     */
    public function should_get_one_human_if_exists() {
        // GIVEN
        $this->loadFixtures(array('SaagieHiringBundle\DataFixtures\MongoDB\LoadHumanData'), null, 'doctrine_mongodb');

        // WHEN
        $humanRepository = $this->getContainer()->get('doctrine_mongodb')->getRepository('SaagieHiringBundle:HumanEntity');
        $human = $humanRepository->findOneByFirstname('Jonathan');

        // THEN
        $this->assertNotnull($human);
        $this->assertEquals('Germond', $human->getLastname());
    }
}