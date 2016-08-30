<?php

use Illuminate\Database\Seeder;

use App\Dish;

class DishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dish = new Dish;

        $dish->name = "Panna cotta of coconut and pineapple salad";
//        $dish->sDescription = "Een eenvoudige dessert dat snel klaar te maken is en doet denken aan pina colada";
        $dish->sDescription = "
A simple dessert that's reminds you of pina colada . Jeroen uses coconuts cream instead of regular cream and serves with pineapple and mint on it. by itself,this dessert quickly and easily to make, but keep in mind that it still needs time in the refrigerator.";
        $dish->difficulty = 1;
        $dish->ingredients = "De panna cotta;

    5 dl coconuts cream;
    1 dl milk;
    2 lime leaves;
    30 g vanilla sugar;
    15 g cristal sugar;
    1 vanilla pod;
    3 gelatine leaves; 

Pineapple salad;

    1 fresh pineapple;
    1⁄4 sprig of mint ";
        $dish->preparations = "The panna cotta

    Soak the gelatine leaves in cold water to make them tender.

    Bring the coconut milk to a boil with the milk and lime leaves. Add the vanilla sugar and sugar.

    TIP: Kaffir is typical of Thai cuisine. You may or dried kaffir lime leaves, or buy frozen at the Asian supermarket.

    Cut the vanilla bean open lengthwise and scrape out the seeds with a sharp knife. Put the seeds and the pod at the (coconut) milk.

    Squeeze the gelatine well. Stir it into the (coconut) milk until it is complete.

    Strain the panna cotta into a bowl and spread over pots or panna cotta molds. Allow 2 to 3 hours in the refrigerator.

 
pineapple Salad

    Cut the top and bottom of the pineapple. Put him on the work surface and cut the rest of the peel away. Remove remaining 'dots'.

    TIP: Smell the bottom of the pineapple to know whether he is right.

    Cut the pineapple into four and remove the core. Cut the flesh into small cubes (brunoise).

    Remove the leaves of mint and chop them finely. Mix them with the diced pineapple. Keep cool in the refrigerator.

 
Finishing and serve

    Do you have panna cotta molds used? Keep them for a few seconds in hot water and invert them on a plate. Let sit at ordinary jars the panna cotta.

    Serve the salad with pineapple.";
        $dish->fittingDrinks = "";
        $dish->duration = "50'";
        $dish->photo_url = "http://daisybrand.com/assets/images/recipes/recipe-images/PANNA%20COTTA%20W%20STRAWBERRY%20SAUCE%20770x628_5314.jpg";
        $dish->user()->associate(3);

        $dish->save();
        $dish->save();
        $dish->save();

        /////////////////////////////////////////////////////
        $dish = new Dish;

        $dish->name = "Vermicelli Noodle Bowl";
//        $dish->sDescription = "Een eenvoudige dessert dat snel klaar te maken is en doet denken aan pina colada";
        $dish->sDescription = "Many Vietnamese dishes are perfect for hot weather. This simple noodle salad combines fresh herbs, rice vermicelli, cucumber, bean sprouts, and more, topped with grilled shrimp. Tossed with a tangy sweet and sour sauce, it's a simple and satisfying dinner.";
        $dish->difficulty = 2;
        $dish->ingredients = "1/4 cup white vinegar;
         1/4 cup fish sauce;
          2 tablespoons white sugar;
           2 tablespoons lime juice;
            1 clove garlic, minced;
             1/4 teaspoon red pepper flakes;
              1/2 teaspoon canola oil;
               2 tablespoons chopped shallots;
                2 skewers 8 medium shrimp, with shells;
                 1 (8 ounce) package rice vermicelli noodles;
                  1 cup finely chopped lettuce;
                   1 cup bean sprouts 1 English cucumber, cut into 2-inch matchsticks;
                    1/4 cup finely chopped pickled carrots;
                     1/4 cup finely chopped diakon radish;
                      3 tablespoons chopped cilantro;
                       3 tablespoons finely chopped Thai basil;
                        3 tablespoons chopped fresh mint;
                         1/4 cup crushed peanuts";
        $dish->preparations = "Whisk together vinegar, fish sauce, sugar, lime juice, garlic, and red pepper flakes in small bowl. Set the sauce aside.

Heat vegetable oil a small skillet over medium heat. Add shallots; cook and stir and softened and lightly caramelized, about 8 minutes.

Preheat an outdoor grill for medium heat and lightly oil the grate. Skewer 4 shrimp on each skewer and grill until they turn pink and are charred on the outside, 1 to 2 minutes per side. Set aside.

Bring a large pot of water to a boil. Add vermicelli noodles and cook until softened, 12 minutes. Drain noodles and rinse with cold water, stirring to separate the noodles.

