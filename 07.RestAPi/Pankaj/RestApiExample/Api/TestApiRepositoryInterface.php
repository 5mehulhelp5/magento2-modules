<?php
declare(strict_types=1);
namespace Pankaj\RestApiExample\Api;

interface TestApiRepositoryInterface
{
    /**
     * Get Api Data
     *
     * @api
     * @param int $id
     * @return Pankaj\RestApiExample\Api\Data\TestApiDataInterface
     */
    public function getApiData($id);
}