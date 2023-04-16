<?php


namespace App\Domain\Entity\Contracts;


interface OrderStatusContract
{
    public const ORDER_STATUS_ACTIVE = 1;
    public const ORDER_STATUS_DECLINED_BY_ADMIN = 2;
}
