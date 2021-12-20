<?php

namespace App\DataFixtures;

use App\Entity\Post;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class PostFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        $post = new Post();
        $post->setName('New Article')
            ->setCategory($this->getReference(CategoryFixtures::HORREUR));
        $manager->persist($post);

        $post1 = new Post();
        $post1->setName('Covid')
            ->setCategory($this->getReference(CategoryFixtures::HORREUR));
        $manager->persist($post1);

        $post2 = new Post();
        $post2->setName('Élections')
            ->setCategory($this->getReference(CategoryFixtures::HORREUR));
        $manager->persist($post2);

        for ($i=1; $i <= 30; $i++) {
            $post3 = new Post();
            $post3->setName('Nom de catégorie ' .$i)
            ->setCategory($this->getReference(CategoryFixtures::HORREUR));
            $manager->persist($post3);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            CategoryFixtures::class,
        ];
    }
}
