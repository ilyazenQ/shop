<?php

use App\Core\Abstraction\Controller\BaseController;
use App\Core\Abstraction\Facade\FacadeInterface;
use Entity\OrderEntity;
use Facade\OrderFacade;
use Query\OrderQuery;

class OrderController extends BaseController
{

    /**
     * @param OrderFacade $orderFacade
     */
    public function __construct(
        private readonly FacadeInterface $orderFacade
    )
    {
    }

    #[Route(path: '/order/create', methods: ['POST'])]
    #[Security("is_granted('ROLE_ADMIN') or is_granted('ROLE_USER')")]
    public function create(
        OrderCreateDTO $orderData,
    ): JsonResponse
    {
        return $this->json(
            data: $this->orderFacade->create(DTO: $orderData->validate()),
            status: Response::HTTP_CREATED,
        );
    }

    #[Route(path: '/order/list', methods: ['GET'])]
    #[Security("is_granted('ROLE_ADMIN') or is_granted('ROLE_USER')")]
    public function list(OrderQuery $query): JsonResponse
    {
        $this->json(
            data: $query->paginate(),
            status: Response::HTTP_OK);
    }

    #[Route(path: '/order/{order_id}',
        requirements: ['order_id' => AbstractValidator::ID_REGEXP],
        methods: ['GET'])]
    #[Entity(
        data: 'OrderEntity',
    )]
    #[Security("is_granted('ROLE_ADMIN') or is_granted('ROLE_USER')")]
    public function get(OrderQuery $query, OrderEntity $order): JsonResponse
    {
        $this->json(
            data: $query->findWithFilters($order),
            status: Response::HTTP_OK);
    }

    #[Route(
        path: '/order/update/{order_id}',
        requirements: ['order_id' => AbstractValidator::ID_REGEXP],
        methods: ['PUT'],
    )]
    #[Entity(
        data: 'order',
    )]
    #[Security("is_granted('ROLE_ADMIN') or is_granted('ROLE_USER')")]
    public function update(
        OrderEntity    $order,
        OrderUpdateDTO $orderData,
    ): JsonResponse
    {
        return $this->json(
            data: $this->orderFacade->update(DTO: $orderData->validate(), entity: $order),
            status: Response::HTTP_UPDATED,
        );
    }

    #[Route(
        path: '/order/delete/{order_id}',
        requirements: ['order_id' => AbstractValidator::ID_REGEXP],
        methods: ['DELETE'],
    )]
    #[Entity(
        data: 'OrderEntity',
    )]
    #[Security("is_granted('ROLE_ADMIN') or is_granted('ROLE_USER')")]
    public function delete(
        OrderEntity $order,
    ): JsonResponse
    {
        $this->orderFacade->delete(entity: $order);
        return $this->emptyResponse();
    }
}