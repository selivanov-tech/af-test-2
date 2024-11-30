<?php

namespace App\Infrastructure\Http\Controller;

use App\Application\Request\Customer\CustomerCreateRequest;
use App\Application\Request\Customer\CustomerUpdateRequest;
use App\Application\Service\Customer\CustomerCreator;
use App\Application\Service\Customer\CustomerEditor;
use App\Application\Service\Customer\CustomerGetter;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Uid\UuidV7;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class CustomerController
{
    #[Route('customer/create', name: 'create customer', methods: 'POST')]
    public function createCustomer(
        Request $request,
        CustomerCreator $customerCreator,
        ValidatorInterface $validator
    ): JsonResponse {
        $createDTO = new CustomerCreateRequest($request->toArray());

        $errors = $validator->validate($createDTO, groups: ['CustomerCreateRequest']);
        if (count($errors) > 0) {
            return new JsonResponse(['errors' => (string)$errors], 400);
        }

        $customer = $customerCreator->createCustomer($createDTO);

        return new JsonResponse(['id' => $customer->getId()]);
    }

    #[Route('customer/{id}', name: 'edit customer', methods: 'PATCH')]
    public function editCustomer(
        UuidV7 $id,
        Request $request,
        CustomerEditor $customerEditor,
        ValidatorInterface $validator,
        SerializerInterface $serializer
    ): JsonResponse {
        $updateDTO = new CustomerUpdateRequest($request->toArray());

        $errors = $validator->validate($updateDTO, groups: ['CustomerUpdateRequest']);
        if (count($errors) > 0) {
            return new JsonResponse(['errors' => (string)$errors], 400);
        }

        $customer = $customerEditor->editCustomer($id, $updateDTO);

        $data = $serializer->serialize(
            data: $customer,
            format: 'json',
        // todo: implement auth and ACL
//            context: ['groups' => ['customer:read']]
        );

        return JsonResponse::fromJsonString($data);
    }

    #[Route('customer/{id}', name: 'get customer', methods: 'GET')]
    public function getCustomer(
        UuidV7 $id,
        CustomerGetter $customerGetter,
        SerializerInterface $serializer
    ): JsonResponse {
        $data = $serializer->serialize(
            data: $customerGetter->getCustomerById($id),
            format: 'json',
        // todo: implement auth and ACL
//            context: ['groups' => ['customer:read']]
        );

        return JsonResponse::fromJsonString($data);
    }
}
