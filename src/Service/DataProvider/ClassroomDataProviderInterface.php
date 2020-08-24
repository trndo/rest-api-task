<?php


namespace App\Service\DataProvider;


use App\Model\Classroom\ClassroomItem;
use Symfony\Component\HttpFoundation\Request;

/**
 * Interface ClassroomDataProviderInterface
 * @package App\Service\DataProvider
 */
interface ClassroomDataProviderInterface
{
    /**
     * Find all classrooms
     */
    public function fetchAll(Request $request): ?array;

    /**
     * Find one classroom
     */
    public function get(int $id): ?ClassroomItem;

    /**
     * Find count of rows
     */
    public function getRowsCount(Request $request): int;
}