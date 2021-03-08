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
//        require base_path('app/Console/Commands/simple_html_dom.php');

        $urls = [
            "https://www.simplyrecipes.com/recipes/chicken_parmesan/",
            "https://www.simplyrecipes.com/recipes/french_toast/",
            "https://www.simplyrecipes.com/recipes/asparagus/",
            "https://www.simplyrecipes.com/recipes/roasted_asparagus/",
            "https://www.simplyrecipes.com/recipes/hoisin_glazed_salmon/",
            "https://www.simplyrecipes.com/recipes/french_toast/",
            "https://www.simplyrecipes.com/recipes/moms_pan_fried_london_broil_steak/",
            "https://www.simplyrecipes.com/recipes/lasagna/",
            "https://www.simplyrecipes.com/recipes/enchiladas/",
            "https://www.simplyrecipes.com/recipes/posole_rojo/",
            "https://www.simplyrecipes.com/recipes/how_to_make_perfect_hard_boiled_eggs/",
            "https://www.simplyrecipes.com/recipes/how_to_make_fast_no_soak_beans_in_the_pressure_cooker/",
            "https://www.simplyrecipes.com/recipes/classic_baked_chicken/",
            "https://www.simplyrecipes.com/recipes/roasted_broccoli/",
            "https://www.simplyrecipes.com/recipes/cranberry_sauce/",
            "https://www.simplyrecipes.com/recipes/shrimp_scampi/",
            "https://www.simplyrecipes.com/recipes/fresh_tomato_salsa/",
            "https://www.simplyrecipes.com/recipes/beef_wellington/",
            "https://www.simplyrecipes.com/recipes/yorkshire_pudding/",
            "https://www.simplyrecipes.com/recipes/classic_english_toad_in_the_hole/",
            "https://www.simplyrecipes.com/recipes/egg_drop_soup/",
            "https://www.simplyrecipes.com/recipes/scallion_pancakes/",
            "https://www.simplyrecipes.com/recipes/stir_fry_ginger_beef/",
            "https://www.simplyrecipes.com/recipes/french_onion_soup/",
            "https://www.simplyrecipes.com/recipes/coq_au_vin/",
            "https://www.simplyrecipes.com/recipes/how_to_make_creme_brulee/",
            "https://www.simplyrecipes.com/recipes/dutch_baby/",
            "https://www.simplyrecipes.com/recipes/sweet_and_sour_red_cabbage/",
            "https://www.simplyrecipes.com/recipes/classic_german_potato_salad/",
            "https://www.simplyrecipes.com/recipes/baklava/",
            "https://www.simplyrecipes.com/recipes/dads_greek_salad/",
            "https://www.simplyrecipes.com/recipes/spanakopita/",
            "https://www.simplyrecipes.com/recipes/chai/",
            "https://www.simplyrecipes.com/recipes/mango_lassi/",
            "https://www.simplyrecipes.com/recipes/indian_style_rice/",
            "https://www.simplyrecipes.com/recipes/home_cured_corned_beef/",
            "https://www.simplyrecipes.com/recipes/colcannon/",
            "https://www.simplyrecipes.com/recipes/irish_beef_stew/",
            "https://www.simplyrecipes.com/recipes/lasagna/",
            "https://www.simplyrecipes.com/recipes/baked_ziti/",
            "https://www.simplyrecipes.com/recipes/fresh_basil_pesto/",
            "https://www.simplyrecipes.com/recipes/seared_ahi_tuna/",
            "https://www.simplyrecipes.com/recipes/weeknight_chicken_ramen/",
            "https://www.simplyrecipes.com/recipes/pan_simmered_pacific_black_cod/",
            "https://www.simplyrecipes.com/recipes/sous_vide_korean_bbq_chicken/",
            "https://www.simplyrecipes.com/recipes/sous_vide_beef_bulgogi_bowls/",
            "https://www.simplyrecipes.com/recipes/korean_beef_skewers/",
            "https://www.simplyrecipes.com/recipes/posole_rojo/",
            "https://www.simplyrecipes.com/recipes/slow_cooker_honey_chipotle_chicken_tacos/",
            "https://www.simplyrecipes.com/recipes/ceviche/",
            "https://www.simplyrecipes.com/recipes/seafood_paella_on_the_grill/",
            "https://www.simplyrecipes.com/recipes/pressure_cooker_paella_with_chicken_and_sausage/",
            "https://www.simplyrecipes.com/recipes/spanish_tortilla/",

            "https://www.simplyrecipes.com/recipes/easy_brazilian_cheese_bread/",
            "https://www.simplyrecipes.com/recipes/feijoada_brazilian_black_bean_stew/",
            "https://www.simplyrecipes.com/recipes/salmon_fish_stew_brazilian_style/",
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
