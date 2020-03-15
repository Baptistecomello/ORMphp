<?php
    
    namespace App\Repo;

    use App\Entity\ProductEntity;

    class ProductRepository extends OrmRepo {
        const ENTITY = ProductEntity::class;
    }

?>