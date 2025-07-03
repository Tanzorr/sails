<?php

namespace App\Actions;

use App\Models\OrderItem;

class OrderItemCreateAction
{
    public function handle(array $data)
    {
        try {
            if (!isset($data['order_id'], $data['items']) || !is_array($data['items'])) {
                throw new \InvalidArgumentException('Invalid data provided.');
            }

            $createdItems = [];
            foreach ($data['items'] as $item) {
                $createdItems[] = OrderItem::create([
                    'order_id' => $data['order_id'],
                    'product_id' => $item['product_id'],
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                    'product_name' => $item['product_name'] ?? null,
                    'total' =>(float)$item['total'],
                ]);
            }
            return $createdItems;

        } catch (\InvalidArgumentException $exception) {
            return $exception->getMessage();
        }
    }
}
