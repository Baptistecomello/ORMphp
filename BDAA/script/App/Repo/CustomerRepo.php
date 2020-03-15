<?php
    
    namespace App\Repo;

    use App\Entity\CustomerEntity;
    
    class CustomerRepo extends OrmRepo {
        const ENTITY = CustomerEntity::class;
    }

?>