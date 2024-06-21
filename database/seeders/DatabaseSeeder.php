<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use function Laravel\Prompts\table;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $cats = [
                    ["Canapés et Fauteuils","Découvrez les canapés et fauteuils les plus confortables",],
                    ["Tables et Tables Basses","Trouvez la table parfaite",],
                    ["Accessoires de Salon","Ajoutez à votre salon les accessoires de la meilleure qualité",],
                    ["Étagères et meubles","Rangez et ordonnez vos effets dans les matières les plus nobles",],
             ];

        for ($i = 0; $i < count($cats); $i++) {
            DB::table('categories')->insert([
                'catLib' => $cats[$i][0],
                'catDescription' => $cats[$i][1]
            ]);
        }




        $admins = [
                    ["Seha@exemple.com",Hash::make("SehaAdmin"),],
                    ["admin@admin.com",Hash::make("admin"),],
            ];


        for ($i = 0; $i < count($admins); $i++) {
            DB::table('users')->insert([
                'email' =>  $admins[$i][0],
                'password' => $admins[$i][1],
                'status' => 'admin'
            ]);
        }

        DB::table('adresses')->insert(["codePostal"=>44000,"ville"=>"Nantes","pays"=>"France","rue"=>"Joffre","numero"=>5]);
        DB::table('paniers')->insert(["nbArticle"=>0,"prixTotal"=>0.0]);
        DB::table('users')->insert(['email' => "a@a.com", 'password' => Hash::make('password'), 'status' => 'client']);
        DB::table('clients')->insert(["email"=>"a@a.com","telephone"=>"07554654","nom"=>"Testeur","prenom"=>"numero1","adresseId"=>1,"panierID"=>1]);


        $articles = [
            ["Canapé en Cuir de Luxe",3500.0,10,0,"canape_en_cuir_de_luxe","Ce canapé en cuir de luxe est une pièce maîtresse de l'art de vivre. Son design moderne et élégant, associé à des détails de couture fins et des pieds en acier inoxydable, en font un choix incontournable pour ceux qui recherchent le summum du confort et du style.","Marron",null,"Cuir italien pleine fleur","L'élégance inégalée du cuir italien pleine fleur, un trône pour votre salon.","Moderne élégant","marron","cuir",1],
            ["Canapé d'Angle en Tissu",2800.0,5,0,"canape_d_angle_en_tissu","Ce canapé offre un mélange parfait de style contemporain et de confort supérieur. Fabriqué avec un tissu en lin haut de gamme dans une teinte de gris perle, il présente une forme en L moderne et des pieds en bois massif.","Gris perle",null,"Tissu en lin haut de gamme","Un canapé d'angle en tissu pour un confort contemporain à l'état pur.","Contemporain","gris","tissu",1],
            ["Fauteuil à Bascule en Cuir",1800.0,20,0,"fauteuil_a_bascule_en_cuir","Ce fauteuil allie le confort moderne à un design vintage élégant. Fabriqué en cuir véritable dans une teinte brun vieilli, il offre un espace de détente exceptionnellement confortable avec des finitions à la main.","Brun vieilli",null,"Cuir véritable","Le fauteuil à bascule en cuir : le luxe de se détendre en style vintage.","Vintage","marron","cuir",1],
            ["Table de Salle à Manger en Bois Massif",2400.0,2,0,"table_de_salle_a_manger_en_bois_massif","Cette table en chêne massif est conçue pour évoquer la chaleur et l'authenticité. Le bois texturé et les pieds sculptés en font une table de salle à manger inoubliable.","Noyer clair",null,"Chêne massif","La table de salle à manger en chêne massif : une pièce maîtresse d'une élégance rustique.","Rustique chic","marron","bois",2],
            ["Table Basse en Marbre",1600.0,8,0,"table_basse_en_marbre","Cette table basse est une expression parfaite de la pureté du design minimaliste. Le marbre blanc de Carrare est accentué par une base en acier inoxydable pour un effet visuel saisissant.","Blanc et veinures grises",null,"Marbre blanc de Carrare","La table basse en marbre de Carrare : une œuvre d'art minimaliste au cœur de votre salon.","Minimaliste","blanc","marbre",2],
            ["Table d'Appoint en Verre et Laiton",900.0,40,0,"table_d_appoint_en_verre_et_laiton","Cette table d'appoint combine élégamment le verre trempé transparent avec des accents en laiton doré. Son design moderne et glamour en fait une pièce maîtresse.","Doré",null,"Verre trempé et laiton","La table d'appoint en verre et laiton : l'expression ultime du glamour moderne.","Moderne glamour","or","verre",2],
            ["Coussin en Soie et Velours",150.0,100,0,"coussin_en_soie_et_velours","Ce coussin exquis est fabriqué à partir de soie et de velours de qualité supérieure, agrémenté de broderies à la main. Il offre un confort moelleux et une élégance inégalée.","Émeraude",null,"Soie et velours de qualité supérieure","Le coussin en soie et velours : la touche finale de luxe pour votre canapé.","Luxueux","bleu","soie",3],
            ["Tapis en Laine Façonné à la Main",700.0,5,0,"tapis_en_laine_faconne_a_la_main","Ce tapis en laine de Nouvelle-Zélande est une œuvre d'art en soi, avec des motifs géométriques et un artisanat haut de gamme.","Bleu marine","Beige","Laine de Nouvelle-Zélande","Le tapis en laine façonné à la main : un art ancestral sous vos pieds.","Traditionnel","bleu","laine",3],
            ["Lampe de Salon Moderne",250.0,5,0,"lampe_de_salon_moderne","Cette lampe combine une base en acier inoxydable brossé de haute qualité avec un abat-jour en tissu de première qualité. Son design minimaliste et épuré s'intègre parfaitement dans les intérieurs contemporains.","Noir satiné","Beige clair","Acier inoxydable brossé et abat-jour en tissu haut de gamme","La lampe de salon moderne : l'élégance lumineuse pour votre espace contemporain.","Minimaliste et contemporain","noir","acier",3],
            ["Étagère Murale en Chêne Massif",350.0,5,0,"etagere_murale_en_chene_massif","Cette étagère murale en chêne massif offre un espace de rangement élégant avec des étagères flottantes et une fixation invisible.","Noyer",null," Chêne massif","L'étagère murale en chêne massif : une fusion parfaite de forme et de fonction.","Moderne minimaliste","marron","bois",4],
        ];

        for ($i = 0; $i < count($articles); $i++) {
            DB::table('articles')->insert([
                'nom' =>  $articles[$i][0],
                'prix' => $articles[$i][1],
                'qteStock' => $articles[$i][2],
                "tauxRemise" => $articles[$i][3],
                "articleImg" => $articles[$i][4],
                "artDescr" => $articles[$i][5],
                "color1" => $articles[$i][6],
                "color2" => $articles[$i][7],
                "materiaux" => $articles[$i][8],
                "accroche" => $articles[$i][9],
                "style" => $articles[$i][10],
                "couleurFiltre"=>$articles[$i][11],
                "materiauxFiltre"=>$articles[$i][12],
                "catID" => $articles[$i][13],
            ]);
        }
        $typelivraison = [
            ["Magasin",0,0,],
            ["Standard",5,0,],
            ["Rapide",5,5,],
        ];


        for ($i = 0; $i < count($typelivraison); $i++) {
            DB::table('livraisons')->insert([
                'livraisonLib' =>  $typelivraison[$i][0],
                'additionne' => $typelivraison[$i][1],
                'multiplie' => $typelivraison[$i][2]
            ]);
        }
        DB::table('etat_commandes')->insert([
            'etatCommandeLib' => "en_cours" ,
        ]);
        DB::table('etat_commandes')->insert([
            'etatCommandeLib' => "prete_a_livrer" ,
        ]);
    }
}
