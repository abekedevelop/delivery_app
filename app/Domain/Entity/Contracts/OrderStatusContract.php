<?php


namespace App\Domain\Entity\Contracts;


interface OrderStatusContract
{
    public const ORDER_STATUS_ON_MODERATION = 1;
    public const ORDER_STATUS_ACTIVE = 2;
    public const ORDER_STATUS_DECLINED_BY_ADMIN = 3;
    public const ORDER_STATUS_CANCELLED = 4;
}
