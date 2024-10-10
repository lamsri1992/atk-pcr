{{-- @extends('layouts.app')
@section('content') --}}
{{-- <style>
        @media print {
            body {
                -webkit-print-color-adjust: exact;
            }

            .hideWhenPrint {
                display: none;
            }
        }
    </style> --}}
{{-- <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('patient.index') }}">รายงาน</a></li>
        </ol>
    </nav> --}}
<section class="section">
    {{-- <div class="mb-3">
            <a href="#" class="btn btn-success" onClick="PrintDiv();">
                <i class="fa-solid fa-print"></i>
                พิมพ์หน้านี้
            </a>
        </div> --}}
    <div class="card" id="container">
        {{-- <div class="card-header">
                <h4 align="center">ตรวจ ATK/PCR</h4>
            </div> --}}
        <div class="card-body" id="print">
            <h5 align="center"></h5>
            <div class="row">
                <div class="col">
                    <table style="font-size: 10px">
                        <tr>
                            <td style="width:5%"></td>
                            <td>
                                    AID-ID: {{ $data->activity_a_id}}-{{$data->reg_id }} <br>
                                    คุณ  {{ $data->reg_visitor }} <br>
                                    วันที่ {{ DateThai($data->reg_date) }} <br><br>
                                    @php $image = base64_encode($img); @endphp
                                    <img src="data:image/jpeg;base64,{{ $image }}" width="100%">
                            </td>                            
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{-- </div> --}}
</section>
{{-- @endsection
@section('script') --}}
<script>
    window.addEventListener('load', function() {
        const divToPrint = document.getElementById('print');
        if (divToPrint) {
            window.print();
        }
    });


    window.onafterprint = function(event) {
        window.location.href = '/activity/register/' + {{ $data->activity_a_id }}; // Replace with your target URL
    };


    // $(document).ready(function(){
    //     // window.print();
    //  PrintDiv();
    // });
    // flatpickr(".myDate", {
    //     "locale":"th"
    // });

    // Swal.fire({
    //   title: "ต้องการพิมพ์?",
    //   text: "กดปุ่ม Ctrl+p หรือ คลิกเมาส์ขวา เลือก print หรือ พิมพ์",
    //   icon: "question"
    // });

    // function PrintDiv() {
    //     var divToPrint = document.getElementById('print'); // เลือก div id ที่เราต้องการพิมพ์
    //     var html = '<html>' + // 
    //         '<head>' +
    //         '<link href="css/print.css" rel="stylesheet" type="text/css">' +
    //         '</head>' +
    //         '<body onload="window.print(); window.close();">' + divToPrint.innerHTML + '</body>' +
    //         '</html>';

    //     var popupWin = window.open();
    //     popupWin.document.open();
    //     popupWin.document.write(html); //โหลด print.css ให้ทำงานก่อนสั่งพิมพ์
    //     popupWin.document.close();
    // }

    // $('#province').on('select2:select', function (e) {
    //   var provinceObject = $('#province');
    //   var amphureObject = $('#amphur');
    //   var districtObject = $('#tambon');
    //   var provinceId = e.params.data.id;

    //   amphureObject.html('<option value="">เลือกอำเภอ</option>');
    //   districtObject.html('<option value="">เลือกตำบล</option>');

    //   $.get('/api/amphur/' + provinceId, function(data){
    //           $.each(data, function(index, item){
    //               amphureObject.append(
    //                   $('<option></option>').val(item.AMPHUR_CODE).html(item.AMPHUR_NAME)
    //               );
    //           });
    //       });

    //       amphureObject.on('change', function(){
    //       var amphureId = $(this).val();

    //       $.get('/api/tambon/' + amphureId, function(data){
    //           $.each(data, function(index, item){
    //               districtObject.append(
    //                   $('<option></option>').val(item.DISTRICT_CODE).html(item.DISTRICT_NAME)
    //               );
    //           });
    //       });
    //   });
    // });

    // $('#amphur').on('change',function(){
    //   $('#tambon').html('<option value="">เลือกตำบล</option>');
    //   var amphureId = $(this).val();
    //   console.log(amphureId);
    //   $.get('/api/tambon/' + amphureId, function(data){
    //           $.each(data, function(index, item){
    //               $('#tambon').append(
    //                   $('<option></option>').val(item.DISTRICT_CODE).html(item.DISTRICT_NAME)
    //               );
    //           });
    //       });
    // })
</script>
{{-- @endsection --}}
