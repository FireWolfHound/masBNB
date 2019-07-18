<?php

namespace App\DataFixtures;

use App\Entity\Ad;
use App\Entity\Image;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // utilisation de faker, localisé en français
        $faker = Factory::create('fr_FR');

        for ($i = 0; $i <=30; $i++){

            $ad = new Ad();

            $title = $faker->sentence();
            $coverImage = 'https://lorempixel.com/output/city-q-c-640-480-'. mt_rand(1, 9) . '.jpg';
            $introduction = $faker->paragraph(2);
            $content = '<p>' . join( '</p><p>' , $faker->paragraphs(5)) . '</p>';

            $ad->setTitle($title)
                ->setCoverImage($coverImage)
                ->setIntroduction($introduction)
                ->setContent($content)
                ->setPrice(mt_rand(40, 200))
                ->setRooms(mt_rand(1, 5));

            for($j = 0; $j <= mt_rand(2, 5); $j++){
               $image = new Image();

               $image->setUrl('https://lorempixel.com/output/nature-q-c-640-480-'. mt_rand(1, 10) . '.jpg')
                   ->setCaption($faker->sentence())
                   ->setAd($ad);
                $manager->persist($image);
            }

            $manager->persist($ad);
        }
        $manager->flush();
    }
}
