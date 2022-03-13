<?php

namespace App\Infrastructure\Repositories;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;

use App\Domain\Entities\Customer as CustomerEntity;
use App\Domain\Repositories\CustomerRepositoryInterface;

use App\Infrastructure\Models\Customer;

class CustomerRepository implements CustomerRepositoryInterface
{
    public function all(): Collection
    {
        $eloquentCustomers = Customer::all();
        return $this->mapManyEntities($eloquentCustomers);
    }

    private function mapManyEntities(EloquentCollection $eloquentCustomers)
    {
        if ($eloquentCustomers->count() == 0) {
            return collect();
        }

        $domainCustomers = $eloquentCustomers->map(function ($eloquentCustomer) {
            return $this->mapEntity($eloquentCustomer);
        });
        return $domainCustomers;
    }

    private function mapEntity(Customer $eloquentCustomer = null)
    {
        if (!$eloquentCustomer) {
            return null;
        }

        $customer = (new CustomerEntity)
            ->setId($eloquentCustomer->id)
            ->setName($eloquentCustomer->name)
            ->setPhone($eloquentCustomer->phone);

        return $customer;
    }
}
