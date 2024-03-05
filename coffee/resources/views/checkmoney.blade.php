@extends('layouts.coffeetable')
@section('title')
รายการดอกไม้ที่ถูกสั่งซื้อ
@endsection


@section('content')

        <div class="card shadow mb-4" style="margin: 3rem">
          <div class="card-hrader py-3">
            <h6 class=" font-weight-bold text-primary ml-4 mt-3">ข้อมูลดอกไม้</h6>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <th>ลำดับ</th>
                  <th>ชื่อดอกคนซื้อ</th>
                  {{-- <th>รายละเอียด</th> --}}
                  <th>จำนวน</th>
                  <th>ราคา</th>
                  <th>หลักฐานการโอนเงิน</th>
                  <th>ปี/เดือน/วัน</th>
                  <th>จัดการ</th>
                </thead>
                
                <tbody>
                  @foreach($Items as $d)

                  <tr>
                    <th scope="row">{{$d->idorder}}</th>
                    <td>{{ optional($d->user)->name ?? 'No User' }}</td>
                    
                    <td>{{$d->count_t}} ถาด</td>
                    <td>{{$d->price_t}} บาท</td>
                    <td>{{$d->slip}}</td> 
                    <td>{{$d->created_at}}</td> 
                    @if ($d->status4 == 0)
                        <td><a href="/addgeneratelist1/{{$d->idorderlist}}" class="btn btn-warning mb-1  ">จ่ายงาน</a>
                          <form action="{{ route('orderlist.updateStatus') }}" method="POST">
                            @csrf
                            <input type="hidden" name="order_idorder" value="{{ $d->idorderlist }}">
                            <input type="hidden" name="status2" value="5"> <!-- หรือ value="5" สำหรับฟอร์มยกเลิก -->
                            <button type="submit" class="btn btn-success">จ่ายงานเสร็จเเล้ว</button> <!-- เปลี่ยนเป็น "ยกเลิก" ในฟอร์มยกเลิก -->
                        </form></td>
                        
                    @else
                        <td><p class="text-success ">จ่ายงานไปแล้ว</p></td>
                    @endif

                    {{-- <a href="/folwers/create" class="btn btn-primary">เพิ่มข้อมูล</a> --}}
                    
                    
                    
                     {{-- <td> --}}
                      {{-- <form action="{{ route('orderlist.updateStatusTo2') }}" method="POST">
                        @csrf
                        <input type="hidden" name="status" value="{{ $d->status }}">
                        <button type="submit">ยอมรับ</button>
                    </form> --}}
                    
                     {{-- //Form for updating status to 5  --}}
                     {{-- <form action="{{ route('orderlist.updateStatusTo5') }}" method="POST">
                        @csrf
                        <input type="hidden" name="status" value="{{ $d->status }}">
                        <button type="submit">ยกเลิก</button>
                    </form> --}}
                    {{-- <form action="{{ route('orderlist.updateStatus') }}" method="POST" class="mb-1">
                      @csrf
                      <input type="hidden" name="order_idorder" value="{{ $d->idorderlist }}">
                      <input type="hidden" name="status" value="2"> <!-- หรือ value="5" สำหรับฟอร์มยกเลิก -->
                      <button type="submit" class="btn btn-success">ยอมรับ</button> <!-- เปลี่ยนเป็น "ยกเลิก" ในฟอร์มยกเลิก -->
                  </form>
                  
                  
                  <form action="{{ route('orderlist.updateStatus') }}" method="POST">
                    @csrf
                    <input type="hidden" name="order_idorder" value="{{ $d->idorderlist }}">
                    <input type="hidden" name="status" value="4"> <!-- หรือ value="5" สำหรับฟอร์มยกเลิก -->
                    <button type="submit" class="btn btn-danger">ไม่รับ</button> <!-- เปลี่ยนเป็น "ยกเลิก" ในฟอร์มยกเลิก -->
                </form> --}}
                
                  
                    {{-- </td>  --}}
                  </tr>

                  @endforeach
                </tbody>
              </table>
              
              </table>
            </div>
          </div>
          
            






  @endsection
  {{-- @include('home') --}}
  