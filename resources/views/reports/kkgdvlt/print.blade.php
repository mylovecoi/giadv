<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="vi">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>{{$pageTitle}}</title>
    <style type="text/css">
        body {
            font: normal 14px/16px time, serif;
        }

        table, p {
            width: 98%;
            margin: auto;
        }

        table tr td:first-child {
            text-align: center;
        }

        td, th {
            padding: 10px;
        }
        p{
            padding: 5px;
        }
        span{
            text-transform: uppercase;
            font-weight: bold;

        }
    </style>
</head>
<body style="font:normal 14px Times, serif;">

<table width="96%" border="0" cellspacing="0" cellpadding="8" style="margin:0 auto 20px; text-align: center;">
    <tr>
        <td width="40%" style="text-transform: uppercase;">
            <b>{{$modelcompany->tendoanhnghiep}}</b><br>
            --------<br>
        </td>
        <td>
            <b>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</b><br>
            <b><i><u>Độc lập - Tự do - Hạnh phúc</u></i></b><br>
        </td>
    </tr>
    <tr>
        <td width="40%">
            Số: {{$modelkk->socv}}<br>
            <i>V/v kê khai giá dịch vụ lưu trú</i>
        </td>
        <td>
            <i>{{$modelcompany->diadanh}}, ngày..{{ date("d",strtotime($modelkk->ngaynhap))}}..tháng..{{ date("m",strtotime($modelkk->ngaynhap))}}..năm..{{ date("Y",strtotime($modelkk->ngaynhap))}}..</i>
        </td>
    </tr>
</table>


<p style="text-align: center; font-weight: bold; font-size: 16px;"><i><u>Kính gửi</u></i>: {{(getGeneralConfigs()['donvi'])}}</p>

<p>Doanh nghiệp chúng tôi tự xây dựng và kê khai giá dịch vụ lưu trú như sau:</p>

<p>-Tên doanh nghiệp: <span>{{$modelcompany->tendoanhnghiep}}</span></p>

<p>-Mã số thuế <span>{{$modelcompany->masothue}}</span> </p>

<p>-Địa chỉ trụ sở chính: {{$modelcompany->diachitruso}}</p>

<p>-Điện thoại: {{$modelcompany->telephone}}     -     Số fax: {{$modelcompany->fax}}</p>

<p>-Tên cơ sở kinh doanh: <span>{{$modelcompany->tencosokinhdoanh}}</span></p>

<p>-Loại hạng của cơ sở kinh doanh: {{$modelcompany->loaihang}} sao</p>

<p>-Địa chỉ: {{$modelcompany->diachikinhdoanh}}    -      Điện thoại: {{$modelcompany->telephonekinhdoanh}}</p>

<p>Nơi đăng ký nộp thuế của cơ sở kinh doanh đăng ký giá: {{$modelcompany->dknopthue}}</p>

<p>{{$modelcompany->tendoanhnghiep}} gửi Bảng kê khai giá dịch vụ lưu trú và kê khai thực hiện kể từ ngày <span>{{getDayVn($modelkk->ngayad)}}</span></p>

<p>Bảng kê khai giá gửi kèm theo công văn này sẽ thay thế cho Bảng kê khai giá kèm theo công văn số {{$modelkk->cvlk}}.</p>

<p>{{$modelcompany->tendoanhnghiep}} xin chịu trách nhiệm trước pháp luật về tính đúng đắn của mức giá mà chúng tôi kê khai.</p>

<p>Đề nghị quý cơ quan ghi nhận ngày nộp Biểu mẫu kê khai giá của {{$modelcompany->tendoanhnghiep}} theo quy định</p>

<table width="96%" border="0" cellspacing="0" cellpadding="8" style="margin:20px auto; text-align: center;">
    <tr>
        <td style="text-align: left;" width="30%">
            <b><i>Nơi nhận:</i></b><br>
            - Như trên:<br>
            - Lưu.
        </td>
        <td style="text-align: center; text-transform: uppercase;" width="70%">
            <b>{{$modelcompany->chucdanh}}</b><br>
        </td>
    </tr>

</table>
<table width="96%" border="0" cellspacing="0" cellpadding="8" style="margin:100px auto; text-align: center;">
    <tr>
        <td style="text-align: center;">
            Cơ quan tiếp nhận biểu mẫu đăng ký giá<br>
            ghi nhận ngày nộp biểu mẫu đăng ký giá<br>
            <br><br><br><br>
        </td>
    </tr>
</table>
<p style="page-break-before: always">
<!--Trang2-->
<table width="96%" border="0" cellspacing="0" cellpadding="8" style="margin:0 auto 25px; text-align: center;">
    <tr>
        <td width="40%" style="text-transform: uppercase;">
            <b>{{$modelcompany->tendoanhnghiep}}</b><br>
            --------<br>
        </td>
        <td>
            <b>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</b><br>
            <b><i><u>Độc lập - Tự do - Hạnh phúc</u></i></b><br>
        </td>
    </tr>
