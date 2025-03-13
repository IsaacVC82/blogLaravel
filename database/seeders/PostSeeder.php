<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\PostTranslation;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        $posts = [
            [   'name' => 'Prof. Rosendo Maggio',
                'slug' => 'aut-corrupti-quo',
                'title' => 'Aut corrupti quo',
                'content' => 'Blanditiis sapiente qui dolore. Quos aut culpa architecto tempore vel iusto tempore. Qui culpa et error voluptas quisquam amet. Qui est inventore ut qui. Repellendus necessitatibus voluptas ut praesentium saepe consequuntur ipsum eum.',
                'image' => 'posts/01JNP7BD3E96S0QSQZ9RH5WYY0.png',
                'translations' => [
                    'es' => [
                        'title' => 'Aut corrupti quo',
                        'content' => 'Blanditiis sapiente qui dolore. Quos aut culpa architecto tempore vel iusto tempore. Qui culpa et error voluptas quisquam amet. Qui est inventore ut qui. Repellendus necessitatibus voluptas ut praesentium saepe consequuntur ipsum eum.',
                    ],
                    'en' => [
                        'title' => 'Aut corrupti quo',
                        'content' => 'Wise pain who suffers. Those who are guilty of the architect\'s time, even in just time. Those who are guilty of the error and the pain, anyone who wants. Who is the inventor who? Repellent necessities and the present are often the results of the events.',
                    ]
                ]
            ],
            [   'name' => 'Doris Stroman',
                'slug' => 'ratione-beatae-enim-ipsum',
                'title' => 'Razonablemente bendito uno mismo',
                'content' => 'El dolor puede ser grande y las deudas se cobran desde el nacimiento. El dolor debe ser rechazado y llevado a la carga porque. Algo de lo mejor está trabajando y encontrando el inventor.',
                'image' => 'posts/01JNP7C5F8Q9SCRM8F8QJ76QS1.png',
                'translations' => [
                    'es' => [
                        'title' => 'Razonablemente bendito uno mismo',
                        'content' => 'El dolor puede ser grande y las deudas se cobran desde el nacimiento. El dolor debe ser rechazado y llevado a la carga porque. Algo de lo mejor está trabajando y encontrando el inventor.',
                    ],
                    'en' => [
                        'title' => 'Reasonably blessed oneself',
                        'content' => 'Pain can be great and debts are charged from birth. Pain must be rejected and carried as a load. Something best is working and finding the inventor.',
                    ]
                ]
            ],
            [
                'name' => 'Aditya Treutel',
                'slug' => 'rerum-rem-quia-necessitatibus',
                'title' => 'Rerum rem quia necessitatibus',
                'content' => 'Qui voluptas esse aliquid nostrum hic. Velit quo voluptatem ex repudiandae sapiente reiciendis. Odit non consequatur magni unde. Aut officiis quia similique tenetur totam aut facilis blanditiis. Dolor maxime id vel et eaque.',
                'image' => 'posts/01JNP7CSPVXAYXTXPTHNBVGCY0.png',
                'translations' => [
                    'es' => [
                        'title' => 'Rerum rem quia necessitatibus',
                        'content' => 'Qui voluptas esse aliquid nostrum hic. Velit quo voluptatem ex repudiandae sapiente reiciendis. Odit non consequatur magni unde. Aut officiis quia similique tenetur totam aut facilis blanditiis. Dolor maxime id vel et eaque.',
                    ],
                    'en' => [
                        'title' => 'Things remain due to necessities',
                        'content' => 'Who desires to be something of ours here. They want the pleasure of repudiating wise rejections. They do not achieve great things. Or duties because similar ones are required for all duties and conveniences. Pain is at its peak with or without it.',
                    ]
                ]
            ],
            [
                'name' => 'Dr. Garry Goodwin Jr.',
                'slug' => 'et-vero-voluptatibus-officiis',
                'title' => 'Et vero voluptatibus officiis',
                'content' => 'Sit vel quas vel magni aut perferendis est. Ratione numquam voluptatum facilis ab. Maiores reiciendis sapiente ad aliquid exercitationem est. Ipsam recusandae ducimus autem ea sit omnis. Eaque voluptate quae velit veritatis consectetur nihil.',
                'image' => 'posts/01JNP7DEVN72SQZXYTN2PR550Q.png',
                'translations' => [
                    'es' => [
                        'title' => 'Y verdadero placer en los deberes',
                        'content' => 'Siéntete con deseos grandes y magnificados por lo mejor. Razones nunca usadas en los esfuerzos bien hechos. Rechazar responsabilidades hasta que lo mejor lo haga.',
                    ],
                    'en' => [
                        'title' => 'And truly pleasures of duties',
                        'content' => 'Sit with desires and magnified by the best. Reasons never used in well done efforts. Reject duties until the best does it.',
                    ]
                ]
            ],
            [   'name' => 'Niko Goodwin',
                'slug' => 'sint-eum-consequatur',
                'title' => 'Sint eum consequatur',
                'content' => 'Aut iste est nisi nostrum. Hic rem nobis voluptas suscipit voluptatibus. Placeat architecto omnis eius sed ratione autem perspiciatis. Quod voluptatem nesciunt quasi ipsum in et inventore. Vero pariatur reiciendis possimus beatae eius ipsa.',
                'image' => 'posts/01JNP7EQY5X1GJQHF67RYVN5YD.png',
                'translations' => [
                    'es' => [
                        'title' => 'Sint eum consequatur',
                        'content' => 'Este es nuestro camino. Aquí el placer de la vida y el trabajo con el plan esencial. Lo que se conoce se obtiene por las acciones, aunque también se evade.',
                    ],
                    'en' => [
                        'title' => 'It is going to be',
                        'content' => 'This is our way. Here the pleasure of life and work with the essential plan. What is known is obtained through actions, although also avoided.',
                    ]
                ]
            ],
            [   'name' => 'Laurianne Hessel',
                'slug' => 'et-quo-earum-neque',
                'title' => 'Et quo earum neque',
                'content' => 'Ex est ut odio dolorem officia alias. Asperiores beatae libero corrupti ratione. Nostrum quo est ex ut. Animi dolorem nihil vero neque. Molestiae dolores tenetur non. Facere saepe rem tempora aut neque.',
                'image' => 'posts/01JNP7FF6XSA3FX7ECZ9M10EK3.png', 
                'translations' => [
                    'es' => [
                        'title' => 'Et quo earum neque',
                        'content' => 'Lo que pasa es algo que no nos gusta. Sin embargo, hay dolores en la sociedad que se deben evitar. Los pensamientos más grandes y poderosos al final siempre mejorarán la situación.',
                    ],
                    'en' => [
                        'title' => 'And why theirs are not',
                        'content' => 'What happens is something we don’t like. However, there are pains in society that must be avoided. The greatest and most powerful thoughts will always improve the situation in the end.',
                    ]
                ]
            ],
            [   'name' => 'Mrs. Guadalupe Murray IV',
                'slug' => 'earum-fugit-velit',
                'title' => 'Earum fugit velit',
                'content' => 'Quas omnis et et fugit sed fugit. Vero eveniet alias velit est. Esse fugit rerum numquam dolor perferendis quos. Cum quis quis voluptatem molestiae et.',
                'image' => 'posts/01JNP7G4HBH260497WDYQ7F955.png',
                'translations' => [
                    'es' => [
                        'title' => 'Earum fugit velit',
                        'content' => 'Cualquiera que quiera ser algo, busca por donde ir. Aunque siempre deben existir esfuerzos más grandes y persecuciones hacia la perfección.',
                    ],
                    'en' => [
                        'title' => 'They flee from them',
                        'content' => 'Anyone who wants to be something seeks the way. Although there must always be greater efforts and pursuits toward perfection.',
                    ]
                ]
            ],
            [   'name' => 'Arno Simonis',
                'slug' => 'ad-ab-quos-dolore-et',
                'title' => 'Ad ab quos dolore et',
                'content' => 'Enim aliquid tempore pariatur voluptas. Occaecati occaecati sequi nesciunt vitae ut asperiores. Et in sint et dolor quis reiciendis. Dignissimos ea et fugit repellat itaque. Placeat non ea et ullam dolore dolores tempora.',
                'image' => 'posts/01JNP7AMFVQ3C3YYCJ22PAKVVG.png', 
                'translations' => [
                    'es' => [
                        'title' => 'Ad ab quos dolore et',
                        'content' => 'En un sentido las personas pueden enfrentar dolor, pero también en el mismo espacio se encuentran recompensas que lo equilibran.',
                    ],
                    'en' => [
                        'title' => 'To whom the pain belongs',
                        'content' => 'In a sense, people may face pain, but at the same time, there are rewards that balance it out.',
                    ]
                ]
            ],
            [   'name' => 'Shaylee Cole',
                'slug' => 'ratione-facilis-ut-adipisci-beatae',
                'title' => 'Ratione facilis ut adipisci beatae',
                'content' => 'Ut omnis eaque omnis distinctio rerum deleniti saepe aliquam. Explicabo aliquid iste iste non beatae. Itaque enim itaque laboriosam quasi. Et nulla commodi eius dolores vero sequi. Harum cum officia numquam voluptates eaque ut. Repudiandae est velit saepe.',
                'image' => 'posts/01JNP2JG3CAB3HC5KF53TGBQS7.png', 
                'translations' => [
                    'es' => [
                        'title' => 'Razonamiento fácil para alcanzar la felicidad',
                        'content' => 'Es mucho más sencillo encontrar lo que es correcto si se tiene una visión clara del objetivo. A veces lo mejor puede ser sencillo y accesible.',
                    ],
                    'en' => [
                        'title' => 'Easy reasoning for attaining happiness',
                        'content' => 'It’s much easier to find what is right when you have a clear vision of the goal. Sometimes the best can be simple and accessible.',
                    ]
                ]
            ],
            [   'name' => 'Therese Sipes',
                'slug' => 'excepturi-consectetur-est-quia',
                'title' => 'Excepturi consectetur est quia',
                'content' => 'Rem qui porro autem aut ut adipisci neque architecto. Sed officia itaque voluptas sint sunt. Modi velit eius facere deserunt officiis. Non quae sit excepturi consequuntur reprehenderit.',
                'image' => 'posts/01JNP2DQSZ9JWEW5KQEN70Y6YG.png', 
                'translations' => [
                    'es' => [
                        'title' => 'Excepturi consectetur est quia',
                        'content' => 'Lo que sucede está relacionado con lo que se busca. Hay algo que forma parte y que se recibe por la sencillez de ser.',
                    ],
                    'en' => [
                        'title' => 'Except it is because of connection',
                        'content' => 'What happens is related to what is being sought. There is something that belongs and is received by the simplicity of being.',
                    ]
                ]
            ],
        ];

        // Crear los posts y sus traducciones
        foreach ($posts as $postData) {
            // Crear el post solo si no existe
            $post = Post::firstOrCreate(
                ['slug' => $postData['slug']], 
                [
                    'title' => $postData['title'], 
                    'content' => $postData['content'],
                    'name' => $postData['name'], 
                    'image' => $postData['image'],
                ]
            );

            // Crear las traducciones si no existen
            foreach ($postData['translations'] as $lang => $translation) {
                PostTranslation::updateOrCreate(
                    [
                        'post_id' => $post->id, 
                        'lang' => $lang,
                    ],
                    [   'locale' => 'es', 
                        'title' => $translation['title'], 
                        'content' => $translation['content']
                    ]
                );
            }
        }
    }
}

