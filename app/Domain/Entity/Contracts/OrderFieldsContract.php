<?php


namespace App\Domain\Entity\Contracts;


interface OrderFieldsContract
{
    public const ORDER_ID_FIELD = 'id';
    public const USER_ID_FIELD = 'user_id';
    public const FROM_REGION_ID_FIELD = 'from_region_id';
    public const TO_REGION_ID_FIELD = 'to_region_id';
    public const PARENT_ID_FIELD = 'parent_id';
    public const DELIVERY_DATE_FIELD = 'delivery_date';
    public const STATUS_FIELD = 'status';
}
