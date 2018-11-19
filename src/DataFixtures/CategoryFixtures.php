<?php
/**
 * Created by PhpStorm.
 * User: ln
 * Date: 18/11/18
 * Time: 17:37
 */

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{


//    public function load(ObjectManager $manager)
//    {
//        // TODO: Implement load() method.
//        for ($i = 1; $i <= 50; $i++) {
//            $category = new Category();
//            $category->setName('Nom de catégorie ' . $i);
//            $manager->persist($category);
//        }
//    $manager->flush();
//    }

      public function load(ObjectManager $manager)
      {
          $categories = [
          'PHP',
          'JAVASCRIPT',
          'JAVA',
          'RUBY',
          'PYTHON'
          ];
          // TODO: Implement load() method.
          foreach ($categories as $key => $categoryName){
              $category = new Category();
              $category->setName($categoryName);
              $manager->persist($category);
              $this->addReference('categorie_' . $key, $category);
          }
          $manager->flush();
      }
}