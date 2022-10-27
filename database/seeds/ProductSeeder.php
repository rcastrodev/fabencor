<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //factory(Product::class, 40)->create();

        Product::create([
            'category_id'   => 1,
            'name'          => 'CAJA MARRÓN CON IMPRESIÓN',
            'description'   => '<p>MODELO BRIDADO CON CAJA REDUCTORA</p><p>En su interior tiene seis divisiones, de gran resistencia.</p><p>Una caja para 6 frascos o botellas. Super resistente! A medida de tu producto.</p>'
        ]);

        Product::create([
            'category_id'   => 1,
            'name'          => 'CAJA TIPO BANDEJA',
            'description'   => '<p>MODELO BRIDADO CON CAJA REDUCTORA</p><p>En su interior tiene seis divisiones, de gran resistencia.</p><p>Una caja para 6 frascos o botellas. Super resistente! A medida de tu producto.</p>'
        ]);

        Product::create([
            'category_id'   => 1,
            'name'          => 'CAJA REFORZADA CON CERCO',
            'description'   => '<p>MODELO BRIDADO CON CAJA REDUCTORA</p><p>En su interior tiene seis divisiones, de gran resistencia.</p><p>Una caja para 6 frascos o botellas. Super resistente! A medida de tu producto.</p>'
        ]);

        Product::create([
            'category_id'   => 1,
            'name'          => 'DIVICAJA CON SEPARADORES',
            'description'   => '<p>MODELO BRIDADO CON CAJA REDUCTORA</p><p>En su interior tiene seis divisiones, de gran resistencia.</p><p>Una caja para 6 frascos o botellas. Super resistente! A medida de tu producto.</p>'
        ]);

        Product::create([
            'category_id'   => 1,
            'name'          => 'CAJA EXHIBIDORA DE PRODUCTOS',
            'description'   => '<p>MODELO BRIDADO CON CAJA REDUCTORA</p><p>En su interior tiene seis divisiones, de gran resistencia.</p><p>Una caja para 6 frascos o botellas. Super resistente! A medida de tu producto.</p>'
        ]);

        Product::create([
            'category_id'   => 1,
            'name'          => 'CAJA TROQUELADA',
            'description'   => '<p>MODELO BRIDADO CON CAJA REDUCTORA</p><p>En su interior tiene seis divisiones, de gran resistencia.</p><p>Una caja para 6 frascos o botellas. Super resistente! A medida de tu producto.</p>'
        ]);
        
        Product::create([
            'category_id'   => 1,
            'name'          => 'CAJA ARCHIVO',
            'description'   => '<p>MODELO BRIDADO CON CAJA REDUCTORA</p><p>En su interior tiene seis divisiones, de gran resistencia.</p><p>Una caja para 6 frascos o botellas. Super resistente! A medida de tu producto.</p>'
        ]);

        Product::create([
            'category_id'   => 1,
            'name'          => 'CAJA COSIDA',
            'description'   => '<p>MODELO BRIDADO CON CAJA REDUCTORA</p><p>En su interior tiene seis divisiones, de gran resistencia.</p><p>Una caja para 6 frascos o botellas. Super resistente! A medida de tu producto.</p>'
        ]);

        Product::create([
            'category_id'   => 1,
            'name'          => 'COMPLEMENTOS',
            'description'   => '<p>MODELO BRIDADO CON CAJA REDUCTORA</p><p>En su interior tiene seis divisiones, de gran resistencia.</p><p>Una caja para 6 frascos o botellas. Super resistente! A medida de tu producto.</p>'
        ]);

        Product::create([
            'category_id'   => 1,
            'name'          => 'CAJAS DOBLE / TRIPLE PARA EXPORTACIÓN',
            'description'   => '<p>MODELO BRIDADO CON CAJA REDUCTORA</p><p>En su interior tiene seis divisiones, de gran resistencia.</p><p>Una caja para 6 frascos o botellas. Super resistente! A medida de tu producto.</p>'
        ]);

        Product::create([
            'category_id'   => 2,
            'name'          => 'CAJAS MEDIDAS ESTANDART',
            'description'   => '<p>Contamos con una gran variedad de medidas de cajas estándar que pueden adaptarse a lo que usted necesita a un bajo costo. Además, contamos con stock permanente que le permitirá acceder a una entrega rápida del material.</p>'
        ]);

        Product::create([
            'category_id'   => 3,
            'name'          => 'ROLLOS CORRUGADOS SIMPLE FAZ',
            'description'   => '<p>Rollo cartón corrugado simple faz. Ideal para embalar y proteger productos. Su uso es apropiado para resguardar superficies en exposición a obras de albañilería, pintura.</p>'
        ]);
    }
}
