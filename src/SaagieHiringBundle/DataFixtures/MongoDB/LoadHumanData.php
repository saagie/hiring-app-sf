<?php

namespace SaagieHiringBundle\DataFixtures\MongoDB;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use SaagieHiringBundle\Document\HumanEntity;

class LoadHumanData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $pierre = (new HumanEntity())
            ->setFirstname("Pierre")
            ->setLastname("Leresteux")
            ->setAddress("10D rue de l'implémentation")
            ->setCity("Jetbrain")
            ->setSex(HumanEntity::MAN)
            ->setAge(33);
        $manager->persist($pierre);

        $julien = (new HumanEntity())
            ->setFirstname("Julien")
            ->setLastname("Bignon")
            ->setAddress("2 chemin du hacker")
            ->setCity("Hadoop City")
            ->setSex(HumanEntity::MAN)
            ->setAge(32);
        $manager->persist($julien);

        $jonathan = (new HumanEntity())
            ->setFirstname("Jonathan")
            ->setLastname("Germond")
            ->setAddress("15 avenue de la conception")
            ->setCity("Professor Hadoop and Pattern")
            ->setSex(HumanEntity::MAN)
            ->setAge(29);
        $manager->persist($jonathan);

        $kevin = (new HumanEntity())
            ->setFirstname("Kevin")
            ->setLastname("Vezier")
            ->setAddress("69 rue du boulet")
            ->setCity("Yvetot")
            ->setSex(HumanEntity::MAN)
            ->setAge(27);
        $manager->persist($kevin);

        $etienne = (new HumanEntity())
            ->setFirstname("Etienne")
            ->setLastname("Gaouyer")
            ->setAddress("1 route moins n")
            ->setCity("Cisco Town")
            ->setSex(HumanEntity::MAN)
            ->setAge(37);
        $manager->persist($etienne);

        $jeoffrey = (new HumanEntity())
            ->setFirstname("Jeoffrey")
            ->setLastname("Poulain")
            ->setAddress("9 voie Yen Apour Lotre")
            ->setCity("InANuc")
            ->setSex(HumanEntity::PLANT)
            ->setAge(19);
        $manager->persist($jeoffrey);

        $manager->flush();
    }
}