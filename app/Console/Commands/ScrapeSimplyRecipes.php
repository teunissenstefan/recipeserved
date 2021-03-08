<?php

namespace App\Console\Commands;

use App\Models\Recipe;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class ScrapeSimplyRecipes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scrape:simplyrecipes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Scrape SimplyRecipes';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $urls = [
            "https://www.simplyrecipes.com/oat-and-tahini-breakfast-cookies-5112560",
            "https://www.simplyrecipes.com/recipes/instant_pot_yogurt/",
            "https://www.simplyrecipes.com/recipes/how_to_make_the_best_oatmeal/",
            "https://www.simplyrecipes.com/recipes/vegetable_shakshuka_with_pesto/",
            "https://www.simplyrecipes.com/recipes/spinach_frittata/",
            "https://www.simplyrecipes.com/recipes/easy_poached_eggs/",
            "https://www.simplyrecipes.com/recipes/how_to_make_an_omelet/",
            "https://www.simplyrecipes.com/recipes/huevos_rancheros/",
            "https://www.simplyrecipes.com/recipes/microwave_poached_eggs/",
            "https://www.simplyrecipes.com/recipes/how_to_make_overnight_oatmeal/",
            "https://www.simplyrecipes.com/recipes/orange_spiced_whole_wheat_muffins/",
            "https://www.simplyrecipes.com/recipes/easy_breakfast_casserole_with_prosciutto/",
            "https://www.simplyrecipes.com/recipes/buckwheat_waffles/",
            "https://www.simplyrecipes.com/recipes/oatmeal_buttermilk_pancakes/",
            "https://www.simplyrecipes.com/recipes/tuscan_scrambled_eggs/",
            "https://www.simplyrecipes.com/parfait-with-maple-yogurt-citrus-and-pomegranate-recipe-5112515",
            "https://www.simplyrecipes.com/recipes/frittata_with_potatoes_red_peppers_and_spinach/",
            "https://www.simplyrecipes.com/recipes/holiday_spice_granola/",
            "https://www.simplyrecipes.com/recipes/bloody_mary_smoothie/",
            "https://www.simplyrecipes.com/recipes/sweet_potato_hash_browns/",
            "https://www.simplyrecipes.com/recipes/how_to_make_granola_in_the_slow_cooker/",
            "https://www.simplyrecipes.com/recipes/banana_bread/",
            "https://www.simplyrecipes.com/recipes/crispy_hash_browns/",
            "https://www.simplyrecipes.com/recipes/homemade_pancake_mix/",
            "https://www.simplyrecipes.com/recipes/chilaquiles/",
            "https://www.simplyrecipes.com/recipes/zucchini_bread/",
            "https://www.simplyrecipes.com/recipes/easy_peel_hard_boiled_eggs_in_the_pressure_cooker/",
            "https://www.simplyrecipes.com/recipes/how_to_make_fluffy_scrambled_eggs/",
            "https://www.simplyrecipes.com/recipes/banana_nut_muffins/",
            "https://www.simplyrecipes.com/recipes/popovers/",
            "https://www.simplyrecipes.com/recipes/buckwheat_pancakes/",
            "https://www.simplyrecipes.com/recipes/egg_nests/",
            "https://www.simplyrecipes.com/recipes/chorizo_and_eggs/",
            "https://www.simplyrecipes.com/recipes/cooking_for_two_strawberry_almond_oat_smoothie/",
            "https://www.simplyrecipes.com/recipes/lemon_ginger_muffins/",
            "https://www.simplyrecipes.com/recipes/lemon_rosemary_zucchini_bread/",
            "https://www.simplyrecipes.com/recipes/mixed_berry_chia_seed_jam/",
            "https://www.simplyrecipes.com/recipes/strawberry_buttermilk_overnight_oats/",
            "https://www.simplyrecipes.com/recipes/morning_glory_muffins/",
            "https://www.simplyrecipes.com/recipes/sheet_pan_english_breakfast/",
            "https://www.simplyrecipes.com/recipes/how_to_make_fluffy_buttermilk_pancakes/",
            "https://www.simplyrecipes.com/recipes/cherry_almond_granola_with_vanilla_crumbles/",
            "https://www.simplyrecipes.com/recipes/german_farmers_breakfast/",
            "https://www.simplyrecipes.com/recipes/pumpkin_ginger_nut_muffins/",
            "https://www.simplyrecipes.com/recipes/green_mojito_smoothie/",
            "https://www.simplyrecipes.com/recipes/chia_pudding_with_blueberries_and_almonds/",
            "https://www.simplyrecipes.com/recipes/ham_and_egg_bakes/",
            "https://www.simplyrecipes.com/recipes/zucchini_muffins/",
            "https://www.simplyrecipes.com/recipes/matzo_brei/",
            "https://www.simplyrecipes.com/recipes/quick_and_easy_corned_beef_omelet/",
            "https://www.simplyrecipes.com/recipes/scrambled_eggs_with_kale_and_mozzarella/",
            "https://www.simplyrecipes.com/recipes/egg_and_bean_breakfast_quesadillas/",
            "https://www.simplyrecipes.com/recipes/cheese_biscuits/",
            "https://www.simplyrecipes.com/recipes/zucchini_ricotta_frittata/",
            "https://www.simplyrecipes.com/recipes/corned_beef_hash/",
            "https://www.simplyrecipes.com/recipes/gluten_free_cinnamon_rolls/",
            "https://www.simplyrecipes.com/recipes/zucchini_feta_frittata/",
            "https://www.simplyrecipes.com/recipes/french_toast_with_caramelized_bananas_vegan_and_gluten_free/",
            "https://www.simplyrecipes.com/recipes/artichoke_leek_frittata/",
            "https://www.simplyrecipes.com/recipes/gluten_free_chocolate_cake_donuts/",
            "https://www.simplyrecipes.com/recipes/apple_pie_smoothie/",
            "https://www.simplyrecipes.com/recipes/french_toast_casserole/",
            "https://www.simplyrecipes.com/recipes/bloody_mary/",
            "https://www.simplyrecipes.com/recipes/how_to_make_candied_bacon/",
            "https://www.simplyrecipes.com/recipes/blackberry_muffins/",
            "https://www.simplyrecipes.com/recipes/smoked_salmon_hash/",
            "https://www.simplyrecipes.com/recipes/blueberry_muffins/",
            "https://www.simplyrecipes.com/recipes/easy_blender_hollandaise_sauce/",
            "https://www.simplyrecipes.com/recipes/how_to_fry_an_egg/",
            "https://www.simplyrecipes.com/recipes/quiche_lorraine/",
            "https://www.simplyrecipes.com/recipes/pumpkin_bread/",
            "https://www.simplyrecipes.com/recipes/beignets/",
            "https://www.simplyrecipes.com/recipes/cinnamon_sticky_buns/",
            "https://www.simplyrecipes.com/recipes/cucumber_sandwiches/",
            "https://www.simplyrecipes.com/recipes/how_to_make_pressure_cooker_egg_bites/",
            "https://www.simplyrecipes.com/recipes/classic_buttermilk_waffles/",
            "https://www.simplyrecipes.com/recipes/as_you_like_it_breakfast_casserole/",
            "https://www.simplyrecipes.com/recipes/stollen/",
            "https://www.simplyrecipes.com/recipes/anadama_bread/",
            "https://www.simplyrecipes.com/recipes/classic_coffee_cake/",
            "https://www.simplyrecipes.com/recipes/orange_juice_mimosa/",
            "https://www.simplyrecipes.com/recipes/cheesy_funeral_potatoes_from_scratch/",
            "https://www.simplyrecipes.com/recipes/lemon_poppy_seed_muffins/",
            "https://www.simplyrecipes.com/recipes/bakery_style_cinnamon_rolls/",
            "https://www.simplyrecipes.com/recipes/spicy_bloody_maria_cocktail/",
            "https://www.simplyrecipes.com/recipes/baked_cherry_french_toast_casserole/",
            "https://www.simplyrecipes.com/recipes/chocolate_raspberry_french_toast/",
            "https://www.simplyrecipes.com/recipes/pumpkin_cinnamon_rolls_with_cream_cheese_frosting/",
            "https://www.simplyrecipes.com/recipes/cheddar_and_jalapeno_biscuits/",
            "https://www.simplyrecipes.com/recipes/cheesy_artichoke_pie/",
            "https://www.simplyrecipes.com/recipes/vegetarian_eggs_benedict_with_spinach_and_avocado/",
            "https://www.simplyrecipes.com/recipes/deep_dish_bacon_and_cheddar_quiche/",
            "https://www.simplyrecipes.com/recipes/pineapple_mango_mimosa/",
            "https://www.simplyrecipes.com/recipes/buttermilk_biscuits_and_sausage_gravy/",
            "https://www.simplyrecipes.com/recipes/shoofly_pie/",
            "https://www.simplyrecipes.com/recipes/chocolate_banana_bread/",
            "https://www.simplyrecipes.com/recipes/peanut_butter_chocolate_chip_banana_bread/",
            "https://www.simplyrecipes.com/recipes/apple_coffee_cake/",
            "https://www.simplyrecipes.com/recipes/omelette_in_a_mug/",
            "https://www.simplyrecipes.com/recipes/st_lucia_saffron_buns/",
            "https://www.simplyrecipes.com/recipes/broiled_grapefruit/",
            "https://www.simplyrecipes.com/recipes/spinach_and_artichoke_quiche/",
            "https://www.simplyrecipes.com/recipes/caramel_apple_monkey_bread/",
            "https://www.simplyrecipes.com/recipes/chocolate_cranberry_zucchini_muffins/",
            "https://www.simplyrecipes.com/recipes/huevos_a_la_mexicana/",
            "https://www.simplyrecipes.com/recipes/smoked_salmon_dill_and_goat_cheese_quiche/",
            "https://www.simplyrecipes.com/recipes/wild_alaska_salmon_and_egg_breakfast_tacos/",
            "https://www.simplyrecipes.com/recipes/huevos_motulenos/",
            "https://www.simplyrecipes.com/recipes/scrambled_eggs_with_tomatillos/",
        ];

        $user = User::where("email", "stefanteunissen1@gmail.com")->first();
        if (!$user) {
            $user = new User();
            $user->fill(['name' => "scraper", "email" => 'scraper' . substr(md5(mt_rand()), 0, 32) . "@recipeserved.online", "password" => Hash::make("nonsensicalpassword")]);
            $user->save();
        }

        $urlCount = count($urls);
        $i = 0;
        foreach ($urls as $url) {
            echo $i . ": START" . PHP_EOL;
            $html = file_get_html($url);
            $title = $html->find('title', 0)->text();
            $time = $html->find('div.total-time')[0]->find("span.meta-text__data")[0]->text();
            $credit = "SimplyRecipes.com";

            $requirements = $html->getElementById('ingredient-list_1-0')->find("li");
            $requirementsString = "[ul]";
            foreach ($requirements as $requirement) {
                $requirementsString .= "[li]" . htmlToFormattingForScraper(trim(htmlDomRemoveAllUnwantedTags($requirement)->innertext())) . "[/li]";
            }
            $requirementsString .= "[/ul]";

            $cooking = $html->getElementById('mntl-sc-block_3-0')->find("li");
            $cookingString = "[ul]";
            foreach ($cooking as $item) {
                $cookingString .= "[li]" . htmlToFormattingForScraper(trim($item->text())) . "[/li]";
            }
            $cookingString .= "[/ul]";

            $recipe = new Recipe();
            $recipe->poster_id = $user->id;
            $recipe->scraped = true;
            $recipe->fill([
                "title" => $title,
                "time" => $time,
                "requirements" => $requirementsString,
                "instructions" => $cookingString,
                "credit" => $credit
            ]);
            $recipe->save();
            echo $i++ . ": DONE" . PHP_EOL;
        }
        return 0;
    }
}
