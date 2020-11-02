<?php
/*
 * Copyright (c) 2020 Tobias Briones.
 *
 * This source code is licensed under the MIT license found in the
 * LICENSE file in the root directory of this source tree.
 */

namespace App\Repository;

use App\Data\Common\Product\ProductDao;
use App\Domain\Model\Product\Product;
use App\Domain\Model\Product\ProductId;
use App\Domain\Repository\Repository;
use Exception;

/**
 * Application Product Repository implementation. For now, it only realizes the
 * generic Repository domain interface.
 *
 * @package App\Repository
 */
class AppProductRepository implements Repository {

    private ProductDao $productDao;

    public function __construct(ProductDao $productDao) {
        $this->productDao = $productDao;
    }

    public function get(int $id): Product {
        return $this->productDao->fetch(new ProductId($id));
    }

    public function getAll(int $page, int $limit): array {
        return $this->productDao->fetchAll($page, $limit);
    }

    /**
     * @param mixed $record record to create
     *
     * @throws Exception if something goes wrong
     */
    public function add($record): void {
        $this->productDao->create($record);
    }

    /**
     * @param mixed $record record to update
     *
     * @throws Exception if something goes wrong
     */
    public function set($record): void {
        $this->productDao->update($record);
    }

    /**
     * @param mixed $record record to delete
     *
     * @throws Exception if something goes wrong
     */
    public function remove($record): void {
        $this->productDao->delete($record);
    }

}
