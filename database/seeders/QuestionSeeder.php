<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Question;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Question::factory()->count(20)->sequence(
            ['type' => 'b', 'question' => 'Votre adresse mail'],
            ['type' => 'b', 'question' => 'Votre âge'],
            ['type' => 'a', 'question' => 'Votre sexe', 'choices' => json_encode(['Homme', 'Femme', 'Préfère de pas répondre'])],
            ['type' => 'c', 'question' => 'Nombre de personne dans votre foyer (adulte & enfants)'],
            ['type' => 'b', 'question' => 'Votre profession'],
            ['type' => 'a', 'question' => 'Quel marque de casque VR utilisez vous ?', 'choices' => json_encode(['Occulus Rift/s', 'HTC Vive', 'Windows Mixed Reality', 'PSVR'])],
            ['type' => 'a', 'question' => 'Sur quel magasin d’application achetez vous des contenus VR ?', 'choices' => json_encode(['SteamVR', 'Occulus store', 'Viveport', 'Playstation VR', 'Google Play', 'Windows store'])],
            ['type' => 'a', 'question' => 'Quel casque envisagez-vous d’acheter dans un futur proche ?', 'choices' => json_encode(['Occulus Quest', 'Occulus Go', 'HTC Vive Pro', 'Autre', 'Aucun'])],
            ['type' => 'c', 'question' => 'Au sein de votre foyer, combien de personne utilisent votre casque VR pour regarder Bigscreen ?'],
            ['type' => 'a', 'question' => 'Vous utilisez principalement Bigscreen pour :', 'choices' => json_encode(['regarder des émissions TV en direct', 'regarder des films', 'jouer en solo', 'jouer en team'])],
            ['type' => 'c', 'question' => 'Combien donnez vous de point pour la qualité de l’image sur Bigscreen ?'],
            ['type' => 'c', 'question' => 'Combien donnez vous de point pour le confort d’utilisation de l’interface Bigscreen ?'],
            ['type' => 'c', 'question' => 'Combien donnez vous de point pour la connection réseau de Bigscreen ?'],
            ['type' => 'c', 'question' => 'Combien donnez vous de point pour la qualité des graphismes 3D dans Bigscreen ?'],
            ['type' => 'c', 'question' => 'Combien donnez vous de point pour la qualité audio dans Bigscreen ?'],
            ['type' => 'a', 'question' => 'Aimeriez vous avoir des notifications plus précises au cours de vos sessions Bigscreen ?', 'choices' => json_encode(['Oui', 'Non'])],
            ['type' => 'a', 'question' => 'Aimeriez vous pouvoir inviter un ami à rejoindre votre session via son smartphone ?', 'choices' => json_encode(['Oui', 'Non'])],
            ['type' => 'c', 'question' => 'Aimeriez vous pouvoir enregistrer des émissions TV pour pouvoir les regarder ultérieurement ?'],
            ['type' => 'c', 'question' => 'Aimeriez vous jouer à des jeux exclusifs sur votre Bigscreen ?'],
            ['type' => 'b', 'question' => 'Quelle nouvelle fonctionnalité de vos rêve devrait exister sur Bigscreen ?']
        )->create();
    }
}
