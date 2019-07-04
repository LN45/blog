<?php
/**
 * Created by PhpStorm.
 * User: ln
 * Date: 18/11/18
 * Time: 18:05
 */

namespace App\DataFixtures;

use App\Entity\Article;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class ArticlesFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        // TODO: Implement load() method.
        // On configure dans quelles langues nous voulons nos données
        $faker = Faker\Factory::create('fr_FR');

        for ($cat = 0; $cat < 5; $cat++){
            for ($art = 0; $art < 10; $art++) {
                $article = new Article();
                $article->setTitle(mb_strtolower($faker->title));
                $article->setContent($faker->text);
                $article->setCategory($this->getReference('categorie_'.$cat));
                // categorie_.$cat fait reference à la premiere categorie générée.

                $manager->persist($article);
                $manager->flush();
            }
        }
    }

    public function getDependencies()
    {
        return [CategoryFixtures::class];
    }


}
