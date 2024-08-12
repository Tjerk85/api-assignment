<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\DeliveryOptionsRequest;
use App\Http\Resources\DeliveryOptionResource;
use App\Models\DeliveryOption;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Carbon;

class DeliveryOptionsController extends Controller
{
    /**
     * Get the resource and search with options:
     * [
     * country: NL, BE, EU, ROW
     * shipment-date: 16-08-2024,
     * package-type: standard, mailbox, pallet
     * ]
     * @param DeliveryOptionsRequest $request
     * @return AnonymousResourceCollection
     */
    public function show(DeliveryOptionsRequest $request): AnonymousResourceCollection
    {
        $query = DeliveryOption::query();

        if ($country = $request->query('country')) {
            $query->where('country', $country);
        }

        if ($shipmentDate = $request->query('shipment-date')) {
            $dateTimeRequest = Carbon::createFromFormat('d-m-Y', $shipmentDate);
            $isInWeekend = $dateTimeRequest->isWeekend();

            if ($isInWeekend) {
                $query->where('weekends', true);
            } else {
                $query;
            }
        }

        if ($packageType = $request->query('package-type')) {
            $query->where('service', $packageType);
        }

        return DeliveryOptionResource::collection($query->get());
    }
}
