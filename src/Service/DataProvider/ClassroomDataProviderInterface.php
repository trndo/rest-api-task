<?php


namespace App\Service\DataProvider;


use App\Model\ClassroomItem;
use Symfony\Component\HttpFoundation\Request;

/**
 * Interface ClassroomDataProviderInterface
 * @package App\Service\DataProvider
 */
interface ClassroomDataProviderInterface
{
    /**
     * Find all classrooms
     *
     * @param Request $request
     * @return array|null
     */
    public function fetchAll(Request $request): ?array;

    /**
     * Find one classroom
     *
     * @param int $id
     * @return ClassroomItem|null
     */
    public function get(int $id): ?ClassroomItem;

    /**
     * Find count of rows
     *
     * @param Request $request
     * @return int
     */
    public function getRowsCount(Request $request): int;
}