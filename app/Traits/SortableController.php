<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

trait SortableController
{
    /**
     * Reorder items based on the provided IDs.
     * Ensure the controller defines a protected $sortableModel property.
     */
    public function reorder(Request $request)
    {
        if (! property_exists($this, 'sortableModel')) {
            Log::error('SortableController: Property $sortableModel is missing in '.get_class($this));

            return response()->json(['success' => false, 'error' => 'Konfigurasi server tidak valid.'], 500);
        }

        $modelClass = $this->sortableModel;
        $tableName = (new $modelClass)->getTable();

        $request->validate([
            'order' => 'required|array|max:500',
            'order.*' => 'required|integer|exists:'.$tableName.',id',
        ]);

        $order = $request->input('order');

        try {
            DB::transaction(function () use ($modelClass, $order) {
                foreach ($order as $index => $id) {
                    $modelClass::where('id', $id)->update(['order_column' => $index]);
                }
            });

            return response()->json(['success' => true, 'message' => 'Urutan berhasil diperbarui.']);
        } catch (\Exception $e) {
            Log::error('SortableController Reorder Error: '.$e->getMessage());

            return response()->json(['success' => false, 'error' => 'Terjadi kesalahan sistem saat menyimpan urutan.'], 500);
        }
    }
}
