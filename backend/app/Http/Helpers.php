<?php

namespace App\Http;

use App\Models\{History, Purchase, Storage};
use Illuminate\Http\Client\Pool;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

trait Helpers {
	public function fillStorage(Collection $ingredients): bool
	{

		$responses = Http::pool(function (Pool $pool) use ($ingredients) {

			$ingredients->map(function ($item, $key) use ($pool) {
				$pool->as($item)->get('https://recruitment.alegra.com/api/farmers-market/buy', [
					'ingredient' => $item
				]);
			});

		});

		foreach ($responses as $key => $resp) {
			$data = $resp->json();

			if ($data['quantitySold'] != 0) {

				Storage::where('name', $key)->update([
					'quantity' => $resp['quantitySold']
				]);

				Purchase::create([
					'name' => $key,
					'quantity' => $resp['quantitySold']
				]);

			}
		}

		// Evaluamos que todas las respuestas tengan un valor distinto a 0
		return count(
			array_unique(
				array_map(fn($resp) => $resp['quantitySold'] != 0, $responses)
			)
		) === 1;
	}

	public function history(string $name, $status = 0): void
	{
		History::create([
			'name' => $name,
			'status' => $status
		]);
	}
}