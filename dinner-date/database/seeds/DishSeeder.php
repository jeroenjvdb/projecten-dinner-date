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

        $dish->name = "panna cotta van kokos en ananassalade";
        $dish->sDescription = "Een eenvoudige dessert dat snel klaar te maken is en doet denken aan pina colada";
        $dish->lDescription = "Een eenvoudige dessert dat doet denken aan pina colada. Jeroen gebruikt kokosroom in plaats van gewone room en geef er ananas en munt bij. Op zich is dit dessert eenvoudig en snel klaar te maken, maar hou er wel rekening mee dat het nog een tijd moet opstijven in de koelkast.";
        $dish->difficulty = 1;
        $dish->ingredients = "De panna cotta;

    5 dl kokosmelk (of kokosroom);
    1 dl melk;
    2 limoenblaadjes (kaffir);
    30 g vanillesuiker;
    15 g kristalsuiker;
    1 vanillestokje;
    3 blaadjes gelatine; 

Ananassalade;

    1 verse ananas;
    1⁄4 bussel munt ";
        $dish->preparations = "De panna cotta

    Week de blaadjes gelatine in koud water om ze mals te maken.

    Breng de kokosmelk aan de kook met de melk en de limoenblaadjes. Doe er de vanillesuiker en de suiker bij.

    TIP: Kaffir is typisch voor de Thaise keuken. Je kunt kaffir of limoenblaadjes gedroogd of ingevroren kopen bij de Aziatische supermarkt.

    Snijd het vanillestokje overlangs open en schraap er de zaadjes uit met een scherp mes. Doe de zaadjes en de peul bij de (kokos)melk.

    Knijp de gelatine goed uit. Roer hem door de (kokos)melk tot hij helemaal opgelost is.

    Zeef de panna cotta boven een kom en verdeel over potjes of panna cottavormpjes. Laat 2 tot 3 uur opstijven in de koelkast.

 
Ananassalade

    Snijd de boven- en onderkant van de ananas. Zet hem op het werkvlak en snijd de rest van de schil weg. Verwijder overgebleven ‘puntjes’.

    TIP: Ruik aan de onderkant van de ananas om te weten of hij rijp is.

    Snijd de ananas in vier en verwijder de harde kern. Snijd het vruchtvlees in kleine blokjes (brunoise).

    Haal de blaadjes van de munt en snipper ze fijn. Meng ze door de brunoise van ananas. Hou fris in de koelkast.

 
Afwerken en serveren

    Heb je panna cotta vormpjes gebruikt? Houd ze een paar seconden in heet water en keer ze om op een bord. Laat bij gewone potjes de panna cotta zitten.

    Geef er de ananassalade bij.";
        $dish->fittingDrinks = "";
        $dish->duration = "50'";
        $dish->photo_url = "http://daisybrand.com/assets/images/recipes/recipe-images/PANNA%20COTTA%20W%20STRAWBERRY%20SAUCE%20770x628_5314.jpg";
        $dish->users()->associate(1);

        $dish->save();

        $dish = new Dish;

        $dish->name = "panna cotta van kokos en ananassalade";
        $dish->sDescription = "Een eenvoudige dessert dat snel klaar te maken is en doet denken aan pina colada";
        $dish->lDescription = "Een eenvoudige dessert dat doet denken aan pina colada. Jeroen gebruikt kokosroom in plaats van gewone room en geef er ananas en munt bij. Op zich is dit dessert eenvoudig en snel klaar te maken, maar hou er wel rekening mee dat het nog een tijd moet opstijven in de koelkast.";
        $dish->difficulty = 1;
        $dish->ingredients = "De panna cotta;

    5 dl kokosmelk (of kokosroom);
    1 dl melk;
    2 limoenblaadjes (kaffir);
    30 g vanillesuiker;
    15 g kristalsuiker;
    1 vanillestokje;
    3 blaadjes gelatine; 

