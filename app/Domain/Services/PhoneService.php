<?php

namespace App\Domain\Services;

use App\Domain\Entities\Phone;
use App\Domain\Repositories\CustomerRepositoryInterface;

class PhoneService
{
    private $customerRepository;

    public function __construct(CustomerRepositoryInterface $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    public function listFiltered(array $filterBy = [])
    {
        $customers = $this->customerRepository->all();

        $phones = $customers->map(function ($customer) {
            return new Phone($customer->getPhone());
        });

        if (isset($filterBy['countryCode'])) {
            $phones = $phones->filter(function ($phone) use ($filterBy) {
                return $phone->getCountryCode() == $filterBy['countryCode'];
            });
        }

        if (isset($filterBy['valid'])) {
            $phones = $phones->filter(function ($phone) use ($filterBy) {
                return $phone->isValid() == $filterBy['valid'];
            });
        }

        return $phones;
    }
}
