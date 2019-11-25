<?php

namespace App\DataFixtures;

use App\Entity\Account;
use App\Entity\AdminAccount;
use App\Entity\Hub;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        $account = new Account();
        $account->setName('George Abitbol');
        $account->setEmail('george@gd.fr');
        $manager->persist($account);

        $account2 = new Account();
        $account2->setName('John Doe');
        $account2->setEmail('johndoe@gd.fr');
        $manager->persist($account2);


        $hub1 = new Hub();
        $hub1->setName('Paris');
        $manager->persist($hub1);


        $hub2 = new Hub();
        $hub2->setName('Bordeaux');
        $manager->persist($hub2);


        $admin = new AdminAccount();
        $admin->setEmail('sarahconnor@t100.fr');
        $admin->setName('Sarah Connor');
        $admin->setDefaultHub($hub1);
        $admin->setAssociatedHubs(new ArrayCollection([
            $hub1, $hub2
        ]));
        $manager->persist($admin);


        $admin = new AdminAccount();
        $admin->setEmail('johnconnor@t100.fr');
        $admin->setName('John Connor');
        $admin->setDefaultHub($hub1);
        $admin->setAssociatedHubs(new ArrayCollection([
            $hub1
        ]));
        $manager->persist($admin);

        $manager->flush();
    }
}
