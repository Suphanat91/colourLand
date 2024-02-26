<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\Orderlist;
// use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Order::all();
        //  dd($data);
        // $data = order::with('orderlist', 'user')->get();
        // dd($data);
        return view ('Order',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
{
    // กรองเฉพาะรายการที่มี order_idorder เท่ากับ $id และ status เท่ากับ 1
    $orderItems = Orderlist::where('order_idorder', $id)->whereIn('status2', ['1','2','5'])->get();

    // ส่งข้อมูลไปยัง view และแสดงผล
    return view('orderlist', compact('orderItems'));
}


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateStatus(Request $request)
{
    $orderId = $request->input('order_idorder');
    $status = $request->input('status2');

    if ($orderId && $status) {
        OrderList::where('idorderlist', $orderId)
                 ->update(['status2' => $status]); // อัปเดตสถานะตามค่าที่รับมา
        return back()->with('success', 'อัปเดตสถานะเรียบร้อยแล้ว');
    }

    return back()->with('error', 'ต้องการ Order ID และสถานะ');
}

    // public function updateStatusTo2(Request $request)
    // {
    //     $orderId = $request->input('order_idorder');
    //     if ($orderId) {
    //         OrderList::where('order_idorder', $orderId)
    //                  ->update(['status2' => 2]);
    //         return back()->with('success', 'รับออเดอร์เเล้ว');
    //     }

    //     return back()->with('error', 'Order ID is required.');
    // }

    // public function updateStatusTo4(Request $request)
    // {
    //     $orderId = $request->input('order_idorder');
    //     if ($orderId) {
    //         OrderList::where('order_idorder', $orderId)
    //                  ->update(['status2' => 4]);
    //         return back()->with('success', 'ยกเลิกออเดอร์');
    //     }

    //     return back()->with('error', 'Order ID is required.');
    // }
    
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function acceptorder()
{
    $orderItems = Orderlist::where('status2', '3')->get();

// ส่งข้อมูลไปยัง view และแสดงผล
return view('acceptorder', ['orderItems' => $orderItems]);

}
public function cancelorder()
{
    $orderItems = Orderlist::where('status2', '4')->get();

// ส่งข้อมูลไปยัง view และแสดงผล
return view('cancelorder', ['orderItems' => $orderItems]);

}
}
