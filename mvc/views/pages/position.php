<!-- Page Header -->
<div class="page-header">
    <div class="row align-items-center">
        <div class="col">
            <h3 class="page-title"> Danh mục chức vụ </h3>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="../Admin/show"> Hệ Thống </a></li>
                <li class="breadcrumb-item active"> Chức vụ </li>
            </ul>
        </div>
        <div class="col-auto float-right ml-auto">
            <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_position"><i class="fa fa-plus"></i> Thêm chức vụ </a>
        </div>
    </div>
</div>
<!-- /Page Header -->

<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table id="my-table" class="table table-striped custom-table mb-0 datatable">
                <thead>
                    <tr>
                        <th><strong> Mã chức vụ </strong></th>
                        <th><strong> Tên chức vụ </strong></th>
                    </tr>
                </thead>
                <tbody>
					<?php 
						foreach ($data['show'] as $key => $value ){
							$ma = $value['MaChucVu'];
							$name = $value['TenChucVu'];	
					?>
                    <tr style="counter-increment: rowNumber;">
                        <td><strong><?php echo $ma; ?></strong></td>
                        <td> <?php echo $name; ?> </td>
                    </tr>
					<?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- /Page Content -->

<!-- Add Modal -->
<div id="add_position" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> Thêm chức vụ </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> Mã chức vụ </label>
                                <input id="ma" class="form-control" type="text" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> Tên chức vụ </label>
                                <input id="ten" class="form-control" type="text" />
                            </div>
                        </div>
                    </div>
                    <div class="submit-section">
                        <button id="btn_add" name="btn_add" class="btn btn-primary submit-btn"> Thêm </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Add Modal -->
<script >
    $(document).ready(function() {
        $('#my-table').Tabledit({
            url: '../Position/action',
            columns: {
                identifier: [0, 'id'],
                editable: [
                    [1, 'col1'],
                ]
            },
            onSuccess(data, textStatus, jqXHR){
                console.log(data);
                if (data.action == 'delete') {
                    $('#' + data.id).remove();
                }
            }
        });

        $(document).on('click', '#btn_add', function(){  
           var ma = $('#ma').val();  
           console.log(ma);
           var ten = $('#ten').val();  
        //    console.log(heso);
           
           if(ma== '')  
           {  
                alert("Mã chức vụ");  
                return false;  
           }  
           if(ten == '')  
           {  
                alert("Tên chức vụ");  
                return false;  
           }  
           $.ajax({  
                url:"../Position/addPosition",  
                method:"POST",  
                data:{ma:ma, ten:ten},  
                dataType:"text",  
                success:function(data)  
                {  
                    if(data == 'true'){
                        alert("Thêm thành công");
                    } else {
                        alert("Mã hoặc tên chức vụ đã tồn tại");
                    }
                }  
           })  
      });  
    }); 
</script>