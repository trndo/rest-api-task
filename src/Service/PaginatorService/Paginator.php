<?php


namespace App\Service\PaginatorService;


use App\Model\Pagination;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class Paginator
{
    /**
     * @var UrlGeneratorInterface
     */
    private $urlGenerator;

    public function __construct(UrlGeneratorInterface $urlGenerator)
    {
        $this->urlGenerator = $urlGenerator;
    }

    /**
     * Create pagination
     */
    public function createPagination(
        int $count,
        int $page,
        int $totalRows,
        string $routeName
    ): Pagination {
        $pagination = new Pagination();

        $totalPages = ceil($totalRows / $count);

        $pagination->first = $this->generateUrl($routeName, 1, $count);
        $pagination->last = $this->generateUrl($routeName, $totalPages, $count);
        $pagination->prev = $this->generateUrl(
            $routeName,
            $page > 1 ? $page - 1 : 1,
            $count
        );
        $pagination->next = $this->generateUrl(
            $routeName,
            $page < $totalPages ? $page + 1 : $totalPages,
            $count
        );

        return $pagination;
    }

    /**
     * Return generated url
     */
    private function generateUrl(
        string $routeName,
        int $page,
        int $count
    ): string {
        return $this->urlGenerator->generate($routeName, [
            'page' => $page,
            'count' => $count,
        ], UrlGeneratorInterface::ABSOLUTE_URL);
    }

}