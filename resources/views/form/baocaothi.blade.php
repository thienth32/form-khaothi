@extends('layouts.clients.master')
@section('style-custom')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="{{asset('styles/form-bao-cao-thi.css')}}">
@endsection
@section('content')
    <div class="container px-5 my-5 ">
        <div class="row">
            <div class="col-md-10 offset-md-1 card-form pb-5 pt-5">
                <h3>Báo cáo tình hình thi {{$dotthi->name}}</h3>
                <p>Sau khi coi thi, chấm thi, giảng viên báo cáo tình hình thi, nộp danh sách thi tại đây (có thể add nhiều file cùng lúc):</p>
                <form id="baocaothiForm" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="email">Email<span class="text-danger">*</span></label>
                            <input class="form-control" disabled value="{{\Illuminate\Support\Facades\Auth::user()->email}}" id="email" type="email" placeholder="Email" data-sb-validations="email,required" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col">
                            <label class="form-label" for="bộMon">Bộ môn<span class="text-danger">*</span></label>
                            <select class="form-select" name="bo_mon" onchange="list_mon_hoc(this.value)" id="bộMon" aria-label="Bộ môn">
                                @foreach($bomon as $bm)
                                    <option value="{{$bm->id}}">{{$bm->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 col">
                            <label class="form-label" for="monHọc">Môn học<span class="text-danger">*</span></label>
                            <select class="form-select" name="mon_hoc_id" id="monHọc" aria-label="Môn học">
                                @foreach($monhoc as $mh)
                                    <option value="{{$mh->id}}">{{$mh->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-3 col">
                            <label class="form-label" for="lớp">Lớp<span class="text-danger">*</span></label>
                            <input class="form-control" name="ten_lop" id="lớp" type="text" placeholder="Lớp" data-sb-validations="required" />
                        </div>
                        <div class="mb-3 col">
                            <label class="form-label" for="fileDiểm10B">File điểm 10b<span class="text-danger">*</span></label>
                            <input class="form-control" id="fileDiểm10B" name="file_excel" type="file" placeholder="File điểm 10b" data-sb-validations="required" />
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label d-block">Hình thức thi<span class="text-danger">*</span></label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" value="1" checked id="bảoVệBaiAssignment" type="radio" name="hinh_thuc_thi" data-sb-validations="required" />
                            <label for="bảoVệBaiAssignment">Bảo vệ ASS (Bảng điểm thi)</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" value="2" id="trắcNghiệmEos" type="radio" name="hinh_thuc_thi" data-sb-validations="required" />
                            <label for="trắcNghiệmEos">Trắc nghiệm (Danh sách thi)</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col">
                            <label class="form-label" for="ngayThi">Ngày thi<span class="text-danger">*</span></label>
                            <input class="form-control" id="ngayThi" name="ngay_thi" type="text" placeholder="DD/MM/YYYY" data-sb-validations="required" />
                        </div>
                        <div class="mb-3 col">
                            <label class="form-label" for="caThi">Ca thi<span class="text-danger">*</span></label>
                            <select class="form-select" id="caThi" name="ca_thi" aria-label="Ca thi">
                                @for($i = 1; $i <= 6; $i++)
                                    <option value="{{$i}}">Ca {{$i}}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="sốSinhVienThi">Số sinh viên thi<span class="text-danger">*</span></label>
                            <input class="form-control" id="sốSinhVienThi" name="so_sv_thi" type="text" placeholder="Số sinh viên thi" data-sb-validations="required" />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="sốSinhVienVắngMặt">Số sinh viên vắng mặt<span class="text-danger">*</span></label>
                            <input class="form-control" id="sốSinhVienVắngMặt" name="so_sv_vang_mat" type="text" placeholder="Số sinh viên vắng mặt" data-sb-validations="required" />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="maSốSinhVienVắngMặt">Mã số sinh viên vắng mặt</label>
                            <input class="form-control" id="maSốSinhVienVắngMặt" name="ma_sv_vang_mat" type="text" placeholder="Mã số sinh viên vắng mặt" data-sb-validations="required" />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="sốSinhVienViPhạmQuyChếThi">Số sinh viên vi phạm quy chế thi<span class="text-danger">*</span></label>
                            <input class="form-control" id="sốSinhVienViPhạmQuyChếThi" name="so_sv_vi_pham" type="text" placeholder="Số sinh viên vi phạm quy chế thi" data-sb-validations="required" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="congTacTổChứcThi">Công tác tổ chức thi<span class="text-danger">*</span></label>
                            <input class="form-control" id="congTacTổChứcThi" name="ct_to_chuc" type="text" placeholder="Công tác tổ chức thi" data-sb-validations="required" />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="tinhTrạngDềThi">Tình trạng đề thi<span class="text-danger">*</span></label>
                            <input class="form-control" id="tinhTrạngDềThi" name="tinh_trang_de_thi" type="text" placeholder="Tình trạng đề thi" data-sb-validations="required" />
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="cacDềXuấtVaKhắcPhục">Các đề xuất và khắc phục</label>
                        <textarea class="form-control" name="de_xuat_khac_phuc" id="cacDềXuấtVaKhắcPhục" type="text" placeholder="Các đề xuất và khắc phục" style="height: 10rem;" data-sb-validations=""></textarea>
                    </div>

                    <div class="d-grid">
                        <button class="btn btn-primary btn-lg" id="submitButton" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>

    </div>

@endsection

@section('page-script')
    <script src="{{asset('vendor/jquery-validate/jquery.validate.min.js')}}"></script>
    <script src="{{asset('vendor/jquery-validate/additional-methods.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://npmcdn.com/flatpickr/dist/l10n/vn.js"></script>
    <script>
        const monhoc = @json($monhoc);

        $(document).ready(function(){
            $('#ngayThi').flatpickr({
                disableMobile: true,
                dateFormat: "d/m/Y",
                locale: "vn",
                allowInput: true
            });
            $('#baocaothiForm').validate({
                rules: {
                    email_gv: {
                        required: true,
                        email: true
                    },
                    ngay_thi: {
                        required: true
                    },
                    ten_lop: {
                        required: true
                    },
                    file_excel: {
                        required: true,
                        extension: "xls|xlsx"
                    },
                    so_sv_thi: {
                        required: true
                    },
                    so_sv_vang_mat: {
                        required: true
                    },
                    so_sv_vi_pham: {
                        required: true
                    },
                    ct_to_chuc: {
                        required: true
                    },
                    tinh_trang_de_thi: {
                        required: true
                    }
                },
                messages: {
                    email_gv: {
                        required: "Nhập email",
                        email: "Không đúng định dạng email"
                    },
                    ngay_thi: {
                        required: "Hãy chọn ngày thi"
                    },
                    ten_lop: {
                        required: "Hãy nhập tên lớp"
                    },
                    file_excel: {
                        required: "Hãy chọn file điểm 10b",
                        extension: "Chọn đúng định dạng file excel (xls|xlsx)"
                    },
                    so_sv_thi: {
                        required: "Chưa nhập số sinh viên thi"
                    },
                    so_sv_vang_mat: {
                        required: "Chưa nhập số sinh viên vắng mặt"
                    },
                    so_sv_vi_pham: {
                        required: "Chưa nhập số sinh viên vi phạm"
                    },
                    ct_to_chuc: {
                        required: "Hãy nhập thông tin công tác tổ chức"
                    },
                    tinh_trang_de_thi: {
                        required: "Hãy nhập tình trạng đề thi"
                    }
                }
            })
            list_mon_hoc($('select[name="bo_mon"]').val());
        })

        function list_mon_hoc(bomonId){
            const lstMonHoc = monhoc.filter(item => item.bo_mon_id == bomonId).map(e => `<option value="${e.id}">${e.name}</option>`);
            $('select[name="mon_hoc_id"]').html(lstMonHoc);
        }
    </script>
@endsection
