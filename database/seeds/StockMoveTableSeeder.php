<?php

use Illuminate\Database\Seeder;

class StockMoveTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$stockMoves = array(
            array(
                'stock_id'=>'SAMSUNG',
                'order_no'=>0,
                'receive_id'=>1,
                'trans_type'=>102,
                'loc_code'=>'JA',
                'tran_date'=>date("Y-m-d"),
                'person_id'=>1,
                'order_reference'=>'',
                'reference'=>'store_in_4',
                'transaction_reference_id'=>4,
                'transfer_id'=>NULL,
                'qty'=>1000,
                'price'=>50
            ),
            array(
                'stock_id'=>'SINGER',
                'order_no'=>0,
                'receive_id'=>1,
                'trans_type'=>102,
                'loc_code'=>'JA',
                'tran_date'=>date("Y-m-d"),
                'person_id'=>1,
                'order_reference'=>'',
                'reference'=>'store_in_4',
                'transaction_reference_id'=>4,
                'transfer_id'=>NULL,
                'qty'=>100,
                'price'=>50
            ),
            array(
                'stock_id'=>'SONY',
                'order_no'=>0,
                'receive_id'=>1,
                'trans_type'=>102,
                'loc_code'=>'JA',
                'tran_date'=>date("Y-m-d"),
                'person_id'=>1,
                'order_reference'=>'',
                'reference'=>'store_in_4',
                'transaction_reference_id'=>4,
                'transfer_id'=>NULL,
                'qty'=>100,
                'price'=>50
            ),
            array(
                'stock_id'=>'WALTON',
                'order_no'=>0,
                'receive_id'=>1,
                'trans_type'=>102,
                'loc_code'=>'JA',
                'tran_date'=>date("Y-m-d"),
                'person_id'=>1,
                'order_reference'=>'',
                'reference'=>'store_in_4',
                'transaction_reference_id'=>4,
                'transfer_id'=>NULL,
                'qty'=>1000,
                'price'=>50
            ),
            array(
                'stock_id'=>'APPLE',
                'order_no'=>0,
                'receive_id'=>2,
                'trans_type'=>102,
                'loc_code'=>'PL',
                'tran_date'=>date("Y-m-d"),
                'person_id'=>1,
                'order_reference'=>'',
                'reference'=>'store_in_1',
                'transaction_reference_id'=>1,
                'transfer_id'=>NULL,
                'qty'=>1000,
                'price'=>100
            ),
            array(
                'stock_id'=>'APPLE',
                'order_no'=>1,
                'receive_id'=>0,
                'trans_type'=>202,
                'loc_code'=>'PL',
                'tran_date'=>date("Y-m-d"),
                'person_id'=>1,
                'order_reference'=>'SO-0001',
                'reference'=>'store_out_4',
                'transaction_reference_id'=>4,
                'transfer_id'=>NULL,
                'qty'=>-10,
                'price'=>160
            ),
            array(
                'stock_id'=>'SAMSUNG',
                'order_no'=>0,
                'receive_id'=>3,
                'trans_type'=>102,
                'loc_code'=>'JA',
                'tran_date'=>date("Y-m-d"),
                'person_id'=>1,
                'order_reference'=>'',
                'reference'=>'store_in_1',
                'transaction_reference_id'=>1,
                'transfer_id'=>NULL,
                'qty'=>1000,
                'price'=>50
            ),
            array(
                'stock_id'=>'SAMSUNG',
                'order_no'=>0,
                'receive_id'=>4,
                'trans_type'=>102,
                'loc_code'=>'PL',
                'tran_date'=>date("Y-m-d"),
                'person_id'=>1,
                'order_reference'=>'',
                'reference'=>'store_in_9',
                'transaction_reference_id'=>9,
                'transfer_id'=>NULL,
                'qty'=>1000,
                'price'=>50
            ),
            array(
                'stock_id'=>'SAMSUNG',
                'order_no'=>2,
                'receive_id'=>0,
                'trans_type'=>202,
                'loc_code'=>'PL',
                'tran_date'=>date("Y-m-d", strtotime("-29 days")),
                'person_id'=>1,
                'order_reference'=>'SO-0002',
                'reference'=>'store_out_5',
                'transaction_reference_id'=>5,
                'transfer_id'=>NULL,
                'qty'=>-100,
                'price'=>90
            ),
            array(
                'stock_id'=>'APPLE',
                'order_no'=>0,
                'receive_id'=>5,
                'trans_type'=>102,
                'loc_code'=>'JA',
                'tran_date'=>date("Y-m-d"),
                'person_id'=>1,
                'order_reference'=>'',
                'reference'=>'store_in_9',
                'transaction_reference_id'=>9,
                'transfer_id'=>NULL,
                'qty'=>1000,
                'price'=>100
            ),
            array(
                'stock_id'=>'WALTON',
                'order_no'=>0,
                'receive_id'=>5,
                'trans_type'=>102,
                'loc_code'=>'JA',
                'tran_date'=>date("Y-m-d"),
                'person_id'=>1,
                'order_reference'=>'',
                'reference'=>'store_in_9',
                'transaction_reference_id'=>9,
                'transfer_id'=>NULL,
                'qty'=>1000,
                'price'=>50
            ), 
            array(
                'stock_id'=>'APPLE',
                'order_no'=>0,
                'receive_id'=>6,
                'trans_type'=>102,
                'loc_code'=>'PL',
                'tran_date'=>date("Y-m-d"),
                'person_id'=>1,
                'order_reference'=>'',
                'reference'=>'store_in_10',
                'transaction_reference_id'=>10,
                'transfer_id'=>NULL,
                'qty'=>1000,
                'price'=>100
            ),
            array(
                'stock_id'=>'WALTON',
                'order_no'=>0,
                'receive_id'=>6,
                'trans_type'=>102,
                'loc_code'=>'PL',
                'tran_date'=>date("Y-m-d"),
                'person_id'=>1,
                'order_reference'=>'',
                'reference'=>'store_in_10',
                'transaction_reference_id'=>10,
                'transfer_id'=>NULL,
                'qty'=>1000,
                'price'=>50
            ),
            array(
                'stock_id'=>'APPLE',
                'order_no'=>3,
                'receive_id'=>0,
                'trans_type'=>202,
                'loc_code'=>'PL',
                'tran_date'=>date("Y-m-d", strtotime("-25 days")),
                'person_id'=>1,
                'order_reference'=>'SO-0003',
                'reference'=>'store_out_6',
                'transaction_reference_id'=>6,
                'transfer_id'=>NULL,
                'qty'=>-20,
                'price'=>160
            ),
            array(
                'stock_id'=>'WALTON',
                'order_no'=>3,
                'receive_id'=>0,
                'trans_type'=>202,
                'loc_code'=>'PL',
                'tran_date'=>date("Y-m-d", strtotime("-25 days")),
                'person_id'=>1,
                'order_reference'=>'SO-0003',
                'reference'=>'store_out_6',
                'transaction_reference_id'=>6,
                'transfer_id'=>NULL,
                'qty'=>-20,
                'price'=>85
            ),
            array(
                'stock_id'=>'APPLE',
                'order_no'=>3,
                'receive_id'=>0,
                'trans_type'=>202,
                'loc_code'=>'PL',
                'tran_date'=>date("Y-m-d", strtotime("-14 days")),
                'person_id'=>1,
                'order_reference'=>'SO-0003',
                'reference'=>'store_out_7',
                'transaction_reference_id'=>7,
                'transfer_id'=>NULL,
                'qty'=>-50,
                'price'=>160
            ),
            array(
                'stock_id'=>'WALTON',
                'order_no'=>3,
                'receive_id'=>0,
                'trans_type'=>202,
                'loc_code'=>'PL',
                'tran_date'=>date("Y-m-d", strtotime("-14 days")),
                'person_id'=>1,
                'order_reference'=>'SO-0003',
                'reference'=>'store_out_7',
                'transaction_reference_id'=>7,
                'transfer_id'=>NULL,
                'qty'=>-50,
                'price'=>85
            ),
            array(
                'stock_id'=>'APPLE',
                'order_no'=>3,
                'receive_id'=>0,
                'trans_type'=>202,
                'loc_code'=>'PL',
                'tran_date'=>date("Y-m-d", strtotime("-16 days")),
                'person_id'=>1,
                'order_reference'=>'SO-0003',
                'reference'=>'store_out_8',
                'transaction_reference_id'=>8,
                'transfer_id'=>NULL,
                'qty'=>-110,
                'price'=>160
            ),
            array(
                'stock_id'=>'WALTON',
                'order_no'=>3,
                'receive_id'=>0,
                'trans_type'=>202,
                'loc_code'=>'PL',
                'tran_date'=>date("Y-m-d", strtotime("-16 days")),
                'person_id'=>1,
                'order_reference'=>'SO-0003',
                'reference'=>'store_out_8',
                'transaction_reference_id'=>8,
                'transfer_id'=>NULL,
                'qty'=>-130,
                'price'=>85
            ),
            array(
                'stock_id'=>'APPLE',
                'order_no'=>3,
                'receive_id'=>0,
                'trans_type'=>202,
                'loc_code'=>'PL',
                'tran_date'=>date("Y-m-d"),
                'person_id'=>1,
                'order_reference'=>'SO-0003',
                'reference'=>'store_out_9',
                'transaction_reference_id'=>9,
                'transfer_id'=>NULL,
                'qty'=>-10,
                'price'=>160
            ),
            array(
                'stock_id'=>'WALTON',
                'order_no'=>0,
                'receive_id'=>0,
                'trans_type'=>401,
                'loc_code'=>'PL',
                'tran_date'=>date("Y-m-d", strtotime("-3 days")),
                'person_id'=>1,
                'order_reference'=>'',
                'reference'=>'moved_from_JA',
                'transaction_reference_id'=>1,
                'transfer_id'=>1,
                'qty'=>100,
                'price'=>0
            ),
            array(
                'stock_id'=>'WALTON',
                'order_no'=>0,
                'receive_id'=>0,
                'trans_type'=>402,
                'loc_code'=>'JA',
                'tran_date'=>date("Y-m-d", strtotime("-3 days")),
                'person_id'=>1,
                'order_reference'=>'',
                'reference'=>'moved_in_PL',
                'transaction_reference_id'=>1,
                'transfer_id'=>NULL,
                'qty'=>-100,
                'price'=>0
            )
           
        );
        DB::table('stock_moves')->truncate();
		DB::table('stock_moves')->insert($stockMoves);
    }
}