<?php


namespace App\Service\DataProvider;


use App\Model\ClassroomItem;
use Symfony\Component\HttpFoundation\Request;

interface ClassroomDataProviderInterface
{
    public function fetchAll(Request $request): ?array;

    public function get(int $id): ?ClassroomItem;
}