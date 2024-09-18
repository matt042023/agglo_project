<?php

namespace App\Controller;

use App\Repository\ResourcesRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ResourcesController extends AbstractController
{
    #[Route('/resources', name: 'all_resource_view')]
    public function getAllResources(ResourcesRepository $repository, Request $request, PaginatorInterface $paginator): Response
    {
        $types = $repository->findDistinctTypes();

        $pagination = $paginator->paginate(
            $repository->paginationQuery(),
            $request->query->get('page', 1),
            6
        );

        return $this->render('resources/resources.html.twig', [
            'pagination' => $pagination,
            'types' => $types,
        ]);
    }

    #[Route('/single-resource/{id}', name: 'single_resource_view')]
    public function getResourcesById($id, ResourcesRepository $repository): Response
    {
        $resource = $repository->find($id);

        return $this->render('resources/single-resource.html.twig', [
            'resource' => $resource,
            'resourceId' => $id,
        ]);
    }

    #[Route('/resources/filtered', name: 'resource_filtered')]
    public function filterByType(Request $request, ResourcesRepository $repository): Response
    {
        $type = $request->query->get('type');
        $types = $repository->findDistinctTypes();

        if (!empty($type)) {
            $resources = $repository->findBy(['type' => $type]);
        } else {
            $resources = $repository->findAll();
        }

        return $this->render('resources/filter_resources.html.twig', [
            'resources' => $resources,
            'types' => $types,
        ]);
    }

    #[Route('/resources/search', name: 'resource_search')]
    public function searchResources(Request $request, ResourcesRepository $repository): Response
    {
        $keyword = $request->query->get('keyword');
        $resources = $repository->findByTitleKeyword($keyword);

        return $this->render('resources/result_research.html.twig', [
            'resources' => $resources,
        ]);
    }
}
