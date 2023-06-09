<?php

namespace App\Imports;

use App\Models\Product;
use App\Models\Category;
use App\Models\ProductFamily;
use App\Models\ProductSubfamily;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductsImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        DB::beginTransaction();

        try {
            foreach($rows as $row) {
                if( !Product::where('title', $row['producto'])->exists() ) {
                    $product = new Product;

                    $productFamily = !is_null($row['familia']) ? ProductFamily::where('title', 'LIKE', '%'. $row['familia'] .'%')->first() : null;
                    $product->product_family_id = !is_null($productFamily) ? $productFamily->id : null;

                    $productSubfamily = !is_null($row['subfamilia']) ? ProductSubfamily::where('title', 'LIKE', '%'. $row['subfamilia'] .'%')->first() : null;
                    $product->product_subfamily_id = !is_null($productSubfamily) ? $productSubfamily->id : null;

                    $category = !is_null($row['filtroagrupacion_por_categoria']) ? Category::where('title', 'LIKE', '%'. $row['filtroagrupacion_por_categoria'] .'%')->first() : null;
                    $product->category_id = !is_null($category) ? $category->id : null;
                    $product->title = $row['producto'];

                    $product->save();
                }
            }
        }
        catch(\Exception $e) {
            dd($e->getMessage());
            DB::rollback();
        }

        DB::commit();
    }
}