Assemble the vermicelli bowl by placing the cooked noodles in one half of each serving bowl and the lettuce and bean sprouts in the other half. Top each bowl with cucumbers, carrots, daikon, cilantro, Thai basil, mint, peanuts, and the caramelized shallots. Serve with shrimp skewers on top and sauce on the side. Pour sauce over the top and toss thoroughly to coat before eating.";
        $dish->fittingDrinks = "";
        $dish->duration = "1h";
        $dish->photo_url = "http://images.media-allrecipes.com/userphotos/720x405/3132170.jpg";
        $dish->user()->associate(3);

        $dish->save();

        /////////////////////////////////////////////////////
        $dish = new Dish;

        $dish->name = "Apple Butter Bars";
        $dish->sDescription = "Moist bars drizzled with icing";
        $dish->difficulty = 2;
        $dish->ingredients = "1/2 cup butter;
         1 1/2 cups all-purpose flour;
          1/2 cup packed brown sugar;
           1/4 cup white sugar;
            1 egg 3/4 cup apple butter;
             1/2 teaspoon baking soda;
              1/2 teaspoon apple pie spice;
               1 cup raisins 1 cup confectioners' sugar;
                1/4 teaspoon vanilla extract;
                 2 tablespoons milk";
        $dish->preparations = "Preheat oven to 350 degrees F (175 degrees C). Grease a 13 x 9 x 2 inch baking pan.

Beat butter or margarine until creamy. Add half of the flour, the brown sugar, white sugar, egg, apple butter, baking soda and the apple pie spice. Beat together until well blended. Beat in remaining flour and stir in raisins. Spread in prepared baking pan.

Bake for 20-25 minutes or till toothpick in center comes out clean. Cool in pan on wire rack. Drizzle with icing. Cut into bars.

To Make Icing: Mix 1 cup confectioners' sugar, 1/4 teaspoon vanilla and 1 - 2 tablespoons milk. Mix to drizzling consistency.";
        $dish->fittingDrinks = "";
        $dish->duration = "1h";
        $dish->photo_url = "http://images.media-allrecipes.com/userphotos/720x405/482203.jpg";
        $dish->user()->associate(7);

        $dish->save();

        /////////////////////////////////////////////////////
        $dish = new Dish;

        $dish->name = "Chicken Apple Sausage with Cabbage";
        $dish->sDescription = "This is a great cold weather meal, although it's delicious anytime of the year.";
        $dish->difficulty = 2;
        $dish->ingredients = "1 1/2 teaspoons butter;
         1 teaspoon olive oil;
          4 links chicken and apple sausage;
           1 onion, sliced;
            1 pinch salt and freshly ground black pepper to taste;
             3 cloves garlic, crushed 3 cups apple cider or apple juice;
              1 pound small Yukon Gold potatoes, scrubbed but not peeled;
               1 1/2 pounds finely shredded green cabbage;
                salt and freshly ground black pepper to taste;
                 2 tablespoons Dijon mustard, for garnish;
                  2 tablespoons chopped fresh parsley, for garnish";
        $dish->preparations = "Combine butter and olive oil in a Dutch oven over medium heat; add sausages and cook until browned on all sides, 6 to 8 minutes.

Stir onion, pinch of salt, and pinch of pepper in with the sausages. Cook and stir until onions are slightly translucent and caramelized, about 5 minutes.

Stir garlic into sausage mixture; cook and stir for 30 seconds.

Pour apple cider into sausage mixture; increase heat to medium-high and stir in potatoes. Bring to a simmer.

Pour cabbage over top of sausage mixture and reduce heat to medium-low. Cover and simmer until potatoes are tender, 20 to 25 minutes. Remove sausages and potatoes from the Dutch oven and set aside.

Increase heat to high, simmer liquid until thick and reduced by half, about 5 minutes.

Return potatoes and sausages to the Dutch oven and remove from heat. Season with salt and pepper to taste. Garnish with mustard and parsley.";
        $dish->fittingDrinks = "Cola";
        $dish->duration = "55m";
        $dish->photo_url = "http://images.media-allrecipes.com/userphotos/720x405/903903.jpg";
        $dish->user()->associate(6);

        $dish->save();


        /////////////////////////////////////////////////////
        $dish = new Dish;

        $dish->name = "Favorite Mexican Salad";
        $dish->sDescription = "This has been a favorite since my childhood! I liked it before I even would eat salad! It's always a huge hit and goes especially great with outdoor gatherings (i.e grilling, barbeques, etc.). My husband and I often make a huge salad and split it for our dinner. It's very flavorful, filling, and colorful. I am often requested to bring this to gatherings with friends.";
        $dish->difficulty = 4;
        $dish->ingredients = "4 cups torn romaine lettuce, or more to taste;
         1 tomato, chopped;
          1 bunch green onions, chopped;
          1 avocado - peeled, pitted and chopped - or more to taste;
           1 cup shredded Cheddar cheese, or more to taste;
            1 (15 ounce) can ranch-style beans, rinsed and drained;
             2 cups corn chips (such as Fritos®, crushed - or more to taste;
              1/4 cup Catalina salad dressing, or to taste";
        $dish->preparations = "Toss the romaine lettuce, tomato, green onions, avocado, and Cheddar cheese in a large salad bowl until thoroughly combined. Stir in the ranch-style beans. Just before serving, toss salad with the corn chips and Catalina dressing until salad is evenly coated.";
        $dish->fittingDrinks = "Cola";
        $dish->duration = "20m";
        $dish->photo_url = "http://images.media-allrecipes.com/userphotos/720x405/2133009.jpg";
        $dish->user()->associate(5);

        $dish->save();
    }
}