</table>
<p style="text-align: center; font-weight: bold; font-size: 16px;">BẢNG KÊ KHAI GIÁ DỊCH VỤ LƯU TRÚ</p>
<p style="text-align: center;">(Kèm theo công văn số {{$modelkk->socv}}  ngày {{ date("d",strtotime($modelkk->ngaynhap))}} tháng {{ date("m",strtotime($modelkk->ngaynhap))}} năm {{ date("Y",strtotime($modelkk->ngaynhap))}} của {{$modelcompany->tendoanhnghiep}})</p>
<p style="text-align: right; font-size: 16px;"><i>Đơn vị tính: Đồng/phòng/ngày đêm</i></p>
<table cellspacing="0" cellpadding="0" border="1" style="margin: 20px auto; border-collapse: collapse;">
    <tr>
        <th>Loại phòng/ Quy<br>cách chất lượng<br>phòng</th>
        <th>Số hiệu<br>Phòng</th>
        <th>Mức giá kê<br>khai trước<br>liền kề</th>
        <th>Mức giá kê<br>khai</th>
        <th>Ghi chú</th>
    </tr>
    @foreach($modelttql as $ctkk)
        <tr>
            <th style="text-align: left">{{$ctkk->loaip.'-'.$ctkk->qccl}}</th>
            <th style="text-align: left">{{$ctkk->sohieu}}</th>
            <th style="text-align: right">{{number_format($ctkk->mucgialk)}}</th>
            <th style="text-align: right">{{number_format($ctkk->mucgia)}}</th>
            <th>{{$ctkk->ghichu}}</th>
        </tr>
    @endforeach
</table>
<p>{!! nl2br(e($modelkk->ghichu)) !!}</p>
<table width="96%" border="0" cellspacing="0" cellpadding="8" style="margin:20px auto; text-align: center;">
    <tr>
        <td style="text-align: left;" width="30%">

        </td>
        <td style="text-align: center;text-transform: uppercase; " width="70%">
            <b>{{$modelcompany->chucdanh}}</b><br>
        </td>
    </tr>

</table>
<table width="96%" border="0" cellspacing="0" cellpadding="8" style="margin:100px auto; text-align: center;">
    <tr>
        <td style="text-align: center;">
            Cơ quan tiếp nhận biểu mẫu đăng ký giá<br>
            ghi nhận ngày nộp biểu mẫu đăng ký giá<br>
            <br><br><br><br>
        </td>
    </tr>
</table>
<p style="page-break-before: always">
<!--Trang3-->
<table width="96%" border="0" cellspacing="0" cellpadding="8" style="margin:0 auto 20px; text-align: center;">
    <tr>
        <td width="40%" style="text-transform: uppercase;">
            <b>{{$modelcompany->tendoanhnghiep}}</b><br>
            Địa chỉ: {{$modelcompany->diachitruso}}<br>
            Mã số thuế: {{$modelcompany->masothue}}
        </td>
        <td>
            <b>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</b><br>
            <b><i><u>Độc lập - Tự do - Hạnh phúc</u></i></b><br>
        </td>
    </tr>
</table>
<p style="text-align: center; font-weight: bold; font-size: 16px;">BẢNG GIÁ PHÒNG</p>
<p style="text-align: center;">Thực hiện từ ngày<br>(Theo bảng giá đã kê khai)</p>
<table cellspacing="0" cellpadding="0" border="1" style="margin: 20px auto; border-collapse: collapse;">
    <tr>
        <th>Loại phòng/ Quy<br>cách chất lượng<br>phòng</th>
        <th>Số hiệu<br>Phòng</th>
        <th>Mức giá niêm<br>yết</th>
        <th>Ghi chú</th>
    </tr>
    @foreach($modelttql as $ctkk)
        <tr>
            <th style="text-align: left">{{$ctkk->loaip.'-'.$ctkk->qccl}}</th>
            <th style="text-align: left">{{$ctkk->sohieu}}</th>
            <th style="text-align: right">{{number_format($ctkk->mucgia)}}</th>
            <th>{{$ctkk->ghichu}}</th>
        </tr>
    @endforeach
</table>
<p>
    Cơ sở kinh doanh chúng tôi cam kết thực hiện niêm yết giá và bán theo giá niêm yết.<br>
    Nếu sai cơ sở chúng tôi xin hoàn toàn chịu trách nhiệm trước pháp luật.<br>
    Khi cần quý khách có thể liên hệ theo các số điện thoại sau, nếu cơ sở chúng tôi không thực hiện đúng bảng giá đã niêm yết:<br>
    Sở Tài chính: 058.3822072 (Phòng Thanh tra)- 058.3826741 (Phòng Vật giá)<br>
    Sở Văn hóa, Thể thao và Du lịch: 058.3811871 (Phòng Thanh tra)<br>
    Chi cục Thuế TP. Nha Trang: 058.35622181.
</p>
<table width="96%" border="0" cellspacing="0" cellpadding="8" style="margin:20px auto; text-align: center;">
    <tr>
        <td style="text-align: left;" width="30%">

        </td>
        <td style="text-align: center; text-transform: uppercase;" width="70%">
            <b>{{$modelcompany->chucdanh}}</b><br>
        </td>
    </tr>

</table>
</body>
</html>