Ananassalade;

    1 verse ananas;
    1⁄4 bussel munt ";
        $dish->preparations = "De panna cotta

    Week de blaadjes gelatine in koud water om ze mals te maken.

    Breng de kokosmelk aan de kook met de melk en de limoenblaadjes. Doe er de vanillesuiker en de suiker bij.

    TIP: Kaffir is typisch voor de Thaise keuken. Je kunt kaffir of limoenblaadjes gedroogd of ingevroren kopen bij de Aziatische supermarkt.

    Snijd het vanillestokje overlangs open en schraap er de zaadjes uit met een scherp mes. Doe de zaadjes en de peul bij de (kokos)melk.

    Knijp de gelatine goed uit. Roer hem door de (kokos)melk tot hij helemaal opgelost is.

    Zeef de panna cotta boven een kom en verdeel over potjes of panna cottavormpjes. Laat 2 tot 3 uur opstijven in de koelkast.

 
Ananassalade

    Snijd de boven- en onderkant van de ananas. Zet hem op het werkvlak en snijd de rest van de schil weg. Verwijder overgebleven ‘puntjes’.

    TIP: Ruik aan de onderkant van de ananas om te weten of hij rijp is.

    Snijd de ananas in vier en verwijder de harde kern. Snijd het vruchtvlees in kleine blokjes (brunoise).

    Haal de blaadjes van de munt en snipper ze fijn. Meng ze door de brunoise van ananas. Hou fris in de koelkast.

 
Afwerken en serveren

    Heb je panna cotta vormpjes gebruikt? Houd ze een paar seconden in heet water en keer ze om op een bord. Laat bij gewone potjes de panna cotta zitten.

    Geef er de ananassalade bij.";
        $dish->fittingDrinks = "";
        $dish->duration = "50'";
        $dish->photo_url = "http://daisybrand.com/assets/images/recipes/recipe-images/PANNA%20COTTA%20W%20STRAWBERRY%20SAUCE%20770x628_5314.jpg";
        $dish->users()->associate(1);

        $dish->save();

        $dish = new Dish;

        $dish->name = "panna cotta van kokos en ananassalade";
        $dish->sDescription = "Een eenvoudige dessert dat snel klaar te maken is en doet denken aan pina colada";
        $dish->lDescription = "Een eenvoudige dessert dat doet denken aan pina colada. Jeroen gebruikt kokosroom in plaats van gewone room en geef er ananas en munt bij. Op zich is dit dessert eenvoudig en snel klaar te maken, maar hou er wel rekening mee dat het nog een tijd moet opstijven in de koelkast.";
        $dish->difficulty = 1;
        $dish->ingredients = "De panna cotta;

    5 dl kokosmelk (of kokosroom);
    1 dl melk;
    2 limoenblaadjes (kaffir);
    30 g vanillesuiker;
    15 g kristalsuiker;
    1 vanillestokje;
    3 blaadjes gelatine; 

Ananassalade;

    1 verse ananas;
    1⁄4 bussel munt ";
        $dish->preparations = "De panna cotta

    Week de blaadjes gelatine in koud water om ze mals te maken.

    Breng de kokosmelk aan de kook met de melk en de limoenblaadjes. Doe er de vanillesuiker en de suiker bij.

    TIP: Kaffir is typisch voor de Thaise keuken. Je kunt kaffir of limoenblaadjes gedroogd of ingevroren kopen bij de Aziatische supermarkt.

    Snijd het vanillestokje overlangs open en schraap er de zaadjes uit met een scherp mes. Doe de zaadjes en de peul bij de (kokos)melk.

    Knijp de gelatine goed uit. Roer hem door de (kokos)melk tot hij helemaal opgelost is.

    Zeef de panna cotta boven een kom en verdeel over potjes of panna cottavormpjes. Laat 2 tot 3 uur opstijven in de koelkast.

 
