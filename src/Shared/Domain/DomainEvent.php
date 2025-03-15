<?php

/**
 * @copyright © UAB NFQ Technologies
 *
 * This Software is the property of NFQ Technologies
 * and is protected by copyright law – it is NOT Freeware.
 *
 * Any unauthorized use of this software without a valid license key
 * is a violation of the license agreement and will be prosecuted by
 * civil and criminal law.
 *
 * Contact UAB NFQ Technologies:
 * E-mail: info@nfq.lt
 * https://www.nfq.lt
 */

namespace App\Shared\Domain;

use Symfony\Component\Uid\Ulid;

/**
 * Marker interface for domain events.
 */
interface DomainEvent
{
    public function getAggregateRootId(): Ulid;
}
