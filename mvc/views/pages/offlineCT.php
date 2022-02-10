<!-- Page Header -->
<div class="page-header">
    <div class="row align-items-center">
        <div class="col">
            <h3 class="page-title"> Nghỉ phép </h3>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="./Admin"> Hệ Thống </a></li>
                <li class="breadcrumb-item active"> Danh sách nghỉ phép </li>
            </ul>
        </div>
        <div class="col-auto float-right ml-auto">
            <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_position"><i class="fa fa-plus"></i> Thêm </a>
        </div>
    </div>
</div>
<!-- /Page Header -->

<!-- Table Wage -->
<table class="table table-striped custom-table mb-0 datatable" id="my-table">
    <thead>
        <tr>
            <th>Họ tên</th>
            <th>Ngày bắt đầu</th>
            <th>Ngày kết thúc</th>
            <th>Lý do</th>
        </tr>
    </thead>
    <tbody>
    <?php
        foreach ($data['show'] as $key => $row){  
    ?>
        <tr>
            <td><?php echo $row['HoTen']; ?></td>
            <td><?php echo $row['NgayBatDau']; ?></td>
            <td><?php echo $row['NgayKetThuc']; ?></td>
            <td><?php echo $row['LyDo']; ?></td>
        </tr>
        <?php } ?>
    </tbody>
</table>
<!-- /Table Wage -->

<!-- Add Modal -->
<!-- <div id="add_position" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Thêm</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Danh sách nhân viên</label>
                                <select id="hoten">
                                    <option value="">--Chọn--</option>
                                  
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> Ngày bắt đầu </label>
                                <input id="batdau" class="form-control" type="date"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> Ngày kết thúc </label>
                                <input id="ketthuc" class="form-control" type="date"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> Lý do </label>
                                <input id="lydo" class="form-control" type="text"/>
                            </div>
                        </div>
                    </div>
                    <div class="submit-section">
                        <button name="btn_add" id="btn_add" class="btn btn-primary submit-btn">Thêm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> -->
<!-- /Add Modal -->

<script >
    $(document).ready(function() {
        $('#my-table').Tabledit({
            url: '../CustomOffline/actions',
            columns: {
                identifier: [0, 'id'],
                editable: [
                    [1, 'col1'],[2, 'col2'],[3, 'col3'],
                ]
            },
            onSuccess(data, textStatus, jqXHR){
                console.log(data);
                if (data.action == 'delete') {
                    $('#' + data.id).remove();
                }
            }
        });

    //     $(document).on('click', '#btn_add', function(){  
    //        var hoten = $('#hoten').val();  
    //        var batdau = $('#batdau').val();  
    //        var ketthuc = $('#ketthuc').val();  
    //        var lydo = $('#lydo').val();  
    //        if(hoten== '')  
    //        {  
    //             alert("Nhập họ tên");  
    //             return false;  
    //        }  
    //        if(batdau == '')  
    //        {  
    //             alert("Nhập ngày bắt đầu");  
    //             return false;  
    //        }  
    //        if(ketthuc== '')  
    //        {  
    //             alert("Nhập ngày kết thúc");  
    //             return false;  
    //        }  
    //        if(lydo == '')  
    //        {  
    //             alert("Nhập Lý do");  
    //             return false;  
    //        } 
    //        $.ajax({  
    //             url:"../CustomOffline/addOffline",  
    //             method:"POST",  
    //             data:{hoten:hoten, batdau:batdau, ketthuc:ketthuc, lydo:lydo},  
    //             dataType:"text",  
    //             success:function(data)  
    //             {  
    //                 // if(data == 'true'){
    //                 //     alert("Thêm thành công");
    //                 // } else {
    //                 //     alert("Dã tồn tại");
    //                 // }
    //                 console.log(data);
    //             }  
    //        })  
    //   });  
    }); 
</script>