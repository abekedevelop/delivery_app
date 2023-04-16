<?php


namespace App\Domain\Entity;


use App\Domain\Entity\Contracts\OrderFieldsContract;
use App\Domain\Entity\Contracts\OrderStatusContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Order extends Model implements OrderFieldsContract, OrderStatusContract
{
    protected $table = 'orders';

    protected $fillable = [
        self::USER_ID_FIELD,
        self::FROM_REGION_ID_FIELD,
        self::TO_REGION_ID_FIELD,
        self::PARENT_ID_FIELD,
        self::DELIVERY_DATE_FIELD,
        self::STATUS_FIELD,
    ];

    public function fromCity(): HasOne
    {
        return $this->hasOne(Region::class, Region::REGION_ID_FIELD, self::FROM_REGION_ID_FIELD);
    }

    public function toCity(): HasOne
    {
        return $this->hasOne(Region::class, Region::REGION_ID_FIELD, self::TO_REGION_ID_FIELD);
    }

    public function getStatusName(): string {
        $statuses = [
            self::ORDER_STATUS_ACTIVE => 'Активна',
            self::ORDER_STATUS_DECLINED_BY_ADMIN => 'Заявка отклонена',
        ];

        return $statuses[$this->{Order::STATUS_FIELD}] ?? 'Статус неизвестен';
    }

    public function children(): HasMany
    {
        return $this->hasMany(Order::class, Order::PARENT_ID_FIELD, self::ORDER_ID_FIELD);
    }
}
