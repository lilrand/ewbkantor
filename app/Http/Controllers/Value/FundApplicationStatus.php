<?php

use App\Shared\Value\AbstractEnum;

class FundApplicationStatus extends AbstractEnum
{
    const APPROVED = 'approved';
    const REJECTED = 'rejected';
    const PENDING = 'pending';

}
