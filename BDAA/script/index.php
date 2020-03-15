<?php

    require_once('Autoload.php');
    use App\Entity\ProductEntity;
    use App\Repo\ProductRepository;
    Autoload::register();
    $pe = new ProductEntity();
    $repo = new ProductRepository();
    $pe->setName("Vaginette");
    $pe->setPrix(100,00);
    $pe->setStock(22);

    //insert
    //$repo->save($pe);

    //update
    //$getEntity = $repo->getItemById(9);
    //$getEntity->setName("test");
    //$repo->save($getEntity);

    //get by id
    //$getEntity = $repo->getItemById(9);

    //get all
    //$repo->getAllItem();

    //delete by id
    //$repo->deleteById(6);

    //delete by object
    //$repo->deleteByEntity($getEntity);

?>