<?php

use App\Content;
use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** Home  */
        for ($i=0; $i < 3; $i++) { 
            Content::create([
                'section_id'=> 1,
                'order'     => 'AA',
                'image'     => 'images/home/Enmascarar_grupo_818.png',
                'content_1' => '<p>FÁBRICA DE ENVASES CORRUGADOS, CAJAS ESTÁNDAR Y A MEDIDA</p>'
            ]);
        }

        Content::create([
            'section_id'=> 2,
            'image'     => 'images/home/Imagen_279.png',
            'content_1' => '<p>Contamos con una gran variedad de medidas de cajas estándar que pueden adaptarse a lo que usted necesita a un bajo costo.</p>'
        ]);

        Content::create([
            'section_id'=> 3,
            'image'     => 'images/home/Enmascarar_grupo_823.png',
            'content_1' => 'Somos una empresa apasionada por brindar soluciones en elaboración de envases de cartón corrugado',
            'content_2' => '<p>Atendemos a nuestros clientes, entendiendo sus necesidades y comprometiéndonos a brindar un producto de calidad, en los tiempos pautados.</p>'
        ]);

        /** Empresa */
        for ($i=0; $i < 3; $i++) { 
            Content::create([
                'section_id'=> 4,
                'order'     => 'AA',
                'image'     => 'images/company/Enmascarar_grupo_804.png'
            ]);
        }
        
        Content::create([
            'section_id'=> 5,
            'content_1' => 'QUIENES SÓMOS',
            'content_2' => '<p>Somos una empresa apasionada por brindar soluciones en elaboración de envases de cartón corrugado. </p>
            <p>Atendemos a nuestros clientes, entendiendo sus necesidades y comprometiéndonos a brindar un producto de calidad, en los tiempos pautados. </p><p>El asesoramiento y el cumplimiento son para nosotros las bases de Fabencor</p>'
        ]);  

        Content::create([
            'section_id'=> 6,
            'order'     => 'AA',
            'image'     => 'images/company/Enmascarar_grupo_805.png',
        ]);

        Content::create([
            'section_id'=> 6,
            'order'     => 'BB',
            'image'     => 'images/company/Enmascarar_grupo_819.png',
        ]);

        Content::create([
            'section_id'=> 6,
            'order'     => 'CC',
            'image'     => 'images/company/Enmascarar_grupo_820.png',
        ]);

        Content::create([
            'section_id'=> 6,
            'order'     => 'DD',
            'image'     => 'images/company/Enmascarar_grupo_821.png',
        ]);

        Content::create([
            'section_id'=> 6,
            'order'     => 'EE',
            'image'     => 'images/company/Enmascarar_grupo_822.png',
        ]);

        Content::create([
            'section_id'=> 7,
            'order'     => 'AA',
            'image'     => 'images/company/Grupo_3150.svg',
            'content_1' => 'Compromiso con su entrega',
            'content_2' => '<p>El compromiso con la entrega es lo que nos mueve a superarnos día a día.</p>'
        ]);

        Content::create([
            'section_id'=> 7,
            'order'     => 'BB',
            'image'     => 'images/company/Grupo_3151.svg',
            'content_1' => 'Expertos Profesionales',
            'content_2' => '<p>Nuestro equipo de trabajo está conformado por profesionales y expertos en cada una de las áreas.</p>'
        ]);

        Content::create([
            'section_id'=> 7,
            'order'     => 'CC',
            'image'     => 'images/company/Grupo_3152.svg',
            'content_1' => 'Diseño de productos',
            'content_2' => '<p>Nuestro departamento propio de diseño de productos está involucrado en el proceso para realizar ajustes y propuestas.</p>'
        ]);

        Content::create([
            'section_id'=> 7,
            'order'     => 'DD',
            'image'     => 'images/company/Grupo_3153.svg',
            'content_1' => 'Logística propia',
            'content_2' => '<p>Para asegurar el proceso Just in Time que nos caracteriza contamos con distribución y logística propia.</p>'
        ]);
    }
}





 


