<?php

namespace Koboaccountant\Repositories\Customer;

use Koboaccountant\Repositories\BaseRepository;
use Koboaccountant\Models\Customer;

/**
 * 
 */
class CustomerRepository extends BaseRepository
{
	
	public function __construct(Customer $customer)
	{
		$this->customerModel = $customer;
	}

	public function create($data)
	{	
		$customer = new Customer();
		$customer->id = $this->generateUuid();
		$customer->name = $data['name'];
		$customer->email = $data['email'];		
		$customer->phone = $data['phone'];
		$customer->address = $data['address'];
		$customer->attachment = $this->awsUpload($data['attachment']);
		$customer->website = $data['website'];
		$customer->isActive = $data['isActive'];
		$customer->account_id = $data['account_id'];

		$customer->save();
		return true;
	}

	public function update($data)
	{
		$customer = Customer::where('id', $data['customer_id'])->first();
        $customer->name = isset($data['name']) ?: null;
		$customer->phone = isset($data['phone']) ?: null;
		$customer->email = isset($data['email']) ?: null;
		$customer->address = isset($data['address']) ?: null;
		$customer->website = isset($data['website']) ?: null;
		$customer->isActive = isset($data['isActive']);


		$customer->save();
		return true; 
	}

	public function delete($data)
	{
		$customer = Customer::where('id', $data['customer_id'])->first();
		$customer->delete();
	}
}