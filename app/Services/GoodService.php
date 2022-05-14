<?php

namespace App\Services;

use App\Exceptions\NotFoundException;
use App\Models\Good;

class GoodService extends AbstractService
{
    protected $model = Good::class;

    public function saveGood($good_id, array $data, $image = null)
    {
        $good = Good::query()
            ->updateOrCreate([
                'id' => (int)$good_id,
            ], [
                'category_id' => $data['category_id'],
                'title' => $data['title'],
                'description' => $data['description'],
                'cost' => $data['cost'],
            ]);

        if (!empty($image)) {
            $good->saveImage($image);
        }

        return $good;
    }

    /**
     * @param int $good_id
     * @return int $category_id
     * @throws NotFoundException
     */
    public function deleteGood(int $good_id): int
    {
        $good = Good::query()
            ->find($good_id);

        if (!$good) {
            throw new NotFoundException();
        }

        $category_id = $good->category_id;
        $good->deleteImageFile();
        $good->delete();

        return $category_id;
    }
}