Ananassalade

    Snijd de boven- en onderkant van de ananas. Zet hem op het werkvlak en snijd de rest van de schil weg. Verwijder overgebleven ‘puntjes’.

    TIP: Ruik aan de onderkant van de ananas om te weten of hij rijp is.

    Snijd de ananas in vier en verwijder de harde kern. Snijd het vruchtvlees in kleine blokjes (brunoise).

    Haal de blaadjes van de munt en snipper ze fijn. Meng ze door de brunoise van ananas. Hou fris in de koelkast.

 
Afwerken en serveren

    Heb je panna cotta vormpjes gebruikt? Houd ze een paar seconden in heet water en keer ze om op een bord. Laat bij gewone potjes de panna cotta zitten.

    Geef er de ananassalade bij.";
        $dish->fittingDrinks = "";
        $dish->duration = "50'";
        $dish->photo_url = "http://daisybrand.com/assets/images/recipes/recipe-images/PANNA%20COTTA%20W%20STRAWBERRY%20SAUCE%20770x628_5314.jpg";
        $dish->users()->associate(1);

        $dish->save();

        $dish = new Dish;

        $dish->name = "panna cotta van kokos en ananassalade";
        $dish->sDescription = "Een eenvoudige dessert dat snel klaar te maken is en doet denken aan pina colada";
        $dish->lDescription = "Een eenvoudige dessert dat doet denken aan pina colada. Jeroen gebruikt kokosroom in plaats van gewone room en geef er ananas en munt bij. Op zich is dit dessert eenvoudig en snel klaar te maken, maar hou er wel rekening mee dat het nog een tijd moet opstijven in de koelkast.";
        $dish->difficulty = 1;
        $dish->ingredients = "De panna cotta;

    5 dl kokosmelk (of kokosroom);
    1 dl melk;
    2 limoenblaadjes (kaffir);
    30 g vanillesuiker;
    15 g kristalsuiker;
    1 vanillestokje;
    3 blaadjes gelatine; 

Ananassalade;

    1 verse ananas;
    1⁄4 bussel munt ";
        $dish->preparations = "De panna cotta

    Week de blaadjes gelatine in koud water om ze mals te maken.

    Breng de kokosmelk aan de kook met de melk en de limoenblaadjes. Doe er de vanillesuiker en de suiker bij.

    TIP: Kaffir is typisch voor de Thaise keuken. Je kunt kaffir of limoenblaadjes gedroogd of ingevroren kopen bij de Aziatische supermarkt.

    Snijd het vanillestokje overlangs open en schraap er de zaadjes uit met een scherp mes. Doe de zaadjes en de peul bij de (kokos)melk.

    Knijp de gelatine goed uit. Roer hem door de (kokos)melk tot hij helemaal opgelost is.

    Zeef de panna cotta boven een kom en verdeel over potjes of panna cottavormpjes. Laat 2 tot 3 uur opstijven in de koelkast.

 
Ananassalade

    Snijd de boven- en onderkant van de ananas. Zet hem op het werkvlak en snijd de rest van de schil weg. Verwijder overgebleven ‘puntjes’.

    TIP: Ruik aan de onderkant van de ananas om te weten of hij rijp is.

    Snijd de ananas in vier en verwijder de harde kern. Snijd het vruchtvlees in kleine blokjes (brunoise).

    Haal de blaadjes van de munt en snipper ze fijn. Meng ze door de brunoise van ananas. Hou fris in de koelkast.

 
Afwerken en serveren

    Heb je panna cotta vormpjes gebruikt? Houd ze een paar seconden in heet water en keer ze om op een bord. Laat bij gewone potjes de panna cotta zitten.

    Geef er de ananassalade bij.";
        $dish->fittingDrinks = "";
        $dish->duration = "50'";
        $dish->photo_url = "http://daisybrand.com/assets/images/recipes/recipe-images/PANNA%20COTTA%20W%20STRAWBERRY%20SAUCE%20770x628_5314.jpg";
        $dish->users()->associate(1);

        $dish->save();




    }
}
